@extends('layouts.admin')
@section('title','Messages — Administration')
@section('content')
<div class="admin-page">
<div class="flex flex-col justify-between gap-4 sm:flex-row sm:items-end">
<div>
<div class="admin-eyebrow">Relation client</div>
<h1 class="font-display mt-1 text-3xl font-extrabold">Boîte de réception</h1>
<p class="mt-1 text-sm text-slate-500">Lisez, répondez et gardez l’historique de chaque demande reçue.</p>
</div>
<div class="rounded-full bg-white px-4 py-2 text-xs font-black shadow-sm ring-1 ring-slate-200">{{ $items->total() }} message(s)</div>
</div>

<div class="mt-6 rounded-2xl bg-white p-4 shadow-sm ring-1 ring-slate-200">
<form method="GET" action="{{ route('admin.messages') }}" class="flex flex-wrap items-center gap-3">
<div class="flex-1 min-w-[220px]">
<input type="text" name="q" value="{{ $q ?? '' }}" placeholder="Rechercher par nom, email ou contenu..." class="w-full rounded-xl border border-slate-200 px-3 py-2 text-xs outline-none focus:border-green-600">
</div>
<div class="min-w-[160px]">
<select name="status" class="w-full rounded-xl border border-slate-200 px-3 py-2 text-xs outline-none focus:border-green-600">
<option value="">Tous les messages</option>
<option value="unread" {{ ($status ?? '')==='unread'?'selected':'' }}>Non lus</option>
<option value="read" {{ ($status ?? '')==='read'?'selected':'' }}>Déjà lus / Répondus</option>
</select>
</div>
<button type="submit" class="admin-btn admin-btn-dark">Filtrer</button>
@if(($q ?? '') || ($status ?? ''))
<a href="{{ route('admin.messages') }}" class="text-xs text-slate-500 hover:text-slate-800">Réinitialiser</a>
@endif
</form>
</div>

<div class="mt-6 space-y-5">
@forelse($items as $m)
<article x-data="{replyOpen:false}" class="overflow-hidden rounded-[28px] bg-white shadow-sm ring-1 ring-slate-100">
<div class="p-6 lg:p-7 {{ !$m->is_read?'border-l-4 border-orange-400 bg-orange-50/20':'' }}">
<div class="flex flex-col justify-between gap-5 lg:flex-row">
<div>
<div class="flex flex-wrap items-center gap-3">
<h2 class="font-display text-xl font-extrabold">{{ $m->name }}</h2>
@if(!$m->is_read)<span class="rounded-full bg-orange-100 px-2.5 py-1 text-[10px] font-black text-orange-700">NOUVEAU</span>@endif
@if($m->replied_at)<span class="rounded-full bg-green-100 px-2.5 py-1 text-[10px] font-black text-green-700">RÉPONDU</span>@endif
</div>
<div class="mt-2 text-sm text-slate-400">
<a class="font-semibold hover:text-green-700" href="mailto:{{ $m->email }}">{{ $m->email }}</a>
@if($m->phone) · {{ $m->phone }} @endif · {{ $m->created_at->format('d/m/Y à H:i') }}
</div>
</div>
<div class="flex flex-wrap gap-2">
@if(!$m->is_read)
<form method="POST" action="{{ route('admin.messages.read',$m) }}">@csrf @method('PATCH')
<button class="rounded-full bg-slate-100 px-4 py-2 text-xs font-black">Marquer lu</button>
</form>
@endif
<button @click="replyOpen=!replyOpen" class="rounded-full bg-[#103326] px-4 py-2 text-xs font-black text-white">Répondre ↗</button>
</div>
</div>
<div class="mt-6 rounded-2xl bg-slate-50 p-5">
<div class="text-xs font-black uppercase tracking-wider text-slate-400">{{ $m->subject ?: 'Demande sans objet' }}</div>
<p class="mt-3 whitespace-pre-line text-sm leading-7 text-slate-700">{{ $m->message }}</p>
</div>
@if($m->reply)
<div class="mt-4 rounded-2xl border border-green-100 bg-green-50 p-5">
<div class="flex items-center justify-between gap-3">
<span class="text-xs font-black uppercase tracking-wider text-green-700">Votre dernière réponse</span>
<span class="text-xs text-green-700/60">{{ $m->replied_at?->format('d/m/Y à H:i') }}</span>
</div>
<p class="mt-3 whitespace-pre-line text-sm leading-7 text-green-900">{{ $m->reply }}</p>
</div>
@endif
</div>
<div x-show="replyOpen" class="border-t border-slate-100 bg-[#f7faf6] p-6 lg:p-7">
<form method="POST" action="{{ route('admin.messages.reply',$m) }}">@csrf
<div class="flex flex-col gap-4 lg:flex-row lg:items-end">
<div class="flex-1">
<label class="mb-2 block text-xs font-black uppercase tracking-wider text-slate-400">Votre réponse à {{ $m->email }}</label>
<textarea class="w-full rounded-2xl border border-slate-200 p-4 text-xs outline-none focus:border-green-600" name="reply" rows="5" required placeholder="Bonjour {{ $m->name }},&#10;&#10;Merci pour votre message...">{{ old('reply') }}</textarea>
</div>
<button class="admin-btn admin-btn-orange shrink-0">Envoyer la réponse ↗</button>
</div>
<p class="mt-3 text-xs text-slate-400">La réponse est envoyée par email et enregistrée dans l’historique du message.</p>
</form>
</div>
</article>
@empty
<div class="rounded-3xl bg-white p-16 text-center shadow-sm">
<div class="text-4xl">✉</div>
<h2 class="mt-4 font-display text-xl font-extrabold">Aucun message trouvé</h2>
<p class="mt-2 text-sm text-slate-400">Essayez de modifier vos termes de recherche ou vos filtres.</p>
</div>
@endforelse
</div>
<div class="mt-6">{{ $items->links() }}</div>
</div>
@endsection
