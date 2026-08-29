<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration {
 public function up():void {
  Schema::create('services',function(Blueprint $t){$t->id();$t->string('title');$t->string('slug')->unique();$t->text('short_description')->nullable();$t->longText('description')->nullable();$t->string('icon')->nullable();$t->string('image')->nullable();$t->string('accent')->default('green');$t->unsignedInteger('sort_order')->default(0);$t->boolean('is_active')->default(true);$t->timestamps();});
  Schema::create('trainings',function(Blueprint $t){$t->id();$t->string('title');$t->string('slug')->unique();$t->text('excerpt')->nullable();$t->longText('description')->nullable();$t->string('duration')->nullable();$t->string('location')->nullable();$t->string('price')->nullable();$t->date('start_date')->nullable();$t->date('end_date')->nullable();$t->boolean('is_published')->default(true);$t->string('image')->nullable();$t->timestamps();});
  Schema::create('pages',function(Blueprint $t){$t->id();$t->string('title');$t->string('slug')->unique();$t->text('excerpt')->nullable();$t->longText('content')->nullable();$t->boolean('is_published')->default(true);$t->timestamps();});
  Schema::create('site_settings',function(Blueprint $t){$t->id();$t->string('key')->unique();$t->text('value')->nullable();$t->string('type')->default('text');$t->timestamps();});
  Schema::create('contact_messages',function(Blueprint $t){$t->id();$t->string('name');$t->string('email');$t->string('phone')->nullable();$t->string('subject')->nullable();$t->longText('message');$t->boolean('is_read')->default(false);$t->timestamps();});
 }
 public function down():void{Schema::dropIfExists('contact_messages');Schema::dropIfExists('site_settings');Schema::dropIfExists('pages');Schema::dropIfExists('trainings');Schema::dropIfExists('services');}
};
