<nav class="navbar navbar-expand-xxl sticky-top site-nav cojuka-global-nav" aria-label="Navigation principale">
<div class="container-fluid px-3 px-lg-4">
<a class="navbar-brand brand" href="{{ route('home') }}" aria-label="COJUKA, accueil">@include('partials.cojuka-logo', ['logoClass'=>'cojuka-brand-logo--small'])</a>
<div class="cojuka-mobile-nav-actions d-flex d-xxl-none align-items-center ms-auto"><button type="button" class="cojuka-theme-toggle me-2" aria-label="Activer le mode sombre" aria-pressed="false" title="Mode sombre"><svg class="theme-moon" viewBox="0 0 24 24" aria-hidden="true"><path d="M20.5 14.5A8.5 8.5 0 0 1 9.5 3.5 8.5 8.5 0 1 0 20.5 14.5Z"/></svg><svg class="theme-sun" viewBox="0 0 24 24" aria-hidden="true"><circle cx="12" cy="12" r="4"/><path d="M12 2v2m0 16v2M4.93 4.93l1.42 1.42m11.3 11.3 1.42 1.42M2 12h2m16 0h2M4.93 19.07l1.42-1.42m11.3-11.3 1.42-1.42"/></svg></button><div class="dropdown cojuka-language-switch"><button class="cojuka-language-trigger dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false" aria-label="Choisir la langue"><span class="cojuka-current-flag" aria-hidden="true">🇫🇷</span><span class="cojuka-current-code">FR</span></button><ul class="dropdown-menu dropdown-menu-end cojuka-language-menu"><li><button class="dropdown-item" type="button" data-cojuka-lang="fr" aria-pressed="true" lang="fr"><span aria-hidden="true">🇫🇷</span> Français</button></li><li><button class="dropdown-item" type="button" data-cojuka-lang="en" aria-pressed="false" lang="en"><span aria-hidden="true">🇬🇧</span> English</button></li><li><button class="dropdown-item" type="button" data-cojuka-lang="es" aria-pressed="false" lang="es"><span aria-hidden="true">🇪🇸</span> Español</button></li><li><button class="dropdown-item" type="button" data-cojuka-lang="ru" aria-pressed="false" lang="ru"><span aria-hidden="true">🇷🇺</span> Русский</button></li></ul></div><button class="navbar-toggler border-0 shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#cojukaGlobalNav" aria-controls="cojukaGlobalNav" aria-expanded="false" aria-label="Ouvrir le menu"><span class="navbar-toggler-icon"></span></button></div>
<div class="collapse navbar-collapse" id="cojukaGlobalNav"><div class="navbar-nav ms-auto align-items-xxl-center">

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
<div class="d-none d-xxl-flex align-items-center ms-xxl-3 cojuka-desktop-tools"><button type="button" class="cojuka-theme-toggle me-2" aria-label="Activer le mode sombre" aria-pressed="false" title="Mode sombre"><svg class="theme-moon" viewBox="0 0 24 24" aria-hidden="true"><path d="M20.5 14.5A8.5 8.5 0 0 1 9.5 3.5 8.5 8.5 0 1 0 20.5 14.5Z"/></svg><svg class="theme-sun" viewBox="0 0 24 24" aria-hidden="true"><circle cx="12" cy="12" r="4"/><path d="M12 2v2m0 16v2M4.93 4.93l1.42 1.42m11.3 11.3 1.42 1.42M2 12h2m16 0h2M4.93 19.07l1.42-1.42m11.3-11.3 1.42-1.42"/></svg></button><div class="dropdown cojuka-language-switch"><button class="cojuka-language-trigger dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false" aria-label="Choisir la langue"><span class="cojuka-current-flag" aria-hidden="true">🇫🇷</span><span class="cojuka-current-code">FR</span></button><ul class="dropdown-menu dropdown-menu-end cojuka-language-menu"><li><button class="dropdown-item" type="button" data-cojuka-lang="fr" aria-pressed="true" lang="fr"><span aria-hidden="true">🇫🇷</span> Français</button></li><li><button class="dropdown-item" type="button" data-cojuka-lang="en" aria-pressed="false" lang="en"><span aria-hidden="true">🇬🇧</span> English</button></li><li><button class="dropdown-item" type="button" data-cojuka-lang="es" aria-pressed="false" lang="es"><span aria-hidden="true">🇪🇸</span> Español</button></li><li><button class="dropdown-item" type="button" data-cojuka-lang="ru" aria-pressed="false" lang="ru"><span aria-hidden="true">🇷🇺</span> Русский</button></li></ul></div></div>
</div></div></div></nav>
@include('partials.cojuka-languages')

