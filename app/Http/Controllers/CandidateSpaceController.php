<?php
namespace App\Http\Controllers;
use App\Models\{Application,CandidateMessage,User};
use Illuminate\Http\Request;
class CandidateSpaceController extends Controller {
 public function dashboard(Request $request){
  $user=$request->user();
  $applications=$user->applications()->with('jobOffer')->latest()->get();
  $messages=$user->candidateMessages()->latest()->get();
  $unread=$messages->where('sender_type','admin')->whereNull('read_at')->count();
  if($unread){ $user->candidateMessages()->where('sender_type','admin')->whereNull('read_at')->update(['read_at'=>now()]); }
  return view('candidate.dashboard',compact('applications','messages','unread'));
 }
 public function sendMessage(Request $request){
  $data=$request->validate(['body'=>'required|string|max:5000']);
  $admin=User::whereIn('role',['admin','recruteur'])->orderByRaw("CASE WHEN role='admin' THEN 0 ELSE 1 END")->first();
  abort_unless($admin,503,'Aucun administrateur disponible.');
  CandidateMessage::create(['candidate_id'=>$request->user()->id,'admin_id'=>$admin->id,'sender_type'=>'candidate','body'=>$data['body']]);
  return back()->with('success','Votre message a bien été envoyé à l’équipe OROGNA.');
 }
}
