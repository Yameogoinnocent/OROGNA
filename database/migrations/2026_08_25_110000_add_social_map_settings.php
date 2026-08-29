<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
return new class extends Migration {
 public function up(): void {
  $defaults=['whatsapp'=>'70200070','facebook_url'=>'https://www.facebook.com/search/top?q=OROGNA%20Consulting','map_query'=>'OROGNA Consulting, Ouagadougou, Burkina Faso'];
  foreach($defaults as $key=>$value){if(!DB::table('site_settings')->where('key',$key)->exists()) DB::table('site_settings')->insert(['key'=>$key,'value'=>$value,'type'=>'text','created_at'=>now(),'updated_at'=>now()]);}
 }
 public function down(): void {DB::table('site_settings')->whereIn('key',['whatsapp','facebook_url','map_query'])->delete();}
};
