<?php
namespace App\Http\Controllers;
use App\Models\User;
use App\Models\GroupEntity;
use App\Support\GroupAccess;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
class GroupUsersController {
 public function index(){
  abort_unless(auth()->user()?->is_group_admin,403);
  return view('gestion.group-users',[
   'users'=>User::orderByDesc('id')->paginate(25),
   'departments'=>GroupAccess::ready()?DB::table('group_departments')->where('active',1)->orderBy('name')->get():collect(),
   'entities'=>GroupEntity::orderBy('name')->get(['id','name']),
   'assigned'=>GroupAccess::ready()?DB::table('group_user_entity_access')->get()->groupBy('user_id')->map(fn($rows)=>$rows->pluck('group_entity_id')->map(fn($id)=>(int)$id)->all())->all():[],
   'accessReady'=>GroupAccess::ready() && \Illuminate\Support\Facades\Schema::hasColumn('users','group_role'),
  ]);
 }
 public function update(Request $request,User $user){
  abort_unless($request->user()?->is_group_admin,403);
  abort_unless(GroupAccess::ready() && \Illuminate\Support\Facades\Schema::hasColumn('users','group_role'),503,'Exécutez les migrations des rôles et départements.');
  $data=$request->validate([
   'group_role'=>['required',Rule::in(array_keys(GroupAccess::ROLES))],
   'group_department_id'=>['nullable','integer',Rule::exists('group_departments','id')->where('active',1)],
   'entities'=>'sometimes|array',
   'entities.*'=>'integer|distinct|exists:group_entities,id',
  ]);
  $grant=$data['group_role']==='administrateur';
  if($request->user()->is($user) && !$grant) return back()->withErrors(['admin'=>'Vous ne pouvez pas retirer vos propres droits administrateur.']);
  if(!$grant && $user->is_group_admin && User::where('is_group_admin',true)->count()<=1)return back()->withErrors(['admin'=>'Le dernier administrateur ne peut pas être désactivé.']);
  DB::transaction(function()use($user,$grant,$data){
   $user->forceFill(['is_group_admin'=>$grant,'group_role'=>$data['group_role'],'group_department_id'=>$grant?null:($data['group_department_id']??null)])->save();
   DB::table('group_user_entity_access')->where('user_id',$user->id)->delete();
   foreach($grant?[]:($data['entities']??[]) as $entityId){
    DB::table('group_user_entity_access')->insert(['user_id'=>$user->id,'group_entity_id'=>$entityId,'created_at'=>now(),'updated_at'=>now()]);
   }
  });
  return back()->with('status','Département, entités et droits mis à jour.');
 }

