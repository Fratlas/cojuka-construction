<?php
namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
class GroupUsersController {
 public function index(){return view('gestion.group-users',['users'=>User::orderByDesc('id')->paginate(25)]);}
 public function update(Request $request,User $user){
  $data=$request->validate(['is_group_admin'=>'required|boolean']);
  $grant=(bool)$data['is_group_admin'];
  if($request->user()->is($user) && !$grant)return back()->withErrors(['admin'=>'Vous ne pouvez pas retirer vos propres droits.']);
  if(!$grant && $user->is_group_admin && User::where('is_group_admin',true)->count()<=1)return back()->withErrors(['admin'=>'Le dernier administrateur ne peut pas être désactivé.']);
  $user->forceFill(['is_group_admin'=>$grant])->save();
  return back()->with('status','Autorisations mises à jour.');
 }
}