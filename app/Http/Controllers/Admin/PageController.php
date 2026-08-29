<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PageRequest;
use App\Models\Page;
use App\Traits\HandlesImageUploads;
use Illuminate\Support\Str;

class PageController extends Controller
{
    use HandlesImageUploads;

    public function index()
    {
        $items = Page::orderBy('title')->get();
        return view('admin.content.pages', compact('items'));
    }

    public function store(PageRequest $request)
    {
        $data = $request->validated();

        $slug = Str::slug($data['slug'] ?? $data['title']);
        if (Page::where('slug', $slug)->exists()) {
            $slug .= '-' . Str::lower(Str::random(4));
        }

        $page = Page::create([
            'title' => $data['title'],
            'slug' => $slug,
            'excerpt' => $data['excerpt'] ?? null,
            'content' => $data['content'] ?? null,
            'image' => $this->storeImage($request, 'image', 'pages'),
            'is_published' => $request->boolean('is_published'),
        ]);

        return back()->with('success', 'Page créée : ' . $page->title);
    }

    public function update(PageRequest $request, Page $page)
    {
        $data = $request->validated();

        $page->update([
            'title' => $data['title'],
            'excerpt' => $data['excerpt'] ?? null,
            'content' => $data['content'] ?? null,
            'is_published' => $request->boolean('is_published'),
            'image' => $this->storeImage($request, 'image', 'pages', $page->image),
        ]);

        return back()->with('success', 'Page mise à jour.');
    }

    public function destroy(Page $page)
    {
        abort_if($page->slug === 'a-propos', 422, 'La page À propos est protégée.');

        $page->delete();

        return back()->with('success', 'Page supprimée.');
    }
}
