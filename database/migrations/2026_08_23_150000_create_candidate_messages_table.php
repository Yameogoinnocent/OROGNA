<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration {
 public function up(): void {
  Schema::create('candidate_messages', function(Blueprint $table){
   $table->id();
   $table->foreignId('candidate_id')->constrained('users')->cascadeOnDelete();
   $table->foreignId('admin_id')->nullable()->constrained('users')->nullOnDelete();
   $table->enum('sender_type',['candidate','admin']);
   $table->longText('body');
   $table->timestamp('read_at')->nullable();
   $table->timestamps();
   $table->index(['candidate_id','created_at']);
  });
 }
 public function down(): void { Schema::dropIfExists('candidate_messages'); }
};
