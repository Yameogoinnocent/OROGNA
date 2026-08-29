<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Training extends Model { protected $fillable=['title','slug','excerpt','description','duration','location','price','start_date','end_date','is_published','image']; protected $casts=['start_date'=>'date','end_date'=>'date','is_published'=>'boolean']; }
