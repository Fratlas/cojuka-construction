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
}