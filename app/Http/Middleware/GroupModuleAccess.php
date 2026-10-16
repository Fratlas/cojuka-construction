<?php
namespace App\Http\Middleware;
use App\Support\GroupAccess;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
class GroupModuleAccess {
 public function handle(Request $request,Closure $next):Response{
  $module=(string)$request->route('module');
  $name=(string)$request->route()?->getName();
  $action=match(true){
   str_ends_with($name,'.export'),str_ends_with($name,'.template')=>'export',
   str_ends_with($name,'.store'),str_ends_with($name,'.save'),str_ends_with($name,'.import')=>'create',
   str_ends_with($name,'.update'),str_ends_with($name,'.edit')=>'update',
   str_ends_with($name,'.destroy'),str_ends_with($name,'.delete')=>'delete',
   default=>'view'
  };
  abort_unless(GroupAccess::can($request->user(),$module,$action),403,'Vous ne disposez pas des droits pour ce département ou cette opération.');
  return $next($request);
 }
}