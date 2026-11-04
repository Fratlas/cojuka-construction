<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
class GroupLoginController {
 public function form(){return view('gestion.group-login');}
 public function login(Request $request){
  $request->merge(['email'=>mb_strtolower(trim((string)$request->input('email')))]);
  $credentials=$request->validate(['email'=>'required|email','password'=>'required|string']);
  // « Se souvenir de moi » garde la session ouverte sur cet appareil.
  if(Auth::attempt($credentials,$request->boolean('remember'))){
   $request->session()->regenerate();
   return \App\Support\GroupAccess::any($request->user()) ? redirect()->intended(route('gestion.group.dashboard')) : redirect()->route('account.pending');
  }
  return back()->withErrors(['email'=>'E-mail ou mot de passe incorrect. Vérifiez les majuscules et réessayez.'])->onlyInput('email','remember');
 }
 public function pending(){
  if(\App\Support\GroupAccess::any(auth()->user()))return redirect()->route('gestion.group.dashboard');
  return view('gestion.group-pending');
 }
 /** Petit point de contrôle interrogé par la page d'attente : l'accès a-t-il été accordé ? */
 public function status(Request $request){
  $ready=\App\Support\GroupAccess::any($request->user());
  return response()->json(['ready'=>$ready,'url'=>$ready?route('gestion.group.dashboard'):null])->header('Cache-Control','no-store');
 }
 public function registerForm(){return view('gestion.group-register');}
 public function register(Request $request){
  $request->merge(['email'=>mb_strtolower(trim((string)$request->input('email'))),'name'=>trim((string)$request->input('name'))]);
  $data=$request->validate([
   'name'=>'required|string|max:255',
   'email'=>'required|email|max:255|unique:users,email',
   'password'=>'required|string|min:12|confirmed',
  ],[
   'email.unique'=>'Un compte existe déjà avec cette adresse : connectez-vous.',
   'password.min'=>'Le mot de passe doit contenir au moins 12 caractères.',
   'password.confirmed'=>'Les deux mots de passe ne correspondent pas.',
  ]);
  $id=DB::table('users')->insertGetId([
   'name'=>$data['name'],
   'email'=>$data['email'],
   'password'=>Hash::make($data['password']),
   'is_group_admin'=>0,
   'created_at'=>now(),
   'updated_at'=>now(),
  ]);
  // Connexion directe après l'inscription : plus besoin de retaper ses identifiants.
  Auth::loginUsingId($id);
  $request->session()->regenerate();
  return redirect()->route('account.pending')->with('status','Compte créé. Un administrateur doit maintenant vous attribuer vos accès.');
 }
 public function logout(Request $request){Auth::logout();$request->session()->invalidate();$request->session()->regenerateToken();return redirect()->route('login');}
}