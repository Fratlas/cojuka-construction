<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration {
 public function up(): void {
  if(!Schema::hasTable('group_entities')) Schema::create('group_entities',function(Blueprint $t){$t->id();$t->string('name');$t->string('slug')->unique();$t->string('type')->default('filiale');$t->string('country')->nullable();$t->string('sector')->nullable();$t->text('summary')->nullable();$t->text('description')->nullable();$t->string('website')->nullable();$t->boolean('published')->default(false);$t->timestamps();});
  if(!Schema::hasTable('group_projects')) Schema::create('group_projects',function(Blueprint $t){$t->id();$t->foreignId('group_entity_id')->constrained('group_entities')->cascadeOnDelete();$t->string('title');$t->string('category')->nullable();$t->string('location')->nullable();$t->string('status')->default('planifie');$t->date('start_date')->nullable();$t->date('end_date')->nullable();$t->decimal('budget',16,2)->nullable();$t->string('currency',3)->default('USD');$t->text('description')->nullable();$t->boolean('published')->default(false);$t->timestamps();});
  if(!Schema::hasTable('group_assets')) Schema::create('group_assets',function(Blueprint $t){$t->id();$t->foreignId('group_entity_id')->constrained('group_entities')->cascadeOnDelete();$t->string('name');$t->string('kind');$t->string('location')->nullable();$t->string('reference')->nullable();$t->string('status')->default('en_etude');$t->text('notes')->nullable();$t->timestamps();});
 }
 public function down(): void { /* No automatic drop: tables may predate this migration via phpMyAdmin. */ }
};