@extends('layouts.admin')
@section('title','Médiathèque — OROGNA')
@section('content')
<div class="mx-auto max-w-7xl p-5 lg:p-10">
  <div class="flex flex-col justify-between gap-5 md:flex-row md:items-end">
    <div><div class="text-xs font-black uppercase tracking-[.2em] text-orange-500">Bibliothèque visuelle</div><h1 class="font-display mt-2 text-4xl font-extrabold">Médiathèque</h1><p class="mt-2 max-w-2xl text-slate-500">Centralisez les photos du site. Importez une ou plusieurs images, puis copiez leur chemin quand vous en avez besoin.</p></div>
    <a href="{{ route('admin.home.edit') }}" class="or-btn or-btn-orange">Modifier l’accueil ↗</a>
  </div>
  <section class="mt-8 rounded-[28px] bg-white p-6 shadow-sm ring-1 ring-slate-100">
    <form method="POST" action="{{ route('admin.media.store') }}" enctype="multipart/form-data" class="flex flex-col gap-5 lg:flex-row lg:items-end">
      @csrf <div class="flex-1"><label class="mb-2 block text-xs font-black uppercase tracking-wider text-slate-400">Ajouter des images</label><input class="field" type="file" name="files[]" multiple accept="image/jpeg,image/png,image/webp,image/gif" required><p class="mt-2 text-xs text-slate-400">JPG, PNG, WebP ou GIF · 12 Mo maximum par image.</p></div>
      <button class="or-btn or-btn-orange">Importer les images ↗</button>
    </form>
  </section>
  <section class="mt-8"><div class="mb-4 flex items-center justify-between"><h2 class="font-display text-2xl font-extrabold">Vos images <span class="text-slate-300">({{ $files->count() }})</span></h2></div>
    @if($files->count())
    <div class="grid gap-5 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
      @foreach($files as $file)
      @php($name=basename($file))
      <article class="group overflow-hidden rounded-[26px] bg-white shadow-sm ring-1 ring-slate-100">
        <div class="aspect-[4/3] overflow-hidden bg-slate-100"><img src="{{ asset('uploads/media/'.$name) }}" class="h-full w-full object-cover transition duration-500 group-hover:scale-105" alt="{{ $name }}"></div>
        <div class="p-4"><div class="truncate text-sm font-bold" title="{{ $name }}">{{ $name }}</div><div class="mt-3 flex gap-2"><button type="button" class="copy-media flex-1 rounded-full bg-green-50 px-3 py-2 text-xs font-black text-green-700" data-url="{{ asset('uploads/media/'.$name) }}">Copier le lien</button><form method="POST" action="{{ route('admin.media.delete',$name) }}" onsubmit="return confirm('Supprimer cette image ?')">@csrf @method('DELETE')<button class="rounded-full bg-red-50 px-3 py-2 text-xs font-black text-red-700">Supprimer</button></form></div></div>
      </article>
      @endforeach
    </div>
    @else
      <div class="rounded-[28px] bg-white p-14 text-center shadow-sm ring-1 ring-slate-100"><div class="text-5xl">▧</div><h2 class="mt-4 font-display text-xl font-extrabold">Votre médiathèque est vide</h2><p class="mt-2 text-sm text-slate-400">Importez vos premières photos ci-dessus.</p></div>
    @endif
  </section>
</div>
<script>document.querySelectorAll('.copy-media').forEach(b=>b.addEventListener('click',async()=>{try{await navigator.clipboard.writeText(b.dataset.url);const t=b.textContent;b.textContent='Lien copié ✓';setTimeout(()=>b.textContent=t,1400)}catch(e){window.prompt('Copiez ce lien :',b.dataset.url)}}));</script>
@endsection
