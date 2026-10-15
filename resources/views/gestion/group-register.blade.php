@extends('layouts.cojuka-auth')
@section('title','Inscription')
@section('content')
<div class="eyebrow">Rejoindre le portail</div><h1>Créer un compte.</h1><p class="description">Demandez votre accès à l'espace de gestion COJUKA. L'utilisation des modules internes nécessite une validation par un administrateur.</p>
@if($errors->any())<div class="alert alert-danger" role="alert"><ul class="mb-0">@foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul></div>@endif
<form method="POST" action="{{ route('register.submit') }}">@csrf
<label for="name" class="form-label">Nom complet</label><input id="name" class="form-control mb-3" name="name" value="{{ old('name') }}" required maxlength="255" autocomplete="name">
<label for="email" class="form-label">Adresse e-mail</label><input id="email" type="email" class="form-control mb-3" name="email" value="{{ old('email') }}" required autocomplete="email">
<label for="password" class="form-label">Mot de passe (12 caractères minimum)</label><input id="password" type="password" class="form-control mb-3" name="password" required minlength="12" autocomplete="new-password">
<label for="password_confirmation" class="form-label">Confirmer le mot de passe</label><input id="password_confirmation" type="password" class="form-control mb-4" name="password_confirmation" required minlength="12" autocomplete="new-password">
<button class="btn btn-primary w-100" type="submit">Créer mon compte ↗</button></form>
<p class="text-center mt-4 mb-0">Déjà inscrit ? <a href="{{ route('login') }}">Se connecter</a></p>
@endsection