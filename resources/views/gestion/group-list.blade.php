@extends('gestion.group-layout')
@section('title', ucfirst($module))
@section('content')
<div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-4">
 <div>
  <p class="text-uppercase text-secondary small fw-bold mb-1">COJUKA / Référentiel du groupe</p>
  <h1 class="h2 fw-bold mb-1">{{ ucfirst($module) }}</h1>
  <p class="text-secondary mb-0">Consultez et gérez les enregistrements de votre organisation.</p>
 </div>
 <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#addModal"><i class="bi bi-plus-lg me-2"></i>Ajouter</button>
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
       <button type="button" class="btn btn-sm btn-outline-dark" data-bs-toggle="modal" data-bs-target="#edit{{ $row->id }}">Modifier</button>
       <form method="post" action="{{ route('gestion.group.delete', [$module, $row->id]) }}" class="d-inline" onsubmit="return confirm('Supprimer définitivement cet enregistrement ?')">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-sm btn-outline-danger">Supprimer</button>
       </form>
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
@endsection