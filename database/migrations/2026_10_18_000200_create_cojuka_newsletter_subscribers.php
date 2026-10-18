<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration {
 public function up():void {
  if(!Schema::hasTable('cojuka_newsletter_subscribers')){
   Schema::create('cojuka_newsletter_subscribers',function(Blueprint $table){
    $table->id();
    $table->string('email',255)->unique();
    $table->timestamp('consent_at')->nullable();
    $table->timestamp('confirmed_at')->nullable();
    $table->string('confirmation_token_hash',64)->nullable();
    $table->timestamp('confirmation_expires_at')->nullable();
    $table->timestamps();
   });
  }
 }
 public function down():void { /* Existing subscriptions must not be silently discarded. */ }
};