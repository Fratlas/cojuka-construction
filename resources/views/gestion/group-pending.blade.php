@extends('layouts.cojuka-auth')
@section('title','Accès en attente')
@section('content')
<div class="eyebrow">Statut du compte</div><h1>Bienvenue chez COJUKA.</h1>
<p class="description">Votre compte a été créé. L'accès aux modules de gestion reste soumis à l'autorisation d'un administrateur.</p>
<div class="alert alert-light border rounded-3 mb-4"><strong>{{ auth()->user()->name }}</strong><div class="small text-secondary">{{ auth()->user()->email }}</div></div>
@if(auth()->user()->is_group_admin)
<a class="btn btn-primary w-100" href="{{ route('gestion.group.dashboard') }}">Ouvrir le tableau de bord ↗</a>
@else
<a class="btn btn-outline-dark w-100 py-3 rounded-3" href="{{ route('account.pending') }}">Actualiser mon statut</a>
@endif
<form method="POST" action="{{ route('logout') }}" class="mt-3">@csrf<button class="btn btn-link w-100" type="submit">Se déconnecter</button></form>
@endsection