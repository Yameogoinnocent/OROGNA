<x-app-layout>

    <x-slot name="header">

        <div>
            <h2 class="text-xl font-black text-gray-900">
                Mon profil candidat
            </h2>

            <p class="mt-1 text-sm text-gray-500">
                Gérez vos informations professionnelles.
            </p>
        </div>

    </x-slot>


    <div class="min-h-screen bg-slate-50 py-10">

        <div class="mx-auto max-w-4xl px-6">


            @if(session('success'))

                <div class="mb-6 rounded-2xl border border-green-200 bg-green-50 p-4 text-sm font-semibold text-green-700">
                    {{ session('success') }}
                </div>

            @endif


            @if($errors->any())

                <div class="mb-6 rounded-2xl border border-red-200 bg-red-50 p-4">

                    <p class="font-bold text-red-700">
                        Vérifiez les informations suivantes :
                    </p>

                    <ul class="mt-2 list-inside list-disc text-sm text-red-600">

                        @foreach($errors->all() as $error)

                            <li>{{ $error }}</li>

                        @endforeach

                    </ul>

                </div>

            @endif


            <form
                method="POST"
                action="{{ route('candidate.profile.update') }}"
                class="rounded-3xl bg-white p-8 shadow-sm"
            >

                @csrf
                @method('PATCH')


                {{-- INFORMATIONS COMPTE --}}

                <div class="border-b border-slate-100 pb-8">

                    <h1 class="text-2xl font-black text-slate-900">
                        Informations personnelles
                    </h1>

                    <p class="mt-2 text-sm text-slate-500">
                        Ces informations permettront aux recruteurs de mieux
                        connaître votre profil.
                    </p>

                </div>


                {{-- NOM / EMAIL --}}

                <div class="mt-8 grid gap-6 md:grid-cols-2">

                    <div>

                        <label class="text-sm font-bold text-slate-700">
                            Nom
                        </label>

                        <input
                            type="text"
                            value="{{ auth()->user()->name }}"
                            disabled
                            class="mt-2 w-full rounded-xl border-slate-200 bg-slate-100"
                        >

                    </div>


                    <div>

                        <label class="text-sm font-bold text-slate-700">
                            Adresse e-mail
                        </label>

                        <input
                            type="email"
                            value="{{ auth()->user()->email }}"
                            disabled
                            class="mt-2 w-full rounded-xl border-slate-200 bg-slate-100"
                        >

                    </div>

                </div>


                {{-- TÉLÉPHONE / VILLE --}}

                <div class="mt-6 grid gap-6 md:grid-cols-2">

                    <div>

                        <label
                            for="phone"
                            class="text-sm font-bold text-slate-700"
                        >
                            Téléphone
                        </label>

                        <input
                            id="phone"
                            name="phone"
                            type="text"
                            value="{{ old('phone', $profile?->phone) }}"
                            placeholder="+226 XX XX XX XX"
                            class="mt-2 w-full rounded-xl border-slate-200"
                        >

                    </div>


                    <div>

                        <label
                            for="city"
                            class="text-sm font-bold text-slate-700"
                        >
                            Ville
                        </label>

                        <input
                            id="city"
                            name="city"
                            type="text"
                            value="{{ old('city', $profile?->city) }}"
                            placeholder="Ouagadougou"
                            class="mt-2 w-full rounded-xl border-slate-200"
                        >

                    </div>

                </div>


                {{-- ADRESSE --}}

                <div class="mt-6">

                    <label
                        for="address"
                        class="text-sm font-bold text-slate-700"
                    >
                        Adresse
                    </label>

                    <input
                        id="address"
                        name="address"
                        type="text"
                        value="{{ old('address', $profile?->address) }}"
                        class="mt-2 w-full rounded-xl border-slate-200"
                    >

                </div>


                {{-- PROFESSION --}}

                <div class="mt-6">

                    <label
                        for="profession"
                        class="text-sm font-bold text-slate-700"
                    >
                        Profession / métier
                    </label>

                    <input
                        id="profession"
                        name="profession"
                        type="text"
                        value="{{ old('profession', $profile?->profession) }}"
                        placeholder="Ex. Comptable, Ingénieur, Commercial..."
                        class="mt-2 w-full rounded-xl border-slate-200"
                    >

                </div>


                {{-- DATE DE NAISSANCE --}}

                <div class="mt-6">

                    <label
                        for="birth_date"
                        class="text-sm font-bold text-slate-700"
                    >
                        Date de naissance
                    </label>

                    <input
                        id="birth_date"
                        name="birth_date"
                        type="date"
                        value="{{ old(
                            'birth_date',
                            $profile?->birth_date?->format('Y-m-d')
                        ) }}"
                        class="mt-2 rounded-xl border-slate-200"
                    >

                </div>


                {{-- PRÉSENTATION --}}

                <div class="mt-6">

                    <label
                        for="bio"
                        class="text-sm font-bold text-slate-700"
                    >
                        Présentation professionnelle
                    </label>

                    <textarea
                        id="bio"
                        name="bio"
                        rows="6"
                        maxlength="2000"
                        placeholder="Présentez brièvement votre parcours, vos compétences et vos objectifs professionnels..."
                        class="mt-2 w-full rounded-xl border-slate-200"
                    >{{ old('bio', $profile?->bio) }}</textarea>

                </div>


                {{-- BOUTON --}}

                <div class="mt-8 flex justify-end">

                    <button
                        type="submit"
                        class="rounded-full bg-green-600 px-8 py-3 font-bold text-white transition hover:bg-green-700"
                    >
                        Enregistrer mon profil
                    </button>

                </div>

            </form>

        </div>

    </div>

</x-app-layout>