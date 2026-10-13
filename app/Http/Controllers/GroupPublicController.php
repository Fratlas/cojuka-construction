<?php
namespace App\Http\Controllers;
use App\Models\GroupEntity;
use App\Models\GroupProject;
class GroupPublicController {
 public function index(){return view('group-portal',['entities'=>GroupEntity::where('published',true)->orderBy('name')->get(),'projects'=>GroupProject::with('entity')->where('published',true)->whereHas('entity',fn($q)=>$q->where('published',true))->latest()->limit(6)->get()]);}
 public function entity(string $slug){$entity=GroupEntity::where('slug',$slug)->where('published',true)->firstOrFail();return view('group-entity',['entity'=>$entity,'projects'=>$entity->projects()->where('published',true)->latest()->get()]);}
}