<?php
namespace App\Http\Controllers;
use App\Models\ContactMessage;
use Illuminate\Http\Request;
class ContactController extends Controller { public function create(){return view('pages.contact');} public function store(Request $request){$data=$request->validate(['name'=>'required|string|max:120','email'=>'required|email|max:160','phone'=>'nullable|string|max:40','subject'=>'nullable|string|max:180','message'=>'required|string|max:5000']);ContactMessage::create($data);return back()->with('success','Votre message a bien été envoyé. Notre équipe vous répondra rapidement.');} }
