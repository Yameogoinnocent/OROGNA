<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration {
 public function up():void{Schema::create('gallery_albums',function(Blueprint $t){$t->id();$t->string('title');$t->string('slug')->unique();$t->text('description')->nullable();$t->string('cover_image')->nullable();$t->json('images')->nullable();$t->boolean('is_published')->default(true);$t->unsignedInteger('sort_order')->default(0);$t->timestamps();});}
 public function down():void{Schema::dropIfExists('gallery_albums');}
};
