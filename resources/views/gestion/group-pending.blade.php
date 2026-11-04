@extends('layouts.cojuka-auth')
@section('title','Accès en attente')
@section('content')
<div class="eyebrow">Statut du compte</div><h1>Bienvenue chez COJUKA.</h1>
<p class="description">Votre compte est actif. Il ne reste qu'une étape : un administrateur doit vous attribuer un département et vos filiales.</p>
@if(session('status'))<div class="alert alert-success">{{ session('status') }}</div>@endif
<ol class="auth-steps small mb-4"><li class="is-done"><strong>Compte créé</strong> et connecté.</li><li class="is-current"><strong>Validation en cours</strong> par un administrateur COJUKA.</li><li><strong>Accès ouvert</strong> : cette page vous redirige toute seule.</li></ol>
<p class="auth-hint small mb-3" id="pending-live" aria-live="polite"><span class="auth-pulse" aria-hidden="true"></span> Vérification automatique de votre accès…</p>
<div class="alert alert-light border rounded-3 mb-4"><strong>{{ auth()->user()->name }}</strong><div class="small text-secondary">{{ auth()->user()->email }}</div></div>
@if(auth()->user()->is_group_admin)
<a class="btn btn-primary w-100" href="{{ route('gestion.group.dashboard') }}">Ouvrir le tableau de bord ↗</a>
@else
<a class="btn btn-outline-dark w-100 py-3 rounded-3" href="{{ route('account.pending') }}">Actualiser mon statut</a>
@endif
<form method="POST" action="{{ route('logout') }}" class="mt-3">@csrf<button class="btn btn-link w-100" type="submit">Se déconnecter</button></form>
@endsection
@section('page_scripts')
<script>
(function(){
 var out=document.getElementById('pending-live');if(!out||!window.fetch)return;
 var url='{{ route('account.status') }}',tries=0;
 function check(){
  if(document.hidden)return;tries++;
  fetch(url,{headers:{'Accept':'application/json'},credentials:'same-origin',cache:'no-store'}).then(function(r){if(r.status===401||r.redirected){location.href='{{ route('login') }}';return null}return r.json()}).then(function(d){
   if(!d)return;
   if(d.ready){out.textContent='✓ Accès accordé ! Ouverture de votre espace…';setTimeout(function(){location.href=d.url},700);clearInterval(timer)}
   else out.lastChild.textContent=' Pas encore validé · nouvelle vérification dans 20 s ('+new Date().toLocaleTimeString('fr-FR',{hour:'2-digit',minute:'2-digit'})+').';
  }).catch(function(){});
 }
 var timer=setInterval(check,20000);setTimeout(check,1500);
 document.addEventListener('visibilitychange',function(){if(!document.hidden)check()});
})();
</script>
@endsection