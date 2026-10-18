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

<style>
/* Apple-inspired COJUKA global navigation: compact, restrained, readable. */
.cojuka-global-nav.site-nav{min-height:58px!important;background:rgba(250,250,252,.90)!important;backdrop-filter:saturate(180%) blur(22px);-webkit-backdrop-filter:saturate(180%) blur(22px);border-bottom:1px solid #0000000a!important;box-shadow:none!important}
.cojuka-global-nav>.container-fluid{max-width:1520px;margin:auto;padding-left:clamp(15px,2.3vw,32px)!important;padding-right:clamp(15px,2.3vw,32px)!important;gap:14px}
.cojuka-global-nav .navbar-brand{min-width:205px!important;max-width:none!important;margin-right:16px!important;flex:0 0 auto}
.cojuka-global-nav .cojuka-brand-lockup{gap:9px}
.cojuka-global-nav .cojuka-brand-logo{width:48px!important;height:48px!important;max-height:48px!important}
.cojuka-global-nav .cojuka-brand-wordmark{color:#812236!important;font-size:10px!important;line-height:1.16;font-weight:800;letter-spacing:.035em}
.cojuka-global-nav .navbar-nav{width:100%;display:flex;align-items:center;justify-content:space-between;gap:2px}
.cojuka-global-nav .navbar-nav>.nav-link,.cojuka-global-nav .nav-item>.nav-link{font-size:12px!important;font-weight:500!important;line-height:1.25!important;color:#33343a!important;background:transparent!important;border:0!important;border-radius:7px!important;box-shadow:none!important;padding:9px 8px!important;white-space:nowrap;transition:color .2s ease,background .2s ease!important}
.cojuka-global-nav .navbar-nav>.nav-link:hover,.cojuka-global-nav .nav-item>.nav-link:hover{color:#8d2134!important;background:#00000008!important;transform:none!important}
.cojuka-global-nav .navbar-nav>.nav-contact{color:#8b2335!important;font-weight:650!important;background:transparent!important}
.cojuka-global-nav .navbar-nav>.nav-contact:hover{color:#651728!important}
.cojuka-global-nav .navbar-nav form .btn{background:transparent;border:0!important;color:#52545b;padding:9px 7px;font-size:12px;box-shadow:none}
.cojuka-global-nav .navbar-nav form .btn:hover{background:#00000008;color:#17191d}
.cojuka-global-nav .cojuka-theme-toggle{width:32px;height:32px;min-width:32px;border-radius:50%}
.cojuka-global-nav .cojuka-language-trigger{font-size:11px;padding:7px 5px}
.cojuka-global-nav .dropdown-menu{border-radius:14px!important;border:1px solid #e8e8eb!important;box-shadow:0 16px 40px #00000018!important;padding:8px!important}
.cojuka-global-nav .dropdown-item{font-size:12px!important;padding:10px 12px}
.cojuka-global-nav .navbar-nav>.nav-link:not(.nav-contact):after{display:none!important}
@media(min-width:1400px){.cojuka-global-nav .navbar-collapse{flex:1;min-width:0}.cojuka-global-nav .navbar-nav{flex-wrap:nowrap}}
@media(max-width:1399.98px){
 .cojuka-global-nav.site-nav{min-height:62px!important}
 .cojuka-global-nav .navbar-brand{min-width:0!important;max-width:calc(100% - 150px)!important}
 .cojuka-global-nav .cojuka-brand-logo{width:49px!important;height:49px!important;max-height:49px!important}
 .cojuka-global-nav .navbar-collapse{margin-top:0!important;padding:12px!important;border-radius:0 0 16px 16px!important;border:1px solid #e8e8eb!important;border-top:0!important;background:rgba(250,250,252,.99)!important;box-shadow:0 16px 30px #00000010!important;max-height:calc(100svh - 72px);overflow-y:auto}
 .cojuka-global-nav .navbar-nav{align-items:stretch;gap:2px}
 .cojuka-global-nav .navbar-nav>.nav-link,.cojuka-global-nav .nav-item>.nav-link{font-size:14px!important;padding:13px 15px!important}
 .cojuka-global-nav .navbar-nav form{padding:6px 8px}
 .cojuka-global-nav .dropdown-menu{border:0!important;box-shadow:none!important}
}
@media(max-width:480px){.cojuka-global-nav .cojuka-brand-logo{width:45px!important;height:45px!important}.cojuka-global-nav .cojuka-brand-wordmark{font-size:9px!important}}
html[data-cojuka-theme="dark"] .cojuka-global-nav.site-nav{background:rgba(24,25,28,.94)!important;border-bottom-color:#ffffff1a!important}
html[data-cojuka-theme="dark"] .cojuka-global-nav .cojuka-brand-wordmark{color:#f1e7e6!important}
html[data-cojuka-theme="dark"] .cojuka-global-nav .navbar-nav>.nav-link,html[data-cojuka-theme="dark"] .cojuka-global-nav .nav-item>.nav-link{color:#eee!important}
html[data-cojuka-theme="dark"] .cojuka-global-nav .navbar-collapse{background:#1b1c21!important;border-color:#ffffff1c!important}
@media(prefers-reduced-motion:reduce){.cojuka-global-nav *{transition:none!important}}
</style>
<style>
/* COJUKA · navigation Apple-inspired: restrained, thin, evenly spaced. */
.cojuka-global-nav.site-nav{
 min-height:56px!important;background:rgba(250,250,252,.94)!important;
 border-bottom:1px solid rgba(0,0,0,.07)!important;
 box-shadow:none!important;backdrop-filter:saturate(180%) blur(20px);
 -webkit-backdrop-filter:saturate(180%) blur(20px)
}
.cojuka-global-nav .container-fluid{max-width:1540px;margin:auto;padding-left:clamp(14px,3vw,42px)!important;padding-right:clamp(14px,3vw,42px)!important;gap:8px}
.cojuka-global-nav .navbar-brand{min-width:0!important;margin-right:22px!important;padding:0!important}
.cojuka-global-nav .cojuka-brand-lockup{gap:7px}
.cojuka-global-nav .cojuka-brand-logo{width:47px!important;height:47px!important;max-height:47px!important}
.cojuka-global-nav .cojuka-brand-wordmark{font-size:10px!important;line-height:1.17!important;font-weight:760;letter-spacing:.015em!important;color:#782336}
.cojuka-global-nav .navbar-nav{gap:clamp(1px,.5vw,8px);justify-content:space-between;width:100%}
.cojuka-global-nav .navbar-nav>.nav-link,.cojuka-global-nav .nav-item>.nav-link{
 padding:9px clamp(5px,.65vw,11px)!important;margin:0!important;
 font-size:12px!important;font-weight:500!important;letter-spacing:0!important;
 color:#303034!important;border-radius:6px!important;background:none!important;
 box-shadow:none!important;border:0!important;white-space:nowrap
}
.cojuka-global-nav .nav-link:not(.dropdown-toggle)::after{display:none!important}
.cojuka-global-nav .navbar-nav>.nav-link:hover,.cojuka-global-nav .nav-item>.nav-link:hover{color:#8b2438!important;background:#00000008!important;transform:none!important}
.cojuka-global-nav .navbar-nav>.nav-link.nav-contact{background:none!important;color:#303034!important;box-shadow:none!important;border:0!important;padding:9px clamp(5px,.65vw,11px)!important}
.cojuka-global-nav .dropdown-menu{border-radius:0 0 16px 16px!important;border:1px solid #e8e8eb!important;padding:14px!important;box-shadow:0 20px 36px #11111113!important;min-width:240px}
.cojuka-global-nav .dropdown-item{padding:10px 12px!important;font-size:13px!important}
.cojuka-global-nav .navbar-nav form .btn{font-size:12px!important;padding:7px 11px!important;border:0!important;background:transparent!important;color:#303034!important}
.cojuka-global-nav .navbar-nav form .btn:hover{color:#8b2438!important;background:#00000008!important}
.cojuka-global-nav .cojuka-theme-toggle{width:32px!important;height:32px!important;min-width:32px!important;margin-right:3px!important}
.cojuka-global-nav .cojuka-language-trigger{font-size:12px!important}
@media(max-width:1399.98px){
 .cojuka-global-nav.site-nav{min-height:60px!important}
 .cojuka-global-nav .navbar-brand{max-width:calc(100% - 150px)!important}
 .cojuka-global-nav .cojuka-brand-logo{width:50px!important;height:50px!important;max-height:50px!important}
 .cojuka-global-nav .cojuka-brand-wordmark{font-size:10px!important}
 .cojuka-global-nav .navbar-collapse{margin-top:0!important;border:0!important;border-top:1px solid #e9e9ed!important;box-shadow:0 18px 30px #0000000d!important;border-radius:0 0 16px 16px!important;background:rgba(250,250,252,.99)!important}
 .cojuka-global-nav .navbar-nav{gap:0!important}
 .cojuka-global-nav .navbar-nav>.nav-link,.cojuka-global-nav .nav-item>.nav-link{padding:13px 18px!important;font-size:14px!important}
 .cojuka-global-nav .navbar-nav>.nav-link.nav-contact{padding:13px 18px!important}
 .cojuka-global-nav .dropdown-menu{box-shadow:none!important;border:0!important;padding:4px 12px!important}
}
html[data-cojuka-theme="dark"] .cojuka-global-nav.site-nav{background:rgba(22,22,25,.95)!important;border-color:#ffffff1a!important}
html[data-cojuka-theme="dark"] .cojuka-global-nav .nav-link,html[data-cojuka-theme="dark"] .cojuka-global-nav .navbar-nav form .btn{color:#f1f1f3!important}
html[data-cojuka-theme="dark"] .cojuka-global-nav .navbar-nav>.nav-link.nav-contact{color:#f1f1f3!important}
html[data-cojuka-theme="dark"] .cojuka-global-nav .navbar-collapse{background:#1a1a20!important;border-color:#ffffff1c!important}
@media(prefers-reduced-motion:reduce){.cojuka-global-nav *{transition:none!important}}
</style>

<style>
/* Align the wordmark tightly with the official COJUKA emblem. */
.cojuka-global-nav .cojuka-brand-lockup{gap:0!important}
.cojuka-global-nav .cojuka-brand-wordmark{margin-left:-3px!important}
@media(max-width:480px){.cojuka-global-nav .cojuka-brand-lockup{gap:0!important}.cojuka-global-nav .cojuka-brand-wordmark{margin-left:-2px!important}}
</style>
