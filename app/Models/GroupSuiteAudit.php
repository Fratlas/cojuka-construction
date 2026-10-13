<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class GroupSuiteAudit extends Model {
 public $timestamps=false;
 protected $table='group_suite_audit';
 protected $fillable=['user_id','action','module','record_id','before','after'];
 protected $casts=['before'=>'array','after'=>'array'];
}