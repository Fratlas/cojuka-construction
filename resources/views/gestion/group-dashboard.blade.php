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
@php
 $pendingQuery = (auth()->user()?->is_group_admin && \Illuminate\Support\Facades\Schema::hasColumn('users', 'group_department_id'))
  ? \App\Models\User::where('is_group_admin', false)->whereNull('group_department_id') : null;
 $pendingCount = $pendingQuery ? (clone $pendingQuery)->count() : 0;
 $pendingUsers = $pendingQuery ? $pendingQuery->latest('id')->take(3)->get(['id', 'name']) : collect();
@endphp
@if($pendingUsers->isNotEmpty())
<div class="cx-pending card border-0 p-3 p-md-4 mb-4" role="status">
 <div class="d-flex flex-wrap align-items-center justify-content-between gap-3">
  <div class="d-flex align-items-center gap-3"><span class="cx-kpi-icon" aria-hidden="true"><i class="bi bi-person-plus"></i></span><div><strong>{{ $pendingCount }} compte(s) en attente d’autorisation</strong><div class="small text-secondary">@foreach($pendingUsers as $u){{ $u->name }}@if(!$loop->last) · @endif @endforeach</div></div></div>
  <a class="btn btn-dark rounded-pill px-4" href="{{ route('gestion.users.index') }}">Attribuer les accès →</a>
 </div>
</div>
@endif
@if(!$suiteReady)
    <div class="alert alert-warning border-0 rounded-4" role="alert">
        <strong>Configuration en attente :</strong> les modules opérationnels nécessitent la création des tables MySQL. Le suivi des entités, projets et actifs reste accessible.
        @if(auth()->user()?->is_group_admin)<form method="POST" action="{{ route('gestion.maintenance.migrate') }}" class="mt-3 mb-0">@csrf<button class="btn btn-dark rounded-pill px-4" type="submit" onclick="this.disabled=true;this.textContent='Mise à jour en cours…';this.form.submit()"><i class="bi bi-database-gear me-2" aria-hidden="true"></i>Mettre à jour la base de données</button><span class="small text-secondary ms-2">Sans risque : ajoute uniquement ce qui manque, ne supprime rien.</span></form>@endif
    </div>
@endif
<div class="row g-3 mb-5">
    @foreach([['Entités du groupe', $entities, 'entites', 'bi-buildings'], ['Projets enregistrés', $projects, 'projets', 'bi-kanban'], ['Actifs suivis', $assets, 'actifs', 'bi-box-seam']] as $stat)
    @if(\App\Support\GroupAccess::can(auth()->user(),$stat[2]))
        <div class="col-md-4">
            <a class="text-decoration-none text-dark" href="{{ route('gestion.group.list', $stat[2]) }}">
                <div class="card border-0 shadow-sm h-100 p-4 cx-kpi">
                    <div class="d-flex justify-content-between align-items-start gap-2 mb-3"><p class="text-secondary mb-0">{{ $stat[0] }}</p><span class="cx-kpi-icon" aria-hidden="true"><i class="bi {{ $stat[3] }}"></i></span></div>
                    <div class="display-5 fw-bold" data-cx-count="{{ (int) $stat[1] }}">{{ $stat[1] }}</div>
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
                <div class="card h-100 border-0 shadow-sm p-4 cx-kpi cx-kpi--module">
                    <div class="d-flex justify-content-between align-items-start gap-2">
                        <p class="fw-semibold mb-3 d-flex align-items-center gap-2"><span class="cx-kpi-icon cx-kpi-icon--sm" aria-hidden="true"><i class="bi {{ ['rh'=>'bi-person-vcard','finances'=>'bi-wallet2','contrats'=>'bi-file-earmark-text','achats'=>'bi-bag-check','logistique'=>'bi-truck','immobilier'=>'bi-houses','mines'=>'bi-gem','consulting'=>'bi-briefcase'][$slug] ?? 'bi-circle' }}"></i></span>{{ $config['label'] }}</p>
                        <span class="badge {{ $suiteReady ? 'bg-light text-dark' : 'bg-warning text-dark' }}">{{ $suiteReady ? 'Actif' : 'À installer' }}</span>
                    </div>
                    <div class="display-6 fw-bold" data-cx-count="{{ (int) ($suiteStats[$slug] ?? 0) }}">{{ $suiteStats[$slug] ?? 0 }}</div>
                    <span class="text-primary small mt-3">Ouvrir le module →</span>
                </div>
            </a>
        </div>
    @endif
    @endforeach
</div>
<h2 class="h4 fw-bold mb-3">Suivi des opérations</h2><div class="row g-3 mb-4"><div class="col-md-4"><div class="card p-4 cx-kpi"><p class="text-secondary">Opérations enregistrées</p><div class="display-6 fw-bold" data-cx-count="{{ (int) $operationCount }}">{{ $operationCount }}</div></div></div>@if(\App\Support\GroupAccess::can(auth()->user(),'finances'))<div class="col-md-8"><div class="card p-4"><p class="text-secondary">Finances validées ou terminées</p>@forelse($financeTotals as $currency => $total)<p class="mb-2"><strong>{{ number_format((float)$total,2,',',' ') }} {{ $currency }}</strong></p>@empty<p class="mb-0 text-secondary">Aucun montant validé.</p>@endforelse<small class="text-secondary">Montants indicatifs des fiches financières, non assimilables à un bilan comptable.</small></div></div>@endif</div><h2 class="h4 fw-bold mb-3">Opérations récentes</h2><div class="card p-3 mb-5"><div class="table-responsive"><table class="table"><thead><tr><th>Intitulé</th><th>Entité</th><th>Statut</th></tr></thead><tbody>@forelse($recentOperations as $operation)<tr><td><a href="{{ route('gestion.suite.index',$operation->module) }}">{{ $operation->title }}</a></td><td>{{ $operation->entity?->name ?? 'Non attribuée' }}</td><td>{{ $operation->status }}</td></tr>@empty<tr><td colspan="3" class="text-secondary">Aucune opération enregistrée.</td></tr>@endforelse</tbody></table></div></div>@if(\App\Support\GroupAccess::can(auth()->user(),'projets'))<h2 class="h4 fw-bold mb-3">Projets récents</h2>
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