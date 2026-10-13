<?php
namespace App\Http\Middleware;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
class GroupAdmin {
 public function handle(Request $request,Closure $next):Response {
  abort_unless((bool) $request->user()?->is_group_admin,403);
  return $next($request);
 }
}