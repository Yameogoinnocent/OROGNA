@extends('layouts.admin')

@section('title', 'Nouvelle offre — OROGNA Consulting')

@section('page-title', 'Nouvelle offre')

@section('content')

    <div class="mx-auto max-w-5xl">

        <div class="mb-8">

            <a
                href="{{ route('admin.jobs.index') }}"
                class="text-sm font-semibold text-green-700 hover:text-green-800"
            >
                ← Retour aux offres
            </a>

            <h2 class="mt-4 text-3xl font-black text-slate-900">
                Créer une nouvelle offre
            </h2>

            <p class="mt-2 text-slate-500">
                Remplissez les informations du recrutement.
            </p>

        </div>


        @if($errors->any())

            <div class="mb-6 rounded-2xl border border-red-200 bg-red-50 p-5">

                <p class="font-bold text-red-800">
                    Veuillez corriger les erreurs suivantes :
                </p>

                <ul class="mt-2 list-inside list-disc text-sm text-red-700">

                    @foreach($errors->all() as $error)

                        <li>{{ $error }}</li>

                    @endforeach

                </ul>

            </div>

        @endif


        <form
            method="POST"
            action="{{ route('admin.jobs.store') }}"
            class="space-y-6"
        >

            @csrf


            {{-- INFORMATIONS PRINCIPALES --}}
            <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm sm:p-8">

                <h3 class="text-xl font-black text-slate-900">
                    Informations principales
                </h3>

                <div class="mt-6 grid gap-6 md:grid-cols-2">

                    <div class="md:col-span-2">

                        <label class="text-sm font-bold text-slate-700">
                            Intitulé du poste *
                        </label>

                        <input
                            type="text"
                            name="title"
                            value="{{ old('title') }}"
                            required
                            placeholder="Ex. Responsable Administratif et Financier"
                            class="mt-2 w-full rounded-xl border-slate-300 px-4 py-3 focus:border-green-500 focus:ring-green-500"
                        >

                    </div>


                    <div>

                        <label class="text-sm font-bold text-slate-700">
                            Secteur
                        </label>

                        <input
                            type="text"
                            name="sector"
                            value="{{ old('sector') }}"
                            placeholder="Ex. BTP, Automobile, Administration..."
                            class="mt-2 w-full rounded-xl border-slate-300 px-4 py-3 focus:border-green-500 focus:ring-green-500"
                        >

                    </div>


                    <div>

                        <label class="text-sm font-bold text-slate-700">
                            Type de contrat
                        </label>

                        <select
                            name="contract_type"
                            class="mt-2 w-full rounded-xl border-slate-300 px-4 py-3 focus:border-green-500 focus:ring-green-500"
                        >

                            <option value="">Sélectionner</option>
                            <option value="CDI" @selected(old('contract_type') === 'CDI')>
                                CDI
                            </option>
                            <option value="CDD" @selected(old('contract_type') === 'CDD')>
                                CDD
                            </option>
                            <option value="Stage" @selected(old('contract_type') === 'Stage')>
                                Stage
                            </option>
                            <option value="Intérim" @selected(old('contract_type') === 'Intérim')>
                                Intérim
                            </option>
                            <option value="Autre" @selected(old('contract_type') === 'Autre')>
                                Autre
                            </option>

                        </select>

                    </div>


                    <div>

                        <label class="text-sm font-bold text-slate-700">
                            Localisation *
                        </label>

                        <input
                            type="text"
                            name="location"
                            value="{{ old('location', 'Ouagadougou') }}"
                            required
                            class="mt-2 w-full rounded-xl border-slate-300 px-4 py-3 focus:border-green-500 focus:ring-green-500"
                        >

                    </div>


                    <div>

                        <label class="text-sm font-bold text-slate-700">
                            Date limite
                        </label>

                        <input
                            type="date"
                            name="deadline"
                            value="{{ old('deadline') }}"
                            class="mt-2 w-full rounded-xl border-slate-300 px-4 py-3 focus:border-green-500 focus:ring-green-500"
                        >

                    </div>

                </div>

            </div>


            {{-- DESCRIPTION --}}
            <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm sm:p-8">

                <h3 class="text-xl font-black text-slate-900">
                    Description du recrutement
                </h3>

                <div class="mt-6 space-y-6">

                    <div>

                        <label class="text-sm font-bold text-slate-700">
                            Résumé
                        </label>

                        <textarea
                            name="short_description"
                            rows="3"
                            placeholder="Courte présentation de l'opportunité..."
                            class="mt-2 w-full rounded-xl border-slate-300 px-4 py-3 focus:border-green-500 focus:ring-green-500"
                        >{{ old('short_description') }}</textarea>

                    </div>


                    <div>

                        <label class="text-sm font-bold text-slate-700">
                            Description complète *
                        </label>

                        <textarea
                            name="description"
                            rows="8"
                            required
                            placeholder="Présentez le poste, les missions et le contexte..."
                            class="mt-2 w-full rounded-xl border-slate-300 px-4 py-3 focus:border-green-500 focus:ring-green-500"
                        >{{ old('description') }}</textarea>

                    </div>


                    <div>

                        <label class="text-sm font-bold text-slate-700">
                            Profil recherché
                        </label>

                        <textarea
                            name="profile"
                            rows="6"
                            placeholder="Formation, expérience, qualités recherchées..."
                            class="mt-2 w-full rounded-xl border-slate-300 px-4 py-3 focus:border-green-500 focus:ring-green-500"
                        >{{ old('profile') }}</textarea>

                    </div>


                    <div>

                        <label class="text-sm font-bold text-slate-700">
                            Exigences / compétences
                        </label>

                        <textarea
                            name="requirements"
                            rows="6"
                            placeholder="Compétences, diplômes, expériences..."
                            class="mt-2 w-full rounded-xl border-slate-300 px-4 py-3 focus:border-green-500 focus:ring-green-500"
                        >{{ old('requirements') }}</textarea>

                    </div>

                </div>

            </div>


            {{-- PUBLICATION --}}
            <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm sm:p-8">

                <h3 class="text-xl font-black text-slate-900">
                    Publication
                </h3>

                <div class="mt-6 flex items-start gap-3">

                    <input
                        type="checkbox"
                        name="is_published"
                        value="1"
                        id="is_published"
                        @checked(old('is_published'))
                        class="mt-1 rounded border-slate-300 text-green-700 focus:ring-green-500"
                    >

                    <div>

                        <label
                            for="is_published"
                            class="font-bold text-slate-800"
                        >
                            Publier immédiatement
                        </label>

                        <p class="mt-1 text-sm text-slate-500">
                            Si cette option est désactivée, l'offre sera enregistrée comme brouillon.
                        </p>

                    </div>

                </div>

            </div>


            {{-- ACTIONS --}}
            <div class="flex flex-col-reverse gap-3 sm:flex-row sm:justify-end">

                <a
                    href="{{ route('admin.jobs.index') }}"
                    class="rounded-full border border-slate-300 px-7 py-3 text-center font-bold text-slate-600 hover:bg-slate-50"
                >
                    Annuler
                </a>

                <button
                    type="submit"
                    class="rounded-full bg-green-700 px-7 py-3 font-bold text-white shadow-sm hover:bg-green-800"
                >
                    Enregistrer l'offre
                </button>

            </div>

        </form>

    </div>

@endsection