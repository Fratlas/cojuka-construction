<nav class="navbar navbar-expand-xxl sticky-top site-nav cojuka-global-nav" aria-label="Navigation principale">
<div class="container-fluid px-3 px-lg-4">
<a class="navbar-brand brand" href="{{ route('home') }}" aria-label="COJUKA, accueil">@include('partials.cojuka-logo', ['logoClass'=>'cojuka-brand-logo--small'])</a>
<div class="cojuka-mobile-nav-actions d-flex d-xxl-none align-items-center ms-auto"><button type="button" class="cojuka-theme-toggle me-2" aria-label="Activer le mode sombre" aria-pressed="false" title="Mode sombre"><svg class="theme-moon" viewBox="0 0 24 24" aria-hidden="true"><path d="M20.5 14.5A8.5 8.5 0 0 1 9.5 3.5 8.5 8.5 0 1 0 20.5 14.5Z"/></svg><svg class="theme-sun" viewBox="0 0 24 24" aria-hidden="true"><circle cx="12" cy="12" r="4"/><path d="M12 2v2m0 16v2M4.93 4.93l1.42 1.42m11.3 11.3 1.42 1.42M2 12h2m16 0h2M4.93 19.07l1.42-1.42m11.3-11.3 1.42-1.42"/></svg></button><div class="dropdown cojuka-language-switch"><button class="cojuka-language-trigger dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false" aria-label="Choisir la langue"><span class="cojuka-current-flag" aria-hidden="true">🇫🇷</span><span class="cojuka-current-code">FR</span></button><ul class="dropdown-menu dropdown-menu-end cojuka-language-menu"><li><button class="dropdown-item" type="button" data-cojuka-lang="fr" aria-pressed="true" lang="fr"><span aria-hidden="true">🇫🇷</span> Français</button></li><li><button class="dropdown-item" type="button" data-cojuka-lang="en" aria-pressed="false" lang="en"><span aria-hidden="true">🇬🇧</span> English</button></li><li><button class="dropdown-item" type="button" data-cojuka-lang="es" aria-pressed="false" lang="es"><span aria-hidden="true">🇪🇸</span> Español</button></li><li><button class="dropdown-item" type="button" data-cojuka-lang="ru" aria-pressed="false" lang="ru"><span aria-hidden="true">🇷🇺</span> Русский</button></li></ul></div><button class="navbar-toggler border-0 shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#cojukaGlobalNav" aria-controls="cojukaGlobalNav" aria-expanded="false" aria-label="Ouvrir le menu"><span class="navbar-toggler-icon"></span></button></div>
<div class="collapse navbar-collapse" id="cojukaGlobalNav"><div class="navbar-nav ms-auto align-items-xxl-center">
<div class="d-none d-xxl-flex align-items-center me-xxl-2"><button type="button" class="cojuka-theme-toggle me-2" aria-label="Activer le mode sombre" aria-pressed="false" title="Mode sombre"><svg class="theme-moon" viewBox="0 0 24 24" aria-hidden="true"><path d="M20.5 14.5A8.5 8.5 0 0 1 9.5 3.5 8.5 8.5 0 1 0 20.5 14.5Z"/></svg><svg class="theme-sun" viewBox="0 0 24 24" aria-hidden="true"><circle cx="12" cy="12" r="4"/><path d="M12 2v2m0 16v2M4.93 4.93l1.42 1.42m11.3 11.3 1.42 1.42M2 12h2m16 0h2M4.93 19.07l1.42-1.42m11.3-11.3 1.42-1.42"/></svg></button><div class="dropdown cojuka-language-switch"><button class="cojuka-language-trigger dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false" aria-label="Choisir la langue"><span class="cojuka-current-flag" aria-hidden="true">🇫🇷</span><span class="cojuka-current-code">FR</span></button><ul class="dropdown-menu dropdown-menu-end cojuka-language-menu"><li><button class="dropdown-item" type="button" data-cojuka-lang="fr" aria-pressed="true" lang="fr"><span aria-hidden="true">🇫🇷</span> Français</button></li><li><button class="dropdown-item" type="button" data-cojuka-lang="en" aria-pressed="false" lang="en"><span aria-hidden="true">🇬🇧</span> English</button></li><li><button class="dropdown-item" type="button" data-cojuka-lang="es" aria-pressed="false" lang="es"><span aria-hidden="true">🇪🇸</span> Español</button></li><li><button class="dropdown-item" type="button" data-cojuka-lang="ru" aria-pressed="false" lang="ru"><span aria-hidden="true">🇷🇺</span> Русский</button></li></ul></div></div>
<a class="nav-link" href="{{ route('home') }}">Accueil</a>
<a class="nav-link" href="{{ route('group') }}">Le Groupe</a>
<a class="nav-link" href="{{ route('group.history') }}">Histoire &amp; Belgique</a>
<a class="nav-link" href="{{ route('explorer') }}">✦ Explorer 3D</a>
<div class="nav-item dropdown">
<a class="nav-link dropdown-toggle" href="#" id="cojukaFilieres" role="button" data-bs-toggle="dropdown" aria-expanded="false">Nos entités</a>
<ul class="dropdown-menu dropdown-menu-end shadow-sm border-0" aria-labelledby="cojukaFilieres" style="max-height:65vh;overflow-y:auto;min-width:260px">
@foreach(\App\Http\Controllers\GroupProfileController::PROFILES as $slug => $entity)
<li><a class="dropdown-item py-2" href="{{ route('group.profile', $slug) }}">{{ ['kojuka-mining' => 'Mining', 'construction' => 'Construction', 'logistique' => 'Logistique', 'consultance' => 'Consultance'][$slug] ?? $entity['name'] }}</a></li>
@endforeach
<li><hr class="dropdown-divider"></li><li><a class="dropdown-item fw-bold" href="{{ route('group.portal') }}">Découvrir toutes les entités →</a></li>
</ul></div>
<a class="nav-link" href="{{ route('home') }}#expertises">Nos expertises</a>
<a class="nav-link nav-contact" href="{{ route('home') }}#contact">Nous contacter ↗</a>
@auth
<a class="nav-link" href="{{ route('gestion.group.dashboard') }}">Tableau de bord</a>
<form method="POST" action="{{ route('logout') }}" class="ms-lg-2 mb-0">@csrf<button type="submit" class="btn btn-sm btn-outline-secondary rounded-pill">Déconnexion</button></form>
@else
<a class="nav-link" href="{{ route('login') }}">Connexion</a>
@endauth

