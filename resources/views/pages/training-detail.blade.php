@extends('layouts.app')
@section('title',$training->title.' — OROGNA Consulting')
@section('meta_description',$training->excerpt ?: Str::limit(strip_tags($training->description), 160))
@section('content')
<section class="hero-grid py-24 text-white">
  <div class="container-pro">
    <span class="eyebrow text-orange-300">Formation</span>
    <h1 class="font-display mt-5 max-w-4xl text-5xl font-extrabold sm:text-6xl">{{ $training->title }}</h1>
    <div class="mt-7 flex flex-wrap gap-3">
      <span class="rounded-full bg-white/10 px-4 py-2">{{ $training->duration }}</span>
      <span class="rounded-full bg-white/10 px-4 py-2">{{ $training->location }}</span>
      <span class="rounded-full bg-white/10 px-4 py-2">{{ $training->price ?: 'Sur devis' }}</span>
    </div>
  </div>
</section>

<section class="bg-white py-20">
  <div class="container-pro grid gap-12 lg:grid-cols-[1fr_360px]">
    <article>
      <h2 class="font-display text-3xl font-extrabold">Le programme</h2>
      <p class="mt-6 whitespace-pre-line text-lg leading-9 text-slate-600">{{ $training->description }}</p>
    </article>
    <aside class="h-fit rounded-[30px] bg-[#f4f7f2] p-7">
      <div class="text-xs font-black uppercase tracking-wider text-orange-500">Vous souhaitez cette formation ?</div>
      <h2 class="mt-3 text-2xl font-extrabold">Parlons de votre besoin.</h2>
      <a class="btn-secondary mt-7 w-full justify-center" href="{{ route('contact') }}">Demander un devis ↗</a>
    </aside>
  </div>
</section>

<script type="application/ld+json">
{
  "@@context": "https://schema.org",
  "@@type": "Course",
  "name": "{{ e($training->title) }}",
  "description": "{{ e($training->excerpt ?: $training->description) }}",
  "provider": {
    "@@type": "Organization",
    "name": "OROGNA Consulting",
    "sameAs": "{{ url('/') }}"
  }
}
</script>
@endsection
