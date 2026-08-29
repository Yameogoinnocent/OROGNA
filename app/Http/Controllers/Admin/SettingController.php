<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SettingRequest;
use App\Models\SiteSetting;
use App\Traits\HandlesImageUploads;

class SettingController extends Controller
{
    use HandlesImageUploads;

    public function edit()
    {
        $settings = SiteSetting::orderBy('key')->get()->keyBy('key');
        return view('admin.content.settings', compact('settings'));
    }

    public function update(SettingRequest $request)
    {
        $request->validated();

        foreach ($request->input('settings', []) as $key => $value) {
            SiteSetting::updateOrCreate(['key' => $key], ['value' => $value, 'type' => 'text']);
            SiteSetting::clearCache($key);
        }

        $imageFields = [
            ['logo', 'logo_upload'],
            ['favicon', 'favicon_upload'],
        ];

        foreach ($imageFields as [$key, $field]) {
            if ($path = $this->storeImage($request, $field, 'brand', SiteSetting::value($key))) {
                SiteSetting::updateOrCreate(['key' => $key], ['value' => $path, 'type' => 'image']);
                SiteSetting::clearCache($key);
            }
        }

        return back()->with('success', 'Paramètres du site enregistrés.');
    }
}
