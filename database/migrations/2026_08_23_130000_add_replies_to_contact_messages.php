<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration {
 public function up(): void {
  Schema::table('contact_messages', function(Blueprint $t){
   $t->longText('reply')->nullable()->after('message');
   $t->timestamp('replied_at')->nullable()->after('reply');
  });
 }
 public function down(): void {
  Schema::table('contact_messages', function(Blueprint $t){$t->dropColumn(['reply','replied_at']);});
 }
};
