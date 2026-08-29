<?php

namespace App\Http\Controllers;

use App\Models\CandidateProfile;
use Illuminate\Http\Request;

class CandidateProfileController extends Controller
{
    public function edit(Request $request)
    {
        $profile = $request->user()->candidateProfile;

        return view('candidate.profile', compact('profile'));
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'phone' => ['nullable', 'string', 'max:30'],
            'city' => ['nullable', 'string', 'max:100'],
            'address' => ['nullable', 'string', 'max:255'],
            'profession' => ['nullable', 'string', 'max:150'],
            'birth_date' => ['nullable', 'date'],
            'bio' => ['nullable', 'string', 'max:2000'],
        ]);

        CandidateProfile::updateOrCreate(
            [
                'user_id' => $request->user()->id,
            ],
            $validated
        );

        return back()->with(
            'success',
            'Votre profil a été mis à jour avec succès.'
        );
    }
}