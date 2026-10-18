@extends('gestion.group-layout')
@section('title','Départements et permissions')
@section('content')
<div class="mb-4"><p class="text-uppercase text-secondary small fw-bold mb-1">Administration / Contrôle des accès</p><h1 class="h2 fw-bold">Départements et permissions</h1><p class="text-secondary">Chaque département n'accède qu'aux modules et aux opérations explicitement autorisés. Les super administrateurs sont exemptés de ces restrictions.</p></div>
<div class="alert alert-info border-0"><strong>Principe de moindre privilège :</strong> cochez uniquement les droits nécessaires. La suppression et l'export de données sont désactivés par défaut.</div>
<div class="card p-3 p-md-4 mb-4">
 <div class="d-flex flex-wrap gap-3 align-items-center justify-content-between mb-3">
  <div><h2 class="h5 fw-bold mb-1">Sauvegarde des permissions CSV</h2><p class="text-secondary small mb-0">Exportez et réimportez la matrice des droits des départements existants. L’import met uniquement à jour les lignes présentes.</p></div>
  <a class="btn btn-outline-dark" href="{{ route('gestion.departments.export') }}"><i class="bi bi-download me-1"></i>Exporter CSV</a>
 </div>
 <form method="post" action="{{ route('gestion.departments.import') }}" enctype="multipart/form-data" class="row g-2 align-items-end" onsubmit="return confirm('Confirmer la mise à jour des permissions départementales ?')">@csrf
  <div class="col-md-8"><label class="form-label" for="departmentsCsv">Importer CSV (maximum 1 000 lignes, 1 Mo)</label><input class="form-control" id="departmentsCsv" type="file" name="file" accept=".csv,.txt,text/csv" required></div>
  <div class="col-md-4"><button class="btn btn-dark w-100" type="submit">Importer les permissions</button></div>
 </form>
</div>
@foreach($departments as $department)
<div class="card p-3 p-md-4 mb-4">
<h2 class="h5 fw-bold mb-3">{{ $department->name }} <span class="text-secondary small fw-normal">({{ $department->code }})</span></h2>
<div class="table-responsive"><table class="table table-hover align-middle"><thead><tr><th>Module</th><th>Lire</th><th>Créer</th><th>Modifier</th><th>Supprimer</th><th>Exporter</th><th>Action</th></tr></thead><tbody>
@foreach($modules as $module)
@php($permission=$permissions[$department->id.':'.$module]??null)
<tr><td class="fw-semibold">{{ \App\Http\Controllers\GroupSuiteController::MODULES[$module]['label'] ?? ucfirst($module) }}</td>
<td colspan="6">
<form method="POST" action="{{ route('gestion.departments.update',$department->id) }}" class="d-flex flex-wrap gap-3 align-items-center">
@csrf @method('PATCH')<input type="hidden" name="module" value="{{ $module }}">
@foreach($actions as $action)
<label class="d-inline-flex align-items-center gap-2 small"><input type="hidden" name="can_{{ $action }}" value="0"><input type="checkbox" class="form-check-input m-0" name="can_{{ $action }}" value="1" @checked((bool)($permission->{'can_'.$action}??false))>{{ ['view'=>'Lire','create'=>'Créer','update'=>'Modifier','delete'=>'Supprimer','export'=>'Exporter'][$action] }}</label>
@endforeach
<button class="btn btn-sm btn-outline-dark ms-auto" type="submit">Enregistrer</button>
</form>
</td></tr>
@endforeach
</tbody></table></div></div>
@endforeach
@endsection