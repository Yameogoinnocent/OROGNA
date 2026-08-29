<?php
namespace App\Http\Controllers;
use App\Models\{Service,JobOffer,Training,Page};
class HomeController extends Controller {
 public function index(){return view('home',['services'=>Service::where('is_active',true)->orderBy('sort_order')->get(),'jobs'=>JobOffer::where('is_published',true)->latest('published_at')->take(3)->get(),'trainings'=>Training::where('is_published',true)->orderBy('start_date')->take(3)->get(),'about'=>Page::where('slug','a-propos')->where('is_published',true)->first()]);}
 public function about(){ $page=Page::where('slug','a-propos')->where('is_published',true)->firstOrFail(); return view('pages.about',compact('page')); }
 public function page(string $slug){ $page=Page::where('slug',$slug)->where('is_published',true)->firstOrFail(); return view('pages.page',compact('page')); }
}
