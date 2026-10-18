<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
class GroupNewsletterController
{
 private function ready():void {
  abort_unless(Schema::hasTable('cojuka_newsletter_subscribers'),503,'Exécutez la migration newsletter.');
 }
 public function index(Request $request) {
  abort_unless($request->user()?->is_group_admin,403);
  $this->ready();
  return view('gestion.group-newsletter',[
   'subscribers'=>DB::table('cojuka_newsletter_subscribers')->orderByDesc('id')->paginate(30),
   'confirmed'=>DB::table('cojuka_newsletter_subscribers')->whereNotNull('confirmed_at')->count(),
   'pending'=>DB::table('cojuka_newsletter_subscribers')->whereNull('confirmed_at')->count()
  ]);
 }
 public function export(Request $request){
  abort_unless($request->user()?->is_group_admin,403);
  $this->ready();
  $records=DB::table('cojuka_newsletter_subscribers')->whereNotNull('confirmed_at')->orderBy('id')->cursor();
  return response()->streamDownload(function()use($records){
   $out=fopen('php://output','wb');fwrite($out,"\xEF\xBB\xBF");
   fputcsv($out,['email','confirmed_at'],';','"','');
   foreach($records as $row){
    $clean=static fn($s)=>preg_match('/^[\x00-\x20]*[=+@\-]/u',(string)$s)?"'".$s:(string)$s;
    fputcsv($out,[$clean($row->email),$row->confirmed_at],';','"','');
   }
   fclose($out);
  },'cojuka-newsletter-confirmes-'.now()->format('Ymd').'.csv',['Content-Type'=>'text/csv; charset=UTF-8','Cache-Control'=>'private, no-store']);
 }
}