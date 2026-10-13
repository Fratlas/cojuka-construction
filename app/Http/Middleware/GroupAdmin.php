<?php
namespace App\Http\Middleware;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
class GroupAdmin {
 public function handle(Request $request, Closure $next):Response {
  if (!$request->user()) return redirect()->guest(route('login'));
  if (!$request->user()->is_group_admin) {
   if ($request->isMethod('GET') || $request->isMethod('HEAD')) {
    return redirect()->route('account.pending')->with('status','Votre compte doit être autorisé avant l’accès à la gestion.');
   }
   abort(403,'Accès administrateur requis.');
  }
  return $next($request);
 }
}