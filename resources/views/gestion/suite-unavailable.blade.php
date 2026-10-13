@extends('gestion.group-layout')
@section('title', $config['label'])
@section('content')
<div class="mb-4">
    <p class="text-uppercase small text-secondary fw-bold">COJUKA / Module opérationnel</p>
    <h1 class="h2 fw-bold">{{ $config['label'] }}</h1>
</div>
<div class="card border-0 shadow-sm p-4 p-md-5">
    <div class="d-flex align-items-center gap-3 mb-3">
        <span class="fs-2">⚙️</span>
        <div><h2 class="h4 mb-1">Installation du module nécessaire</h2><p class="text-secondary mb-0">La table MySQL <code>group_suite_records</code> est absente.</p></div>
    </div>
    <p>Cette page est disponible, mais la création, la modification et l'export des données resteront désactivés tant que la migration n'aura pas été exécutée.</p>
    <p class="text-secondary">Depuis le dossier Laravel sur Hostinger, sauvegardez la base, vérifiez les migrations puis lancez <code>php artisan migrate --force</code> si le schéma est compatible.</p>
    <div><a href="{{ route('gestion.group.dashboard') }}" class="btn btn-dark">Retour au tableau de bord</a></div>
</div>
@endsection