@extends('layouts.admin')
@section('title','Comptes & connexions — OROGNA')
@section('content')
<div class="admin-page">
 <div class="rounded-[30px] bg-[#103326] p-7 text-white shadow-xl lg:p-9">
  <div class="flex flex-col justify-between gap-5 md:flex-row md:items-end">
   <div>
    <div class="text-xs font-black uppercase tracking-[.2em] text-orange-300">Administration des accès</div>
    <h1 class="font-display mt-2 text-3xl font-extrabold">Comptes & connexions</h1>
    <p class="mt-2 max-w-2xl text-white/60">Consultez les comptes créés sur le site et activez ou désactivez leur accès sans toucher au code.</p>
   </div>
   <div class="rounded-2xl bg-white/10 px-5 py-4">
    <div class="text-xs uppercase tracking-widest text-white/45">Comptes</div>
    <strong class="mt-1 block text-3xl">{{ $users->total() }}</strong>
   </div>
  </div>
 </div>

 <form class="mt-6 flex flex-wrap items-center gap-3 rounded-2xl bg-white p-4 shadow-sm ring-1 ring-slate-200" method="GET">
  <div class="flex-1 min-w-[220px]">
   <input class="w-full rounded-xl border border-slate-200 px-3 py-2 text-xs outline-none focus:border-green-600" name="q" value="{{ $q ?? '' }}" placeholder="Rechercher par nom ou email…">
  </div>
  <div class="min-w-[160px]">
   <select class="w-full rounded-xl border border-slate-200 px-3 py-2 text-xs outline-none focus:border-green-600" name="role">
    <option value="">Tous les rôles</option>
    <option value="admin" @selected(($role ?? '')==='admin')>Administrateur</option>
    <option value="recruteur" @selected(($role ?? '')==='recruteur')>Recruteur</option>
    <option value="candidat" @selected(($role ?? '')==='candidat')>Candidat</option>
   </select>
  </div>
  <button class="admin-btn admin-btn-dark">Filtrer</button>
  @if(($q ?? '') || ($role ?? ''))
   <a href="{{ route('admin.users') }}" class="text-xs text-slate-500 hover:text-slate-800">Réinitialiser</a>
  @endif
 </form>

 <div class="mt-6 overflow-hidden rounded-[28px] bg-white shadow-sm ring-1 ring-slate-100">
  <div class="overflow-x-auto">
   <table class="w-full min-w-[760px] text-left">
    <thead class="bg-slate-50 text-xs uppercase tracking-widest text-slate-400">
     <tr>
      <th class="px-6 py-4">Utilisateur</th>
      <th class="px-6 py-4">Type</th>
      <th class="px-6 py-4">Créé le</th>
      <th class="px-6 py-4">Accès</th>
      <th class="px-6 py-4 text-right">Action</th>
     </tr>
    </thead>
    <tbody class="divide-y divide-slate-100">
     @forelse($users as $user)
     <tr class="hover:bg-slate-50/70">
      <td class="px-6 py-5">
       <div class="flex items-center gap-3">
        <div class="grid h-11 w-11 place-items-center rounded-2xl bg-green-50 font-black text-green-800">{{ strtoupper(substr($user->name,0,1)) }}</div>
        <div>
         <div class="font-extrabold">{{ $user->name }}</div>
         <div class="text-sm text-slate-500">{{ $user->email }}</div>
        </div>
       </div>
      </td>
      <td class="px-6 py-5">
       <span class="rounded-full bg-slate-100 px-3 py-1 text-xs font-black uppercase text-slate-700">{{ $user->isAdmin() ? 'Administrateur' : ($user->isRecruiter() ? 'Recruteur' : 'Candidat') }}</span>
      </td>
      <td class="px-6 py-5 text-sm text-slate-500">{{ $user->created_at?->format('d/m/Y') }}</td>
      <td class="px-6 py-5">
       @if($user->is_active)
        <span class="rounded-full bg-green-50 px-3 py-1 text-xs font-black text-green-700">Actif</span>
       @else
        <span class="rounded-full bg-red-50 px-3 py-1 text-xs font-black text-red-700">Désactivé</span>
       @endif
      </td>
      <td class="px-6 py-5 text-right">
       @if($user->id===auth()->id())
        <span class="text-xs font-bold text-slate-400">Votre compte</span>
       @else
        <form method="POST" action="{{ route('admin.users.toggle',$user) }}">
         @csrf @method('PATCH')
         <button class="rounded-full px-4 py-2 text-xs font-black {{ $user->is_active?'bg-red-50 text-red-700 hover:bg-red-100':'bg-green-50 text-green-700 hover:bg-green-100' }}">{{ $user->is_active ? 'Désactiver' : 'Réactiver' }}</button>
        </form>
       @endif
      </td>
     </tr>
     @empty
     <tr>
      <td colspan="5" class="px-6 py-12 text-center text-sm text-slate-500">Aucun compte trouvé.</td>
     </tr>
     @endforelse
    </tbody>
   </table>
  </div>
  <div class="border-t border-slate-100 px-6 py-4">{{ $users->links() }}</div>
 </div>
 <div class="mt-6 rounded-3xl bg-orange-50 p-6 text-sm leading-7 text-orange-900"><strong>À retenir :</strong> les visiteurs créent leur compte directement depuis le bouton <strong>Connexion</strong> du site. Le tableau de bord permet ensuite de contrôler les accès. Les candidatures et les conversations restent associées au compte du candidat.</div>
</div>
@endsection
