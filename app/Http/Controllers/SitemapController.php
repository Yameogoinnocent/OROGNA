<?php

namespace App\Http\Controllers;

use App\Models\GalleryAlbum;
use App\Models\JobOffer;
use App\Models\Page;
use App\Models\Training;
use Illuminate\Http\Response;

class SitemapController extends Controller
{
    public function index(): Response
    {
        $staticUrls = [
            route('home'),
            route('about'),
            route('services'),
            route('jobs'),
            route('trainings.index'),
            route('gallery.index'),
            route('contact'),
            route('apply'),
        ];

        $pages = Page::where('is_published', true)->get();
        $jobs = JobOffer::where('is_published', true)->get();
        $trainings = Training::where('is_published', true)->get();
        $albums = GalleryAlbum::where('is_published', true)->get();

        $content = view('sitemap', compact('staticUrls', 'pages', 'jobs', 'trainings', 'albums'))->render();

        return response($content, 200, [
            'Content-Type' => 'application/xml',
        ]);
    }
}
