<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class GalleryAlbum extends Model
{
    protected $fillable = ['title','slug','description','cover_image','images','is_published','sort_order'];
    protected $casts = ['images'=>'array','is_published'=>'boolean'];
}
