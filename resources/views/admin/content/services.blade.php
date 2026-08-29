@extends('layouts.admin')
@section('title','Expertises — Administration')
@section('header_title','Gestion des expertises')
@section('content')
<div class="admin-page">
  <div class="admin-page-head">
    <div><div class="admin-eyebrow">Catalogue</div><h1>Expertises</h1><p>Gérez les 20 domaines affichés sur le site : texte, image, ordre et publication.</p></div>
    <a href="{{ route('services') }}" target="_blank" class="admin-btn admin-btn-dark">Voir la page publique ↗</a>
  </div>

  @if($errors->any())
    <div class="mb-5 rounded-2xl border border-red-100 bg-red-50 p-4 text-sm font-bold text-red-700">
      <div class="mb-1">Impossible d'enregistrer les modifications.</div>
      <ul class="list-disc pl-5 font-medium">@foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
    </div>
  @endif

  <div class="admin-grid-2">
    <section class="admin-card admin-card-dark">
      <div class="admin-card-kicker">Nouvelle fiche</div>
      <h2 class="mt-2 text-2xl font-extrabold">Ajouter une expertise</h2>
      <p class="admin-muted-dark mt-2">Ajoutez le texte puis choisissez directement une image depuis votre ordinateur.</p>
      <form method="POST" enctype="multipart/form-data" action="{{ route('admin.services.store') }}" class="admin-form mt-6">
        @csrf
        <div class="admin-field"><label>Nom de l'expertise</label><input name="title" required placeholder="Ex. Études et recherches"></div>
        <div class="admin-field"><label>Résumé</label><textarea name="short_description" rows="3" required></textarea></div>
        <div class="admin-field"><label>Description complète</label><textarea name="description" rows="5"></textarea></div>
        <div class="admin-field"><label>Image</label><input type="file" name="image_upload" accept="image/jpeg,image/png,image/webp" onchange="previewFile(this,'new-preview')"><small>JPG, PNG ou WebP · 12 Mo maximum.</small><div id="new-preview" class="mt-3 hidden overflow-hidden rounded-xl border border-white/10"><img class="h-40 w-full object-cover" alt="Aperçu"></div></div>
        <div class="admin-form-grid"><div class="admin-field"><label>Style</label><select name="accent"><option value="green">Vert</option><option value="orange">Orange</option></select></div><div class="admin-field"><label>Ordre</label><input name="sort_order" type="number" value="1" min="0"></div></div>
        <label class="admin-check"><input type="checkbox" name="is_active" value="1" checked> Publier immédiatement</label>
        <button class="admin-btn admin-btn-orange w-full">Ajouter l'expertise</button>
      </form>
    </section>

    <section class="space-y-4">
      <div class="admin-card flex items-center justify-between gap-4">
        <div><div class="admin-card-kicker">Contenu existant</div><h2 class="mt-1 text-xl font-extrabold">{{ $items->count() }} expertise(s)</h2><p class="mt-1 text-xs text-slate-500">Cliquez sur une fiche pour la modifier.</p></div>
        <div class="rounded-2xl bg-green-50 px-4 py-3 text-center"><div class="text-xl font-black text-green-800">{{ $items->where('is_active',true)->count() }}</div><div class="text-[9px] font-black uppercase tracking-wider text-green-700">publiées</div></div>
      </div>

      @foreach($items as $i=>$service)
      <details class="group rounded-3xl border border-slate-200 bg-white shadow-sm" @if(request('edit') == $service->id) open @endif>
        <summary class="flex cursor-pointer list-none items-center gap-4 p-5">
          <div class="h-16 w-20 shrink-0 overflow-hidden rounded-2xl bg-slate-100">
            @if($service->image)<img src="{{ asset($service->image) }}" class="h-full w-full object-cover" alt="">@else<div class="flex h-full items-center justify-center text-[10px] font-bold text-slate-400">Aucune image</div>@endif
          </div>
          <div class="min-w-0 flex-1"><div class="text-[9px] font-black uppercase tracking-wider text-slate-400">{{ str_pad($i+1,2,'0',STR_PAD_LEFT) }} · ordre {{ $service->sort_order }}</div><div class="truncate text-base font-extrabold text-slate-900">{{ $service->title }}</div><div class="mt-1 truncate text-xs text-slate-500">{{ $service->short_description }}</div></div>
          <span class="rounded-full px-3 py-1 text-[9px] font-black {{ $service->is_active ? 'bg-green-50 text-green-700' : 'bg-slate-100 text-slate-500' }}">{{ $service->is_active ? 'PUBLIÉE' : 'MASQUÉE' }}</span>
          <span class="text-slate-300 transition group-open:rotate-180">⌄</span>
        </summary>
        <div class="border-t border-slate-100 p-5 lg:p-6">
          <form method="POST" enctype="multipart/form-data" action="{{ route('admin.services.update',$service) }}" class="admin-form">
            @csrf @method('PUT')
            <div class="admin-form-grid"><div class="admin-field"><label>Nom</label><input name="title" value="{{ $service->title }}" required></div><div class="admin-field"><label>Ordre</label><input name="sort_order" type="number" min="0" value="{{ $service->sort_order }}" required></div></div>
            <div class="admin-field"><label>Résumé</label><textarea name="short_description" rows="3" required>{{ $service->short_description }}</textarea></div>
            <div class="admin-field"><label>Description complète</label><textarea name="description" rows="5">{{ $service->description }}</textarea></div>
            <div class="rounded-2xl border border-slate-200 bg-slate-50 p-4">
              <div class="grid gap-5 lg:grid-cols-[180px_1fr] lg:items-center">
                <div class="overflow-hidden rounded-2xl bg-white shadow-sm">
                  @if($service->image)<img src="{{ asset($service->image) }}" id="preview-{{ $service->id }}" class="h-32 w-full object-cover" alt="{{ $service->title }}">@else<div id="preview-{{ $service->id }}" class="flex h-32 items-center justify-center text-xs text-slate-400">Aucune image</div>@endif
                </div>
                <div class="admin-field"><label>Remplacer l'image</label><input type="file" name="image_upload" accept="image/jpeg,image/png,image/webp" onchange="previewFile(this,'preview-{{ $service->id }}')"><small>Le fichier sélectionné sera enregistré et utilisé automatiquement sur le site. Pas besoin de modifier le code.</small><div class="mt-2 rounded-xl bg-white px-3 py-2 text-[10px] text-slate-500">Image actuelle : <strong>{{ $service->image ?: 'aucune' }}</strong></div></div>
              </div>
            </div>
            <div class="admin-form-grid"><div class="admin-field"><label>Accent</label><select name="accent"><option value="green" @selected($service->accent==='green')>Vert</option><option value="orange" @selected($service->accent==='orange')>Orange</option></select></div><div></div></div>
            <div class="flex flex-wrap items-center gap-3"><label class="admin-check"><input type="checkbox" name="is_active" value="1" @checked($service->is_active)> Afficher sur le site</label><button class="admin-btn admin-btn-green ml-auto">Enregistrer les modifications</button></div>
          </form>
          <div class="mt-4 border-t border-slate-100 pt-4"><form method="POST" action="{{ route('admin.services.delete',$service) }}" onsubmit="return confirm('Supprimer cette expertise ?')">@csrf @method('DELETE')<button class="admin-danger">Supprimer cette expertise</button></form></div>
        </div>
      </details>
      @endforeach
    </section>
  </div>
</div>
<script>
function previewFile(input,id){const box=document.getElementById(id);if(!input.files||!input.files[0])return;const url=URL.createObjectURL(input.files[0]);if(box.tagName==='IMG'){box.src=url;}else{box.innerHTML='<img class="h-32 w-full object-cover" alt="Aperçu">';box=box.querySelector('img');box.src=url;}box.parentElement?.classList?.remove('hidden');}
</script>
@endsection
