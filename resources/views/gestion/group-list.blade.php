@extends('gestion.group-layout')
@section('title', ucfirst($module))
@section('content')
<div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-4">
 <div>
  <p class="text-uppercase text-secondary small fw-bold mb-1">COJUKA / Référentiel du groupe</p>
  <h1 class="h2 fw-bold mb-1">{{ ucfirst($module) }}</h1>
  <p class="text-secondary mb-0">Consultez et gérez les enregistrements de votre organisation.</p>
 </div>
 <div class="d-flex gap-2 flex-wrap">@if(\App\Support\GroupAccess::can(auth()->user(),$module,'create'))<button type="button" class="btn btn-outline-dark" data-bs-toggle="modal" data-bs-target="#importModal"><i class="bi bi-cloud-arrow-up me-2"></i>Importer CSV</button>@endif
@if(\App\Support\GroupAccess::can(auth()->user(),$module,'create'))<button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#addModal"><i class="bi bi-plus-lg me-2"></i>Ajouter</button>@endif</div>
</div>
<div class="card p-3 p-md-4">
 <div class="d-flex justify-content-between align-items-center mb-3">
  <div class="fw-bold">Liste des {{ $module }}</div>
  <span class="badge bg-light text-dark">{{ $rows->total() }} enregistrement(s)</span>
 </div>
 <div class="table-responsive">
  <table class="table table-hover align-middle">
   <thead><tr><th>Nom / Titre</th><th>Informations</th><th>Statut</th><th class="text-end">Actions</th></tr></thead>
   <tbody>
    @forelse($rows as $row)
     <tr>
      <td class="fw-semibold">{{ $row->name ?? $row->title }}</td>
      <td>{{ $row->sector ?? $row->location ?? $row->kind ?? '—' }}</td>
      <td>
       <span class="badge bg-light text-dark">{{ $row->status ?? ($row->published ? 'Publié' : 'Brouillon') }}</span>
      </td>
      <td class="text-end text-nowrap">
       @if(\App\Support\GroupAccess::can(auth()->user(),$module,'update'))<button type="button" class="btn btn-sm btn-outline-dark" data-bs-toggle="modal" data-bs-target="#edit{{ $row->id }}">Modifier</button>@endif
       @if(\App\Support\GroupAccess::can(auth()->user(),$module,'delete'))<form method="post" action="{{ route('gestion.group.delete', [$module, $row->id]) }}" class="d-inline" onsubmit="return confirm('Supprimer définitivement cet enregistrement ?')">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-sm btn-outline-danger">Supprimer</button>
       </form>@endif
      </td>
     </tr>
    @empty
     <tr><td colspan="4" class="text-center text-secondary py-5"><i class="bi bi-inbox fs-2 d-block mb-2"></i>Aucune donnée enregistrée. Utilisez « Ajouter » pour commencer.</td></tr>
    @endforelse
   </tbody>
  </table>
 </div>
 <div class="mt-3">{{ $rows->links() }}</div>
</div>
@if(\App\Support\GroupAccess::can(auth()->user(),$module,'update'))
@foreach($rows as $row)
 <div class="modal fade" id="edit{{ $row->id }}" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-scrollable">
   <form method="post" action="{{ route('gestion.group.edit', [$module, $row->id]) }}" class="modal-content">
    @csrf
    @method('PUT')
    <div class="modal-header"><h5 class="modal-title">Modifier — {{ $row->name ?? $row->title }}</h5><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button></div>
    <div class="modal-body">@include('gestion.group-fields', ['item' => $row])</div>
    <div class="modal-footer"><button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Annuler</button><button type="submit" class="btn btn-dark">Enregistrer</button></div>
   </form>
  </div>
 </div>
@endforeach
@endif
@if(\App\Support\GroupAccess::can(auth()->user(),$module,'create'))
<div class="modal fade" id="addModal" tabindex="-1" aria-hidden="true">
 <div class="modal-dialog modal-lg modal-dialog-scrollable">
  <form method="post" action="{{ route('gestion.group.save', $module) }}" class="modal-content">
   @csrf
   <div class="modal-header"><h5 class="modal-title">Nouvel enregistrement — {{ ucfirst($module) }}</h5><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button></div>
   <div class="modal-body">@include('gestion.group-fields', ['item' => null])</div>
   <div class="modal-footer"><button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Annuler</button><button type="submit" class="btn btn-dark">Créer</button></div>
  </form>
 </div>
</div>
@endif
@if(\App\Support\GroupAccess::can(auth()->user(),$module,'create'))
<div class="modal fade" id="importModal" tabindex="-1" aria-hidden="true">
 <div class="modal-dialog modal-dialog-centered">
  <form method="post" enctype="multipart/form-data" action="{{ route('gestion.import.store', $module) }}" class="modal-content">
   @csrf
   <div class="modal-header border-0 pb-0"><h5 class="modal-title fw-bold"><i class="bi bi-cloud-arrow-up me-2"></i>Importer des données</h5><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button></div>
   <div class="modal-body">
    <p class="text-secondary">Téléchargez le modèle CSV, remplissez-le avec vos données puis importez-le ici. Maximum 500 lignes et 2 Mo.</p>
    <a class="btn btn-outline-dark mb-4" href="{{ route('gestion.import.template', $module) }}"><i class="bi bi-filetype-csv me-2"></i>Télécharger le modèle CSV</a>
    <label for="importFile" class="form-label fw-semibold">Fichier CSV (.csv)</label>
    <input id="importFile" type="file" name="file" class="form-control" accept=".csv,.txt,text/csv" required>
    <p class="small text-secondary mt-2 mb-0">Séparateur « ; » recommandé. Les identifiants de filiale doivent correspondre aux filiales existantes. L'import ne remplace pas les données existantes.</p>
   </div>
   <div class="modal-footer border-0 pt-0"><button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Annuler</button><button class="btn btn-dark" type="submit">Importer les données</button></div>
  </form>
 </div>
</div>
@endif
@endsection