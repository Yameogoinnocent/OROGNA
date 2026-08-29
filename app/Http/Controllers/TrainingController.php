<?php
namespace App\Http\Controllers;
use App\Models\Training;
class TrainingController extends Controller { public function index(){ $trainings=Training::where('is_published',true)->orderBy('start_date')->paginate(9); return view('pages.trainings',compact('trainings')); } public function show(Training $training){abort_unless($training->is_published,404);return view('pages.training-detail',compact('training'));} }
