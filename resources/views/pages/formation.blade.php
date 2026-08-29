@extends('layouts.app')

@section('content')

{{-- =========================================================
     HERO FORMATION
========================================================= --}}

<section class="relative isolate overflow-hidden bg-slate-950">

    <div class="absolute inset-0">

        <img
            src="{{ asset('images/formation.jpg') }}"
            alt="Formation professionnelle OROGNA Consulting"
            class="h-full w-full object-cover"
        >

        <div class="absolute inset-0 bg-slate-950/75"></div>

        <div class="absolute inset-0 bg-gradient-to-r from-slate-950 via-slate-950/80 to-green-950/40"></div>

    </div>


    <div class="relative mx-auto max-w-7xl px-6 py-28 sm:py-36 lg:px-8 lg:py-44">

        <div class="max-w-4xl">

            <span class="inline-flex rounded-full border border-orange-400/30 bg-orange-400/10 px-4 py-2 text-xs font-bold uppercase tracking-[0.2em] text-orange-300 backdrop-blur-sm">
                Formation professionnelle
            </span>


            <h1 class="mt-6 text-5xl font-black leading-[1.05] tracking-tight text-white sm:text-6xl lg:text-7xl">

                Développez les compétences
                <span class="text-orange-400">
                    qui font la différence.
                </span>

            </h1>


            <p class="mt-7 max-w-3xl text-lg leading-8 text-slate-200 sm:text-xl">

                OROGNA Consulting accompagne les entreprises, les organisations
                et les professionnels dans le développement des compétences,
                la montée en expertise et l'amélioration des performances.

            </p>


            <div class="mt-10 flex flex-wrap gap-4">

                <a
                    href="{{ route('contact') }}"
                    class="inline-flex items-center rounded-full bg-orange-500 px-8 py-4 font-bold text-white shadow-lg shadow-orange-950/30 transition duration-300 hover:-translate-y-1 hover:bg-orange-600 hover:shadow-xl"
                >
                    Demander une formation
                    <span class="ml-2 text-lg">→</span>
                </a>


                <a
                    href="#catalogue"
                    class="inline-flex items-center rounded-full border border-white/30 bg-white/10 px-8 py-4 font-bold text-white backdrop-blur transition duration-300 hover:-translate-y-1 hover:bg-white/20"
                >
                    Voir nos formations
                </a>

            </div>

        </div>

    </div>

</section>


{{-- =========================================================
     INTRODUCTION
========================================================= --}}

<section class="bg-white py-24 sm:py-32">

    <div class="mx-auto max-w-7xl px-6 lg:px-8">

        <div class="grid items-center gap-14 lg:grid-cols-2">

            <div>

                <span class="text-sm font-bold uppercase tracking-[0.2em] text-orange-500">
                    Notre approche
                </span>


                <h2 class="mt-5 text-4xl font-black tracking-tight text-slate-900 sm:text-5xl">

                    Des formations pensées pour
                    <span class="text-green-700">
                        vos réalités.
                    </span>

                </h2>


                <p class="mt-7 text-lg leading-8 text-slate-700">

                    Nous concevons et proposons des formations adaptées aux
                    besoins des entreprises, des organisations et des
                    professionnels.

                </p>


                <p class="mt-5 text-lg leading-8 text-slate-600">

                    Notre objectif est de transformer les connaissances en
                    compétences concrètes, directement applicables dans
                    l'environnement professionnel.

                </p>


                <div class="mt-8 grid gap-4 sm:grid-cols-2">

                    <div class="rounded-2xl bg-green-50 p-5">

                        <div class="text-2xl font-black text-green-700">
                            01
                        </div>

                        <p class="mt-2 font-bold text-slate-900">
                            Formations pratiques
                        </p>

                        <p class="mt-1 text-sm leading-6 text-slate-600">
                            Des contenus directement applicables.
                        </p>

                    </div>


                    <div class="rounded-2xl bg-orange-50 p-5">

                        <div class="text-2xl font-black text-orange-500">
                            02
                        </div>

                        <p class="mt-2 font-bold text-slate-900">
                            Approche personnalisée
                        </p>

                        <p class="mt-1 text-sm leading-6 text-slate-600">
                            Des solutions adaptées à vos besoins.
                        </p>

                    </div>

                </div>

            </div>


            <div class="relative">

                <div class="overflow-hidden rounded-[2rem] shadow-2xl">

                    <img
                        src="{{ asset('images/formation.jpg') }}"
                        alt="Formation professionnelle"
                        class="h-[520px] w-full object-cover transition duration-700 hover:scale-105"
                    >

                </div>


                <div class="absolute -bottom-8 -left-6 hidden rounded-3xl bg-green-700 p-7 text-white shadow-2xl sm:block">

                    <div class="text-3xl font-black">
                        OROGNA
                    </div>

                    <div class="mt-1 text-sm text-green-100">
                        Développer les compétences
                    </div>

                </div>

            </div>

        </div>

    </div>

