<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JobOffer;

class DashboardController extends Controller
{
    public function index()
    {
        $totalJobs = JobOffer::count();

        $publishedJobs = JobOffer::where('is_published', true)->count();

        $draftJobs = JobOffer::where('is_published', false)->count();

        $recentJobs = JobOffer::latest()
            ->take(5)
            ->get();

        return view('admin.dashboard', compact(
            'totalJobs',
            'publishedJobs',
            'draftJobs',
            'recentJobs'
        ));
    }
}