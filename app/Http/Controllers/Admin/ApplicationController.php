<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ApplicationController extends Controller
{
    public function index()
    {
        $q = request('q');
        $status = request('status');

        $items = Application::with('jobOffer')
            ->when($q, function ($query) use ($q) {
                $query->where(function ($w) use ($q) {
                    $w->where('candidate_name', 'like', '%' . $q . '%')
                        ->orWhere('candidate_email', 'like', '%' . $q . '%')
                        ->orWhere('phone', 'like', '%' . $q . '%');
                });
            })
            ->when($status, function ($query) use ($status) {
                $query->where('status', $status);
            })
            ->latest()
            ->paginate(15)
            ->withQueryString();

        return view('admin.applications.index', compact('items', 'q', 'status'));
    }

    public function updateStatus(Request $request, Application $application)
    {
        $data = $request->validate([
            'status' => 'required|in:nouvelle,en_etude,entretien,retenue,rejetee',
            'admin_notes' => 'nullable|string|max:10000',
        ]);

        $application->update($data);

        return back()->with('success', 'Dossier candidat mis à jour.');
    }

    public function download(Application $application, string $type)
    {
        $path = $type === 'cv' ? $application->cv_path : $application->cover_letter_path;

        abort_unless($path && Storage::disk('local')->exists($path), 404);

        return Storage::disk('local')->download($path);
    }
}
