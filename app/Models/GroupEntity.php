<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class GroupEntity extends Model {
 protected $fillable=['name','slug','type','country','sector','summary','description','website','published'];
 protected $casts=['published'=>'boolean'];
 public function projects(){return $this->hasMany(GroupProject::class);}
 public function assets(){return $this->hasMany(GroupAsset::class);}
}