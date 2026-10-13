<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class GroupSuiteRecord extends Model {
 protected $table='group_suite_records';
 protected $fillable=['group_entity_id','module','title','reference','status','record_date','amount','currency','location','description','details','created_by','updated_by'];
 protected $casts=['details'=>'array','record_date'=>'date','amount'=>'decimal:2'];
 public function entity(){return $this->belongsTo(GroupEntity::class,'group_entity_id');}
}