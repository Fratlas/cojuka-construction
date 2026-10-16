<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
class GroupLoginController {
 public function form(){return view('gestion.group-login');}
 public function login(Request $request){$credentials=$request->validate(['email'=>'required|email','password'=>'required|string']);if(Auth::attempt($credentials)){ $request->session()->regenerate();return \App\Support\GroupAccess::any($request->user()) ? redirect()->intended(route('gestion.group.dashboard')) : redirect()->route('account.pending');}return back()->withErrors(['email'=>'Identifiants incorrects.'])->onlyInput('email');}
 public function pending(){return view('gestion.group-pending');}
 public function registerForm(){return view('gestion.group-register');}
 public function register(Request $request){
  $data=$request->validate([
   'name'=>'required|string|max:255',
   'email'=>'required|email|max:255|unique:users,email',
   'password'=>'required|string|min:12|confirmed',
  ]);
  DB::table('users')->insert([
   'name'=>$data['name'],
   'email'=>$data['email'],
   'password'=>Hash::make($data['password']),
   'is_group_admin'=>0,
   'created_at'=>now(),
   'updated_at'=>now(),
  ]);
  return redirect()->route('login')->with('status','Compte créé. Connectez-vous pour suivre le statut de votre accès.');
 }
 public function logout(Request $request){Auth::logout();$request->session()->invalidate();$request->session()->regenerateToken();return redirect()->route('login');}
}