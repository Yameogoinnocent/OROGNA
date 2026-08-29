@extends('layouts.app')

@section('content')

{{-- HERO --}}
<section class="bg-slate-50 py-28">
    <div class="mx-auto max-w-7xl px-6 lg:px-8">

        <span class="text-sm font-bold uppercase tracking-[0.2em] text-orange-500">
            Actualités
        </span>

        <h1 class="mt-4 max-w-4xl text-4xl font-black tracking-tight text-slate-900 sm:text-5xl lg:text-6xl">
            Actualités & conseils RH
        </h1>

        <p class="mt-6 max-w-3xl text-lg leading-8 text-slate-600">
            Retrouvez nos actualités, conseils professionnels et informations
            autour des ressources humaines et du monde professionnel.
        </p>

    </div>
</section>


{{-- ACTUALITÉS --}}
<section class="bg-white py-20">

    <div class="mx-auto max-w-7xl px-6 lg:px-8">

        <div class="mb-12">
            <span class="text-sm font-bold uppercase tracking-[0.2em] text-green-700">
                À la une
            </span>

            <h2 class="mt-3 text-3xl font-black text-slate-900 sm:text-4xl">
                Nos actualités
            </h2>

            <p class="mt-4 max-w-2xl text-slate-600">
                Retrouvez prochainement nos publications, conseils et informations.
            </p>
        </div>


        <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-3">

            {{-- ARTICLE 1 --}}
            <article class="group rounded-3xl border border-slate-200 bg-white p-8 shadow-sm transition duration-300 hover:-translate-y-2 hover:shadow-xl">

                <div class="flex h-16 w-16 items-center justify-center rounded-2xl bg-green-100 text-3xl">
                    💼
                </div>

                <span class="mt-6 block text-xs font-bold uppercase tracking-wider text-orange-500">
                    Recrutement
                </span>

                <h3 class="mt-3 text-xl font-black text-slate-900">
                    Conseils pour réussir son recrutement
                </h3>

                <p class="mt-4 leading-7 text-slate-600">
                    Découvrez prochainement nos conseils et bonnes pratiques
                    pour réussir vos recrutements.
                </p>

                <div class="mt-6">
                    <span class="font-bold text-green-700">
                        Article à venir
                    </span>
                </div>

            </article>


            {{-- ARTICLE 2 --}}
            <article class="group rounded-3xl border border-slate-200 bg-white p-8 shadow-sm transition duration-300 hover:-translate-y-2 hover:shadow-xl">

                <div class="flex h-16 w-16 items-center justify-center rounded-2xl bg-orange-100 text-3xl">
                    👥
                </div>

                <span class="mt-6 block text-xs font-bold uppercase tracking-wider text-orange-500">
                    Ressources humaines
                </span>

                <h3 class="mt-3 text-xl font-black text-slate-900">
                    Développer les talents
                </h3>

                <p class="mt-4 leading-7 text-slate-600">
                    Des conseils pour accompagner les collaborateurs et développer
                    les compétences au sein des organisations.
                </p>

                <div class="mt-6">
                    <span class="font-bold text-green-700">
                        Article à venir
                    </span>
                </div>

            </article>


            {{-- ARTICLE 3 --}}
            <article class="group rounded-3xl border border-slate-200 bg-white p-8 shadow-sm transition duration-300 hover:-translate-y-2 hover:shadow-xl">

                <div class="flex h-16 w-16 items-center justify-center rounded-2xl bg-green-100 text-3xl">
                    🎯
                </div>

                <span class="mt-6 block text-xs font-bold uppercase tracking-wider text-orange-500">
                    Conseils
                </span>

                <h3 class="mt-3 text-xl font-black text-slate-900">
                    Construire son parcours professionnel
                </h3>

                <p class="mt-4 leading-7 text-slate-600">
                    Retrouvez prochainement nos conseils pour construire
                    et développer votre parcours professionnel.
                </p>

                <div class="mt-6">
                    <span class="font-bold text-green-700">
                        Article à venir
                    </span>
                </div>

            </article>

        </div>

    </div>

</section>


{{-- CTA --}}
<section class="bg-green-700 py-20">

    <div class="mx-auto max-w-5xl px-6 text-center lg:px-8">

        <span class="text-sm font-bold uppercase tracking-[0.2em] text-orange-300">
            OROGNA Consulting
        </span>

        <h2 class="mt-4 text-3xl font-black text-white sm:text-4xl">
            Vous avez un projet RH ?
        </h2>

        <p class="mx-auto mt-5 max-w-2xl text-lg leading-8 text-green-50">
            Notre équipe vous accompagne dans vos projets de recrutement,
            de conseil et de développement des compétences.
        </p>

        <a
            href="{{ route('contact') }}"
            class="mt-8 inline-flex rounded-full bg-white px-7 py-4 font-bold text-green-700 shadow-lg transition duration-300 hover:-translate-y-1 hover:bg-slate-100"
        >
            Nous contacter
        </a>

    </div>

</section>

@endsection