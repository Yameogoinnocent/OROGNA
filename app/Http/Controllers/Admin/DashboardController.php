<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\ContactMessage;
use App\Models\GalleryAlbum;
use App\Models\JobOffer;
use App\Models\Service;
use App\Models\Training;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $monthStart = now()->startOfMonth();

        $mediaDir = public_path('uploads/media');
        $mediaCount = is_dir($mediaDir) ? count(glob($mediaDir . '/*')) : 0;

        return view('admin.dashboard', [
            'totalJobs' => JobOffer::count(),
            'publishedJobs' => JobOffer::where('is_published', true)->count(),
            'applications' => Application::count(),
            'newApplications' => Application::where('status', 'nouvelle')->count(),
            'messages' => ContactMessage::where('is_read', false)->count(),
            'services' => Service::count(),
            'trainings' => Training::count(),
            'totalUsers' => User::count(),
            'newUsers' => User::where('created_at', '>=', $monthStart)->count(),
            'recentApplications' => Application::with('jobOffer')->latest()->take(6)->get(),
            'recentMessages' => ContactMessage::latest()->take(5)->get(),
            'statusCounts' => Application::selectRaw('status, count(*) as total')->groupBy('status')->pluck('total', 'status'),
            'mediaCount' => $mediaCount,
            'albumCount' => GalleryAlbum::count(),
        ]);
    }
}
