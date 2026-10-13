<?php
namespace App\Http\Controllers;
use App\Models\GroupEntity;
use App\Models\GroupSuiteRecord;
use App\Models\GroupSuiteAudit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class GroupSuiteController {
 public const MODULES=[
  'rh'=>['label'=>'Ressources humaines','fields'=>['poste'=>'Poste','departement'=>'Département','telephone'=>'Téléphone']],
  'finances'=>['label'=>'Finances et dépenses','fields'=>['beneficiaire'=>'Bénéficiaire','categorie'=>'Catégorie','mode_paiement'=>'Mode de paiement']],
  'contrats'=>['label'=>'Contrats','fields'=>['partenaire'=>'Partenaire','date_echeance'=>'Échéance','type_contrat'=>'Type de contrat']],
  'achats'=>['label'=>'Achats et fournisseurs','fields'=>['fournisseur'=>'Fournisseur','quantite'=>'Quantité','produit'=>'Produit / service']],
  'logistique'=>['label'=>'Logistique et transport','fields'=>['vehicule'=>'Véhicule','chauffeur'=>'Chauffeur','destination'=>'Destination']],
  'immobilier'=>['label'=>'Immobilier et foncier','fields'=>['parcelle'=>'Référence parcelle','superficie'=>'Superficie','titre_foncier'=>'Titre foncier']],
  'mines'=>['label'=>'Mines et concessions','fields'=>['permis'=>'Référence permis','substance'=>'Substance','superficie'=>'Superficie']],
  'consulting'=>['label'=>'Missions de conseil','fields'=>['client'=>'Client','livrable'=>'Livrable','responsable'=>'Responsable']],
 ];
 private function config(string $module):array {abort_unless(isset(self::MODULES[$module]),404);return self::MODULES[$module];}
 public function index(Request $request,string $module){
  $config=$this->config($module);
  $query=GroupSuiteRecord::with('entity')->where('module',$module);
  if($request->filled('entity')){$request->validate(['entity'=>'integer|exists:group_entities,id']);$query->where('group_entity_id',$request->query('entity'));}
  if($request->filled('q')){$request->validate(['q'=>'string|max:100']);$q=$request->query('q');$query->where(fn($builder)=>$builder->where('title','like','%'.$q.'%')->orWhere('reference','like','%'.$q.'%'));}
  return view('gestion.suite-index',['module'=>$module,'config'=>$config,'rows'=>$query->latest()->paginate(15)->withQueryString(),'entities'=>GroupEntity::orderBy('name')->get()]);
 }
 public function export(Request $request,string $module){
  $this->config($module);
  $records=GroupSuiteRecord::with('entity')->where('module',$module)->orderBy('id')->cursor();
  return response()->streamDownload(function()use($records){
   $out=fopen('php://output','w');fwrite($out,"\xEF\xBB\xBF");
   fputcsv($out,['ID','Société','Titre','Référence','Statut','Date','Montant','Devise','Localisation','Description'],';');
   foreach($records as $item){
    $clean=fn($value)=>preg_replace('/^[\x00-\x20]*([=+@\-])/u',"'$1",(string)($value??''));
    fputcsv($out,[$item->id,$clean($item->entity?->name),$clean($item->title),$clean($item->reference),$item->status,$item->record_date?->format('Y-m-d'),$item->amount,$item->currency,$clean($item->location),$clean($item->description)],';');
   }
   fclose($out);
  },'cojuka-'.$module.'-'.now()->format('Ymd').'.csv',['Content-Type'=>'text/csv; charset=UTF-8']);
 }
 public function store(Request $request,string $module){
  $config=$this->config($module);$data=$this->validateData($request,$config);
  DB::transaction(function()use($data,$module,$request){
   $item=GroupSuiteRecord::create($data+['module'=>$module,'created_by'=>$request->user()->id,'updated_by'=>$request->user()->id]);
   $this->audit($request,'create',$item,null);
  });
  return redirect()->route('gestion.suite.index',$module)->with('status','Enregistrement créé.');
 }
 public function update(Request $request,string $module,int $id){
  $config=$this->config($module);$data=$this->validateData($request,$config);
  DB::transaction(function()use($data,$module,$id,$request){
   $item=GroupSuiteRecord::where('module',$module)->findOrFail($id);$before=$item->toArray();
   $item->update($data+['updated_by'=>$request->user()->id]);$this->audit($request,'update',$item,$before);
  });
  return back()->with('status','Enregistrement mis à jour.');
 }
 public function destroy(Request $request,string $module,int $id){
  $this->config($module);
  DB::transaction(function()use($module,$id,$request){
   $item=GroupSuiteRecord::where('module',$module)->findOrFail($id);$this->audit($request,'delete',$item,$item->toArray());$item->delete();
  });
  return back()->with('status','Enregistrement supprimé.');
 }
 private function validateData(Request $request,array $config):array {
  $rules=['group_entity_id'=>'required|integer|exists:group_entities,id','title'=>'required|string|max:255','reference'=>'nullable|string|max:255','status'=>['required',Rule::in(['brouillon','en_cours','en_attente','valide','termine','archive'])],'record_date'=>'nullable|date','amount'=>'nullable|numeric|min:0','currency'=>['required',Rule::in(['USD','CDF','EUR'])],'location'=>'nullable|string|max:255','description'=>'nullable|string|max:5000'];
  foreach($config['fields'] as $field=>$label){$rules['details.'.$field]='nullable|string|max:255';}
  $data=$request->validate($rules);$data['details']=$data['details']??[];
  return $data;
 }
 private function audit(Request $request,string $action,GroupSuiteRecord $item,?array $before):void {
  GroupSuiteAudit::create(['user_id'=>$request->user()->id,'action'=>$action,'module'=>$item->module,'record_id'=>$item->id,'before'=>$before,'after'=>$action==='delete'?null:$item->toArray()]);
 }
}