</div></div></div></nav>
@include('partials.cojuka-languages')
<style>
/* COJUKA premium navigation: visual balance, high legibility and graceful mobile collapse. */
.cojuka-global-nav.site-nav{min-height:86px;background:rgba(255,255,255,.96)!important;backdrop-filter:blur(20px) saturate(150%);-webkit-backdrop-filter:blur(20px) saturate(150%);border-bottom:1px solid rgba(15,25,41,.08);box-shadow:0 5px 28px rgba(18,30,50,.045);z-index:1050}
.cojuka-global-nav .container-fluid{gap:12px}
.cojuka-global-nav .navbar-brand{margin-right:auto!important;max-width:none!important;min-width:224px;flex:0 0 auto;overflow:visible}
.cojuka-global-nav .cojuka-brand-lockup{gap:10px}
.cojuka-global-nav .cojuka-brand-logo{width:72px!important;height:72px!important;max-height:72px!important;object-fit:contain}
.cojuka-global-nav .cojuka-brand-wordmark{font-size:13px!important;line-height:1.22;letter-spacing:.045em;color:#812236;font-weight:850}
.cojuka-global-nav .navbar-nav{gap:2px;align-items:center}
.cojuka-global-nav .navbar-nav>.nav-link,.cojuka-global-nav .nav-item>.nav-link{margin:0!important;padding:12px 10px!important;font-size:13px;font-weight:650;white-space:nowrap;border-radius:12px;transition:color .2s,background .2s}
.cojuka-global-nav .navbar-nav>.nav-link:not(.nav-contact):hover,.cojuka-global-nav .nav-item>.nav-link:hover{background:#86212e0c;color:#86212e!important}
.cojuka-global-nav .navbar-nav>.nav-link.nav-contact{padding:12px 16px!important;background:linear-gradient(135deg,#a32c42,#7f1b2c)!important;color:#fff!important;border:1px solid transparent!important;border-radius:99px;box-shadow:0 5px 15px #86212e28}
.cojuka-global-nav .navbar-nav>.nav-link.nav-contact:hover{background:linear-gradient(135deg,#86212e,#681526)!important;transform:translateY(-1px)}
.cojuka-global-nav .navbar-nav form .btn{white-space:nowrap;border-radius:99px!important;padding:10px 13px}
.cojuka-global-nav .dropdown-menu{border:1px solid #e9e6e9!important;border-radius:18px;padding:10px;box-shadow:0 20px 50px #121d3421!important}
.cojuka-global-nav .dropdown-item{border-radius:10px;font-size:13px;white-space:normal}
.cojuka-global-nav .dropdown-item:hover{background:#86212e10;color:#86212e}
.cojuka-global-nav .navbar-toggler{border:1px solid #e4e7ec!important;border-radius:12px;padding:10px!important}
.cojuka-global-nav .navbar-toggler:focus-visible,.cojuka-global-nav a:focus-visible,.cojuka-global-nav button:focus-visible{outline:3px solid #bd8c48;outline-offset:3px}
@media(max-width:1399.98px){
 .cojuka-global-nav.site-nav{min-height:74px}
 .cojuka-global-nav .cojuka-brand-logo{width:60px!important;height:60px!important;max-height:60px!important}
 .cojuka-global-nav .navbar-brand{min-width:0;max-width:calc(100% - 148px)!important}
 .cojuka-global-nav .cojuka-brand-wordmark{font-size:11px!important}
 .cojuka-global-nav .navbar-collapse{margin-top:10px;padding:16px;background:#fff;border-radius:16px;border:1px solid #edf0f3;box-shadow:0 18px 38px #14203512;max-height:calc(100svh - 100px);overflow-y:auto}
 .cojuka-global-nav .navbar-nav{align-items:stretch;gap:5px}
 .cojuka-global-nav .navbar-nav>.nav-link,.cojuka-global-nav .nav-item>.nav-link{padding:12px 15px!important}
 .cojuka-global-nav .dropdown-menu{box-shadow:none!important;border:0!important;padding-left:12px}
 .cojuka-global-nav .navbar-nav form{padding:5px 12px}
}
@media(max-width:480px){
 .cojuka-global-nav .cojuka-brand-logo{width:50px!important;height:50px!important;max-height:50px!important}
 .cojuka-global-nav .cojuka-brand-wordmark{font-size:9px!important;letter-spacing:0}
 .cojuka-global-nav .cojuka-brand-lockup{gap:5px}
 .cojuka-global-nav .cojuka-mobile-nav-actions{gap:2px}
}
html[data-cojuka-theme="dark"] .cojuka-global-nav.site-nav{background:rgba(18,24,35,.96)!important;border-bottom-color:#ffffff1c}
html[data-cojuka-theme="dark"] .cojuka-global-nav .cojuka-brand-wordmark{color:#f4e9e5}
html[data-cojuka-theme="dark"] .cojuka-global-nav .navbar-collapse{background:#151e2b;border-color:#ffffff24}
@media(prefers-reduced-motion:reduce){.cojuka-global-nav *{transition:none!important}}
</style>
