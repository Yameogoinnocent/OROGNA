@extends('layouts.admin')
@section('title','Candidatures — Administration')
@section('content')
<div class="admin-page">
  <div class="flex flex-col justify-between gap-5 md:flex-row md:items-end">
    <div>
      <div class="admin-eyebrow">Recrutement</div>
      <h1 class="font-display mt-1 text-3xl font-extrabold">Candidatures</h1>
      <p class="mt-1 text-sm text-slate-500">Recherchez, classez et suivez chaque candidat depuis son arrivée jusqu’à la décision finale.</p>
    </div>
    <div class="rounded-full bg-white px-4 py-2 text-xs font-black shadow-sm ring-1 ring-slate-200">{{ $items->total() }} dossier(s)</div>
  </div>

  <form class="mt-6 flex flex-wrap items-center gap-3 rounded-2xl bg-white p-4 shadow-sm ring-1 ring-slate-200" method="GET">
    <div class="flex-1 min-w-[220px]">
      <input class="w-full rounded-xl border border-slate-200 px-3 py-2 text-xs outline-none focus:border-green-600" name="q" value="{{ $q }}" placeholder="Rechercher un nom, email ou téléphone…">
    </div>
    <div class="min-w-[160px]">
      <select class="w-full rounded-xl border border-slate-200 px-3 py-2 text-xs outline-none focus:border-green-600" name="status">
        <option value="">Tous les statuts</option>
        @foreach(['nouvelle'=>'Nouvelle','en_etude'=>'En étude','entretien'=>'Entretien','retenue'=>'Retenue','rejetee'=>'Rejetée'] as $k=>$v)
          <option value="{{ $k }}" @selected($status===$k)>{{ $v }}</option>
        @endforeach
      </select>
    </div>
    <button class="admin-btn admin-btn-dark">Filtrer</button>
    @if($q || $status)
      <a href="{{ route('admin.applications') }}" class="text-xs text-slate-500 hover:text-slate-800">Réinitialiser</a>
    @endif
  </form>

  <div class="mt-6 space-y-4">
    @forelse($items as $a)
    <article class="overflow-hidden rounded-[28px] bg-white shadow-sm ring-1 ring-slate-100">
      <div class="p-6 lg:p-7">
        <div class="flex flex-col justify-between gap-5 lg:flex-row">
          <div class="min-w-0">
            <div class="flex flex-wrap items-center gap-3">
              <h2 class="font-display text-xl font-extrabold">{{ $a->candidate_name }}</h2>
              <span class="rounded-full bg-slate-100 px-3 py-1 text-[10px] font-black uppercase text-slate-700">{{ str_replace('_',' ',$a->status) }}</span>
            </div>
            <div class="mt-2 text-sm text-slate-400">
              <a href="mailto:{{ $a->candidate_email }}" class="font-semibold hover:text-green-700">{{ $a->candidate_email }}</a>
              @if($a->phone) · {{ $a->phone }} @endif
              @if($a->city) · {{ $a->city }} @endif
            </div>
            <div class="mt-3 text-sm font-bold text-slate-700">{{ $a->jobOffer?->title ?? 'Candidature spontanée' }}</div>
            <div class="mt-1 text-xs text-slate-400">Reçue le {{ optional($a->submitted_at)->format('d/m/Y à H:i') }}</div>
          </div>
          <div class="flex flex-wrap gap-2">
            @if($a->cv_path)
              <a class="rounded-full bg-green-50 px-4 py-2 text-xs font-black text-green-700 hover:bg-green-100" href="{{ route('admin.applications.download',[$a,'cv']) }}">Télécharger CV</a>
            @endif
            @if($a->cover_letter_path)
              <a class="rounded-full bg-orange-50 px-4 py-2 text-xs font-black text-orange-700 hover:bg-orange-100" href="{{ route('admin.applications.download',[$a,'letter']) }}">Lettre</a>
            @endif
          </div>
        </div>

        <div class="mt-6 grid gap-5 lg:grid-cols-[260px_1fr]">
          <form method="POST" action="{{ route('admin.applications.status',$a) }}" class="rounded-2xl bg-slate-50 p-4">
            @csrf @method('PATCH')
            <label class="mb-2 block text-xs font-black uppercase tracking-wider text-slate-400">Étape du dossier</label>
            <select class="w-full rounded-xl border border-slate-200 px-3 py-2 text-xs outline-none focus:border-green-600" name="status">
              <option value="nouvelle" @selected($a->status==='nouvelle')>Nouvelle</option>
              <option value="en_etude" @selected($a->status==='en_etude')>En étude</option>
              <option value="entretien" @selected($a->status==='entretien')>Entretien</option>
              <option value="retenue" @selected($a->status==='retenue')>Retenue</option>
              <option value="rejetee" @selected($a->status==='rejetee')>Rejetée</option>
            </select>
            <label class="mt-4 mb-2 block text-xs font-black uppercase tracking-wider text-slate-400">Notes internes</label>
            <textarea class="w-full rounded-xl border border-slate-200 p-3 text-xs outline-none focus:border-green-600" name="admin_notes" rows="4" placeholder="Ex. entretien le 18/09, profil à rappeler…">{{ $a->admin_notes }}</textarea>
            <button class="mt-3 w-full rounded-full bg-[#103326] px-4 py-3 text-xs font-black text-white hover:bg-[#184635]">Enregistrer le dossier</button>
          </form>

          <div class="rounded-2xl border border-slate-100 p-5">
            <div class="text-xs font-black uppercase tracking-wider text-slate-400">Message du candidat</div>
            <p class="mt-3 whitespace-pre-line text-sm leading-7 text-slate-600">{{ $a->message ?: 'Aucun message joint à cette candidature.' }}</p>
          </div>
        </div>
      </div>
    </article>
    @empty
    <div class="rounded-3xl bg-white p-16 text-center shadow-sm">
      <div class="text-4xl">◎</div>
      <h2 class="mt-4 font-display text-xl font-extrabold">Aucune candidature trouvée</h2>
      <p class="mt-2 text-sm text-slate-400">Essayez de modifier votre recherche ou vos filtres.</p>
    </div>
    @endforelse
  </div>
  <div class="mt-6">{{ $items->links() }}</div>
</div>
@endsection
