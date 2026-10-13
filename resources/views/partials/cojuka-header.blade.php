<nav class="navbar navbar-expand-lg sticky-top site-nav cojuka-global-nav" aria-label="Navigation principale">
<div class="container-fluid px-3 px-lg-4">
<a class="navbar-brand brand" href="{{ route('home') }}" aria-label="COJUKA, accueil">@include('partials.cojuka-logo', ['logoClass'=>'cojuka-brand-logo--small'])</a>
<button class="navbar-toggler border-0 shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#cojukaGlobalNav" aria-controls="cojukaGlobalNav" aria-expanded="false" aria-label="Ouvrir le menu"><span class="navbar-toggler-icon"></span></button>
<div class="collapse navbar-collapse" id="cojukaGlobalNav"><div class="navbar-nav ms-auto align-items-lg-center">
<a class="nav-link" href="{{ route('group') }}">Le Groupe</a>
<a class="nav-link" href="{{ route('group.portal') }}">Nos entités</a>
<div class="nav-item dropdown">
<a class="nav-link dropdown-toggle" href="#" id="cojukaFilieres" role="button" data-bs-toggle="dropdown" aria-expanded="false">Toutes les filières</a>
<ul class="dropdown-menu dropdown-menu-end shadow-sm border-0" aria-labelledby="cojukaFilieres" style="max-height:70vh;overflow-y:auto">
@foreach(['Construction','Logistique','Cargo','Génie','Éducation','Santé','Énergie','Investissement','Communication','Médical','Agro-industrie','Haute technologie','Médias','Matériel','Conseil'] as $filiere)
<li><a class="dropdown-item" href="{{ route('group.portal') }}?secteur={{ urlencode($filiere) }}">{{ $filiere }}</a></li>
@endforeach
<li><hr class="dropdown-divider"></li><li><a class="dropdown-item fw-bold" href="{{ route('group.portal') }}">Voir toutes les entités →</a></li>
</ul></div>
<a class="nav-link" href="{{ route('home') }}#apropos">À propos</a>
<a class="nav-link" href="{{ route('home') }}#expertises">Expertises</a>
<a class="nav-link" href="{{ route('home') }}#vision">Notre vision</a>
<a class="nav-link nav-contact" href="{{ route('home') }}#contact">Nous contacter ↗</a>
@auth
<a class="nav-link" href="{{ route('gestion.group.dashboard') }}">Tableau de bord</a>
<form method="POST" action="{{ route('logout') }}" class="ms-lg-2 mb-0">@csrf<button type="submit" class="btn btn-sm btn-outline-secondary rounded-pill">Déconnexion</button></form>
@else
<a class="nav-link" href="{{ route('login') }}">Connexion</a>
@endauth
</div></div></div></nav>