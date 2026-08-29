<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Training;
use App\Traits\HandlesImageUploads;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TrainingController extends Controller
{
    use HandlesImageUploads;

    public function index()
    {
        $items = Training::orderBy('start_date')->get();
        return view('admin.content.trainings', compact('items'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:180',
            'excerpt' => 'required|string|max:500',
            'description' => 'nullable|string',
            'duration' => 'nullable|string|max:80',
            'location' => 'nullable|string|max:120',
            'price' => 'nullable|string|max:80',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date',
            'image' => 'nullable|string|max:255',
            'image_upload' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:12288',
        ]);

        $data['image'] = $this->storeImage($request, 'image_upload', 'trainings', $data['image'] ?? null);

        Training::create($data + [
            'slug' => Str::slug($data['title']) . '-' . Str::lower(Str::random(4)),
            'is_published' => $request->boolean('is_published'),
        ]);

        return back()->with('success', 'Formation ajoutée.');
    }

    public function update(Request $request, Training $training)
    {
        $data = $request->validate([
            'title' => 'required|string|max:180',
            'excerpt' => 'required|string|max:500',
            'description' => 'nullable|string',
            'duration' => 'nullable|string|max:80',
            'location' => 'nullable|string|max:120',
            'price' => 'nullable|string|max:80',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date',
            'image' => 'nullable|string|max:255',
            'image_upload' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:12288',
        ]);

        $data['image'] = $this->storeImage($request, 'image_upload', 'trainings', $data['image'] ?? $training->image);

        $training->update($data + ['is_published' => $request->boolean('is_published')]);

        return back()->with('success', 'Formation mise à jour.');
    }

    public function destroy(Training $training)
    {
        $training->delete();
        return back()->with('success', 'Formation supprimée.');
    }
}
