<?php
namespace App\Support;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
final class GroupAccess {
 public const MODULES=['entites','projets','actifs','rh','finances','contrats','achats','logistique','immobilier','mines','consulting'];
 public const ACTIONS=['view','create','update','delete','export'];
 public static function ready():bool{return Schema::hasTable('group_departments') && Schema::hasTable('group_department_permissions') && Schema::hasTable('group_user_entity_access') && Schema::hasColumn('users','group_department_id');}
 public static function can(?User $user,string $module,string $action='view'):bool{
  if(!$user || !in_array($module,self::MODULES,true) || !in_array($action,self::ACTIONS,true))return false;
  if($user->is_group_admin)return true;
  if(!self::ready() || !$user->group_department_id)return false;
  return DB::table('group_departments as d')->join('group_department_permissions as p','p.department_id','=','d.id')
   ->where('d.id',$user->group_department_id)->where('d.active',1)->where('p.module',$module)
   ->where('p.can_'.$action,1)->exists();
 }
 public static function entities(?User $user):?array{
  if($user?->is_group_admin)return null;
  if(!$user || !self::ready())return [];
  return DB::table('group_user_entity_access')->where('user_id',$user->id)->pluck('group_entity_id')->map(fn($id)=>(int)$id)->all();
 }
 public static function entityAllowed(?User $user,?int $id):bool{
  if($user?->is_group_admin)return true;
  return $id!==null && in_array((int)$id,self::entities($user)??[],true);
 }
 public static function requireEntity(?User $user,?int $id):void{abort_unless(self::entityAllowed($user,$id),403,'Accès interdit à cette entité.');}
 public static function any(?User $user):bool{
  if($user?->is_group_admin)return true;
  foreach(self::MODULES as $module)if(self::can($user,$module))return true;
  return false;
 }
}