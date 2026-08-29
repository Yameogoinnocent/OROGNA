<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\{Service,Training,Page,SiteSetting,ContactMessage,Application,JobOffer,CandidateMessage,User,GalleryAlbum};
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Mail;
class ContentController extends Controller {
 public function dashboard(){
  $monthStart=now()->startOfMonth();
  return view('admin.dashboard',[
   'totalJobs'=>JobOffer::count(),'publishedJobs'=>JobOffer::where('is_published',true)->count(),
   'applications'=>Application::count(),'newApplications'=>Application::where('status','nouvelle')->count(),
   'messages'=>ContactMessage::where('is_read',false)->count(),'services'=>Service::count(),'trainings'=>Training::count(),
   'totalUsers'=>User::count(),'newUsers'=>User::where('created_at','>=',$monthStart)->count(),
   'recentApplications'=>Application::with('jobOffer')->latest()->take(6)->get(),'recentMessages'=>ContactMessage::latest()->take(5)->get(),
   'statusCounts'=>Application::selectRaw('status, count(*) as total')->groupBy('status')->pluck('total','status'),
   'mediaCount'=>$this->mediaFiles()->count(),'albumCount'=>GalleryAlbum::count(),
  ]);
}
 public function services(){return view('admin.content.services',['items'=>Service::orderBy('sort_order')->get()]);}
 public function serviceStore(Request $r){$d=$r->validate(['title'=>'required|string|max:180','short_description'=>'required|string|max:500','description'=>'nullable|string','image'=>'nullable|string|max:255','image_upload'=>'nullable|image|mimes:jpg,jpeg,png,webp|max:12288','accent'=>'required|in:green,orange','sort_order'=>'required|integer|min:0','is_active'=>'nullable']);$d['image']=$this->storeImage($r,'image_upload','services',$d['image']??null);Service::create(['title'=>$d['title'],'slug'=>Str::slug($d['title']).'-'.Str::lower(Str::random(4)),'short_description'=>$d['short_description'],'description'=>$d['description']??null,'image'=>$d['image']??null,'accent'=>$d['accent'],'sort_order'=>$d['sort_order'],'is_active'=>$r->boolean('is_active')]);return back()->with('success','Expertise ajoutée.');}
 public function serviceUpdate(Request $r,Service $service){$d=$r->validate(['title'=>'required|string|max:180','short_description'=>'required|string|max:500','description'=>'nullable|string','image'=>'nullable|string|max:255','image_upload'=>'nullable|image|mimes:jpg,jpeg,png,webp|max:12288','accent'=>'required|in:green,orange','sort_order'=>'required|integer|min:0']);$oldImage=$service->image; $d['image']=$this->storeImage($r,'image_upload','services',$d['image']??$service->image); $service->update($d+['is_active'=>$r->boolean('is_active')]); if($r->hasFile('image_upload')) $this->deleteStoredImage($oldImage); return back()->with('success','Expertise mise à jour.');}
 public function serviceDelete(Service $service){$service->delete();return back()->with('success','Expertise supprimée.');}
 public function trainings(){return view('admin.content.trainings',['items'=>Training::orderBy('start_date')->get()]);}
 public function trainingStore(Request $r){$d=$r->validate(['title'=>'required|string|max:180','excerpt'=>'required|string|max:500','description'=>'nullable|string','duration'=>'nullable|string|max:80','location'=>'nullable|string|max:120','price'=>'nullable|string|max:80','start_date'=>'nullable|date','end_date'=>'nullable|date','image'=>'nullable|string|max:255','image_upload'=>'nullable|image|mimes:jpg,jpeg,png,webp|max:12288']);$d['image']=$this->storeImage($r,'image_upload','trainings',$d['image']??null);Training::create($d+['slug'=>Str::slug($d['title']).'-'.Str::lower(Str::random(4)),'is_published'=>$r->boolean('is_published')]);return back()->with('success','Formation ajoutée.');}
 public function trainingUpdate(Request $r,Training $training){$d=$r->validate(['title'=>'required|string|max:180','excerpt'=>'required|string|max:500','description'=>'nullable|string','duration'=>'nullable|string|max:80','location'=>'nullable|string|max:120','price'=>'nullable|string|max:80','start_date'=>'nullable|date','end_date'=>'nullable|date','image'=>'nullable|string|max:255','image_upload'=>'nullable|image|mimes:jpg,jpeg,png,webp|max:12288']);$d['image']=$this->storeImage($r,'image_upload','trainings',$d['image']??$training->image);$training->update($d+['is_published'=>$r->boolean('is_published')]);return back()->with('success','Formation mise à jour.');}
 public function trainingDelete(Training $training){$training->delete();return back()->with('success','Formation supprimée.');}
 public function pages(){return view('admin.content.pages',['items'=>Page::orderBy('title')->get()]);}
 public function pageStore(Request $r){$d=$r->validate(['title'=>'required|string|max:180','slug'=>'nullable|string|max:180','excerpt'=>'nullable|string|max:500','content'=>'nullable|string','image'=>'nullable|image|mimes:jpg,jpeg,png,webp|max:12288']);$slug=Str::slug($d['slug']??$d['title']); if(Page::where('slug',$slug)->exists()) $slug.='-'.Str::lower(Str::random(4)); $page=Page::create(['title'=>$d['title'],'slug'=>$slug,'excerpt'=>$d['excerpt']??null,'content'=>$d['content']??null,'image'=>$this->storeImage($r,'image','pages'),'is_published'=>$r->boolean('is_published')]); return back()->with('success','Page créée : '.$page->title);}
 public function pageUpdate(Request $r,Page $page){$d=$r->validate(['title'=>'required|string|max:180','excerpt'=>'nullable|string|max:500','content'=>'nullable|string','image'=>'nullable|image|mimes:jpg,jpeg,png,webp|max:12288']);$page->update(['title'=>$d['title'],'excerpt'=>$d['excerpt']??null,'content'=>$d['content']??null,'is_published'=>$r->boolean('is_published'),'image'=>$this->storeImage($r,'image','pages',$page->image)]);return back()->with('success','Page mise à jour.');}
 public function pageDelete(Page $page){abort_if($page->slug==='a-propos',422,'La page À propos est protégée.');$page->delete();return back()->with('success','Page supprimée.');}
 public function home(){return view('admin.content.home',['settings'=>SiteSetting::whereIn('key',['hero_badge','hero_title','hero_text','hero_cta','hero_secondary','hero_image','hero_video_url','hero_video_title','hero_video_text','hero_video_poster','conviction_kicker','conviction_title','conviction_text','about_title','about_points','about_image','impact_image','impact_title','impact_text','cta_kicker','cta_title','cta_text','cta_image'])->orderBy('key')->get()->keyBy('key')]);}
 public function homeUpdate(Request $r){$data=$r->validate(['settings'=>['array'],'hero_image'=>'nullable|image|mimes:jpg,jpeg,png,webp|max:12288','hero_video_poster_upload'=>'nullable|image|mimes:jpg,jpeg,png,webp|max:12288','about_image_upload'=>'nullable|image|mimes:jpg,jpeg,png,webp|max:12288','impact_image_upload'=>'nullable|image|mimes:jpg,jpeg,png,webp|max:12288','cta_image_upload'=>'nullable|image|mimes:jpg,jpeg,png,webp|max:12288']);foreach($data['settings']??[] as $key=>$value){SiteSetting::updateOrCreate(['key'=>$key],['value'=>$value,'type'=>'text']);} foreach([['hero_image','hero_image','home'],['hero_video_poster','hero_video_poster_upload','home'],['about_image','about_image_upload','home'],['impact_image','impact_image_upload','home'],['cta_image','cta_image_upload','home']] as [$key,$field,$folder]){if($path=$this->storeImage($r,$field,$folder,SiteSetting::value($key))){SiteSetting::updateOrCreate(['key'=>$key],['value'=>$path,'type'=>'image']);}} return back()->with('success','La page d’accueil a été mise à jour.');}
 private function storeImage(Request $r,string $field,string $folder,?string $current=null):?string {if(!$r->hasFile($field)) return $current; $file=$r->file($field); $dir=public_path('uploads/'.$folder); if(!is_dir($dir)) mkdir($dir,0755,true); $name=Str::slug(pathinfo($file->getClientOriginalName(),PATHINFO_FILENAME)).'-'.Str::lower(Str::random(8)).'.'.$file->getClientOriginalExtension(); $file->move($dir,$name); return 'uploads/'.$folder.'/'.$name;}

