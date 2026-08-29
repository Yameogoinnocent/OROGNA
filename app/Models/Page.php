<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Page extends Model { protected $fillable=['title','slug','excerpt','content','image','is_published']; protected $casts=['is_published'=>'boolean']; }