 /** Export access assignments only, never passwords or authentication secrets. */
 public function exportCsv(Request $request){
  abort_unless($request->user()?->is_group_admin,403);
  abort_unless(GroupAccess::ready(),503);
  $departmentCodes=DB::table('group_departments')->pluck('code','id');
  $entitySlugs=GroupEntity::pluck('slug','id');
  $assignments=DB::table('group_user_entity_access')->get()->groupBy('user_id');
  return response()->streamDownload(function()use($departmentCodes,$entitySlugs,$assignments){
   $out=fopen('php://output','wb');fwrite($out,"\xEF\xBB\xBF");
   fputcsv($out,['email','group_role','department_code','entity_slugs'],';','"','');
   foreach(User::orderBy('id')->cursor() as $user){
    $slugList=$assignments->get($user->id,collect())->map(fn($v)=>$entitySlugs[$v->group_entity_id]??null)->filter()->implode('|');
    // Quoted CSV cells, formula-neutralized for spreadsheet tools.
    $safe=fn($v)=>preg_match('/^[\x00-\x20]*[=+@\-]/u',(string)$v)?"'".$v:(string)$v;
    fputcsv($out,[$safe($user->email),GroupAccess::role($user),$safe($departmentCodes[$user->group_department_id]??''),$safe($slugList)],';','"','');
   }
   fclose($out);
  },'cojuka-utilisateurs-acces-'.now()->format('Ymd').'.csv',['Content-Type'=>'text/csv; charset=UTF-8','Cache-Control'=>'private, no-store']);
 }
 /** Bulk import changes ONLY access rights for already registered accounts. */
 public function importCsv(Request $request){
  abort_unless($request->user()?->is_group_admin,403);
  abort_unless(GroupAccess::ready() && \Illuminate\Support\Facades\Schema::hasColumn('users','group_role'),503);
  $request->validate(['file'=>'required|file|mimes:csv,txt|max:1024']);
  $handle=fopen($request->file('file')->getRealPath(),'rb');
  abort_unless($handle!==false,422,'CSV illisible.');
  try{
   $header=fgetcsv($handle,0,';','"','');
   if(!$header)return back()->withErrors(['file'=>'Fichier CSV vide.']);
   $header=array_map(fn($v)=>trim(preg_replace('/^\xEF\xBB\xBF/','',(string)$v)),$header);
   if($header!==['email','group_role','department_code','entity_slugs']){
    return back()->withErrors(['file'=>'Colonnes invalides. Utilisez le fichier CSV exporté depuis Utilisateurs.']);
   }
   $departments=DB::table('group_departments')->where('active',1)->pluck('id','code');
   $entities=GroupEntity::pluck('id','slug');
   $changes=[];$line=1;$seen=[];
   while(($values=fgetcsv($handle,0,';','"',''))!==false){
    $line++;
    if(count($values)===1&&trim((string)$values[0])==='')continue;
    if($line>201)return back()->withErrors(['file'=>'Limite de 200 utilisateurs par import.']);
    if(count($values)!==4)return back()->withErrors(['file'=>"Ligne $line : 4 colonnes requises."]);
    [$email,$role,$dept,$slugs]=array_map('trim',$values);
    $email=strtolower($email);
    if(isset($seen[$email]))return back()->withErrors(['file'=>"Ligne $line : e-mail répété."]);
    $seen[$email]=true;
    $user=User::where('email',$email)->first();
    if(!$user)return back()->withErrors(['file'=>"Ligne $line : compte non existant ($email). Créez-le d’abord par inscription."]);
    if(!isset(GroupAccess::ROLES[$role]))return back()->withErrors(['file'=>"Ligne $line : niveau hiérarchique inconnu."]);
    if($dept!==''&&!isset($departments[$dept]))return back()->withErrors(['file'=>"Ligne $line : département inconnu ou inactif."]);
    $ids=[];
    foreach(array_filter(explode('|',$slugs)) as $slug){
     $slug=trim($slug);
     if(!isset($entities[$slug]))return back()->withErrors(['file'=>"Ligne $line : filiale inconnue ($slug)."]);
     $ids[(int)$entities[$slug]]=true;
    }
    if($user->is($request->user())&&$role!=='administrateur')return back()->withErrors(['file'=>'Vous ne pouvez pas retirer vos propres droits administrateur.']);
    $changes[]=['user'=>$user,'role'=>$role,'department'=>$role==='administrateur'?null:($dept===''?null:$departments[$dept]),'entities'=>array_keys($ids)];
   }
   if(!$changes)return back()->withErrors(['file'=>'Aucun compte à mettre à jour.']);
   $admins=User::where('is_group_admin',1)->count();
   foreach($changes as $change){
    $admins-=($change['user']->is_group_admin?1:0);
    $admins+=($change['role']==='administrateur'?1:0);
   }
   if($admins<1)return back()->withErrors(['file'=>'Il faut conserver au moins un administrateur.']);
   DB::transaction(function()use($changes){
    foreach($changes as $change){
     $user=$change['user'];$grant=$change['role']==='administrateur';
     $user->forceFill(['is_group_admin'=>$grant,'group_role'=>$change['role'],'group_department_id'=>$change['department']])->save();
     DB::table('group_user_entity_access')->where('user_id',$user->id)->delete();
     if(!$grant)foreach($change['entities'] as $id){
      DB::table('group_user_entity_access')->insert([
       'user_id'=>$user->id,'group_entity_id'=>$id,'created_at'=>now(),'updated_at'=>now()
      ]);
     }
    }
   });
   return back()->with('status',count($changes).' comptes mis à jour depuis le CSV. Aucun mot de passe modifié.');
  }finally{fclose($handle);}
 }
}