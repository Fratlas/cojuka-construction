<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class GroupAsset extends Model {
 protected $fillable=['group_entity_id','name','kind','location','reference','status','notes'];
 public function entity(){return $this->belongsTo(GroupEntity::class,'group_entity_id');}
}