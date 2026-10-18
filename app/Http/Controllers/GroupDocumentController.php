<?php
namespace App\Http\Controllers;

use App\Models\GroupEntity;
use App\Models\GroupSuiteRecord;
use App\Support\GroupAccess;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class GroupDocumentController
{
 private const CATEGORIES=[
  'entites'=>[
   'rccm'=>'RCCM','id_nat'=>'ID.NAT','nif'=>'NIF / fiscalité','statuts'=>'Statuts de la société',
   'agrement'=>'Agrément / autorisation','cnss'=>'CNSS','licence'=>'Licence / permis','autre'=>'Autre document'
  ],
  'rh'=>[
   'contrat'=>'Contrat de travail','identite'=>'Pièce d’identité','diplome'=>'Diplôme / qualification',
   'attestation'=>'Attestation','habilitation'=>'Habilitation / formation','autre'=>'Autre document professionnel'
  ]
 ];
 private function checkSchema():void{
  abort_unless(Schema::hasTable('group_documents'),503,'Exécutez les migrations des documents.');
 }
 private function record(Request $request,string $scope,int $id,string $action):array{
  abort_unless(isset(self::CATEGORIES[$scope]),404);
  $module=$scope==='entites'?'entites':'rh';
  abort_unless(GroupAccess::can($request->user(),$module,$action),403);
  if($scope==='entites'){
   $item=GroupEntity::findOrFail($id);
   GroupAccess::requireEntity($request->user(),$item->id);
   return [$item,$item->id];
  }
  $item=GroupSuiteRecord::where('module','rh')->findOrFail($id);
  GroupAccess::requireEntity($request->user(),$item->group_entity_id);
  return [$item,$item->group_entity_id];
 }
 public function index(Request $request,string $scope,int $id){
  $this->checkSchema();
  [$item]=$this->record($request,$scope,$id,'view');
  $documents=DB::table('group_documents')->where('owner_type',$scope)->where('owner_id',$id)->orderByDesc('id')->get();
  return view('gestion.group-documents',[
   'scope'=>$scope,'item'=>$item,'documents'=>$documents,
   'categories'=>self::CATEGORIES[$scope],
   'canUpload'=>GroupAccess::can($request->user(),$scope==='entites'?'entites':'rh','update')
  ]);
 }
 public function store(Request $request,string $scope,int $id){
  $this->checkSchema();
  abort_unless(in_array($scope,['entites','rh'],true),404);
  // Company certificates are controlled by group administrators, as are entity edits.
  if($scope==='entites')abort_unless((bool)$request->user()?->is_group_admin,403);
  [, $entityId]=$this->record($request,$scope,$id,'update');
  $data=$request->validate([
   'category'=>['required',Rule::in(array_keys(self::CATEGORIES[$scope]))],
   'label'=>'nullable|string|max:180',
   'issued_on'=>'nullable|date',
   'expires_on'=>'nullable|date|after_or_equal:issued_on',
   'file'=>'required|file|mimes:pdf,jpg,jpeg,png,webp|max:10240'
  ]);
  $file=$request->file('file');
  $path=$file->store('cojuka-private/'.$scope.'/'.$id,'local');
  abort_unless($path!==false,500,'Impossible d’enregistrer le document.');
  try {
   DB::table('group_documents')->insert([
    'owner_type'=>$scope,'owner_id'=>$id,'group_entity_id'=>$entityId,
    'category'=>$data['category'],'label'=>$data['label']??null,
    'original_name'=>substr(basename($file->getClientOriginalName()),0,255),
    'storage_path'=>$path,'mime_type'=>$file->getMimeType() ?: 'application/octet-stream',
    'size_bytes'=>$file->getSize(),'issued_on'=>$data['issued_on']??null,
    'expires_on'=>$data['expires_on']??null,'uploaded_by'=>$request->user()->id,
    'created_at'=>now(),'updated_at'=>now()
   ]);
  } catch (\Throwable $e){
   Storage::disk('local')->delete($path);
   throw $e;
  }
  return back()->with('status','Document ajouté au dossier privé.');
 }
 private function document(Request $request,int $document,string $action):object{
  $this->checkSchema();
  $doc=DB::table('group_documents')->where('id',$document)->first();
  abort_unless($doc,404);
  abort_unless(in_array($doc->owner_type,['entites','rh'],true),404);
  $this->record($request,$doc->owner_type,(int)$doc->owner_id,$action);
  return $doc;
 }
 public function download(Request $request,int $document){
  $doc=$this->document($request,$document,'view');
  abort_unless(Storage::disk('local')->exists($doc->storage_path),404,'Document introuvable.');
  return Storage::disk('local')->download($doc->storage_path,$doc->original_name,[
   'Content-Type'=>'application/octet-stream',
   'X-Content-Type-Options'=>'nosniff',
   'Cache-Control'=>'private, no-store, max-age=0',
  ]);
 }
 public function destroy(Request $request,int $document){
  $doc=$this->document($request,$document,'update');
  if($doc->owner_type==='entites')abort_unless((bool)$request->user()?->is_group_admin,403);
  DB::table('group_documents')->where('id',$doc->id)->delete();
  Storage::disk('local')->delete($doc->storage_path);
  return back()->with('status','Document supprimé du dossier privé.');
 }
}