<style>
/* COJUKA public navbar · minimal design, one authoritative set of rules. */
.cojuka-global-nav.site-nav{
  --cojuka-nav-ink:#292a2e;
  --cojuka-nav-paper:rgba(250,250,252,.96);
  min-height:64px!important;
  background:var(--cojuka-nav-paper)!important;
  border-bottom:1px solid rgba(22,26,34,.075)!important;
  box-shadow:none!important;
  backdrop-filter:blur(22px) saturate(180%);
  -webkit-backdrop-filter:blur(22px) saturate(180%);
  z-index:1050;
}
.cojuka-global-nav>.container-fluid{
  max-width:1600px!important;
  margin:0 auto;
  padding-inline:clamp(16px,2.3vw,38px)!important;
  gap:clamp(8px,1.2vw,20px);
}
.cojuka-global-nav .navbar-brand{
  display:inline-flex!important;
  align-items:center!important;
  flex:0 0 auto!important;
  margin:0!important;
  padding:0!important;
  max-width:none!important;
  min-width:0!important;
  overflow:visible!important;
  text-decoration:none;
}
.cojuka-global-nav .cojuka-brand-lockup{
  display:inline-flex!important;
  align-items:center!important;
  gap:0!important;
  flex-wrap:nowrap;
  min-width:0;
}
.cojuka-global-nav .navbar-brand .cojuka-brand-logo{
  width:52px!important;
  height:52px!important;
  min-width:52px!important;
  max-height:52px!important;
  object-fit:contain!important;
  transform:none!important;
  filter:none!important;
}
.cojuka-global-nav .cojuka-brand-wordmark{
  display:block!important;
  margin:0 0 0 5px!important;
  padding:0!important;
  color:#83263b!important;
  font:750 12px/1.18 -apple-system,BlinkMacSystemFont,"Segoe UI",Arial,sans-serif!important;
  letter-spacing:.016em!important;
  white-space:nowrap;
  text-align:left;
}
.cojuka-global-nav .navbar-collapse{flex:1 1 auto;min-width:0}
.cojuka-global-nav .navbar-nav{
  width:100%!important;
  display:flex;
  align-items:center;
  justify-content:flex-end;
  gap:clamp(0px,.3vw,5px)!important;
  flex-wrap:nowrap!important;
}
.cojuka-global-nav .navbar-nav>.nav-link,
.cojuka-global-nav .nav-item>.nav-link{
  display:inline-flex;
  align-items:center;
  justify-content:center;
  margin:0!important;
  padding:10px clamp(5px,.55vw,10px)!important;
  border:0!important;
  border-radius:8px!important;
  background:transparent!important;
  box-shadow:none!important;
  color:var(--cojuka-nav-ink)!important;
  font-size:clamp(11px,.82vw,13px)!important;
  font-weight:510!important;
  letter-spacing:0!important;
  line-height:1.3;
  white-space:nowrap;
  text-decoration:none;
  transition:color .2s ease,background .2s ease!important;
}
.cojuka-global-nav .navbar-nav>.nav-link:hover,
.cojuka-global-nav .nav-item>.nav-link:hover,
.cojuka-global-nav .navbar-nav>.nav-link:focus-visible,
.cojuka-global-nav .nav-item>.nav-link:focus-visible{
  background:rgba(131,38,59,.065)!important;
  color:#83263b!important;
  transform:none!important;
}
.cojuka-global-nav .navbar-nav>.nav-contact{
  background:transparent!important;
  color:#83263b!important;
  font-weight:650!important;
}
.cojuka-global-nav .navbar-nav .nav-link:not(.dropdown-toggle)::after{display:none!important}
.cojuka-global-nav .dropdown-menu{
  min-width:255px;
  padding:9px!important;
  border:1px solid #e8e8ec!important;
  border-radius:16px!important;
  background:#fff;
  box-shadow:0 20px 55px rgba(10,20,38,.13)!important;
}
.cojuka-global-nav .dropdown-item{
  padding:11px 12px!important;
  border-radius:9px;
  color:#35353a;
  font-size:13px!important;
  line-height:1.4;
  white-space:normal;
}
.cojuka-global-nav .dropdown-item:hover,
.cojuka-global-nav .dropdown-item:focus{color:#83263b;background:#f8eef1}
.cojuka-global-nav .cojuka-desktop-tools{gap:5px;flex:0 0 auto}
.cojuka-global-nav .cojuka-theme-toggle{width:34px!important;height:34px!important;min-width:34px!important;margin:0!important}
.cojuka-global-nav .cojuka-language-trigger{font-size:12px!important;padding:7px 5px!important}
.cojuka-global-nav .navbar-nav form{flex-shrink:0;margin:0!important}
.cojuka-global-nav .navbar-nav form .btn{
  border:0!important;background:transparent!important;box-shadow:none!important;
  border-radius:8px!important;color:var(--cojuka-nav-ink)!important;
  font-size:12px!important;padding:9px 8px!important;
}
.cojuka-global-nav .navbar-nav form .btn:hover{background:rgba(131,38,59,.065)!important;color:#83263b!important}
.cojuka-global-nav a:focus-visible,
.cojuka-global-nav button:focus-visible{outline:2px solid #a54559;outline-offset:3px}
@media(max-width:1399.98px){
  .cojuka-global-nav.site-nav{min-height:62px!important}
  .cojuka-global-nav .navbar-brand{max-width:calc(100% - 145px)!important}
  .cojuka-global-nav .navbar-brand .cojuka-brand-logo{width:54px!important;height:54px!important;min-width:54px!important;max-height:54px!important}
  .cojuka-global-nav .cojuka-brand-wordmark{font-size:11px!important}
  .cojuka-global-nav .cojuka-mobile-nav-actions{gap:5px}
  .cojuka-global-nav .navbar-toggler{padding:8px 10px!important;border:1px solid #e1e3e7!important;border-radius:10px!important}
  .cojuka-global-nav .navbar-collapse{
    flex-basis:100%;
    margin:0!important;
    padding:10px 0 14px!important;
    border:0!important;
    border-top:1px solid #e9e9ed!important;
    border-radius:0!important;
    background:transparent!important;
    box-shadow:none!important;
    max-height:calc(100svh - 70px);
    overflow-y:auto;
  }
  .cojuka-global-nav .navbar-nav{
    flex-wrap:nowrap!important;
    align-items:stretch!important;
    justify-content:flex-start!important;
    gap:2px!important;
    width:100%;
  }
  .cojuka-global-nav .navbar-nav>.nav-link,
  .cojuka-global-nav .nav-item>.nav-link{
    display:flex;
    justify-content:flex-start;
    width:100%;
    padding:13px 14px!important;
    font-size:14px!important;
    border-radius:10px!important;
  }
  .cojuka-global-nav .navbar-nav form{padding:4px 7px}
  .cojuka-global-nav .dropdown-menu{border:0!important;box-shadow:none!important;padding:4px 8px!important;background:transparent}
}
@media(max-width:480px){
  .cojuka-global-nav>.container-fluid{padding-inline:10px!important;gap:5px}
  .cojuka-global-nav .navbar-brand .cojuka-brand-logo{width:48px!important;height:48px!important;min-width:48px!important;max-height:48px!important}
  .cojuka-global-nav .cojuka-brand-wordmark{font-size:9.3px!important;margin-left:3px!important;letter-spacing:0!important}
  .cojuka-global-nav .cojuka-mobile-nav-actions{gap:2px}
  .cojuka-global-nav .cojuka-language-trigger{padding:5px 2px!important}
}
html[data-cojuka-theme="dark"] .cojuka-global-nav.site-nav{
  --cojuka-nav-ink:#f2f2f4;
  --cojuka-nav-paper:rgba(22,23,27,.96);
  border-bottom-color:#ffffff1c!important;
}
html[data-cojuka-theme="dark"] .cojuka-global-nav .cojuka-brand-wordmark{color:#f5eced!important}
html[data-cojuka-theme="dark"] .cojuka-global-nav .navbar-collapse{border-color:#ffffff20!important;background:transparent!important}
html[data-cojuka-theme="dark"] .cojuka-global-nav .navbar-nav>.nav-link,
html[data-cojuka-theme="dark"] .cojuka-global-nav .nav-item>.nav-link,
html[data-cojuka-theme="dark"] .cojuka-global-nav .navbar-nav form .btn{color:#f2f2f4!important}
html[data-cojuka-theme="dark"] .cojuka-global-nav .nav-contact{color:#ffc7d1!important}
html[data-cojuka-theme="dark"] .cojuka-global-nav .dropdown-menu{background:#24252c;border-color:#ffffff24!important}
html[data-cojuka-theme="dark"] .cojuka-global-nav .dropdown-item{color:#f2f2f4}
html[data-cojuka-theme="dark"] .cojuka-global-nav .dropdown-item:hover{background:#ffffff13}
@media(prefers-reduced-motion:reduce){
  .cojuka-global-nav .navbar-brand img,.cojuka-global-nav .nav-link{transition:none!important;transform:none!important}
}
</style>
