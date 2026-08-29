<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SiteSetting;
use App\Traits\HandlesImageUploads;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    use HandlesImageUploads;

    public function edit()
    {
        $settings = SiteSetting::orderBy('key')->get()->keyBy('key');
        return view('admin.content.settings', compact('settings'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'logo_upload' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:12288',
            'favicon_upload' => 'nullable|image|mimes:jpg,jpeg,png,webp,ico|max:4096',
        ]);

        foreach ($request->input('settings', []) as $key => $value) {
            SiteSetting::updateOrCreate(['key' => $key], ['value' => $value, 'type' => 'text']);
        }

        $imageFields = [
            ['logo', 'logo_upload'],
            ['favicon', 'favicon_upload'],
        ];

        foreach ($imageFields as [$key, $field]) {
            if ($path = $this->storeImage($request, $field, 'brand', SiteSetting::value($key))) {
                SiteSetting::updateOrCreate(['key' => $key], ['value' => $path, 'type' => 'image']);
            }
        }

        return back()->with('success', 'Paramètres du site enregistrés.');
    }
}
