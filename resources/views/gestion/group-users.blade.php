@extends('gestion.group-layout')
@section('title', 'Utilisateurs et accès')
@section('content')
<div class="mb-4"><p class="text-uppercase text-secondary small fw-bold mb-1">Administration / Sécurité</p><h1 class="h2 fw-bold">Utilisateurs et accès</h1><p class="text-secondary">Affectez chaque collaborateur à son département et aux seules entités qu'il peut gérer. Les nouveaux comptes restent sans autorisation par défaut.</p></div>
@if(!$accessReady)
<div class="alert alert-warning"><strong>Configuration requise :</strong> exécutez le SQL de contrôle d'accès dans la base COJUKA avant de modifier les affectations.</div>
@endif
<div class="card p-3 p-md-4"><div class="table-responsive"><table class="table table-hover align-middle">
<thead><tr><th>Collaborateur</th><th>Statut</th><th style="min-width:300px">Département et filiales autorisées</th><th class="text-end">Enregistrer</th></tr></thead>
<tbody>
@forelse($users as $user)
<tr>
<td><div class="fw-bold">{{ $user->name }}</div><div class="small text-secondary">{{ $user->email }}</div></td>
<td><span class="badge {{ $user->is_group_admin ? 'bg-danger' : ($user->group_department_id ? 'bg-success' : 'bg-secondary') }}">{{ $user->is_group_admin ? 'Super administrateur' : ($user->group_department_id ? 'Département affecté' : 'Sans accès') }}</span></td>
<td colspan="2">
<form method="POST" action="{{ route('gestion.users.update',$user) }}" onsubmit="return confirm('Confirmer ces permissions pour cet utilisateur ?')">
@csrf @method('PATCH')
<div class="row g-2 align-items-end">
<div class="col-lg-3"><label class="form-label" for="admin-{{ $user->id }}">Accès général</label><select class="form-select" name="is_group_admin" id="admin-{{ $user->id }}" @disabled(!$accessReady || $user->is(auth()->user()))><option value="0" @selected(!$user->is_group_admin)>Utilisateur limité</option><option value="1" @selected($user->is_group_admin)>Super administrateur</option></select>@if($user->is(auth()->user()))<input type="hidden" name="is_group_admin" value="1">@endif</div>
<div class="col-lg-4"><label class="form-label" for="dept-{{ $user->id }}">Département</label><select class="form-select" name="group_department_id" id="dept-{{ $user->id }}" @disabled(!$accessReady)><option value="">Aucun département</option>@foreach($departments as $department)<option value="{{ $department->id }}" @selected($user->group_department_id == $department->id)>{{ $department->name }}</option>@endforeach</select></div>
<div class="col-lg-3"><label class="form-label" for="entities-{{ $user->id }}">Filiales autorisées</label><select class="form-select" name="entities[]" id="entities-{{ $user->id }}" multiple size="3" @disabled(!$accessReady)>@foreach($entities as $entity)<option value="{{ $entity->id }}" @selected(in_array($entity->id,$assigned[$user->id]??[]))>{{ $entity->name }}</option>@endforeach</select><small class="text-secondary">Ctrl/Cmd pour plusieurs.</small></div>
<div class="col-lg-2"><button class="btn btn-dark w-100" type="submit" @disabled(!$accessReady)>Enregistrer</button></div>
</div>
</form>
</td>
</tr>
@empty<tr><td colspan="4" class="text-center text-secondary py-5">Aucun utilisateur enregistré.</td></tr>@endforelse
</tbody></table></div><div class="mt-3">{{ $users->links() }}</div></div>
@endsection