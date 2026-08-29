<?php

namespace App\Http\Controllers;

use App\Models\JobOffer;

class JobOfferController extends Controller
{
    /**
     * Liste publique des offres.
     */
    public function index()
    {
        $offers = JobOffer::query()
            ->where('is_published', true)
            ->where(function ($query) {
                $query->whereNull('deadline')
                    ->orWhereDate('deadline', '>=', now());
            })
            ->latest('published_at')
            ->get();

        return view('pages.jobs', compact('offers'));
    }

    /**
     * Détail d'une offre.
     */
    public function show(JobOffer $jobOffer)
    {
        abort_unless(
            $jobOffer->is_published,
            404
        );

        return view('pages.job-detail', compact('jobOffer'));
    }
}