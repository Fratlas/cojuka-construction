<?php
namespace App\Http\Controllers;
use App\Support\GroupAccess;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
class GroupDepartmentController {
 public function index(Request $request){
  abort_unless($request->user()?->is_group_admin,403);
  abort_unless(GroupAccess::ready(),503,'Tables de permissions non installées.');
  return view('gestion.group-departments',[
   'departments'=>DB::table('group_departments')->orderBy('name')->get(),
   'permissions'=>DB::table('group_department_permissions')->get()->keyBy(fn($row)=>$row->department_id.':'.$row->module),
   'modules'=>GroupAccess::MODULES,'actions'=>GroupAccess::ACTIONS
  ]);
 }
 public function update(Request $request,int $department){
  abort_unless($request->user()?->is_group_admin,403);
  abort_unless(GroupAccess::ready(),503);
  abort_unless(DB::table('group_departments')->where('id',$department)->exists(),404);
  $data=$request->validate([
   'module'=>['required',Rule::in(GroupAccess::MODULES)],
   'can_view'=>'required|boolean','can_create'=>'required|boolean','can_update'=>'required|boolean',
   'can_delete'=>'required|boolean','can_export'=>'required|boolean',
  ]);
  DB::table('group_department_permissions')->updateOrInsert(
   ['department_id'=>$department,'module'=>$data['module']],
   ['can_view'=>(int)$data['can_view'],'can_create'=>(int)$data['can_create'],'can_update'=>(int)$data['can_update'],'can_delete'=>(int)$data['can_delete'],'can_export'=>(int)$data['can_export'],'updated_at'=>now()]
  );
  return back()->with('status','Permissions départementales enregistrées.');
 }

 public function exportCsv(Request $request){
  abort_unless($request->user()?->is_group_admin,403);
  abort_unless(GroupAccess::ready(),503);
  $departments=DB::table('group_departments')->orderBy('code')->get();
  $permissions=DB::table('group_department_permissions')->get()->keyBy(fn($row)=>$row->department_id.':'.$row->module);
  return response()->streamDownload(function()use($departments,$permissions){
   $out=fopen('php://output','wb');fwrite($out,"\xEF\xBB\xBF");
   fputcsv($out,['department_code','module','can_view','can_create','can_update','can_delete','can_export'],';','"','');
   foreach($departments as $dept)foreach(GroupAccess::MODULES as $module){
    $p=$permissions[$dept->id.':'.$module]??null;
    fputcsv($out,[$dept->code,$module,...array_map(fn($a)=>(int)($p->{'can_'.$a}??false),GroupAccess::ACTIONS)],';','"','');
   }
   fclose($out);
  },'cojuka-permissions-departements-'.now()->format('Ymd').'.csv',['Content-Type'=>'text/csv; charset=UTF-8','Cache-Control'=>'private, no-store']);
 }
 public function importCsv(Request $request){
  abort_unless($request->user()?->is_group_admin,403);
  abort_unless(GroupAccess::ready(),503);
  $request->validate(['file'=>'required|file|mimes:csv,txt|max:1024']);
  $handle=fopen($request->file('file')->getRealPath(),'rb');
  abort_unless($handle!==false,422,'CSV illisible.');
  try{
   $header=fgetcsv($handle,0,';','"','');
   if(!$header)return back()->withErrors(['file'=>'Fichier vide.']);
   $header=array_map(fn($v)=>trim(preg_replace('/^\xEF\xBB\xBF/','',(string)$v)),$header);
   if($header!==['department_code','module','can_view','can_create','can_update','can_delete','can_export'])
    return back()->withErrors(['file'=>'Colonnes invalides : exportez d’abord le modèle du module.']);
   $departments=DB::table('group_departments')->where('active',1)->pluck('id','code');
   $changes=[];$seen=[];$line=1;
   while(($values=fgetcsv($handle,0,';','"',''))!==false){
    $line++;if(count($values)===1&&trim((string)$values[0])==='')continue;
    if($line>1001)return back()->withErrors(['file'=>'Maximum 1 000 lignes.']);
    if(count($values)!==7)return back()->withErrors(['file'=>"Ligne $line : nombre de colonnes incorrect."]);
    [$code,$module]=array_map('trim',array_slice($values,0,2));
    if(!isset($departments[$code])||!in_array($module,GroupAccess::MODULES,true))
     return back()->withErrors(['file'=>"Ligne $line : département ou module non reconnu."]);
    $key=$code.':'.$module;
    if(isset($seen[$key]))return back()->withErrors(['file'=>"Ligne $line : permission dupliquée."]);
    $seen[$key]=true;
    $record=['department_id'=>$departments[$code],'module'=>$module];
    foreach(GroupAccess::ACTIONS as $i=>$action){
     $value=trim((string)($values[$i+2]??''));
     if(!in_array($value,['0','1'],true))
      return back()->withErrors(['file'=>"Ligne $line : les permissions doivent valoir 0 ou 1."]);
     $record['can_'.$action]=(int)$value;
    }
    $changes[]=$record;
   }
   if(!$changes)return back()->withErrors(['file'=>'Aucune permission à importer.']);
   DB::transaction(function()use($changes){
    foreach($changes as $row){
     $id=$row['department_id'];$module=$row['module'];
     unset($row['department_id'],$row['module']);
     $row['updated_at']=now();
     DB::table('group_department_permissions')->updateOrInsert(
      ['department_id'=>$id,'module'=>$module],$row
     );
    }
   });
   return back()->with('status',count($changes).' lignes de droits importées. Les autres permissions ont été conservées.');
  }finally{fclose($handle);}
 }
}