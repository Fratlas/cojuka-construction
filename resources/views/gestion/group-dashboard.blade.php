@extends('gestion.group-layout')
@section('title', 'Tableau de bord')
@section('content')
<div class="d-flex flex-wrap justify-content-between align-items-center gap-3 mb-4">
    <div>
        <p class="text-uppercase text-secondary small fw-bold mb-1">Direction générale · COJUKA Consulting Group</p>
        <h1 class="h2 fw-bold mb-0">Tableau de bord</h1>
        <p class="text-secondary mt-2 mb-0">Vue consolidée des filiales, projets et activités du groupe.</p>
    </div>
    @if(\App\Support\GroupAccess::can(auth()->user(),'projets'))<a class="btn btn-dark rounded-pill px-4" href="{{ route('gestion.group.list', 'projets') }}">Gérer les projets →</a>@endif
</div>
<div class="card p-4 mb-4"><form method="get" action="{{ route('gestion.group.dashboard') }}" class="row g-3 align-items-end"><div class="col-md-8"><label class="form-label" for="entityFilter">Afficher les données de</label><select id="entityFilter" name="entity" class="form-select"><option value="">Toutes les entités</option>@foreach($entityOptions as $entity)<option value="{{ $entity->id }}" @selected($selectedEntity === $entity->id)>{{ $entity->name }}</option>@endforeach</select></div><div class="col-md-4"><button class="btn btn-dark w-100" type="submit">Filtrer le tableau de bord</button></div></form></div>
@if(!$suiteReady)
    <div class="alert alert-warning border-0 rounded-4" role="alert">
        <strong>Configuration en attente :</strong> les modules opérationnels nécessitent la création des tables MySQL. Le suivi des entités, projets et actifs reste accessible.
    </div>
@endif
<div class="row g-3 mb-5">
    @foreach([['Entités du groupe', $entities, 'entites'], ['Projets enregistrés', $projects, 'projets'], ['Actifs suivis', $assets, 'actifs']] as $stat)
    @if(\App\Support\GroupAccess::can(auth()->user(),$stat[2]))
        <div class="col-md-4">
            <a class="text-decoration-none text-dark" href="{{ route('gestion.group.list', $stat[2]) }}">
                <div class="card border-0 shadow-sm h-100 p-4">
                    <p class="text-secondary mb-3">{{ $stat[0] }}</p>
                    <div class="display-5 fw-bold">{{ $stat[1] }}</div>
                    <span class="text-primary small mt-3">Consulter →</span>
                </div>
            </a>
        </div>
    @endif
    @endforeach
</div>
@include('gestion.partials.dashboard-charts')
<h2 class="h4 fw-bold mb-3">Directions et opérations</h2>
<div class="row g-3 mb-5">
    @foreach(\App\Http\Controllers\GroupSuiteController::MODULES as $slug => $config)
        @if(\App\Support\GroupAccess::can(auth()->user(),$slug))
        <div class="col-sm-6 col-xl-3">
            <a href="{{ route('gestion.suite.index', $slug) }}" class="text-decoration-none text-dark">
                <div class="card h-100 border-0 shadow-sm p-4">
                    <div class="d-flex justify-content-between align-items-start gap-2">
                        <p class="fw-semibold mb-3">{{ $config['label'] }}</p>
                        <span class="badge {{ $suiteReady ? 'bg-light text-dark' : 'bg-warning text-dark' }}">{{ $suiteReady ? 'Actif' : 'À installer' }}</span>
                    </div>
                    <div class="display-6 fw-bold">{{ $suiteStats[$slug] ?? 0 }}</div>
                    <span class="text-primary small mt-3">Ouvrir le module →</span>
                </div>
            </a>
        </div>
    @endif
    @endforeach
</div>
<h2 class="h4 fw-bold mb-3">Suivi des opérations</h2><div class="row g-3 mb-4"><div class="col-md-4"><div class="card p-4"><p class="text-secondary">Opérations enregistrées</p><div class="display-6 fw-bold">{{ $operationCount }}</div></div></div>@if(\App\Support\GroupAccess::can(auth()->user(),'finances'))<div class="col-md-8"><div class="card p-4"><p class="text-secondary">Finances validées ou terminées</p>@forelse($financeTotals as $currency => $total)<p class="mb-2"><strong>{{ number_format((float)$total,2,',',' ') }} {{ $currency }}</strong></p>@empty<p class="mb-0 text-secondary">Aucun montant validé.</p>@endforelse<small class="text-secondary">Montants indicatifs des fiches financières, non assimilables à un bilan comptable.</small></div></div>@endif</div><h2 class="h4 fw-bold mb-3">Opérations récentes</h2><div class="card p-3 mb-5"><div class="table-responsive"><table class="table"><thead><tr><th>Intitulé</th><th>Entité</th><th>Statut</th></tr></thead><tbody>@forelse($recentOperations as $operation)<tr><td><a href="{{ route('gestion.suite.index',$operation->module) }}">{{ $operation->title }}</a></td><td>{{ $operation->entity?->name ?? 'Non attribuée' }}</td><td>{{ $operation->status }}</td></tr>@empty<tr><td colspan="3" class="text-secondary">Aucune opération enregistrée.</td></tr>@endforelse</tbody></table></div></div>@if(\App\Support\GroupAccess::can(auth()->user(),'projets'))<h2 class="h4 fw-bold mb-3">Projets récents</h2>
<div class="card border-0 shadow-sm p-3">
    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead><tr><th>Projet</th><th>Filiale</th><th>Statut</th></tr></thead>
            <tbody>
                @forelse($recent as $project)
                    <tr>
                        <td class="fw-semibold">{{ $project->title }}</td>
                        <td>{{ $project->entity?->name ?? 'Non renseignée' }}</td>
                        <td><span class="badge bg-secondary">{{ str_replace('_', ' ', $project->status) }}</span></td>
                    </tr>
                @empty
                    <tr><td colspan="3" class="text-center text-secondary py-4">Aucun projet enregistré.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endif
@endsection