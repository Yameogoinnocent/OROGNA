@extends('layouts.app')

@section('content')

{{-- HERO --}}
<section class="bg-slate-50 py-28">

    <div class="mx-auto max-w-7xl px-6 lg:px-8">

        <span class="text-sm font-bold uppercase tracking-[0.2em] text-orange-500">
            Notre univers
        </span>

        <h1 class="mt-4 text-4xl font-black tracking-tight text-slate-900 sm:text-5xl lg:text-6xl">
            Galerie
        </h1>

        <p class="mt-6 max-w-3xl text-lg leading-8 text-slate-600">
            Découvrez l'univers, les activités et les moments forts
            d'OROGNA Consulting.
        </p>

    </div>

</section>


{{-- GALERIE --}}
<section class="bg-white py-20">

    <div class="mx-auto max-w-7xl px-6 lg:px-8">

        <div class="mb-12">

            <span class="text-sm font-bold uppercase tracking-[0.2em] text-green-700">
                En images
            </span>

            <h2 class="mt-3 text-3xl font-black text-slate-900 sm:text-4xl">
                Notre univers
            </h2>

            <p class="mt-4 max-w-2xl text-slate-600">
                Notre galerie sera prochainement enrichie avec les photos
                de nos activités et événements.
            </p>

        </div>


        <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">


            {{-- CARTE 1 --}}
            <div class="group flex min-h-64 flex-col items-center justify-center rounded-3xl border border-slate-200 bg-slate-50 p-8 text-center transition duration-300 hover:-translate-y-2 hover:bg-green-50 hover:shadow-xl">

                <div class="flex h-20 w-20 items-center justify-center rounded-3xl bg-green-100 text-4xl transition duration-300 group-hover:scale-110">
                    📸
                </div>

                <h3 class="mt-6 text-xl font-black text-slate-900">
                    Nos événements
                </h3>

                <p class="mt-3 text-sm leading-6 text-slate-600">
                    Retrouvez prochainement les moments forts
                    de nos événements.
                </p>

            </div>


            {{-- CARTE 2 --}}
            <div class="group flex min-h-64 flex-col items-center justify-center rounded-3xl border border-slate-200 bg-slate-50 p-8 text-center transition duration-300 hover:-translate-y-2 hover:bg-orange-50 hover:shadow-xl">

                <div class="flex h-20 w-20 items-center justify-center rounded-3xl bg-orange-100 text-4xl transition duration-300 group-hover:scale-110">
                    👥
                </div>

                <h3 class="mt-6 text-xl font-black text-slate-900">
                    Notre équipe
                </h3>

                <p class="mt-3 text-sm leading-6 text-slate-600">
                    Découvrez prochainement notre équipe
                    et nos collaborateurs.
                </p>

            </div>


            {{-- CARTE 3 --}}
            <div class="group flex min-h-64 flex-col items-center justify-center rounded-3xl border border-slate-200 bg-slate-50 p-8 text-center transition duration-300 hover:-translate-y-2 hover:bg-green-50 hover:shadow-xl">

                <div class="flex h-20 w-20 items-center justify-center rounded-3xl bg-green-100 text-4xl transition duration-300 group-hover:scale-110">
                    💼
                </div>

                <h3 class="mt-6 text-xl font-black text-slate-900">
                    Nos activités
                </h3>

                <p class="mt-3 text-sm leading-6 text-slate-600">
                    Découvrez nos différentes activités
                    et interventions professionnelles.
                </p>

            </div>


            {{-- CARTE 4 --}}
            <div class="group flex min-h-64 flex-col items-center justify-center rounded-3xl border border-slate-200 bg-slate-50 p-8 text-center transition duration-300 hover:-translate-y-2 hover:bg-orange-50 hover:shadow-xl">

                <div class="flex h-20 w-20 items-center justify-center rounded-3xl bg-orange-100 text-4xl transition duration-300 group-hover:scale-110">
                    🤝
                </div>

                <h3 class="mt-6 text-xl font-black text-slate-900">
                    Nos rencontres
                </h3>

                <p class="mt-3 text-sm leading-6 text-slate-600">
                    Les rencontres et échanges qui font vivre
                    notre activité.
                </p>

            </div>


            {{-- CARTE 5 --}}
            <div class="group flex min-h-64 flex-col items-center justify-center rounded-3xl border border-slate-200 bg-slate-50 p-8 text-center transition duration-300 hover:-translate-y-2 hover:bg-green-50 hover:shadow-xl">

                <div class="flex h-20 w-20 items-center justify-center rounded-3xl bg-green-100 text-4xl transition duration-300 group-hover:scale-110">
                    🎯
                </div>

                <h3 class="mt-6 text-xl font-black text-slate-900">
                    Nos projets
                </h3>

                <p class="mt-3 text-sm leading-6 text-slate-600">
                    Quelques-uns des projets et missions
                    réalisés par OROGNA Consulting.
                </p>

            </div>


            {{-- CARTE 6 --}}
            <div class="group flex min-h-64 flex-col items-center justify-center rounded-3xl border border-slate-200 bg-slate-50 p-8 text-center transition duration-300 hover:-translate-y-2 hover:bg-orange-50 hover:shadow-xl">

                <div class="flex h-20 w-20 items-center justify-center rounded-3xl bg-orange-100 text-4xl transition duration-300 group-hover:scale-110">
                    🌍
                </div>

                <h3 class="mt-6 text-xl font-black text-slate-900">
                    Nos interventions
                </h3>

                <p class="mt-3 text-sm leading-6 text-slate-600">
                    Découvrez prochainement nos différentes
                    interventions et réalisations.
                </p>

            </div>

        </div>

    </div>

</section>


{{-- CTA --}}
<section class="bg-slate-900 py-20">

    <div class="mx-auto max-w-5xl px-6 text-center lg:px-8">

        <h2 class="text-3xl font-black text-white sm:text-4xl">
            Vous souhaitez travailler avec nous ?
        </h2>

        <p class="mx-auto mt-5 max-w-2xl text-lg leading-8 text-slate-300">
            Parlons de vos besoins et construisons ensemble
            des solutions adaptées à votre organisation.
        </p>

        <a
            href="{{ route('contact') }}"
            class="mt-8 inline-flex rounded-full bg-green-700 px-7 py-4 font-bold text-white shadow-lg transition duration-300 hover:-translate-y-1 hover:bg-green-800"
        >
            Nous contacter
        </a>

    </div>

</section>

@endsection