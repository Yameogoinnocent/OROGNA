@extends('layouts.admin')

@section('title', 'Détail de l’offre')

@section('page-title', 'Détail de l’offre')

@section('content')

<div class="mx-auto max-w-5xl">

    <div class="mb-8 flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">

        <div>

            <a
                href="{{ route('admin.jobs.index') }}"
                class="text-sm font-semibold text-green-700 hover:text-green-800"
            >
                ← Retour aux offres
            </a>

            <h2 class="mt-3 text-3xl font-black text-slate-900">
                {{ $job->title }}
            </h2>

            <p class="mt-2 text-slate-500">
                Référence : {{ $job->reference }}
            </p>

        </div>

        <a
            href="{{ route('admin.jobs.edit', $job) }}"
            class="rounded-full bg-blue-600 px-6 py-3 text-center font-bold text-white hover:bg-blue-700"
        >
            Modifier l'offre
        </a>

    </div>


    <div class="space-y-6">

        <div class="grid gap-4 md:grid-cols-4">

            <div class="rounded-2xl bg-white p-5 shadow-sm ring-1 ring-slate-200">

                <p class="text-xs font-bold uppercase text-slate-400">
                    Secteur
                </p>

                <p class="mt-2 font-bold text-slate-900">
                    {{ $job->sector ?: 'Non renseigné' }}
                </p>

            </div>

            <div class="rounded-2xl bg-white p-5 shadow-sm ring-1 ring-slate-200">

                <p class="text-xs font-bold uppercase text-slate-400">
                    Lieu
                </p>

                <p class="mt-2 font-bold text-slate-900">
                    {{ $job->location }}
                </p>

            </div>

            <div class="rounded-2xl bg-white p-5 shadow-sm ring-1 ring-slate-200">

                <p class="text-xs font-bold uppercase text-slate-400">
                    Contrat
                </p>

                <p class="mt-2 font-bold text-slate-900">
                    {{ $job->contract_type ?: 'Non renseigné' }}
                </p>

            </div>

            <div class="rounded-2xl bg-white p-5 shadow-sm ring-1 ring-slate-200">

                <p class="text-xs font-bold uppercase text-slate-400">
                    Statut
                </p>

                @if($job->is_published)

                    <span class="mt-2 inline-block rounded-full bg-green-100 px-3 py-1 text-xs font-bold text-green-700">
                        Publiée
                    </span>

                @else

                    <span class="mt-2 inline-block rounded-full bg-amber-100 px-3 py-1 text-xs font-bold text-amber-700">
                        Brouillon
                    </span>

                @endif

            </div>

        </div>


        <div class="rounded-3xl bg-white p-7 shadow-sm ring-1 ring-slate-200">

            <h3 class="text-xl font-black text-slate-900">
                Description
            </h3>

            <div class="mt-5 whitespace-pre-line leading-8 text-slate-600">
                {{ $job->description }}
            </div>

        </div>


        @if($job->profile)

            <div class="rounded-3xl bg-white p-7 shadow-sm ring-1 ring-slate-200">

                <h3 class="text-xl font-black text-slate-900">
                    Profil recherché
                </h3>

                <div class="mt-5 whitespace-pre-line leading-8 text-slate-600">
                    {{ $job->profile }}
                </div>

            </div>

        @endif


        @if($job->requirements)

            <div class="rounded-3xl bg-white p-7 shadow-sm ring-1 ring-slate-200">

                <h3 class="text-xl font-black text-slate-900">
                    Exigences
                </h3>

                <div class="mt-5 whitespace-pre-line leading-8 text-slate-600">
                    {{ $job->requirements }}
                </div>

            </div>

        @endif


        <div class="rounded-3xl bg-slate-900 p-7 text-white">

            <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">

                <div>

                    <p class="text-sm text-slate-400">
                        Date limite de candidature
                    </p>

                    <p class="mt-1 text-xl font-black">
                        {{ $job->deadline ? $job->deadline->format('d/m/Y') : 'Non définie' }}
                    </p>

                </div>

                <a
                    href="{{ route('admin.jobs.edit', $job) }}"
                    class="rounded-full bg-white px-6 py-3 text-center font-bold text-slate-900 hover:bg-slate-100"
                >
                    Modifier
                </a>

            </div>

        </div>

    </div>

</div>

@endsection