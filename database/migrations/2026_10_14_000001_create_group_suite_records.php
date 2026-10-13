<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration {
 public function up():void {
  Schema::create('group_suite_records',function(Blueprint $t){
   $t->id();$t->foreignId('group_entity_id')->nullable()->constrained('group_entities')->nullOnDelete();
   $t->string('module',40)->index();$t->string('title');$t->string('reference')->nullable();
   $t->string('status',40)->default('brouillon');$t->date('record_date')->nullable();
   $t->decimal('amount',18,2)->nullable();$t->char('currency',3)->default('USD');
   $t->string('location')->nullable();$t->text('description')->nullable();
   $t->json('details')->nullable();$t->foreignId('created_by')->nullable()->constrained('users')->nullOnDelete();
   $t->foreignId('updated_by')->nullable()->constrained('users')->nullOnDelete();$t->timestamps();
   $t->index(['module','group_entity_id','status']);
  });
  Schema::create('group_suite_audit',function(Blueprint $t){
   $t->id();$t->foreignId('user_id')->nullable()->constrained('users')->nullOnDelete();
   $t->string('action',30);$t->string('module',40);$t->unsignedBigInteger('record_id');
   $t->json('before')->nullable();$t->json('after')->nullable();$t->timestamp('created_at')->useCurrent();
  });
 }
 public function down():void {Schema::dropIfExists('group_suite_audit');Schema::dropIfExists('group_suite_records');}
};