<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration {
 public function up():void { Schema::create('applications',function(Blueprint $table){$table->id();$table->foreignId('job_offer_id')->nullable()->constrained('job_offers')->cascadeOnDelete();$table->foreignId('user_id')->nullable()->constrained('users')->nullOnDelete();$table->string('candidate_name');$table->string('candidate_email');$table->string('phone')->nullable();$table->string('city')->nullable();$table->string('cv_path')->nullable();$table->string('cover_letter_path')->nullable();$table->longText('message')->nullable();$table->string('status')->default('nouvelle');$table->longText('admin_notes')->nullable();$table->timestamp('submitted_at')->nullable();$table->timestamps();}); }
 public function down():void{Schema::dropIfExists('applications');}
};
