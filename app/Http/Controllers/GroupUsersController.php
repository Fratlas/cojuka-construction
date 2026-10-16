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
   'accessReady'=>GroupAccess::ready(),
  ]);
 }
 public function update(Request $request,User $user){
  abort_unless($request->user()?->is_group_admin,403);
  abort_unless(GroupAccess::ready(),503,'Installez d’abord les tables de contrôle des accès.');
  $data=$request->validate([
   'is_group_admin'=>'required|boolean',
   'group_department_id'=>['nullable','integer',Rule::exists('group_departments','id')->where('active',1)],
   'entities'=>'sometimes|array',
   'entities.*'=>'integer|distinct|exists:group_entities,id',
  ]);
  $grant=(bool)$data['is_group_admin'];
  if($request->user()->is($user) && !$grant) return back()->withErrors(['admin'=>'Vous ne pouvez pas retirer vos propres droits administrateur.']);
  if(!$grant && $user->is_group_admin && User::where('is_group_admin',true)->count()<=1)return back()->withErrors(['admin'=>'Le dernier administrateur ne peut pas être désactivé.']);
  DB::transaction(function()use($user,$grant,$data){
   $user->forceFill(['is_group_admin'=>$grant,'group_department_id'=>$grant?null:($data['group_department_id']??null)])->save();
   DB::table('group_user_entity_access')->where('user_id',$user->id)->delete();
   foreach($grant?[]:($data['entities']??[]) as $entityId){
    DB::table('group_user_entity_access')->insert(['user_id'=>$user->id,'group_entity_id'=>$entityId,'created_at'=>now(),'updated_at'=>now()]);
   }
  });
  return back()->with('status','Département, entités et droits mis à jour.');
 }
}