@extends('layouts.cojuka-auth')
@section('title','Connexion')
@section('content')
<div class="eyebrow">Connexion sécurisée</div>
<h1>Bienvenue.</h1>
<p class="description">Connectez-vous à votre espace professionnel pour accéder aux outils de gestion de COJUKA Consulting Group.</p>
@if(session('status'))<div class="alert alert-success">{{ session('status') }}</div>@endif
@if($errors->any())<div class="alert alert-danger" role="alert">{{ $errors->first() }}</div>@endif
<form method="POST" action="{{ route('login.submit') }}">
@csrf
<div class="mb-4">
<label for="email" class="form-label">Adresse e-mail</label>
<input id="email" type="email" name="email" value="{{ old('email') }}" autocomplete="email" inputmode="email" placeholder="votre@email.com" required autofocus class="form-control">
</div>
<div class="mb-4">
<label for="password" class="form-label">Mot de passe</label>
<div class="auth-password-wrap">
<input id="password" type="password" name="password" autocomplete="current-password" placeholder="Votre mot de passe" required class="form-control">
<button type="button" class="auth-password-toggle" id="toggle-login-password" aria-label="Afficher le mot de passe" aria-pressed="false">Voir</button>
</div>
</div>
<button class="btn btn-primary w-100" type="submit">Accéder à mon espace &nbsp; →</button>
</form>
<div class="auth-divider">ou</div>
<a class="btn btn-outline-primary w-100 d-flex justify-content-center align-items-center" href="{{ route('register') }}">Créer un compte &nbsp; →</a>
@endsection
@section('page_scripts')
<script>
(function(){
const button=document.getElementById('toggle-login-password');
const field=document.getElementById('password');
if(!button||!field)return;
button.addEventListener('click',function(){
 const visible=field.type==='text';
 field.type=visible?'password':'text';
 button.textContent=visible?'Voir':'Masquer';
 button.setAttribute('aria-label',visible?'Afficher le mot de passe':'Masquer le mot de passe');
 button.setAttribute('aria-pressed',String(!visible));
});
})();
</script>
@endsection