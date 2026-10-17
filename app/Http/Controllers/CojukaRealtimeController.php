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
  $key=config('services.openai.key') ?: env('OPENAI_API_KEY');
  if(!$key)return response()->json(['error'=>'Configuration OpenAI manquante.'],503);
  $user=$request->user();
  $admin=$user && GroupAccess::any($user);
  $allowed=[];
  if($admin)foreach(GroupAccess::MODULES as $module)if(GroupAccess::can($user,$module))$allowed[]=$module;
  $instructions='Tu es l’assistant vocal de COJUKA Consulting Group. Parle en français avec une voix naturelle, des réponses courtes et précises. COJUKA présente Mining, Construction, Logistique, Eden Park Investments, Consultance et Impact Center. Tu aides à naviguer sur le site et expliques les procédures, sans prétendre accéder aux enregistrements réels, à la caméra ou à l’écran. Ne demande jamais de mots de passe. Ne réalise aucune action dans le site.';
  if($admin)$instructions.=' Modules autorisés pour cet utilisateur : '.implode(', ',$allowed).'. Ne divulgue aucune donnée personnelle ou financière.';
  $session=[
   'type'=>'realtime',
   'model'=>config('services.openai.realtime_model','gpt-realtime-mini'),
   'instructions'=>$instructions,
   'audio'=>['output'=>['voice'=>'cedar'],'input'=>['turn_detection'=>['type'=>'server_vad','create_response'=>true,'interrupt_response'=>true]]],
  ];
  try {
   $response=Http::withToken($key)->timeout(25)->asMultipart()
    ->attach('sdp',$data['sdp'],'offer.sdp',['Content-Type'=>'application/sdp'])
    ->attach('session',json_encode($session,JSON_UNESCAPED_UNICODE),'session.json',['Content-Type'=>'application/json'])
    ->post('https://api.openai.com/v1/realtime/calls');
   if(!$response->successful()){
    \Log::warning('COJUKA Realtime API error',['status'=>$response->status()]);
    return response()->json(['error'=>'Connexion vocale indisponible. Vérifiez la facturation et les accès API.'],502);
   }
   return response($response->body(),200)->header('Content-Type','application/sdp')->header('Cache-Control','no-store');
  }catch(\Throwable $e){
   \Log::warning('COJUKA Realtime connection failed',['type'=>get_class($e)]);
   return response()->json(['error'=>'Connexion vocale momentanément indisponible.'],503);
  }
 }
}
