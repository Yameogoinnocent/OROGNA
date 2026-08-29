<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Traits\HandlesImageUploads;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ServiceController extends Controller
{
    use HandlesImageUploads;

    public function index()
    {
        $items = Service::orderBy('sort_order')->get();
        return view('admin.content.services', compact('items'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:180',
            'short_description' => 'required|string|max:500',
            'description' => 'nullable|string',
            'image' => 'nullable|string|max:255',
            'image_upload' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:12288',
            'accent' => 'required|in:green,orange',
            'sort_order' => 'required|integer|min:0',
            'is_active' => 'nullable',
        ]);

        $data['image'] = $this->storeImage($request, 'image_upload', 'services', $data['image'] ?? null);

        Service::create([
            'title' => $data['title'],
            'slug' => Str::slug($data['title']) . '-' . Str::lower(Str::random(4)),
            'short_description' => $data['short_description'],
            'description' => $data['description'] ?? null,
            'image' => $data['image'] ?? null,
            'accent' => $data['accent'],
            'sort_order' => $data['sort_order'],
            'is_active' => $request->boolean('is_active'),
        ]);

        return back()->with('success', 'Expertise ajoutée.');
    }

    public function update(Request $request, Service $service)
    {
        $data = $request->validate([
            'title' => 'required|string|max:180',
            'short_description' => 'required|string|max:500',
            'description' => 'nullable|string',
            'image' => 'nullable|string|max:255',
            'image_upload' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:12288',
            'accent' => 'required|in:green,orange',
            'sort_order' => 'required|integer|min:0',
        ]);

        $oldImage = $service->image;
        $data['image'] = $this->storeImage($request, 'image_upload', 'services', $data['image'] ?? $service->image);

        $service->update($data + ['is_active' => $request->boolean('is_active')]);

        if ($request->hasFile('image_upload')) {
            $this->deleteStoredImage($oldImage);
        }

        return back()->with('success', 'Expertise mise à jour.');
    }

    public function destroy(Service $service)
    {
        $service->delete();
        return back()->with('success', 'Expertise supprimée.');
    }
}
