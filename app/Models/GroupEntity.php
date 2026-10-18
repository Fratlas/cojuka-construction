<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class GroupEntity extends Model {
 protected $fillable=['name','slug','type','country','sector','summary','description','website','rccm','id_nat','nif','numero_impot','cnss','adresse_siege','telephone','email_contact','representant_legal','date_immatriculation','published'];
 protected $casts=['published'=>'boolean','date_immatriculation'=>'date'];
 public function projects(){return $this->hasMany(GroupProject::class);}
 public function assets(){return $this->hasMany(GroupAsset::class);}
}