<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Support\GroupAccess;

class CojukaRealtimeController
{
 public function connect(Request $request)
 {
  $data=$request->validate(['sdp'=>'required|string|max:20000']);
  $key=config('cojuka.openai.key');
  if(!$key)return response()->json(['error'=>'Configuration OpenAI manquante.'],503);
  $user=$request->user();
  $admin=$user && GroupAccess::any($user);
  $allowed=[];
  if($admin)foreach(GroupAccess::MODULES as $module)if(GroupAccess::can($user,$module))$allowed[]=$module;
  $instructions='Tu es l’assistant vocal de COJUKA Consulting Group. Parle en français avec une voix naturelle, des réponses courtes et précises. COJUKA présente Mining, Construction, Logistique, Eden Park Investments, Consultance et Impact Center. Tu aides à naviguer sur le site et expliques les procédures, sans prétendre accéder aux enregistrements réels, à la caméra ou à l’écran. Ne demande jamais de mots de passe. Ne réalise aucune action dans le site.';
  if($admin)$instructions.=' Modules autorisés pour cet utilisateur : '.implode(', ',$allowed).'. Ne divulgue aucune donnée personnelle ou financière.';
  $session=[
   'type'=>'realtime',
   'model'=>config('cojuka.openai.realtime_model','gpt-realtime-mini'),
   'instructions'=>$instructions,
   'audio'=>['output'=>['voice'=>'cedar'],'input'=>['turn_detection'=>['type'=>'server_vad','create_response'=>true,'interrupt_response'=>true]]],
  ];
  try {
   // Plain form fields, as in OpenAI's FormData example (no file parts).
   $response=Http::withToken($key)->timeout(25)->asMultipart()
    ->post('https://api.openai.com/v1/realtime/calls',[
     ['name'=>'sdp','contents'=>$data['sdp']],
     ['name'=>'session','contents'=>json_encode($session,JSON_UNESCAPED_UNICODE)],
    ]);
   if(!$response->successful()){
    $status=$response->status();
    $err=(array)($response->json('error')??[]);
    $code=(string)($err['code']??$err['type']??'');
    \Log::error('COJUKA Realtime API error',['status'=>$status,'code'=>$code,'message'=>mb_substr((string)($err['message']??$response->body()),0,500)]);
    $reason=match(true){
     $status===401=>'clé API OpenAI invalide ou révoquée',
     $code==='insufficient_quota'=>'crédit OpenAI épuisé (facturation)',
     $status===429=>'trop de demandes, réessayez dans un instant',
     $status===403||$code==='model_not_found'||$status===404=>'ce projet OpenAI n’a pas accès au modèle vocal '.config('cojuka.openai.realtime_model','gpt-realtime-mini'),
     $status===400=>'requête refusée par OpenAI ('.mb_substr((string)($err['message']??'paramètres'),0,200).')',
     default=>'erreur OpenAI '.$status,
    };
    return response()->json(['error'=>'Connexion vocale indisponible : '.$reason.'.','status'=>$status,'code'=>$code],502);
   }
   return response($response->body(),200)->header('Content-Type','application/sdp')->header('Cache-Control','no-store');
  }catch(\Throwable $e){
   \Log::error('COJUKA Realtime connection failed',['type'=>get_class($e),'message'=>mb_substr($e->getMessage(),0,300)]);
   return response()->json(['error'=>'Connexion vocale momentanément indisponible.'],503);
  }
 }
}