 private function deleteStoredImage(?string $path):void { if(!$path || !str_starts_with($path,'uploads/')) return; $full=public_path($path); if(is_file($full)) @unlink($full); }
 public function media(){ return view('admin.content.media',['files'=>$this->mediaFiles()]); }
 public function mediaStore(Request $r){ $r->validate(['files'=>'required|array','files.*'=>'image|mimes:jpg,jpeg,png,webp,gif|max:12288']); foreach($r->file('files',[]) as $file){ $dir=public_path('uploads/media'); if(!is_dir($dir)) mkdir($dir,0755,true); $name=Str::slug(pathinfo($file->getClientOriginalName(),PATHINFO_FILENAME)).'-'.Str::lower(Str::random(8)).'.'.$file->getClientOriginalExtension(); $file->move($dir,$name); } return back()->with('success','Image(s) ajoutée(s) à la médiathèque.'); }
 public function mediaDelete(string $file){ $name=basename($file); $path=public_path('uploads/media/'.$name); abort_unless(is_file($path),404); @unlink($path); return back()->with('success','Image supprimée de la médiathèque.'); }
 private function mediaFiles(){ $dir=public_path('uploads/media'); if(!is_dir($dir)) mkdir($dir,0755,true); return collect(glob($dir.'/*'))->filter('is_file')->sortByDesc(fn($p)=>filemtime($p))->values(); }

