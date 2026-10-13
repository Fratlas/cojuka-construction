@extends('gestion.group-layout')
@section('title', 'Utilisateurs et accès')
@section('content')
<div class="mb-4">
 <p class="text-uppercase text-secondary small fw-bold mb-1">Administration / Sécurité</p>
 <h1 class="h2 fw-bold">Utilisateurs et accès</h1>
 <p class="text-secondary">Les nouveaux comptes ne reçoivent pas automatiquement les droits d'administration.</p>
</div>
<div class="card p-3 p-md-4">
 <div class="table-responsive">
  <table class="table table-hover align-middle">
   <thead><tr><th>Utilisateur</th><th>Adresse e-mail</th><th>Autorisation</th><th class="text-end">Action</th></tr></thead>
   <tbody>
    @forelse($users as $user)
     <tr>
      <td class="fw-bold">{{ $user->name }}</td>
      <td>{{ $user->email }}</td>
      <td><span class="badge {{ $user->is_group_admin ? 'bg-success' : 'bg-secondary' }}">{{ $user->is_group_admin ? 'Administrateur' : 'En attente' }}</span></td>
      <td class="text-end">
       <form method="post" action="{{ route('gestion.users.update', $user) }}" onsubmit="return confirm('Confirmer la modification des droits de ce compte ?')">
        @csrf
        @method('PATCH')
        <input type="hidden" name="is_group_admin" value="{{ $user->is_group_admin ? 0 : 1 }}">
        <button type="submit" class="btn btn-sm {{ $user->is_group_admin ? 'btn-outline-danger' : 'btn-outline-success' }}" @disabled($user->is(auth()->user()))>
         {{ $user->is_group_admin ? 'Retirer les droits' : 'Autoriser' }}
        </button>
       </form>
      </td>
     </tr>
    @empty
     <tr><td colspan="4" class="text-center text-secondary py-5">Aucun utilisateur enregistré.</td></tr>
    @endforelse
   </tbody>
  </table>
 </div>
 <div class="mt-3">{{ $users->links() }}</div>
</div>
@endsection