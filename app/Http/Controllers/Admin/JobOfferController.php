<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JobOffer;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class JobOfferController extends Controller
{
    public function index()
    {
        $offers = JobOffer::latest()->paginate(10);

        return view('admin.jobs.index', compact('offers'));
    }

    public function create()
    {
        return view('admin.jobs.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'sector' => ['nullable', 'string', 'max:255'],
            'location' => ['required', 'string', 'max:255'],
            'contract_type' => ['nullable', 'string', 'max:255'],
            'short_description' => ['nullable', 'string'],
            'description' => ['required', 'string'],
            'profile' => ['nullable', 'string'],
            'requirements' => ['nullable', 'string'],
            'published_at' => ['nullable', 'date'],
            'deadline' => ['nullable', 'date'],
            'is_published' => ['nullable', 'boolean'],
        ]);

        $validated['reference'] = 'ORO-' . strtoupper(Str::random(6));
        $validated['is_published'] = $request->boolean('is_published');

        if ($validated['is_published'] && empty($validated['published_at'])) {
            $validated['published_at'] = now()->toDateString();
        }

        JobOffer::create($validated);

        return redirect()
            ->route('admin.jobs.index')
            ->with('success', 'L’offre a été créée avec succès.');
    }

    public function show(JobOffer $job)
    {
        return view('admin.jobs.show', compact('job'));
    }

    public function edit(JobOffer $job)
    {
        return view('admin.jobs.edit', compact('job'));
    }

    public function update(Request $request, JobOffer $job)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'sector' => ['nullable', 'string', 'max:255'],
            'location' => ['required', 'string', 'max:255'],
            'contract_type' => ['nullable', 'string', 'max:255'],
            'short_description' => ['nullable', 'string'],
            'description' => ['required', 'string'],
            'profile' => ['nullable', 'string'],
            'requirements' => ['nullable', 'string'],
            'published_at' => ['nullable', 'date'],
            'deadline' => ['nullable', 'date'],
            'is_published' => ['nullable', 'boolean'],
        ]);

        $validated['is_published'] = $request->boolean('is_published');

        if ($validated['is_published'] && empty($validated['published_at'])) {
            $validated['published_at'] = now()->toDateString();
        }

        $job->update($validated);

        return redirect()
            ->route('admin.jobs.index')
            ->with('success', 'L’offre a été modifiée avec succès.');
    }

    public function destroy(JobOffer $job)
    {
        $job->delete();

        return redirect()
            ->route('admin.jobs.index')
            ->with('success', 'L’offre a été supprimée.');
    }
}