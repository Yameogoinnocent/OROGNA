<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration {
 public function up():void{if(!Schema::hasColumn('pages','image')) Schema::table('pages',fn(Blueprint $t)=>$t->string('image')->nullable()->after('content'));}
 public function down():void{if(Schema::hasColumn('pages','image')) Schema::table('pages',fn(Blueprint $t)=>$t->dropColumn('image'));}
};
