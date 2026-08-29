<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class MediaController extends Controller
{
    public function index()
    {
        return view('admin.content.media', ['files' => $this->mediaFiles()]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'files' => 'required|array',
            'files.*' => 'image|mimes:jpg,jpeg,png,webp,gif|max:12288',
        ]);

        foreach ($request->file('files', []) as $file) {
            $dir = public_path('uploads/media');
            if (!is_dir($dir)) {
                mkdir($dir, 0755, true);
            }
            $name = Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME))
                . '-' . Str::lower(Str::random(8))
                . '.' . $file->getClientOriginalExtension();
            $file->move($dir, $name);
        }

        return back()->with('success', 'Image(s) ajoutée(s) à la médiathèque.');
    }

    public function destroy(string $file)
    {
        $name = basename($file);
        $path = public_path('uploads/media/' . $name);

        abort_unless(is_file($path), 404);

        @unlink($path);

        return back()->with('success', 'Image supprimée de la médiathèque.');
    }

    private function mediaFiles()
    {
        $dir = public_path('uploads/media');
        if (!is_dir($dir)) {
            mkdir($dir, 0755, true);
        }

        return collect(glob($dir . '/*'))
            ->filter('is_file')
            ->sortByDesc(fn($p) => filemtime($p))
            ->values();
    }
}
