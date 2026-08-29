<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
return new class extends Migration {
 public function up(): void { DB::table('users')->where('role','candidate')->update(['role'=>'candidat']); }
 public function down(): void { DB::table('users')->where('role','candidat')->update(['role'=>'candidate']); }
};
