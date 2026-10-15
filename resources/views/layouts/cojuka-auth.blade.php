<!doctype html>
<html lang="fr">
<head>
<meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="theme-color" content="#f4f4f5">
<title>@yield('title') — COJUKA Gestion</title>
<link rel="icon" type="image/svg+xml" href="{{ asset('favicon.svg') }}">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
:root{--cojuka-red:#861c2d;--cojuka-ink:#121821;--cojuka-muted:#687382}
*,*::before,*::after{box-sizing:border-box}
body{margin:0;color:var(--cojuka-ink);background:#edf0f2;font-family:Inter,-apple-system,BlinkMacSystemFont,"Segoe UI",Arial,sans-serif;-webkit-font-smoothing:antialiased}
.auth-shell{display:grid;grid-template-columns:minmax(0,1.12fr) minmax(480px,.88fr);min-height:100vh;overflow:hidden}
.auth-intro{position:relative;isolation:isolate;display:flex;flex-direction:column;justify-content:space-between;gap:50px;min-height:100vh;padding:clamp(35px,5vw,78px);color:#fff;background:#1b2530 url('https://images.unsplash.com/photo-1497366754035-f200968a6e72?auto=format&fit=crop&w=2000&q=88') center/cover no-repeat}
.auth-intro::before{content:"";position:absolute;inset:0;z-index:-1;background:linear-gradient(90deg,rgba(9,17,29,.82),rgba(9,17,29,.35) 85%),linear-gradient(0deg,rgba(8,15,25,.88),transparent 70%)}
.auth-brand{align-self:flex-start;display:inline-flex;background:#fff;border-radius:16px;padding:12px 17px;box-shadow:0 18px 50px #0002;text-decoration:none}
.auth-brand img{display:block;width:clamp(210px,20vw,265px);height:auto;max-height:77px;object-fit:contain}
.auth-message{max-width:620px;margin-top:auto}
.auth-intro .eyebrow{font-size:.76rem;font-weight:800;letter-spacing:.22em;text-transform:uppercase;color:#f6f6f6}
.auth-rule{display:block;width:48px;height:3px;border-radius:3px;background:#e8eaed;margin-bottom:22px}
.auth-intro h2{font-size:clamp(2.9rem,5vw,5.4rem);font-weight:760;line-height:1.07;letter-spacing:-.065em;margin:21px 0 27px;text-shadow:0 3px 15px #0003}
.auth-intro h2 span{font-weight:400}
.auth-accent{display:block;width:55px;height:4px;border-radius:4px;background:#c51f3c;margin:0 0 24px}
.auth-intro p{max-width:560px;color:#f5f6f8;font-size:clamp(.98rem,1.25vw,1.1rem);line-height:1.8;text-shadow:0 2px 8px #0005}
.auth-features{display:grid;grid-template-columns:repeat(3,minmax(0,1fr));gap:10px;margin-top:35px}
.auth-feature{padding:16px 13px;border:1px solid #ffffff36;background:#101b29a8;backdrop-filter:blur(12px);border-radius:13px}
.auth-feature-icon{display:grid;place-items:center;width:36px;height:36px;margin-bottom:11px;border:1px solid #ffced6aa;border-radius:50%;color:#fff;font-size:1.1rem}
.auth-feature strong{display:block;font-size:.85rem;font-weight:750;line-height:1.35}
.auth-feature small{display:block;color:#d6dce2;font-size:.7rem;line-height:1.5;margin-top:5px}
.auth-note{color:#e0e5ea;font-size:.76rem;line-height:1.6}
.auth-workspace{position:relative;display:flex;align-items:center;justify-content:center;padding:85px clamp(26px,5vw,90px);background:linear-gradient(155deg,#fff 0%,#f9fafb 100%)}
.auth-panel{width:100%;max-width:500px}
.auth-panel .eyebrow{font-size:.77rem;font-weight:800;letter-spacing:.17em;text-transform:uppercase;color:#6a6c72}
.auth-panel h1{font-size:clamp(2.5rem,3.3vw,3.35rem);font-weight:800;letter-spacing:-.065em;line-height:1.12;margin:15px 0}
.auth-panel .description{font-size:1rem;line-height:1.75;color:var(--cojuka-muted);margin:0 0 39px}
.auth-panel .form-label{font-size:.91rem;font-weight:750;margin-bottom:9px;color:#202630}
.auth-panel .form-control{min-height:57px;border-radius:11px;border:1px solid #d3d8df;background:#fff;padding:13px 17px;font-size:1rem}
.auth-panel .form-control:focus{border-color:var(--cojuka-red);box-shadow:0 0 0 3px #861c2d18}
.auth-panel .btn-primary{background:var(--cojuka-red);border-color:var(--cojuka-red);border-radius:11px;min-height:57px;font-size:1rem;font-weight:750;transition:background .2s,transform .2s}
.auth-panel .btn-primary:hover{background:#6d1726;border-color:#6d1726;transform:translateY(-1px)}
.auth-panel a{color:var(--cojuka-red);font-weight:650}
.auth-panel .btn-outline-primary{color:var(--cojuka-red);border-color:#ad5361;border-radius:11px;min-height:54px;font-weight:750}
.auth-panel .btn-outline-primary:hover{background:#861c2d;color:#fff}
.auth-panel .alert{border-radius:12px}
.auth-back{display:inline-flex;margin-top:29px;color:#6d7580!important;font-size:.86rem;text-decoration:none}
.auth-back:hover{text-decoration:underline}
.auth-divider{display:flex;align-items:center;gap:16px;margin:25px 0;color:#8b929d;font-size:.82rem}
.auth-divider::before,.auth-divider::after{content:"";flex:1;height:1px;background:#e1e4e8}
.auth-password-wrap{position:relative}
.auth-password-wrap .form-control{padding-right:65px}
.auth-password-toggle{position:absolute;right:8px;top:7px;min-width:44px;height:43px;background:transparent;border:0;border-radius:8px;color:#697484;font-size:.8rem;font-weight:700}
.auth-password-toggle:hover,.auth-password-toggle:focus-visible{background:#f3f4f6;color:#861c2d}
.auth-lang{position:absolute;top:25px;right:clamp(24px,4vw,70px);font-size:.8rem;color:#626b75}
.auth-lang select{border:1px solid #e3e5e9;border-radius:13px;background:#fff;padding:9px 13px;color:#202630;font-weight:750;box-shadow:0 5px 18px #00000009}
@media(max-width:1050px){.auth-shell{grid-template-columns:minmax(0,1fr) minmax(400px,1fr)}.auth-intro{padding:40px 30px}.auth-features{grid-template-columns:1fr;gap:8px}.auth-feature{display:flex;align-items:center;gap:10px;padding:10px}.auth-feature-icon{margin:0;flex-shrink:0}.auth-feature small{display:none}}
@media(max-width:850px){.auth-shell{grid-template-columns:1fr}.auth-intro{min-height:0;padding:25px 25px 33px;gap:24px}.auth-brand img{width:210px}.auth-message{margin:0}.auth-intro h2{font-size:clamp(2.1rem,7vw,3rem);margin:14px 0}.auth-intro p{font-size:.95rem;line-height:1.6}.auth-features{display:none}.auth-note{display:none}.auth-rule{display:none}.auth-workspace{min-height:540px;padding:72px 24px 55px}.auth-panel{max-width:520px}.auth-lang{top:19px;right:24px}}
@media(max-width:480px){.auth-intro{padding:18px 20px 25px}.auth-brand{padding:8px 11px}.auth-brand img{width:180px}.auth-intro h2{font-size:2rem}.auth-intro p{font-size:.88rem;margin:0}.auth-workspace{padding:70px 20px 42px}.auth-panel h1{font-size:2.45rem}.auth-panel .description{margin-bottom:27px}.auth-panel .form-control{min-height:53px}}
@media(prefers-reduced-motion:reduce){.auth-panel .btn-primary{transition:none}}
</style>
</head>
<body>
<div class="auth-shell">
<aside class="auth-intro" aria-label="Présentation de l'espace de gestion COJUKA">
<a class="auth-brand" href="{{ route('home') }}" aria-label="Retour à COJUKA Consulting Group"><img src="{{ asset('images/cojuka-logo.svg') }}?v=20261015-red" alt="COJUKA Consulting Group"></a>
<div class="auth-message">
<span class="auth-rule"></span>
<div class="eyebrow">Espace de gestion</div>
<h2>Une vision<br>commune.<br><span>Une gestion<br>maîtrisée.</span></h2>
<span class="auth-accent"></span>
<p>Un portail centralisé pour suivre les entités, les projets, les actifs et les opérations du groupe, au sein d'un environnement professionnel structuré.</p>
<div class="auth-features">
<div class="auth-feature"><span class="auth-feature-icon" aria-hidden="true">▦</span><div><strong>Direction générale</strong><small>Pilotage stratégique du groupe</small></div></div>
<div class="auth-feature"><span class="auth-feature-icon" aria-hidden="true">▥</span><div><strong>Projets & actifs</strong><small>Suivi des ressources</small></div></div>
<div class="auth-feature"><span class="auth-feature-icon" aria-hidden="true">◇</span><div><strong>Opérations</strong><small>Coordination des activités</small></div></div>
</div>
</div>
<div class="auth-note">Accès réservé aux utilisateurs autorisés · COJUKA Consulting Group</div>
</aside>
<main class="auth-workspace">
<div class="auth-panel">
@yield('content')
<a class="auth-back" href="{{ route('home') }}">← Retour au site institutionnel</a>
</div>
</main>
</div>
@yield('page_scripts')
</body>
</html>