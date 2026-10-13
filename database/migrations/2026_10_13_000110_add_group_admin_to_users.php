<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration {
 public function up():void {if(Schema::hasTable('users') && !Schema::hasColumn('users','is_group_admin')) Schema::table('users',fn(Blueprint $t)=>$t->boolean('is_group_admin')->default(false));}
 public function down():void {/* Preserve existing permissions column in shared databases. */}
};