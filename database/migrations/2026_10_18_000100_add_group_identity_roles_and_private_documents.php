<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
 public function up():void {
  if(Schema::hasTable('users') && !Schema::hasColumn('users','group_role')){
   Schema::table('users',function(Blueprint $t){$t->string('group_role',24)->default('responsable')->index();});
  }
  if(Schema::hasTable('group_entities')){
   $fields=[
    'rccm','id_nat','nif','numero_impot','cnss','adresse_siege',
    'telephone','email_contact','representant_legal'
   ];
   foreach($fields as $field){
    if(!Schema::hasColumn('group_entities',$field)){
     Schema::table('group_entities',function(Blueprint $t)use($field){$t->string($field,255)->nullable();});
    }
   }
   if(!Schema::hasColumn('group_entities','date_immatriculation')){
    Schema::table('group_entities',function(Blueprint $t){$t->date('date_immatriculation')->nullable();});
   }
  }
  if(!Schema::hasTable('group_documents')){
   Schema::create('group_documents',function(Blueprint $t){
    $t->id();
    $t->string('owner_type',12); // entity or rh
    $t->unsignedBigInteger('owner_id');
    $t->unsignedBigInteger('group_entity_id');
    $t->string('category',55);
    $t->string('label',180)->nullable();
    $t->string('original_name',255);
    $t->string('storage_path',255);
    $t->string('mime_type',100);
    $t->unsignedBigInteger('size_bytes');
    $t->date('issued_on')->nullable();
    $t->date('expires_on')->nullable();
    $t->unsignedBigInteger('uploaded_by')->nullable();
    $t->timestamps();
    $t->index(['owner_type','owner_id']);
    $t->index('group_entity_id');
   });
  }
 }
 public function down():void {
  // Intentionally non-destructive: never delete production personnel records/files.
 }
};