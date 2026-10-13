<?php
namespace App\Http\Controllers;
use App\Models\GroupEntity;
use App\Models\GroupProject;
use App\Models\GroupAsset;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
class GroupAdminController {
 public function dashboard(){return view('gestion.group-dashboard',['entities'=>GroupEntity::count(),'projects'=>GroupProject::count(),'assets'=>GroupAsset::count(),'recent'=>GroupProject::with('entity')->latest()->limit(7)->get()]);}
 public function listing(string $module){$model=$this->model($module);return view('gestion.group-list',['module'=>$module,'rows'=>$model::latest()->paginate(15),'entities'=>GroupEntity::orderBy('name')->get()]);}
 public function save(Request $r,string $module){$model=$this->model($module);$data=$this->validated($r,$module);$model::create($data);return back()->with('status','Enregistrement créé.');}
 public function edit(Request $r,string $module,int $id){$model=$this->model($module);$item=$model::findOrFail($id);$item->update($this->validated($r,$module,$id));return back()->with('status','Enregistrement mis à jour.');}
 public function delete(string $module,int $id){$model=$this->model($module);$model::findOrFail($id)->delete();return back()->with('status','Enregistrement supprimé.');}
 private function model(string $module):string{return match($module){'entites'=>GroupEntity::class,'projets'=>GroupProject::class,'actifs'=>GroupAsset::class,default=>abort(404)};}
 private function validated(Request $r,string $module,?int $id=null):array {
  if($module==='entites'){$d=$r->validate(['name'=>'required|string|max:200','slug'=>['required','alpha_dash','max:200',Rule::unique('group_entities','slug')->ignore($id)],'type'=>'required|string|max:80','country'=>'nullable|string|max:100','sector'=>'nullable|string|max:120','summary'=>'nullable|string|max:1500','description'=>'nullable|string','website'=>'nullable|url|max:255']);$d['published']=$r->boolean('published');return $d;}
  if($module==='projets'){$d=$r->validate(['group_entity_id'=>'required|exists:group_entities,id','title'=>'required|string|max:200','category'=>'nullable|string|max:120','location'=>'nullable|string|max:200','status'=>['required',Rule::in(['planifie','en_cours','suspendu','termine'])],'start_date'=>'nullable|date','end_date'=>'nullable|date|after_or_equal:start_date','budget'=>'nullable|numeric|min:0','currency'=>'required|string|size:3','description'=>'nullable|string']);$d['published']=$r->boolean('published');return $d;}
  return $r->validate(['group_entity_id'=>'required|exists:group_entities,id','name'=>'required|string|max:200','kind'=>'required|string|max:120','location'=>'nullable|string|max:200','reference'=>'nullable|string|max:200','status'=>'required|string|max:80','notes'=>'nullable|string']);
 }
}