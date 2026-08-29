@extends('layouts.admin')

@section('title', 'Modifier une offre')

@section('page-title', 'Modifier une offre')

@section('content')

<div class="mx-auto max-w-5xl">

    <div class="mb-8">
        <a
            href="{{ route('admin.jobs.index') }}"
            class="text-sm font-semibold text-green-700 hover:text-green-800"
        >
            ← Retour aux offres
        </a>

        <h2 class="mt-3 text-3xl font-black text-slate-900">
            Modifier l'offre
        </h2>

        <p class="mt-2 text-slate-500">
            Modifiez les informations de cette offre d'emploi.
        </p>
    </div>

    @if($errors->any())

        <div class="mb-6 rounded-2xl border border-red-200 bg-red-50 p-5">

            <p class="font-bold text-red-800">
                Veuillez corriger les erreurs suivantes :
            </p>

            <ul class="mt-2 list-disc pl-5 text-sm text-red-700">

                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach

            </ul>

        </div>

    @endif

    <form
        action="{{ route('admin.jobs.update', $job) }}"
        method="POST"
        class="space-y-8"
    >

        @csrf
        @method('PUT')

        <div class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm">

            <h3 class="text-xl font-black text-slate-900">
                Informations générales
            </h3>

            <div class="mt-6 grid gap-6 md:grid-cols-2">

                <div class="md:col-span-2">

                    <label class="mb-2 block text-sm font-bold text-slate-700">
                        Intitulé du poste
                    </label>

                    <input
                        type="text"
                        name="title"
                        value="{{ old('title', $job->title) }}"
                        required
                        class="w-full rounded-xl border border-slate-300 px-4 py-3 outline-none focus:border-green-600 focus:ring-2 focus:ring-green-100"
                    >

                </div>

                <div>

                    <label class="mb-2 block text-sm font-bold text-slate-700">
                        Secteur
                    </label>

                    <input
                        type="text"
                        name="sector"
                        value="{{ old('sector', $job->sector) }}"
                        class="w-full rounded-xl border border-slate-300 px-4 py-3 outline-none focus:border-green-600 focus:ring-2 focus:ring-green-100"
                    >

                </div>

                <div>

                    <label class="mb-2 block text-sm font-bold text-slate-700">
                        Lieu
                    </label>

                    <input
                        type="text"
                        name="location"
                        value="{{ old('location', $job->location) }}"
                        required
                        class="w-full rounded-xl border border-slate-300 px-4 py-3 outline-none focus:border-green-600 focus:ring-2 focus:ring-green-100"
                    >

                </div>

                <div>

                    <label class="mb-2 block text-sm font-bold text-slate-700">
                        Type de contrat
                    </label>

                    <select
                        name="contract_type"
                        class="w-full rounded-xl border border-slate-300 px-4 py-3 outline-none focus:border-green-600 focus:ring-2 focus:ring-green-100"
                    >

                        <option value="">Sélectionner</option>

                        @foreach(['CDI', 'CDD', 'Stage', 'Intérim', 'Freelance'] as $type)

                            <option
                                value="{{ $type }}"
                                @selected(old('contract_type', $job->contract_type) === $type)
                            >
                                {{ $type }}
                            </option>

                        @endforeach

                    </select>

                </div>

                <div>

                    <label class="mb-2 block text-sm font-bold text-slate-700">
                        Date de publication
                    </label>

                    <input
                        type="date"
                        name="published_at"
                        value="{{ old('published_at', optional($job->published_at)->format('Y-m-d')) }}"
                        class="w-full rounded-xl border border-slate-300 px-4 py-3 outline-none focus:border-green-600 focus:ring-2 focus:ring-green-100"
                    >

                </div>

                <div>

                    <label class="mb-2 block text-sm font-bold text-slate-700">
                        Date limite
                    </label>

                    <input
                        type="date"
                        name="deadline"
                        value="{{ old('deadline', optional($job->deadline)->format('Y-m-d')) }}"
                        class="w-full rounded-xl border border-slate-300 px-4 py-3 outline-none focus:border-green-600 focus:ring-2 focus:ring-green-100"
                    >

                </div>

            </div>

        </div>


        <div class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm">

            <h3 class="text-xl font-black text-slate-900">
                Description
            </h3>

            <div class="mt-6 space-y-6">

                <div>

                    <label class="mb-2 block text-sm font-bold text-slate-700">
                        Résumé
                    </label>

                    <textarea
                        name="short_description"
                        rows="3"
                        class="w-full rounded-xl border border-slate-300 px-4 py-3 outline-none focus:border-green-600 focus:ring-2 focus:ring-green-100"
                    >{{ old('short_description', $job->short_description) }}</textarea>

                </div>

                <div>

                    <label class="mb-2 block text-sm font-bold text-slate-700">
                        Description complète
                    </label>

                    <textarea
                        name="description"
                        rows="8"
                        required
                        class="w-full rounded-xl border border-slate-300 px-4 py-3 outline-none focus:border-green-600 focus:ring-2 focus:ring-green-100"
                    >{{ old('description', $job->description) }}</textarea>

                </div>

                <div>

                    <label class="mb-2 block text-sm font-bold text-slate-700">
                        Profil recherché
                    </label>

                    <textarea
                        name="profile"
                        rows="6"
                        class="w-full rounded-xl border border-slate-300 px-4 py-3 outline-none focus:border-green-600 focus:ring-2 focus:ring-green-100"
                    >{{ old('profile', $job->profile) }}</textarea>

                </div>

                <div>

                    <label class="mb-2 block text-sm font-bold text-slate-700">
                        Exigences
                    </label>

                    <textarea
                        name="requirements"
                        rows="6"
                        class="w-full rounded-xl border border-slate-300 px-4 py-3 outline-none focus:border-green-600 focus:ring-2 focus:ring-green-100"
                    >{{ old('requirements', $job->requirements) }}</textarea>

                </div>

            </div>

        </div>


        <div class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm">

            <label class="flex cursor-pointer items-center gap-3">

                <input
                    type="checkbox"
                    name="is_published"
                    value="1"
                    @checked(old('is_published', $job->is_published))
                    class="h-5 w-5 rounded border-slate-300 text-green-700 focus:ring-green-500"
                >

                <span>
                    <span class="block font-bold text-slate-900">
                        Publier cette offre
                    </span>

                    <span class="text-sm text-slate-500">
                        L'offre sera visible sur le site public.
                    </span>
                </span>

            </label>

        </div>


        <div class="flex flex-col-reverse gap-3 sm:flex-row sm:justify-end">

            <a
                href="{{ route('admin.jobs.index') }}"
                class="rounded-full border border-slate-300 px-6 py-3 text-center font-bold text-slate-600 hover:bg-slate-50"
            >
                Annuler
            </a>

            <button
                type="submit"
                class="rounded-full bg-green-700 px-7 py-3 font-bold text-white shadow-sm hover:bg-green-800"
            >
                Enregistrer les modifications
            </button>

        </div>

    </form>

</div>

@endsection