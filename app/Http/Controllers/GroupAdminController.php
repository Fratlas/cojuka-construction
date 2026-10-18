<?php
namespace App\Http\Controllers;
use App\Models\GroupEntity;
use App\Support\GroupAccess;
use App\Models\GroupProject;
use App\Models\GroupAsset;
use App\Models\GroupSuiteRecord;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Schema;
class GroupAdminController {
 public function dashboard(Request $request){
  $request->validate(['entity'=>'nullable|integer|exists:group_entities,id']);
  $allowed=GroupAccess::entities($request->user());if($request->filled('entity'))GroupAccess::requireEntity($request->user(),(int)$request->query('entity'));
  $canProjects=GroupAccess::can($request->user(),'projets');$canAssets=GroupAccess::can($request->user(),'actifs');
  $entityId=$request->filled('entity')?(int)$request->query('entity'):null;
  $projectQuery=GroupProject::query();$assetQuery=GroupAsset::query();
  if($allowed!==null){$projectQuery->whereIn('group_entity_id',$allowed);$assetQuery->whereIn('group_entity_id',$allowed);}
  if($entityId){$projectQuery->where('group_entity_id',$entityId);$assetQuery->where('group_entity_id',$entityId);}
  $ready=Schema::hasTable('group_suite_records') && Schema::hasTable('group_suite_audit');
  $suiteQuery=GroupSuiteRecord::query();
  if($allowed!==null)$suiteQuery->whereIn('group_entity_id',$allowed);
  if($entityId)$suiteQuery->where('group_entity_id',$entityId);
  if(!$request->user()->is_group_admin)$suiteQuery->whereIn('module',array_values(array_filter(array_keys(\App\Http\Controllers\GroupSuiteController::MODULES),fn($module)=>GroupAccess::can($request->user(),$module))));
  return view('gestion.group-dashboard',[
    'entities'=>GroupEntity::when($allowed!==null,fn($q)=>$q->whereIn('id',$allowed))->count(),'projects'=>$canProjects?(clone $projectQuery)->count():0,'assets'=>$canAssets?(clone $assetQuery)->count():0,
    'recent'=>$canProjects?(clone $projectQuery)->with('entity')->latest()->limit(7)->get():collect(),
    'suiteStats'=>$ready?(clone $suiteQuery)->selectRaw('module, count(*) as total')->groupBy('module')->pluck('total','module')->all():[],
    'suiteReady'=>$ready,'entityOptions'=>GroupEntity::when($allowed!==null,fn($q)=>$q->whereIn('id',$allowed))->orderBy('name')->get(['id','name']),
    'selectedEntity'=>$entityId,
    'recentOperations'=>$ready?(clone $suiteQuery)->with('entity')->latest()->limit(8)->get():collect(),
    'operationCount'=>$ready?(clone $suiteQuery)->count():0,
    'financeTotals'=>$ready && GroupAccess::can($request->user(),'finances')?(clone $suiteQuery)->where('module','finances')->whereIn('status',['valide','termine'])->whereNotNull('amount')->selectRaw('currency, SUM(amount) as total')->groupBy('currency')->pluck('total','currency')->all():[],
  ]);
 }
 public function listing(Request $request,string $module){$model=$this->model($module);$allowed=GroupAccess::entities($request->user());$query=$model::query();if($allowed!==null){if($module==='entites')$query->whereIn('id',$allowed);else $query->whereIn('group_entity_id',$allowed);}return view('gestion.group-list',['module'=>$module,'rows'=>($module==='entites' ? $query->orderByRaw("CASE slug WHEN 'kojuka-mining' THEN 0 WHEN 'construction' THEN 1 WHEN 'genie' THEN 2 WHEN 'energie' THEN 3 WHEN 'logistique' THEN 4 WHEN 'cargo' THEN 5 WHEN 'materiel' THEN 6 WHEN 'eden-park-investments' THEN 7 WHEN 'consultance' THEN 8 WHEN 'public' THEN 9 WHEN 'sante' THEN 10 WHEN 'education' THEN 11 WHEN 'impact-center' THEN 12 ELSE 99 END")->orderBy('name') : $query->latest())->paginate(15),'entities'=>GroupEntity::when($allowed!==null,fn($q)=>$q->whereIn('id',$allowed))->orderBy('name')->get()]);}
 public function syncSectors(Request $request){
  abort_unless($request->user()?->is_group_admin,403);
  $sectors=[
   ['slug'=>'kojuka-mining','name'=>'Mining','sector'=>'Exploitation minière et carrières','type'=>'entite'],
   ['slug'=>'construction','name'=>'Construction','sector'=>'Construction et infrastructures','type'=>'entite'],
   ['slug'=>'genie','name'=>'Génie','sector'=>'Génie civil et infrastructures','type'=>'domaine'],
   ['slug'=>'energie','name'=>'Énergie','sector'=>'Infrastructures énergétiques','type'=>'domaine'],
   ['slug'=>'logistique','name'=>'Logistique','sector'=>'Transport et approvisionnement','type'=>'entite'],
   ['slug'=>'cargo','name'=>'Cargo','sector'=>'Fret et acheminement','type'=>'domaine'],
   ['slug'=>'materiel','name'=>'Matériel','sector'=>'Équipements et fournitures techniques','type'=>'domaine'],
   ['slug'=>'eden-park-investments','name'=>'Eden Park Investments','sector'=>'Investissements immobiliers et fonciers','type'=>'entite'],
   ['slug'=>'consultance','name'=>'Consultance','sector'=>'Conseil stratégique','type'=>'entite'],
   ['slug'=>'public','name'=>'Public','sector'=>'Projets et accompagnement institutionnel','type'=>'domaine'],
   ['slug'=>'sante','name'=>'Santé','sector'=>'Infrastructures et équipements sanitaires','type'=>'domaine'],
   ['slug'=>'education','name'=>'Éducation','sector'=>'Infrastructures et équipements éducatifs','type'=>'domaine'],
   ['slug'=>'impact-center','name'=>'Impact Center','sector'=>'Coopération et projets internationaux','type'=>'entite'],
  ];
  $created=0;
  foreach($sectors as $sector){
   if(GroupEntity::where('slug',$sector['slug'])->exists())continue;
   GroupEntity::create([
    'name'=>$sector['name'],'slug'=>$sector['slug'],'type'=>$sector['type'],
    'country'=>'RDC','sector'=>$sector['sector'],
    'summary'=>'Domaine de développement du groupe — présentation indicative, activités à confirmer.',
    'description'=>'Référentiel de gestion interne. Les activités et projets opérationnels doivent être validés avant publication.',
    'published'=>false,
   ]);
   $created++;
  }
  return redirect()->route('gestion.group.list','entites')->with('status',$created.' domaine(s) ajouté(s). Les enregistrements existants ont été conservés.');
 }
 public function save(Request $r,string $module){$model=$this->model($module);$data=$this->validated($r,$module);if($module==='entites')abort_unless($r->user()->is_group_admin,403);else GroupAccess::requireEntity($r->user(),(int)$data['group_entity_id']);$model::create($data);return back()->with('status','Enregistrement créé.');}
 public function edit(Request $r,string $module,int $id){$model=$this->model($module);$item=$model::findOrFail($id);if($module==='entites')abort_unless($r->user()->is_group_admin,403);else GroupAccess::requireEntity($r->user(),$item->group_entity_id);$data=$this->validated($r,$module,$id);if($module!=='entites')GroupAccess::requireEntity($r->user(),(int)$data['group_entity_id']);$item->update($data);return back()->with('status','Enregistrement mis à jour.');}
 public function delete(Request $request,string $module,int $id){$model=$this->model($module);$item=$model::findOrFail($id);if($module==='entites')abort_unless($request->user()->is_group_admin,403);else GroupAccess::requireEntity($request->user(),$item->group_entity_id);if($module==='entites' && ((Schema::hasTable('group_documents') && \Illuminate\Support\Facades\DB::table('group_documents')->where('owner_type','entites')->where('owner_id',$id)->exists()) || GroupProject::where('group_entity_id',$id)->exists() || GroupAsset::where('group_entity_id',$id)->exists() || (Schema::hasTable('group_suite_records') && GroupSuiteRecord::where('group_entity_id',$id)->exists()))){return back()->withErrors(['entity'=>'Cette entité possède des projets, actifs, opérations ou documents. Supprimez ou réaffectez ces dossiers avant suppression.']);}$item->delete();return back()->with('status','Enregistrement supprimé.');}
 private function model(string $module):string{return match($module){'entites'=>GroupEntity::class,'projets'=>GroupProject::class,'actifs'=>GroupAsset::class,default=>abort(404)};}
 private function validated(Request $r,string $module,?int $id=null):array {
  if($module==='entites'){$d=$r->validate(['name'=>'required|string|max:200','slug'=>['required','alpha_dash','max:200',Rule::unique('group_entities','slug')->ignore($id)],'type'=>'required|string|max:80','country'=>'nullable|string|max:100','sector'=>'nullable|string|max:120','summary'=>'nullable|string|max:1500','description'=>'nullable|string','website'=>'nullable|url|max:255','rccm'=>'nullable|string|max:255','id_nat'=>'nullable|string|max:255','nif'=>'nullable|string|max:255','numero_impot'=>'nullable|string|max:255','cnss'=>'nullable|string|max:255','adresse_siege'=>'nullable|string|max:255','telephone'=>'nullable|string|max:255','email_contact'=>'nullable|email|max:255','representant_legal'=>'nullable|string|max:255','date_immatriculation'=>'nullable|date']);$d['published']=$r->boolean('published');return $d;}
  if($module==='projets'){$d=$r->validate(['group_entity_id'=>'required|exists:group_entities,id','title'=>'required|string|max:200','category'=>'nullable|string|max:120','location'=>'nullable|string|max:200','status'=>['required',Rule::in(['planifie','en_cours','suspendu','termine'])],'start_date'=>'nullable|date','end_date'=>'nullable|date|after_or_equal:start_date','budget'=>'nullable|numeric|min:0','currency'=>'required|string|size:3','description'=>'nullable|string']);$d['published']=$r->boolean('published');return $d;}
  return $r->validate(['group_entity_id'=>'required|exists:group_entities,id','name'=>'required|string|max:200','kind'=>'required|string|max:120','location'=>'nullable|string|max:200','reference'=>'nullable|string|max:200','status'=>'required|string|max:80','notes'=>'nullable|string']);
 }
}