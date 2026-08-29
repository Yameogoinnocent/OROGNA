<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SiteSetting;
use App\Traits\HandlesImageUploads;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    use HandlesImageUploads;

    public function edit()
    {
        $settings = SiteSetting::whereIn('key', [
            'hero_badge', 'hero_title', 'hero_text', 'hero_cta', 'hero_secondary',
            'hero_image', 'hero_video_url', 'hero_video_title', 'hero_video_text',
            'hero_video_poster', 'conviction_kicker', 'conviction_title', 'conviction_text',
            'about_title', 'about_points', 'about_image', 'impact_image', 'impact_title',
            'impact_text', 'cta_kicker', 'cta_title', 'cta_text', 'cta_image',
        ])->orderBy('key')->get()->keyBy('key');

        return view('admin.content.home', compact('settings'));
    }

    public function update(Request $request)
    {
        $data = $request->validate([
            'settings' => ['array'],
            'hero_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:12288',
            'hero_video_poster_upload' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:12288',
            'about_image_upload' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:12288',
            'impact_image_upload' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:12288',
            'cta_image_upload' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:12288',
        ]);

        foreach ($data['settings'] ?? [] as $key => $value) {
            SiteSetting::updateOrCreate(['key' => $key], ['value' => $value, 'type' => 'text']);
        }

        $imageFields = [
            ['hero_image', 'hero_image', 'home'],
            ['hero_video_poster', 'hero_video_poster_upload', 'home'],
            ['about_image', 'about_image_upload', 'home'],
            ['impact_image', 'impact_image_upload', 'home'],
            ['cta_image', 'cta_image_upload', 'home'],
        ];

        foreach ($imageFields as [$key, $field, $folder]) {
            if ($path = $this->storeImage($request, $field, $folder, SiteSetting::value($key))) {
                SiteSetting::updateOrCreate(['key' => $key], ['value' => $path, 'type' => 'image']);
            }
        }

        return back()->with('success', 'La page d’accueil a été mise à jour.');
    }
}