</section>


{{-- =========================================================
     CATALOGUE
========================================================= --}}

<section
    id="catalogue"
    class="scroll-mt-24 bg-slate-50 py-24 sm:py-32"
>

    <div class="mx-auto max-w-7xl px-6 lg:px-8">

        <div class="mx-auto max-w-3xl text-center">

            <span class="text-sm font-bold uppercase tracking-[0.2em] text-orange-500">
                Nos domaines de formation
            </span>

            <h2 class="mt-4 text-4xl font-black tracking-tight text-slate-900 sm:text-5xl">

                Développez votre potentiel.

            </h2>

            <p class="mt-5 text-lg leading-8 text-slate-600">

                Découvrez quelques-uns des domaines dans lesquels
                OROGNA Consulting peut vous accompagner.

            </p>

        </div>


        <div class="mt-14 grid gap-7 md:grid-cols-2 lg:grid-cols-3">


            {{-- FORMATION 01 --}}

            <article class="group rounded-3xl bg-white p-8 shadow-sm ring-1 ring-slate-100 transition duration-500 hover:-translate-y-2 hover:shadow-xl">

                <div class="flex h-14 w-14 items-center justify-center rounded-2xl bg-green-100 text-2xl text-green-700">
                    👥
                </div>

                <h3 class="mt-7 text-2xl font-black text-slate-900">
                    Ressources humaines
                </h3>

                <p class="mt-4 leading-7 text-slate-600">
                    Développez vos compétences en gestion des ressources
                    humaines, management des équipes et gestion des talents.
                </p>

                <a
                    href="{{ route('contact') }}"
                    class="mt-6 inline-flex font-bold text-green-700 transition hover:text-orange-500"
                >
                    Demander cette formation →
                </a>

            </article>


            {{-- FORMATION 02 --}}

            <article class="group rounded-3xl bg-white p-8 shadow-sm ring-1 ring-slate-100 transition duration-500 hover:-translate-y-2 hover:shadow-xl">

                <div class="flex h-14 w-14 items-center justify-center rounded-2xl bg-orange-100 text-2xl text-orange-500">
                    📈
                </div>

                <h3 class="mt-7 text-2xl font-black text-slate-900">
                    Management & leadership
                </h3>

                <p class="mt-4 leading-7 text-slate-600">
                    Renforcez les compétences managériales et développez
                    votre capacité à accompagner efficacement vos équipes.
                </p>

                <a
                    href="{{ route('contact') }}"
                    class="mt-6 inline-flex font-bold text-green-700 transition hover:text-orange-500"
                >
                    Demander cette formation →
                </a>

            </article>


            {{-- FORMATION 03 --}}

            <article class="group rounded-3xl bg-white p-8 shadow-sm ring-1 ring-slate-100 transition duration-500 hover:-translate-y-2 hover:shadow-xl">

                <div class="flex h-14 w-14 items-center justify-center rounded-2xl bg-green-100 text-2xl text-green-700">
                    🎯
                </div>

                <h3 class="mt-7 text-2xl font-black text-slate-900">
                    Développement professionnel
                </h3>

                <p class="mt-4 leading-7 text-slate-600">
                    Développez votre efficacité professionnelle, votre
                    organisation et vos compétences personnelles.
                </p>

                <a
                    href="{{ route('contact') }}"
                    class="mt-6 inline-flex font-bold text-green-700 transition hover:text-orange-500"
                >
                    Demander cette formation →
                </a>

            </article>


            {{-- FORMATION 04 --}}

            <article class="group rounded-3xl bg-white p-8 shadow-sm ring-1 ring-slate-100 transition duration-500 hover:-translate-y-2 hover:shadow-xl">

                <div class="flex h-14 w-14 items-center justify-center rounded-2xl bg-orange-100 text-2xl text-orange-500">
                    💼
                </div>

                <h3 class="mt-7 text-2xl font-black text-slate-900">
                    Entrepreneuriat
                </h3>

                <p class="mt-4 leading-7 text-slate-600">
                    Acquérez les connaissances et outils nécessaires pour
                    développer et structurer vos projets professionnels.
                </p>

                <a
                    href="{{ route('contact') }}"
                    class="mt-6 inline-flex font-bold text-green-700 transition hover:text-orange-500"
                >
                    Demander cette formation →
                </a>

            </article>


            {{-- FORMATION 05 --}}

            <article class="group rounded-3xl bg-white p-8 shadow-sm ring-1 ring-slate-100 transition duration-500 hover:-translate-y-2 hover:shadow-xl">

                <div class="flex h-14 w-14 items-center justify-center rounded-2xl bg-green-100 text-2xl text-green-700">
                    🧠
                </div>

                <h3 class="mt-7 text-2xl font-black text-slate-900">
                    Communication professionnelle
                </h3>

                <p class="mt-4 leading-7 text-slate-600">
                    Améliorez votre communication, vos présentations et
                    votre capacité à interagir efficacement.
                </p>

                <a
                    href="{{ route('contact') }}"
                    class="mt-6 inline-flex font-bold text-green-700 transition hover:text-orange-500"
                >
                    Demander cette formation →
                </a>

            </article>


            {{-- FORMATION 06 --}}

            <article class="group rounded-3xl bg-white p-8 shadow-sm ring-1 ring-slate-100 transition duration-500 hover:-translate-y-2 hover:shadow-xl">

                <div class="flex h-14 w-14 items-center justify-center rounded-2xl bg-orange-100 text-2xl text-orange-500">
                    ⚙️
                </div>

                <h3 class="mt-7 text-2xl font-black text-slate-900">
                    Organisation & performance
                </h3>

                <p class="mt-4 leading-7 text-slate-600">
                    Optimisez les méthodes de travail, les processus et
                    la performance des organisations.
                </p>

                <a
                    href="{{ route('contact') }}"
                    class="mt-6 inline-flex font-bold text-green-700 transition hover:text-orange-500"
                >
                    Demander cette formation →
                </a>

            </article>

        </div>

    </div>

