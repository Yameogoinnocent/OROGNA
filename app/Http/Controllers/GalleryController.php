<?php
namespace App\Http\Controllers;
use App\Models\GalleryAlbum;
class GalleryController extends Controller{
 public function index(){ $albums=GalleryAlbum::where('is_published',true)->orderBy('sort_order')->latest()->get(); return view('gallery.index',compact('albums')); }
 public function show(GalleryAlbum $album){ abort_unless($album->is_published,404); return view('gallery.show',compact('album')); }
}
