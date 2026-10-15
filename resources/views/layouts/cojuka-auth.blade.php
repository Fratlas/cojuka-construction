<!doctype html><html lang="fr"><head><meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1"><title>@yield('title') — COJUKA Gestion</title><link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"><style>
body{margin:0;background:#fafafa;color:#1a202b;font-family:system-ui,-apple-system,Segoe UI,sans-serif}
.auth-shell{display:grid;grid-template-columns:1fr 1fr;min-height:100vh}
.auth-intro{background:linear-gradient(90deg,rgba(8,18,29,.85),rgba(8,18,29,.46)),url('https://images.unsplash.com/photo-1497366754035-f200968a6e72?auto=format&fit=crop&w=2000&q=88') center/cover no-repeat;background-color:#15202b;color:#fff;display:flex;flex-direction:column;justify-content:space-between;padding:clamp(35px,6vw,95px);position:relative;overflow:hidden}
.auth-intro:after{content:"";position:absolute;inset:0;background:linear-gradient(0deg,rgba(3,12,23,.72),transparent 55%);pointer-events:none}
.auth-intro>*{position:relative;z-index:1}.auth-intro img{display:block;width:clamp(205px,22vw,280px);max-width:90%;height:auto;max-height:100px;object-fit:contain;background:#fff;border-radius:15px;padding:12px 16px;box-shadow:0 14px 40px #0003}
.auth-intro .eyebrow{font-size:.78rem;letter-spacing:.18em;color:#fff;font-weight:750}
.auth-intro h2{text-shadow:0 2px 15px #0007;font-size:clamp(2.6rem,4.5vw,5rem);letter-spacing:-.07em;line-height:1.08;font-weight:800;margin:24px 0}
.auth-intro p{font-size:1.08rem;line-height:1.8;color:#f2f3f5;max-width:550px;text-shadow:0 1px 8px #0007}
.auth-tags{display:flex;flex-wrap:wrap;gap:9px;margin-top:25px}.auth-tags span{background:#07132255;backdrop-filter:blur(6px);border:1px solid #ffffff65;padding:9px 13px;border-radius:30px;font-size:.78rem}
.auth-note{font-size:.8rem;color:#e9edf0}.auth-workspace{display:flex;align-items:center;justify-content:center;padding:45px clamp(22px,5vw,85px)}
.auth-panel{width:100%;max-width:465px}.auth-panel h1{font-weight:800;letter-spacing:-.05em;font-size:clamp(2rem,3vw,2.7rem)}
.auth-panel .eyebrow{font-size:.75rem;font-weight:800;letter-spacing:.14em;color:#86212e;text-transform:uppercase}
.auth-panel .description{color:#6a7382;line-height:1.7;margin:16px 0 30px}
.auth-panel .form-label{font-weight:650;font-size:.88rem}.auth-panel .form-control{border-radius:12px;min-height:52px;border-color:#dce0e6}
.auth-panel .form-control:focus{border-color:#86212e;box-shadow:0 0 0 3px #86212e18}
.auth-panel .btn-primary{background:#86212e;border-color:#86212e;border-radius:12px;min-height:52px;font-weight:750}
.auth-panel .btn-primary:hover{background:#651622;border-color:#651622}.auth-panel a{color:#86212e;font-weight:650}
.auth-back{display:inline-block;margin-top:32px;color:#747b85!important;font-size:.88rem;text-decoration:none}
@media(max-width:900px){.auth-shell{grid-template-columns:1fr}.auth-intro{padding:32px 26px;gap:24px}.auth-intro h2{font-size:2.2rem;margin:12px 0}.auth-intro p{font-size:.94rem}.auth-note{display:none}.auth-workspace{padding:45px 22px 60px}}
@media(max-width:500px){.auth-intro{padding:22px}.auth-intro img{width:210px;max-width:78%}.auth-intro h2{font-size:1.8rem}.auth-tags span{padding:7px 9px;font-size:.72rem}}
</style></head><body><div class="auth-shell"><aside class="auth-intro"><a href="{{ route('home') }}"><img src="{{ asset('images/cojuka-logo.svg') }}?v=20261015-red" alt="COJUKA Consulting Group"></a><div><div class="eyebrow">ESPACE DE GESTION · COJUKA</div><h2>Une vision commune.<br>Une gestion maîtrisée.</h2><p>Un portail pour suivre les entités, les projets, les actifs et les opérations du groupe, au sein d'un environnement professionnel structuré.</p><div class="auth-tags"><span>Direction générale</span><span>Projets & actifs</span><span>Suivi des opérations</span></div></div><div class="auth-note">Accès réservé aux utilisateurs autorisés · COJUKA Consulting Group</div></aside><main class="auth-workspace"><div class="auth-panel">@yield('content')<a class="auth-back" href="{{ route('home') }}">← Retour au site institutionnel</a></div></main></div></body></html>