</section>


{{-- =========================================================
     POUR QUI ?
========================================================= --}}

<section class="bg-white py-24 sm:py-32">

    <div class="mx-auto max-w-7xl px-6 lg:px-8">

        <div class="grid gap-14 lg:grid-cols-2">

            <div>

                <span class="text-sm font-bold uppercase tracking-[0.2em] text-orange-500">
                    Pour qui ?
                </span>

                <h2 class="mt-5 text-4xl font-black text-slate-900 sm:text-5xl">
                    Des formations pour chaque profil.
                </h2>

                <p class="mt-6 text-lg leading-8 text-slate-600">
                    Nos formations peuvent être adaptées aux besoins
                    spécifiques de différents publics professionnels.
                </p>

            </div>


            <div class="grid gap-4 sm:grid-cols-2">

                <div class="rounded-2xl border border-slate-200 p-6 transition hover:border-green-600 hover:shadow-lg">

                    <h3 class="font-black text-slate-900">
                        Entreprises
                    </h3>

                    <p class="mt-2 text-sm leading-6 text-slate-600">
                        Former et faire progresser vos collaborateurs.
                    </p>

                </div>


                <div class="rounded-2xl border border-slate-200 p-6 transition hover:border-green-600 hover:shadow-lg">

                    <h3 class="font-black text-slate-900">
                        Organisations
                    </h3>

                    <p class="mt-2 text-sm leading-6 text-slate-600">
                        Renforcer les capacités de vos équipes.
                    </p>

                </div>


                <div class="rounded-2xl border border-slate-200 p-6 transition hover:border-orange-500 hover:shadow-lg">

                    <h3 class="font-black text-slate-900">
                        Professionnels
                    </h3>

                    <p class="mt-2 text-sm leading-6 text-slate-600">
                        Développer votre employabilité et votre expertise.
                    </p>

                </div>


                <div class="rounded-2xl border border-slate-200 p-6 transition hover:border-orange-500 hover:shadow-lg">

                    <h3 class="font-black text-slate-900">
                        Porteurs de projets
                    </h3>

                    <p class="mt-2 text-sm leading-6 text-slate-600">
                        Structurer vos compétences et vos projets.
                    </p>

                </div>

            </div>

        </div>

    </div>

