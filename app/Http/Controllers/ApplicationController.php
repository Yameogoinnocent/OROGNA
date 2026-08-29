<?php
namespace App\Http\Controllers;
use App\Models\{Application,JobOffer};
use Illuminate\Http\Request;
class ApplicationController extends Controller {
 public function create(?JobOffer $jobOffer=null){$jobs=JobOffer::where('is_published',true)->where(function($q){$q->whereNull('deadline')->orWhereDate('deadline','>=',now());})->latest('published_at')->get();return view('pages.apply',compact('jobs','jobOffer'));}
 public function store(Request $request){$data=$request->validate(['job_offer_id'=>'nullable|exists:job_offers,id','name'=>'required|string|max:120','email'=>'required|email|max:160','phone'=>'required|string|max:40','city'=>'nullable|string|max:100','message'=>'nullable|string|max:5000','cv'=>'required|file|mimes:pdf,doc,docx|max:10240','cover_letter'=>'nullable|file|mimes:pdf,doc,docx|max:10240']);$cv=$request->file('cv')->store('applications/cv','local');$letter=$request->file('cover_letter')?->store('applications/letters','local');Application::create(['job_offer_id'=>$data['job_offer_id']??null,'user_id'=>$request->user()?->id,'candidate_name'=>$data['name'],'candidate_email'=>$data['email'],'phone'=>$data['phone'],'city'=>$data['city']??null,'cv_path'=>$cv,'cover_letter_path'=>$letter,'message'=>$data['message']??null,'status'=>'nouvelle','submitted_at'=>now()]);return redirect()->route('apply')->with('success','Candidature envoyée avec succès. Merci pour votre confiance.');}
}
