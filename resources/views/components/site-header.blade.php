<header data-header x-data="{open:false,account:false}" class="fixed inset-x-0 top-0 z-50 border-b border-slate-200/70 bg-white/95 backdrop-blur-xl">
<div class="container-pro">
<div class="or-header-row">
<a href="{{ route('home') }}" class="or-brand" aria-label="OROGNA Consulting - Accueil"><img src="{{ asset('images/logo-orogna-crop.png') }}" class="or-brand-mark" alt="OROGNA Consulting"><span class="or-brand-wordmark"><strong>OROGNA</strong><span>CONSULTING</span></span></a>
<nav class="hidden items-center gap-0.5 lg:flex">
<a class="or-nav-link {{ request()->routeIs('home')?'or-nav-active':'' }}" href="{{ route('home') }}">Accueil</a>
<a class="or-nav-link {{ request()->routeIs('about','page.show')?'or-nav-active':'' }}" href="{{ route('about') }}">À propos</a>
<a class="or-nav-link {{ request()->routeIs('services')?'or-nav-active':'' }}" href="{{ route('services') }}">Expertises</a>
<a class="or-nav-link {{ request()->routeIs('jobs*')?'or-nav-active':'' }}" href="{{ route('jobs') }}">Carrières</a>
<a class="or-nav-link {{ request()->routeIs('trainings.*')?'or-nav-active':'' }}" href="{{ route('trainings.index') }}">Formations</a>
<a class="or-nav-link {{ request()->routeIs('gallery.*')?'or-nav-active':'' }}" href="{{ route('gallery.index') }}">Galerie</a>
<a class="or-nav-link {{ request()->routeIs('contact')?'or-nav-active':'' }}" href="{{ route('contact') }}">Contact</a>
</nav>
<div class="hidden items-center gap-2 lg:flex">
<div class="relative" @click.outside="account=false">
@auth
  @if(auth()->user()->isCandidate())
    <button @click="account=!account" class="or-account-btn"><span class="or-user-dot">{{ strtoupper(substr(auth()->user()->name,0,1)) }}</span><span class="hidden xl:inline">{{ \Illuminate\Support\Str::limit(auth()->user()->name,14) }}</span><span class="text-[10px]">⌄</span></button>
    <div x-show="account" x-transition class="or-account-menu"><a href="{{ route('candidate.dashboard') }}"><strong>Mon espace</strong><span>Candidatures & messages</span></a><a href="{{ route('profile.edit') }}"><strong>Mon profil</strong><span>Informations du compte</span></a><form method="POST" action="{{ route('logout') }}">@csrf<button><strong>Se déconnecter</strong></button></form></div>
  @else
    <a href="{{ route('admin.dashboard') }}" class="or-account-btn"><span class="or-user-dot">A</span><span>Administration</span></a>
  @endif
@else
  <button @click="account=!account" class="or-account-btn"><span class="or-user-dot">↗</span><span>Connexion</span><span class="text-[10px]">⌄</span></button>
  <div x-show="account" x-transition class="or-account-menu"><a href="{{ route('login') }}"><strong>Se connecter</strong><span>Accéder à mon espace candidat</span></a><a href="{{ route('login',['mode'=>'register']) }}"><strong>Créer mon compte</strong><span>S’inscrire en quelques secondes</span></a></div>
@endauth
</div>
<a href="{{ route('apply') }}" class="or-cv-btn">Déposer mon CV <span>↗</span></a>
</div>
<button @click="open=!open" class="rounded-xl border border-slate-200 p-2.5 lg:hidden" aria-label="Menu"><span x-show="!open">☰</span><span x-show="open">✕</span></button>
</div>
<div x-show="open" x-transition class="border-t border-slate-100 py-4 lg:hidden">
<div class="grid gap-1 pb-2">
<a class="or-mobile-link" href="{{ route('home') }}">Accueil</a>
<a class="or-mobile-link" href="{{ route('about') }}">À propos</a>
<a class="or-mobile-link" href="{{ route('services') }}">Expertises</a>
<a class="or-mobile-link" href="{{ route('jobs') }}">Carrières</a>
<a class="or-mobile-link" href="{{ route('trainings.index') }}">Formations</a>
<a class="or-mobile-link" href="{{ route('gallery.index') }}">Galerie</a>
<a class="or-mobile-link" href="{{ route('contact') }}">Contact</a>
</div>
<div class="mt-3 grid gap-2 border-t border-slate-100 pt-3">
@auth
  @if(auth()->user()->isCandidate())
    <a class="or-mobile-account" href="{{ route('candidate.dashboard') }}">Mon espace</a>
  @else
    <a class="or-mobile-account" href="{{ route('admin.dashboard') }}">Administration</a>
  @endif
@else
  <a class="or-mobile-account" href="{{ route('login') }}">Connexion / Créer un compte</a>
@endauth
<a class="or-cv-btn justify-center" href="{{ route('apply') }}">Déposer mon CV <span>↗</span></a>
</div>
</div>
</div>
</header>
<div class="or-header-spacer"></div>