</section>


{{-- =========================================================
     NOTRE MÉTHODE
========================================================= --}}

<section class="bg-slate-950 py-24 sm:py-32">

    <div class="mx-auto max-w-7xl px-6 lg:px-8">

        <div class="mx-auto max-w-3xl text-center">

            <span class="text-sm font-bold uppercase tracking-[0.2em] text-orange-400">
                Notre méthode
            </span>

            <h2 class="mt-4 text-4xl font-black text-white sm:text-5xl">
                Une formation orientée vers l'action.
            </h2>

        </div>


        <div class="mt-14 grid gap-6 md:grid-cols-3">


            <div class="rounded-3xl border border-white/10 bg-white/5 p-8">

                <span class="text-4xl font-black text-orange-400">
                    01
                </span>

                <h3 class="mt-6 text-2xl font-black text-white">
                    Identifier
                </h3>

                <p class="mt-4 leading-7 text-slate-400">
                    Comprendre les besoins, les objectifs et les compétences
                    à développer.
                </p>

            </div>


            <div class="rounded-3xl border border-white/10 bg-white/5 p-8">

                <span class="text-4xl font-black text-orange-400">
                    02
                </span>

                <h3 class="mt-6 text-2xl font-black text-white">
                    Former
                </h3>

                <p class="mt-4 leading-7 text-slate-400">
                    Proposer un contenu adapté avec une approche pratique,
                    interactive et professionnelle.
                </p>

            </div>


            <div class="rounded-3xl border border-white/10 bg-white/5 p-8">

                <span class="text-4xl font-black text-orange-400">
                    03
                </span>

                <h3 class="mt-6 text-2xl font-black text-white">
                    Transformer
                </h3>

                <p class="mt-4 leading-7 text-slate-400">
                    Favoriser l'application concrète des acquis dans
                    l'environnement professionnel.
                </p>

            </div>

        </div>

    </div>

</section>


{{-- =========================================================
     CTA
========================================================= --}}

<section class="relative overflow-hidden bg-green-700 py-24 sm:py-32">

    <div class="absolute -right-32 -top-32 h-96 w-96 rounded-full bg-orange-400/20 blur-3xl"></div>

    <div class="absolute -bottom-40 -left-40 h-96 w-96 rounded-full bg-green-950/40 blur-3xl"></div>


    <div class="relative mx-auto max-w-4xl px-6 text-center lg:px-8">

        <span class="text-sm font-bold uppercase tracking-[0.2em] text-orange-300">
            Développons vos compétences
        </span>

        <h2 class="mt-5 text-4xl font-black text-white sm:text-6xl">
            Besoin d'une formation adaptée à vos besoins ?
        </h2>

        <p class="mx-auto mt-6 max-w-2xl text-lg leading-8 text-green-50">
            Échangeons avec notre équipe afin d'identifier vos besoins
            et construire une solution de formation adaptée.
        </p>


        <div class="mt-9 flex flex-wrap justify-center gap-4">

            <a
                href="{{ route('contact') }}"
                class="rounded-full bg-white px-8 py-4 font-bold text-green-700 transition hover:-translate-y-1 hover:shadow-xl"
            >
                Demander une formation
                <span class="ml-2">→</span>
            </a>


            <a
                href="{{ route('services') }}"
                class="rounded-full border border-white/40 px-8 py-4 font-bold text-white transition hover:bg-white/10"
            >
                Découvrir nos domaines
            </a>

        </div>

    </div>

</section>


@endsection