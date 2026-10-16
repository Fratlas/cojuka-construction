<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration {
 public function up():void{
  if(!Schema::hasTable('group_departments'))Schema::create('group_departments',function(Blueprint $t){$t->id();$t->string('code',50)->unique();$t->string('name',150);$t->boolean('active')->default(true);$t->timestamps();});
  if(!Schema::hasColumn('users','group_department_id'))Schema::table('users',function(Blueprint $t){$t->unsignedBigInteger('group_department_id')->nullable()->index();});
  if(!Schema::hasTable('group_department_permissions'))Schema::create('group_department_permissions',function(Blueprint $t){$t->id();$t->unsignedBigInteger('department_id');$t->string('module',40);foreach(['view','create','update','delete','export'] as $action)$t->boolean('can_'.$action)->default(false);$t->timestamps();$t->unique(['department_id','module'],'dept_module_unique');$t->foreign('department_id')->references('id')->on('group_departments')->cascadeOnDelete();});
  if(!Schema::hasTable('group_user_entity_access'))Schema::create('group_user_entity_access',function(Blueprint $t){$t->id();$t->unsignedBigInteger('user_id');$t->unsignedBigInteger('group_entity_id');$t->timestamps();$t->unique(['user_id','group_entity_id'],'user_entity_unique');$t->foreign('user_id')->references('id')->on('users')->cascadeOnDelete();$t->foreign('group_entity_id')->references('id')->on('group_entities')->cascadeOnDelete();});
 }
 public function down():void{/* No destructive rollback on a production management database. */}
};