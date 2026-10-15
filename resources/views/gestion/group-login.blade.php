@extends('layouts.cojuka-auth')
@section('title','Connexion')
@section('content')
<div class="eyebrow">Connexion sécurisée</div><h1>Bienvenue.</h1><p class="description">Connectez-vous à votre espace professionnel pour accéder aux outils de gestion de COJUKA Consulting Group.</p>
@if(session('status'))<div class="alert alert-success">{{ session('status') }}</div>@endif
@if($errors->any())<div class="alert alert-danger" role="alert">{{ $errors->first() }}</div>@endif
<form method="POST" action="{{ route('login.submit') }}">@csrf
<label for="email" class="form-label">Adresse e-mail</label><input id="email" type="email" name="email" value="{{ old('email') }}" autocomplete="email" required autofocus class="form-control mb-3">
<label for="password" class="form-label">Mot de passe</label><input id="password" type="password" name="password" autocomplete="current-password" required class="form-control mb-4">
<button class="btn btn-primary w-100" type="submit">Accéder à mon espace ↗</button></form>
<p class="text-center mt-4 mb-0">Vous n'avez pas de compte ? <a href="{{ route('register') }}">Créer un compte</a></p>
@endsection