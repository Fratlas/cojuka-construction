@extends('gestion.group-layout')
@section('title', 'Utilisateurs et accès')
@section('content')
<div class="mb-4"><p class="text-uppercase text-secondary small fw-bold mb-1">Administration / Sécurité</p><h1 class="h2 fw-bold">Utilisateurs et accès</h1><p class="text-secondary">Affectez chaque collaborateur à son département et aux seules entités qu'il peut gérer. Niveaux : administration générale, responsable, collaborateur, lecture seule. Chaque niveau reste limité aux départements et filiales autorisés. Les nouveaux comptes restent sans accès par défaut.</p></div>
<div class="card p-3 p-md-4 mb-4">
 <div class="d-flex flex-wrap align-items-center justify-content-between gap-3">
  <div><h2 class="h5 fw-bold mb-1">Import / export CSV des accès</h2>
   <p class="text-secondary small mb-0">Le CSV permet de mettre à jour uniquement les comptes déjà créés (rôle, département et filiales). Aucun mot de passe n'est exporté ou modifié. Séparateur « ; » et liste des filiales séparées par « | ».</p></div>
  <a class="btn btn-outline-dark" href="{{ route('gestion.users.export') }}"><i class="bi bi-download me-1"></i>Exporter les accès CSV</a>
 </div>
 <form class="row g-2 align-items-end mt-3" method="POST" action="{{ route('gestion.users.import') }}" enctype="multipart/form-data" onsubmit="return confirm('Confirmer la mise à jour des rôles et accès des utilisateurs EXISTANTS ?')">@csrf
  <div class="col-md-8"><label class="form-label" for="usersCsv">Fichier CSV (max. 200 utilisateurs / 1 Mo)</label><input class="form-control" id="usersCsv" type="file" name="file" accept=".csv,.txt,text/csv" required></div>
  <div class="col-md-4"><button class="btn btn-dark w-100" type="submit" @disabled(!$accessReady || !\Illuminate\Support\Facades\Schema::hasColumn('users','group_role'))>Importer les accès</button></div>
 </form>
</div>
@if(!$accessReady)
<div class="alert alert-warning"><strong>Configuration requise :</strong> exécutez le SQL de contrôle d'accès dans la base COJUKA avant de modifier les affectations.</div>
@endif
<div class="card p-3 p-md-4"><div class="table-responsive"><table class="table table-hover align-middle">
<thead><tr><th>Collaborateur</th><th>Statut</th><th style="min-width:300px">Département et filiales autorisées</th><th class="text-end">Enregistrer</th></tr></thead>
<tbody>
@forelse($users as $user)
<tr>
<td><div class="fw-bold">{{ $user->name }}</div><div class="small text-secondary">{{ $user->email }}</div></td>
<td><span class="badge {{ $user->is_group_admin ? 'bg-danger' : ($user->group_department_id ? 'bg-success' : 'bg-secondary') }}">{{ $user->is_group_admin ? 'Administrateur' : ($user->group_department_id ? \App\Support\GroupAccess::ROLES[\App\Support\GroupAccess::role($user)] : 'Sans accès') }}</span></td>
<td colspan="2">
<form method="POST" action="{{ route('gestion.users.update',$user) }}" onsubmit="return confirm('Confirmer ces permissions pour cet utilisateur ?')">
@csrf @method('PATCH')
<div class="row g-2 align-items-end">
<div class="col-lg-3"><label class="form-label" for="role-{{ $user->id }}">Niveau hiérarchique</label><select class="form-select" name="group_role" id="role-{{ $user->id }}" @disabled(!$accessReady || !\Illuminate\Support\Facades\Schema::hasColumn('users','group_role') || $user->is(auth()->user()))>@foreach(\App\Support\GroupAccess::ROLES as $code=>$label)<option value="{{ $code }}" @selected(\App\Support\GroupAccess::role($user)===$code)>{{ $label }}</option>@endforeach</select>@if($user->is(auth()->user()))<input type="hidden" name="group_role" value="administrateur">@endif</div>
<div class="col-lg-4"><label class="form-label" for="dept-{{ $user->id }}">Département</label><select class="form-select" name="group_department_id" id="dept-{{ $user->id }}" @disabled(!$accessReady)><option value="">Aucun département</option>@foreach($departments as $department)<option value="{{ $department->id }}" @selected($user->group_department_id == $department->id)>{{ $department->name }}</option>@endforeach</select></div>
<div class="col-lg-3"><label class="form-label" for="entities-{{ $user->id }}">Filiales autorisées</label><select class="form-select" name="entities[]" id="entities-{{ $user->id }}" multiple size="3" @disabled(!$accessReady)>@foreach($entities as $entity)<option value="{{ $entity->id }}" @selected(in_array($entity->id,$assigned[$user->id]??[]))>{{ $entity->name }}</option>@endforeach</select><small class="text-secondary">Ctrl/Cmd pour plusieurs.</small></div>
<div class="col-lg-2"><button class="btn btn-dark w-100" type="submit" @disabled(!$accessReady || !\Illuminate\Support\Facades\Schema::hasColumn('users','group_role'))>Enregistrer</button></div>
</div>
</form>
</td>
</tr>
@empty<tr><td colspan="4" class="text-center text-secondary py-5">Aucun utilisateur enregistré.</td></tr>@endforelse
</tbody></table></div><div class="mt-3">{{ $users->links() }}</div></div>
@endsection