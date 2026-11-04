@extends('layouts.cojuka-auth')
@section('title','Inscription')
@section('content')
<div class="eyebrow">Rejoindre le portail</div><h1>Créer un compte.</h1><p class="description">Demandez votre accès à l'espace de gestion COJUKA. L'utilisation des modules internes nécessite une validation par un administrateur.</p>
@if($errors->any())<div class="alert alert-danger" role="alert"><ul class="mb-0">@foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul></div>@endif
<form method="POST" action="{{ route('register.submit') }}">@csrf
<label for="name" class="form-label">Nom complet</label><input id="name" class="form-control mb-3" name="name" value="{{ old('name') }}" required maxlength="255" autocomplete="name">
<label for="email" class="form-label">Adresse e-mail</label><input id="email" type="email" class="form-control mb-3" name="email" value="{{ old('email') }}" required autocomplete="email">
<label for="password" class="form-label">Mot de passe</label>
<div class="auth-password-wrap mb-2"><input id="password" type="password" class="form-control" name="password" required minlength="12" autocomplete="new-password" aria-describedby="pw-hint"><button type="button" class="auth-password-toggle" data-toggle-for="password" aria-label="Afficher le mot de passe" aria-pressed="false">Voir</button></div>
<p id="pw-hint" class="auth-hint small mb-3" aria-live="polite">12 caractères minimum.</p>
<label for="password_confirmation" class="form-label">Confirmer le mot de passe</label>
<div class="auth-password-wrap mb-2"><input id="password_confirmation" type="password" class="form-control" name="password_confirmation" required minlength="12" autocomplete="new-password" aria-describedby="pw-match"><button type="button" class="auth-password-toggle" data-toggle-for="password_confirmation" aria-label="Afficher le mot de passe" aria-pressed="false">Voir</button></div>
<p id="pw-match" class="auth-hint small mb-4" aria-live="polite"></p>
<button class="btn btn-primary w-100" type="submit" data-loading-text="Création du compte…">Créer mon compte ↗</button></form>
<ol class="auth-steps small mt-4 mb-0"><li><strong>Créez votre compte</strong> : vous êtes connecté immédiatement.</li><li><strong>Un administrateur valide</strong> votre département et vos filiales.</li><li><strong>Votre espace s'ouvre</strong> automatiquement dès que l'accès est accordé.</li></ol>
<p class="text-center mt-4 mb-0">Déjà inscrit ? <a href="{{ route('login') }}">Se connecter</a></p>
@endsection
@section('page_scripts')
<script>
(function(){
 document.querySelectorAll('[data-toggle-for]').forEach(function(btn){
  var f=document.getElementById(btn.getAttribute('data-toggle-for'));if(!f)return;
  btn.addEventListener('click',function(){var v=f.type==='text';f.type=v?'password':'text';btn.textContent=v?'Voir':'Masquer';btn.setAttribute('aria-pressed',String(!v));btn.setAttribute('aria-label',v?'Afficher le mot de passe':'Masquer le mot de passe')});
 });
 var pw=document.getElementById('password'),pc=document.getElementById('password_confirmation'),hint=document.getElementById('pw-hint'),match=document.getElementById('pw-match');
 function check(){
  var n=pw.value.length;hint.textContent=n>=12?'✓ Longueur suffisante.':'12 caractères minimum ('+n+'/12).';hint.classList.toggle('is-ok',n>=12);
  if(!pc.value){match.textContent='';return}
  var ok=pc.value===pw.value;match.textContent=ok?'✓ Les mots de passe correspondent.':'Les mots de passe ne correspondent pas encore.';match.classList.toggle('is-ok',ok);match.classList.toggle('is-bad',!ok);
 }
 if(pw&&pc){pw.addEventListener('input',check);pc.addEventListener('input',check)}
})();
</script>
@endsection