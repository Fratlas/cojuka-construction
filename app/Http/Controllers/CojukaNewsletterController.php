<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;

class CojukaNewsletterController
{
 private function ready():void{
  abort_unless(Schema::hasTable('cojuka_newsletter_subscribers'),503,'Newsletter en préparation.');
 }
 public function subscribe(Request $request){
  $this->ready();
  $data=$request->validate([
   'email'=>'required|email:rfc|max:255',
   'consent'=>'accepted',
   'website'=>'nullable|size:0',
  ],['consent.accepted'=>'Votre accord est nécessaire pour recevoir la newsletter.']);
  $email=Str::lower(trim($data['email']));
  $existing=DB::table('cojuka_newsletter_subscribers')->where('email',$email)->first();
  if($existing && $existing->confirmed_at){
   return back()->with('newsletter_success','Merci. Si votre adresse est inscrite, votre abonnement est déjà actif.');
  }
  $token=Str::random(48);
  DB::table('cojuka_newsletter_subscribers')->updateOrInsert(['email'=>$email],[
   'consent_at'=>now(),
   'confirmation_token_hash'=>hash('sha256',$token),
   'confirmation_expires_at'=>now()->addDays(2),
   'updated_at'=>now()
  ]);
  $subscriber=DB::table('cojuka_newsletter_subscribers')->where('email',$email)->first();
  $confirm=URL::temporarySignedRoute('cojuka.newsletter.confirm',now()->addDays(2),['subscriber'=>$subscriber->id,'token'=>$token]);
  $unsubscribe=URL::signedRoute('cojuka.newsletter.unsubscribe',['subscriber'=>$subscriber->id]);
  try{
   Mail::raw("Bonjour,\n\nVous avez demandé à recevoir les actualités de COJUKA Consulting Group.\n\nPour confirmer votre inscription (48 heures) :\n".$confirm."\n\nSi vous n'êtes pas à l'origine de cette demande, ignorez ce message.\n\nSe désinscrire : ".$unsubscribe."\n\nCOJUKA Consulting Group",function($message)use($email){
    $message->to($email)->subject('COJUKA — Confirmez votre abonnement');
   });
  }catch(\Throwable $error){
   Log::warning('COJUKA newsletter confirmation mail not delivered',['error'=>$error->getMessage()]);
   return back()->with('newsletter_notice','Adresse enregistrée en attente de confirmation. Le courriel n’a pas pu être envoyé pour le moment ; veuillez réessayer plus tard.');
  }
  return back()->with('newsletter_success','Vérifiez votre boîte e-mail pour confirmer votre inscription à la newsletter.');
 }
 public function confirm(Request $request,int $subscriber){
  $this->ready();
  $row=DB::table('cojuka_newsletter_subscribers')->where('id',$subscriber)->first();
  abort_unless($row,404);
  if($row->confirmed_at)return redirect()->route('home')->with('newsletter_success','Votre abonnement est déjà confirmé.');
  $token=(string)$request->query('token','');
  abort_unless($row->confirmation_token_hash && hash_equals($row->confirmation_token_hash,hash('sha256',$token)) && $row->confirmation_expires_at && now()->lessThanOrEqualTo($row->confirmation_expires_at),403,'Lien expiré. Inscrivez-vous à nouveau.');
  DB::table('cojuka_newsletter_subscribers')->where('id',$row->id)->update([
   'confirmed_at'=>now(),'confirmation_token_hash'=>null,'confirmation_expires_at'=>null,'updated_at'=>now()
  ]);
  return redirect()->route('home')->with('newsletter_success','Merci, votre abonnement à la newsletter COJUKA est confirmé.');
 }
 public function unsubscribe(Request $request,int $subscriber){
  $this->ready();
  DB::table('cojuka_newsletter_subscribers')->where('id',$subscriber)->delete();
  return redirect()->route('home')->with('newsletter_success','Votre désinscription à la newsletter a été prise en compte.');
 }
}
