<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class GroupProject extends Model {
 protected $fillable=['group_entity_id','title','category','location','status','start_date','end_date','budget','currency','description','published'];
 protected $casts=['published'=>'boolean','start_date'=>'date','end_date'=>'date'];
 public function entity(){return $this->belongsTo(GroupEntity::class,'group_entity_id');}
}