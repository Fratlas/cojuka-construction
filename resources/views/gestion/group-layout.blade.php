<!doctype html>
<html lang="fr">
<head><link rel="icon" type="image/svg+xml" sizes="any" href="{{ asset('favicon.svg') }}?v=3">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>@yield('title', 'Direction générale') — COJUKA Group</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700;800&family=Manrope:wght@400;500;600;700;800&display=swap" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
<style>
:root{--navy:#101a2a;--navy2:#172337;--ink:#142139;--muted:#758095;--line:#e8edf3;--accent:#b98a54;--bg:#f5f7fa}
*{box-sizing:border-box}body{font-family:'DM Sans',sans-serif;background:var(--bg);color:var(--ink);margin:0;font-size:14px}h1,h2,h3,h4,h5{font-family:Manrope,sans-serif;letter-spacing:-.035em}a{text-decoration:none}
.app-shell{display:flex;min-height:100vh}.sidebar{width:270px;flex:0 0 270px;background:var(--navy);color:#e4e9f0;display:flex;flex-direction:column;position:sticky;top:0;height:100vh;overflow:auto;scrollbar-width:thin;scrollbar-color:#39475b transparent;z-index:1040}
.brand{padding:30px 25px 26px;border-bottom:1px solid #ffffff12;display:flex;gap:13px;align-items:center}.brand-symbol{width:40px;height:40px;background:linear-gradient(140deg,#e2c18d,#997047);color:#172033;border-radius:12px;display:grid;place-items:center;font-weight:800;font-size:19px;box-shadow:0 8px 22px #0003}.brand-name{font:800 16px Manrope;letter-spacing:.045em;color:#fff}.brand-caption{font-size:10px;letter-spacing:.17em;color:#9aa8b8;font-weight:700}
.nav-caption{color:#74849a;font-size:10px;letter-spacing:.16em;text-transform:uppercase;font-weight:800;padding:24px 27px 9px}.side-link{display:flex;align-items:center;gap:13px;color:#aeb9c9;padding:11px 15px;margin:2px 13px;border-radius:11px;font-weight:600;transition:background .2s,color .2s,transform .2s}.side-link i{font-size:17px;width:20px;text-align:center}.side-link:hover{background:#ffffff12;color:#fff;transform:translateX(2px)}.side-link.active{background:linear-gradient(90deg,#ffffff1c,#ffffff0a);color:#fff;box-shadow:inset 3px 0 var(--accent)}.side-link.active i{color:#dfbd8e}.side-bottom{margin-top:auto;padding:17px 14px 23px;border-top:1px solid #ffffff12}.side-bottom .side-link{margin:2px 0}.workspace{min-width:0;flex:1}.topbar{height:82px;background:#ffffffed;border-bottom:1px solid var(--line);display:flex;align-items:center;justify-content:space-between;gap:15px;padding:0 36px;position:sticky;top:0;z-index:1020;backdrop-filter:blur(15px)}.top-eyebrow{font-size:10px;letter-spacing:.15em;color:var(--muted);font-weight:800;text-transform:uppercase}.top-title{font:800 18px Manrope;letter-spacing:-.04em}.top-actions{display:flex;align-items:center;gap:15px}.today-pill{border:1px solid var(--line);border-radius:30px;padding:9px 14px;color:#647187;background:#fff;font-size:12px}.avatar{width:39px;height:39px;display:grid;place-items:center;border-radius:12px;background:#e8edf5;color:#34455e;font-weight:800}.user-label{font-weight:800;font-size:12px}.user-role{font-size:11px;color:var(--muted)}.page-content{padding:35px 38px 65px;max-width:1800px;margin:auto}.card{border-radius:18px!important;border:1px solid #edf0f4!important;box-shadow:0 9px 28px #162c4609!important}.card:hover{box-shadow:0 15px 40px #162c4610!important}.btn{font-weight:700;border-radius:10px;padding:.6rem 1rem}.btn-dark{background:var(--navy);border-color:var(--navy)}.btn-dark:hover{background:#283b54}.btn-outline-dark{border-color:#dce3eb;color:var(--ink)}.form-control,.form-select{border-radius:10px;border-color:#e0e5ed;min-height:43px}.form-control:focus,.form-select:focus{border-color:#b99b77;box-shadow:0 0 0 .2rem #b98a541b}.table{--bs-table-bg:transparent}.table thead th{font-size:11px;letter-spacing:.065em;text-transform:uppercase;color:#7d8899;font-weight:800;border-bottom-color:#e8edf3;padding:15px 13px}.table tbody td{padding:17px 13px;border-bottom-color:#f0f2f6}.badge{padding:7px 10px;border-radius:7px;font-weight:700}.text-primary{color:#b18755!important}.alert{border-radius:12px}.modal-content{border:0;border-radius:19px;box-shadow:0 28px 90px #0003}.modal-header,.modal-footer{border-color:var(--line)}.mobile-toggle{display:none}.mobile-overlay{display:none}
@media(max-width:1100px){.sidebar{width:245px;flex-basis:245px}.page-content{padding:26px}.topbar{padding:0 25px}}
@media(max-width:900px){.sidebar{position:fixed;left:0;top:0;bottom:0;transform:translateX(-100%);transition:transform .25s;box-shadow:12px 0 35px #0002}.sidebar.open{transform:translateX(0)}.mobile-toggle{display:inline-flex}.mobile-overlay.show{display:block;position:fixed;inset:0;background:#0b152b9c;z-index:1030}.topbar{height:70px}.page-content{padding:23px 17px}.today-pill,.user-meta{display:none}}
@media(prefers-reduced-motion:reduce){*,*:before,*:after{transition:none!important;animation:none!important}}

/* COJUKA Executive UI refinements */
.page-content>div:first-child h1{font-weight:800;letter-spacing:-.045em}
.page-content>.card,.page-content>.row .card{transition:transform .2s ease,box-shadow .2s ease}
.page-content>.row .card:hover{transform:translateY(-3px)}
.table-responsive{border-radius:12px}
.table tbody tr{transition:background-color .16s ease}
.table tbody tr:hover{background:#f8fafc}
.form-label{color:#3c4a5f;font-size:12px;letter-spacing:.01em}
.modal-header{padding:24px 26px 18px}.modal-body{padding:22px 26px}.modal-footer{padding:16px 26px 24px}
.btn:focus-visible,.side-link:focus-visible{outline:3px solid #c5a06b;outline-offset:2px}
.page-content .display-5,.page-content .display-6{font-family:Manrope,sans-serif;letter-spacing:-.06em}
.page-content .text-secondary{color:#768397!important}
@media(max-width:575px){.page-content{padding:19px 13px}.page-content h1{font-size:1.55rem}.topbar{padding:0 14px}.top-title{font-size:15px}.modal-body{padding:18px}.table{min-width:610px}}

/* Harmonised executive workspace dimensions */
:root{--accent:#86212e;--cojuka-admin-radius:16px}
body{font-size:15px;line-height:1.55}
.page-content{max-width:1540px;padding:clamp(22px,2.8vw,40px) clamp(20px,3vw,46px) 65px}
.page-content h1{font-size:clamp(1.75rem,2.2vw,2.35rem);line-height:1.2}
.page-content h2{font-size:clamp(1.35rem,1.7vw,1.75rem)}
.page-content h3{font-size:clamp(1.12rem,1.35vw,1.4rem)}
.page-content .h2{font-size:clamp(1.75rem,2.2vw,2.35rem)}
.page-content .h4{font-size:clamp(1.2rem,1.6vw,1.6rem)}
.page-content p{line-height:1.65}
.page-content .card{border-radius:var(--cojuka-admin-radius)!important}
.page-content .card.p-3,.page-content .card.p-4{padding:clamp(18px,2vw,30px)!important}
.topbar{height:76px;padding-inline:clamp(20px,2.8vw,40px)}
.top-title{font-size:clamp(1rem,1.15vw,1.18rem)}
.side-link{min-height:43px;font-size:.91rem}
.form-label{font-size:.86rem;font-weight:700;color:#394457}
.form-control,.form-select{min-height:46px;font-size:1rem}
.btn{min-height:43px;font-size:.92rem}
.table thead th{font-size:.75rem;line-height:1.4}
.table tbody td{font-size:.9rem;line-height:1.5;vertical-align:middle}
.badge{font-size:.75rem}
.brand-symbol{background:linear-gradient(140deg,#a52d41,#701527);color:white}
.side-link.active{box-shadow:inset 3px 0 #ba344a}
.side-link.active i{color:#fff}
.page-content .text-primary{color:#86212e!important}
@media(max-width:900px){.topbar{height:68px}.page-content{padding:24px 18px 50px}}
@media(max-width:575px){.page-content{padding:18px 14px 45px}.page-content h1,.page-content .h2{font-size:1.65rem}.topbar{padding:0 14px}.page-content .card.p-3,.page-content .card.p-4{padding:17px!important}.modal-header,.modal-body,.modal-footer{padding:18px}}

/* Back-office only: white COJUKA mark, readable without clipping on navy sidebar. */
.sidebar .brand{justify-content:flex-start;gap:9px;padding:20px 12px;min-height:115px;overflow:hidden}
.sidebar .brand .cojuka-brand-logo{display:block;width:84px!important;max-width:84px;height:84px!important;max-height:84px;object-fit:contain;object-position:center;filter:none!important;opacity:1!important;mix-blend-mode:normal!important;flex-shrink:1}
.sidebar .brand>div{min-width:0;flex:1}.sidebar .brand .brand-name{display:block;font:800 12px/1.45 Manrope,Arial,sans-serif;letter-spacing:.035em;color:#fff;overflow-wrap:normal}.sidebar .brand .brand-caption{display:none}
@media(max-width:1100px){.sidebar .brand .cojuka-brand-logo{width:72px!important;max-width:72px;height:72px!important;max-height:72px}.sidebar .brand .brand-name{font-size:11px}}

/* COJUKA / Compact workspace rhythm — consistent with the public site.
   Changes only top-level page blocks; forms, tables and modal spacing remain usable. */
.page-content{
 padding-bottom:clamp(28px,3.2vw,47px)!important;
}
.page-content > :is(.d-flex,.row,div):has(h1).mb-4{
 border-bottom:1px solid #dbe2e9;
 padding-bottom:clamp(12px,1.5vw,19px);
 margin-bottom:clamp(15px,1.8vw,24px)!important;
}
.page-content > :is(.card,.row,.alert,.table-responsive).mb-4{
 margin-bottom:clamp(14px,1.7vw,21px)!important;
}
.page-content > :is(.card,.row,.alert,.table-responsive).mb-5{
 margin-bottom:clamp(20px,2.3vw,30px)!important;
}
.page-content > .row.g-5{--bs-gutter-y:1.75rem}
.page-content > h2:not(:first-child)::before,
.page-content > h3:not(:first-child)::before{
 content:"";
 display:block;
 width:clamp(75px,9vw,118px);
 height:1px;
 margin:clamp(20px,2.5vw,32px) 0 13px;
 background:linear-gradient(90deg,#9eabb9,rgba(158,171,185,0));
}
.page-content > footer.mt-5{
 margin-top:clamp(25px,3vw,39px)!important;
 padding-top:clamp(14px,1.6vw,20px)!important;
}
@media(max-width:767.98px){
 .page-content > :is(.d-flex,.row,div):has(h1).mb-4{
  padding-bottom:11px;
  margin-bottom:16px!important;
 }
 .page-content > :is(.card,.row,.alert,.table-responsive).mb-5{margin-bottom:23px!important}
 .page-content > .row.g-5{--bs-gutter-y:1.3rem}
}

</style>
@include('partials.cojuka-design')
<link rel="stylesheet" href="{{ asset('css/cojuka-glass.css') }}?v=20261018-admin-crystal-06">
<link rel="stylesheet" href="{{ asset('css/cojuka-management-charts.css') }}?v=20261018-charts-01">
</head>
<body class="cojuka-glass cojuka-glass-admin">
<div id="mobileOverlay" class="mobile-overlay"></div>
<div class="app-shell">
<aside id="sideNav" class="sidebar" aria-label="Navigation de gestion">
 <div class="brand"><img class="cojuka-brand-logo cojuka-brand-logo--small" src="{{ asset('images/cojuka-welcome-final.avif') }}?v=20261018-color-gestion" alt="COJUKA Consulting Group — logo officiel en couleurs" width="1254" height="1254" decoding="async"><div><div class="brand-name">COJUKA<br>CONSULTING<br>GROUP</div><div class="brand-caption">EXECUTIVE SUITE</div></div></div>
 <div class="nav-caption">Vue générale</div>
 <a class="side-link {{ request()->routeIs('gestion.group.dashboard') ? 'active' : '' }}" href="{{ route('gestion.group.dashboard') }}"><i class="bi bi-grid-1x2"></i> Tableau de bord</a>
 <a class="side-link" href="{{ route('gestion.group.dashboard') }}#gestion-graphiques"><i class="bi bi-bar-chart-line"></i> Analyses &amp; graphiques</a>
 @if(\App\Support\GroupAccess::can(auth()->user(),'entites'))
 <a class="side-link {{ request()->is('gestion/entites*') ? 'active' : '' }}" href="{{ route('gestion.group.list', 'entites') }}"><i class="bi bi-buildings"></i> Sociétés & filiales</a>
 @endif
 @if(\App\Support\GroupAccess::can(auth()->user(),'projets'))
 <a class="side-link {{ request()->is('gestion/projets*') ? 'active' : '' }}" href="{{ route('gestion.group.list', 'projets') }}"><i class="bi bi-kanban"></i> Projets</a>
 @endif
 @if(\App\Support\GroupAccess::can(auth()->user(),'actifs'))
 <a class="side-link {{ request()->is('gestion/actifs*') ? 'active' : '' }}" href="{{ route('gestion.group.list', 'actifs') }}"><i class="bi bi-box-seam"></i> Actifs</a>
 @endif
 @if(auth()->user()?->is_group_admin)
 <a class="side-link {{ request()->is('gestion/utilisateurs*') ? 'active' : '' }}" href="{{ route('gestion.users.index') }}"><i class="bi bi-people"></i> Utilisateurs & accès</a>
 @endif
 @if(auth()->user()?->is_group_admin)<a class="side-link {{ request()->routeIs('gestion.departments.*') ? 'active' : '' }}" href="{{ route('gestion.departments.index') }}"><i class="bi bi-shield-lock"></i> Permissions départements</a>@endif
 @if(auth()->user()?->is_group_admin)<a class="side-link {{ request()->routeIs('gestion.newsletter.*') ? 'active' : '' }}" href="{{ route('gestion.newsletter.index') }}"><i class="bi bi-envelope-paper"></i> Newsletter</a>@endif
 <div class="nav-caption">Départements</div>
 @php
 $moduleIcons=['rh'=>'bi-person-vcard','finances'=>'bi-wallet2','contrats'=>'bi-file-earmark-text','achats'=>'bi-bag-check','logistique'=>'bi-truck','immobilier'=>'bi-houses','mines'=>'bi-gem','consulting'=>'bi-briefcase'];
 @endphp
 @foreach(\App\Http\Controllers\GroupSuiteController::MODULES as $slug => $config)
 @if(\App\Support\GroupAccess::can(auth()->user(),$slug))
 <a class="side-link {{ request()->is('gestion/modules/'.$slug.'*') ? 'active' : '' }}" href="{{ route('gestion.suite.index', $slug) }}"><i class="bi {{ $moduleIcons[$slug] ?? 'bi-circle' }}"></i> {{ $config['label'] }}</a>
 @endif
 @endforeach

 <div class="side-bottom">
 <a class="side-link" href="{{ route('group.portal') }}" target="_blank" rel="noopener noreferrer"><i class="bi bi-box-arrow-up-right"></i> Portail public</a>
 <form method="post" action="{{ route('logout') }}">
 @csrf
 <button class="side-link border-0 bg-transparent w-100 text-start" type="submit"><i class="bi bi-box-arrow-right"></i> Déconnexion</button>
 </form>
 </div>
</aside>
<div class="workspace">
<header class="topbar">
 <div class="d-flex align-items-center gap-3">
  <button class="btn btn-light mobile-toggle" id="menuToggle" type="button" aria-label="Ouvrir le menu" aria-expanded="false"><i class="bi bi-list fs-5"></i></button>
  <div><div class="top-eyebrow">COJUKA / Gestion stratégique</div><div class="top-title">@yield('title', 'Tableau de bord')</div></div>
 </div>
 <div class="top-actions">
  <span class="today-pill"><i class="bi bi-calendar3 me-2"></i>{{ now()->locale('fr')->translatedFormat('d M Y') }}</span>
  <div class="user-meta text-end"><div class="user-label">{{ auth()->user()?->name ?? 'Administrateur' }}</div><div class="user-role">{{ auth()->user()?->is_group_admin ? 'Direction générale' : 'Accès départemental' }}</div></div>
  <div class="avatar">{{ strtoupper(mb_substr(auth()->user()?->name ?? 'C', 0, 1)) }}</div>
 </div>
</header>
<main class="page-content">
 @if(session('status'))
 <div class="alert alert-success border-0 shadow-sm"><i class="bi bi-check-circle me-2"></i>{{ session('status') }}</div>
 @endif
 @if($errors->any())
 <div class="alert alert-danger border-0 shadow-sm"><strong>Veuillez vérifier les informations :</strong><ul class="mb-0 mt-2">@foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul></div>
 @endif
 @yield('content')
 <footer class="mt-5 pt-4 border-top d-flex flex-wrap justify-content-between gap-2 text-secondary small"><span>© {{ date('Y') }} COJUKA GROUP · Espace de gestion privé</span><span>Plateforme de gestion interne</span></footer>
</main>
</div>
</div>
@include('partials.cojuka-ai-assistant')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
(function(){
 const toggle=document.getElementById('menuToggle'),sidebar=document.getElementById('sideNav'),overlay=document.getElementById('mobileOverlay');
 function close(){sidebar.classList.remove('open');overlay.classList.remove('show');toggle.setAttribute('aria-expanded','false')}
 toggle.addEventListener('click',()=>{const open=sidebar.classList.toggle('open');overlay.classList.toggle('show',open);toggle.setAttribute('aria-expanded',open?'true':'false')});
 overlay.addEventListener('click',close);document.addEventListener('keydown',e=>{if(e.key==='Escape')close()});
})();
</script>
@yield('page_scripts')
<script defer src="{{ asset('js/cojuka-glow.js') }}?v=20261018-aurora-01"></script>
</body>
</html>