 public function settings(){return view('admin.content.settings',['settings'=>SiteSetting::orderBy('key')->get()->keyBy('key')]);}
 public function settingsUpdate(Request $r){
  $r->validate(['logo_upload'=>'nullable|image|mimes:jpg,jpeg,png,webp|max:12288','favicon_upload'=>'nullable|image|mimes:jpg,jpeg,png,webp,ico|max:4096']);
  foreach($r->input('settings',[]) as $key=>$value){ SiteSetting::updateOrCreate(['key'=>$key],['value'=>$value,'type'=>'text']); }
  foreach([['logo','logo_upload'],['favicon','favicon_upload']] as [$key,$field]){ if($path=$this->storeImage($r,$field,'brand',SiteSetting::value($key))){ SiteSetting::updateOrCreate(['key'=>$key],['value'=>$path,'type'=>'image']); } }
  return back()->with('success','Paramètres du site enregistrés.');
}
 public function messages(){return view('admin.messages.index',['items'=>ContactMessage::latest()->paginate(15)]);}
 public function messageRead(ContactMessage $message){$message->update(['is_read'=>true]);return back();}
 public function messageReply(Request $r, ContactMessage $message){
  $d=$r->validate(['reply'=>'required|string|max:10000']);
  $subject=$message->subject ? 'Re: '.$message->subject : 'Réponse à votre message — OROGNA Consulting';
  try {
   Mail::raw($d['reply'], function($mail) use ($message,$subject){
    $mail->from(SiteSetting::value('email', config('mail.from.address')), SiteSetting::value('site_name','OROGNA Consulting'))->to($message->email)->subject($subject)->replyTo(SiteSetting::value('email', config('mail.from.address')), SiteSetting::value('site_name','OROGNA Consulting'));
   });
  } catch (\Throwable $e) {
   report($e);
   return back()->with('error','La réponse n’a pas pu être envoyée. Vérifiez la configuration email du site.');
  }
  $message->update(['reply'=>$d['reply'],'replied_at'=>now(),'is_read'=>true]);
  return back()->with('success','Réponse envoyée à '.$message->email.'.');
 }

 public function candidateChats(){
  $candidates=User::where('role','candidat')->whereHas('candidateMessages')->withCount(['candidateMessages as unread_chat_count'=>function($q){$q->where('sender_type','candidate')->whereNull('read_at');}])->orderByDesc('unread_chat_count')->orderBy('name')->get();
  $selected=request('candidate');
  $candidate=$selected?User::where('role','candidat')->findOrFail($selected):$candidates->first();
  $messages=$candidate? $candidate->candidateMessages()->with('admin')->oldest()->get():collect();
  if($candidate){ CandidateMessage::where('candidate_id',$candidate->id)->where('sender_type','candidate')->whereNull('read_at')->update(['read_at'=>now()]); }
  return view('admin.chats.index',compact('candidates','candidate','messages'));
 }
 public function candidateChatReply(Request $r, User $candidate){
  abort_unless($candidate->isCandidate(),404);
  $d=$r->validate(['body'=>'required|string|max:5000']);
  CandidateMessage::create(['candidate_id'=>$candidate->id,'admin_id'=>$r->user()->id,'sender_type'=>'admin','body'=>$d['body']]);
  return redirect()->route('admin.chats',['candidate'=>$candidate->id])->with('success','Réponse envoyée au candidat.');
 }

 public function users(){
  $users=User::orderByDesc('created_at')->paginate(20);
  return view('admin.users.index',compact('users'));
 }
 public function userToggle(User $user){
  abort_if($user->id===request()->user()->id,422,'Vous ne pouvez pas désactiver votre propre compte.');
  $user->update(['is_active'=>!$user->is_active]);
  return back()->with('success',($user->is_active?'Compte réactivé : ':'Compte désactivé : ').$user->name);
 }

 public function applications(){
  $q=request('q'); $status=request('status');
  $items=Application::with('jobOffer')->when($q,function($query)use($q){$query->where(function($w)use($q){$w->where('candidate_name','like','%'.$q.'%')->orWhere('candidate_email','like','%'.$q.'%')->orWhere('phone','like','%'.$q.'%');});})->when($status,function($query)use($status){$query->where('status',$status);})->latest()->paginate(15)->withQueryString();
  return view('admin.applications.index',compact('items','q','status'));
}
 public function applicationStatus(Request $r,Application $application){$d=$r->validate(['status'=>'required|in:nouvelle,en_etude,entretien,retenue,rejetee','admin_notes'=>'nullable|string|max:10000']);$application->update($d);return back()->with('success','Dossier candidat mis à jour.');}
 public function download(Application $application,string $type){$path=$type==='cv'?$application->cv_path:$application->cover_letter_path;abort_unless($path && Storage::disk('local')->exists($path),404);return Storage::disk('local')->download($path);}
}
