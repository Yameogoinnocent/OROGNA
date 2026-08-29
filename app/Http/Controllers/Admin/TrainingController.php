<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\TrainingRequest;
use App\Models\Training;
use App\Traits\HandlesImageUploads;
use Illuminate\Support\Str;

class TrainingController extends Controller
{
    use HandlesImageUploads;

    public function index()
    {
        $items = Training::orderBy('start_date')->get();
        return view('admin.content.trainings', compact('items'));
    }

    public function store(TrainingRequest $request)
    {
        $data = $request->validated();

        $data['image'] = $this->storeImage($request, 'image_upload', 'trainings', $data['image'] ?? null);

        Training::create($data + [
            'slug' => Str::slug($data['title']) . '-' . Str::lower(Str::random(4)),
            'is_published' => $request->boolean('is_published'),
        ]);

        return back()->with('success', 'Formation ajoutée.');
    }

    public function update(TrainingRequest $request, Training $training)
    {
        $data = $request->validated();

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
