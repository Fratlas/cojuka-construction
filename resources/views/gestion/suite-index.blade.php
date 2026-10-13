@extends('gestion.group-layout')
@section('title', $config['label'])
@section('content')
<div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-4">
    <div>
        <p class="text-uppercase text-secondary small fw-bold mb-1">Gestion opérationnelle</p>
        <h1 class="h2 fw-bold mb-0">{{ $config['label'] }}</h1>
        <p class="text-secondary mt-2 mb-0">Enregistrements, suivi et opérations par filiale.</p>
    </div>
    <div class="d-flex gap-2">
        <button type="button" class="btn btn-outline-dark" data-bs-toggle="modal" data-bs-target="#importModal"><i class="bi bi-cloud-arrow-up me-1"></i>Importer CSV</button>
        <a class="btn btn-outline-secondary rounded-pill" href="{{ route('gestion.suite.history', $module) }}">Historique</a>
        <a class="btn btn-outline-dark rounded-pill" href="{{ route('gestion.suite.export', $module) }}">Exporter CSV</a>
        <button type="button" class="btn btn-dark rounded-pill px-4" data-bs-toggle="modal" data-bs-target="#newItem">+ Ajouter</button>
    </div>
</div>
<div class="row g-3 mb-4">
    <div class="col-md-4"><div class="card border-0 shadow-sm p-3 h-100"><div class="small text-secondary">Enregistrements filtrés</div><div class="h3 mb-0">{{ $totals->sum('total') }}</div></div></div>
    @foreach($totals as $total)
        <div class="col-md-4"><div class="card border-0 shadow-sm p-3 h-100"><div class="small text-secondary">Total {{ $total->currency }} (données filtrées)</div><div class="h3 mb-0">{{ number_format((float) $total->amount_total, 2, ',', ' ') }} {{ $total->currency }}</div></div></div>
    @endforeach
</div>
<form method="get" class="row g-2 mb-4">
    <div class="col-md-4"><input class="form-control" name="q" maxlength="100" value="{{ request('q') }}" placeholder="Titre ou référence"></div>
    <div class="col-md-3">
        <select class="form-select" name="entity">
            <option value="">Toutes les filiales</option>
            @foreach($entities as $entity)
                <option value="{{ $entity->id }}" @selected(request('entity') == $entity->id)>{{ $entity->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="col-md-3"><select class="form-select" name="status"><option value="">Tous les statuts</option>@foreach(\App\Http\Controllers\GroupSuiteController::STATUSES as $key=>$label)<option value="{{ $key }}" @selected(request('status')===$key)>{{ $label }}</option>@endforeach</select></div>
    <div class="col-md-2"><button class="btn btn-outline-dark w-100">Filtrer</button></div>
</form>
<div class="card border-0 shadow-sm p-3">
    <div class="table-responsive">
        <table class="table table-hover align-middle">
            <thead><tr><th>Intitulé</th><th>Filiale</th><th>Montant</th><th>Statut</th><th>Date</th><th>Actions</th></tr></thead>
            <tbody>
                @forelse($rows as $item)
                    <tr>
                        <td><strong>{{ $item->title }}</strong><div class="small text-secondary">{{ $item->reference }}</div></td>
                        <td>{{ $item->entity?->name ?? '—' }}</td>
                        <td>{{ $item->amount === null ? '—' : number_format((float) $item->amount, 2, ',', ' ').' '.$item->currency }}</td>
                        <td><span class="badge bg-secondary">{{ str_replace('_', ' ', $item->status) }}</span></td>
                        <td>{{ $item->record_date?->format('d/m/Y') ?? '—' }}</td>
                        <td class="text-nowrap">
                            <button type="button" class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#edit{{ $item->id }}">Modifier</button>
                            <form method="post" class="d-inline" action="{{ route('gestion.suite.destroy', [$module, $item->id]) }}" onsubmit="return confirm('Supprimer cet enregistrement ?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-outline-danger">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="6" class="text-center text-secondary py-5">Aucun enregistrement pour ce module.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
    {{ $rows->links() }}
</div>
@foreach($rows as $item)
    <div class="modal fade" id="edit{{ $item->id }}" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
            <form method="post" action="{{ route('gestion.suite.update', [$module, $item->id]) }}" class="modal-content">
                @csrf
                @method('PUT')
                <div class="modal-header">
                    <h5 class="modal-title">Modifier — {{ $item->title }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
                </div>
                <div class="modal-body">@include('gestion.suite-fields', ['record' => $item])</div>
                <div class="modal-footer"><button class="btn btn-dark">Enregistrer</button></div>
            </form>
        </div>
    </div>
@endforeach
<div class="modal fade" id="newItem" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <form method="post" action="{{ route('gestion.suite.store', $module) }}" class="modal-content">
            @csrf
            <div class="modal-header">
                <h5 class="modal-title">Nouvel enregistrement</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
            </div>
            <div class="modal-body">@include('gestion.suite-fields', ['record' => null])</div>
            <div class="modal-footer"><button class="btn btn-dark">Créer</button></div>
        </form>
    </div>
</div>
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
@endsection