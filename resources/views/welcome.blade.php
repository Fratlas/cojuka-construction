@extends('layouts.cojuka-public')
@section('page_head')
<link rel="icon" type="image/svg+xml" href="{{ asset('favicon.svg') }}?v=2">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="theme-color" content="#f5f5f7">
<meta name="description" content="COJUKA Consulting Group — Groupe de construction, logistique, consultance étatique et privée, investissements et mines.">
<title>COJUKA Consulting Group — Accueil</title>
<link rel="preconnect" href="https://images.unsplash.com">
<link rel="preconnect" href="https://cdn.jsdelivr.net" crossorigin>

<style>
:root{--ink:#151517;--muted:#77777d;--surface:#f5f5f7;--blue:#0066cc}
*{box-sizing:border-box}html{scroll-behavior:smooth}body{margin:0;background:#fff;color:var(--ink);font-family:-apple-system,BlinkMacSystemFont,"Segoe UI",Arial,sans-serif;-webkit-font-smoothing:antialiased}a{text-decoration:none}section{scroll-margin-top:76px}
.site-nav{background:rgba(255,255,255,.88);backdrop-filter:saturate(180%) blur(22px);-webkit-backdrop-filter:saturate(180%) blur(22px);border-bottom:1px solid rgba(0,0,0,.055);min-height:64px}.brand{font-size:1.14rem;letter-spacing:-.045em;font-weight:800;color:#151517}.brand-mark{display:inline-block;width:9px;height:9px;background:#0066cc;border-radius:50%;margin-left:3px}.site-nav .navbar-nav{flex-wrap:nowrap;row-gap:.25rem}.site-nav .nav-link{color:#414145;font-size:.84rem;font-weight:500;margin-left:1.5rem}.site-nav .nav-link:hover{color:var(--blue)}.nav-contact{border:1px solid #dedee2;border-radius:100px;padding:.55rem 1rem!important}
.hero{min-height:calc(100svh - 64px);position:relative;display:flex;align-items:flex-end;overflow:hidden;color:#fff;background:#17191c}.hero:before{content:"";position:absolute;inset:0;background:linear-gradient(180deg,rgba(0,0,0,.12) 10%,rgba(0,0,0,.1) 38%,rgba(0,0,0,.7) 100%),url('https://images.unsplash.com/photo-1600607687939-ce8a6c25118c?auto=format&fit=crop&w=1600&q=78&fm=webp') center/cover no-repeat;transform:scale(1.015)}.hero-content{position:relative;z-index:1;padding-top:5rem;padding-bottom:7rem}.eyebrow{font-size:.78rem;text-transform:uppercase;letter-spacing:.23em;font-weight:650}.hero h1{font-size:clamp(3.6rem,9vw,9rem);font-weight:720;letter-spacing:-.075em;line-height:.96;max-width:1100px;margin:1.5rem 0 2rem}.hero-sub{font-size:clamp(1rem,2vw,1.4rem);max-width:570px;line-height:1.6;color:rgba(255,255,255,.85)}.btn-pill{display:inline-flex;align-items:center;justify-content:center;gap:.8rem;border-radius:50px;padding:1rem 1.6rem;font-size:.92rem;font-weight:600;transition:transform .25s,background .25s}.btn-pill:hover{transform:translateY(-2px)}.btn-white{background:white;color:#161616}.btn-white:hover{background:#eee;color:#161616}.btn-dark-custom{background:#151517;color:white}.btn-dark-custom:hover{background:#333;color:#fff}.btn-outline-light-custom{border:1px solid rgba(255,255,255,.5);color:white}.btn-outline-light-custom:hover{background:rgba(255,255,255,.14);color:white}
.section-pad{padding:clamp(5rem,10vw,10rem) 0}.section-kicker{font-size:.85rem;color:var(--blue);font-weight:650;letter-spacing:.04em}.display-heading{font-size:clamp(2.7rem,5.8vw,5.8rem);line-height:1.08;letter-spacing:-.065em;font-weight:720}.muted{color:var(--muted)}.intro-copy{font-size:clamp(1.15rem,2vw,1.6rem);line-height:1.65;letter-spacing:-.02em}.soft-section{background:var(--surface)}.service-card{border:0;border-radius:22px;overflow:hidden;background:#fff;height:100%;transition:transform .3s,box-shadow .3s}.service-card:hover{transform:translateY(-6px);box-shadow:0 18px 45px rgba(0,0,0,.08)}.service-img{width:100%;height:320px;object-fit:cover;display:block}.service-content{padding:2rem}.service-index{font-size:.75rem;color:#85858c;font-weight:650;letter-spacing:.1em}.service-title{font-size:1.55rem;letter-spacing:-.04em;font-weight:680;margin:1rem 0}.service-description{line-height:1.7;color:#707077;margin:0}
.statement{min-height:620px;display:flex;align-items:center;background:linear-gradient(90deg,rgba(0,0,0,.65),rgba(0,0,0,.1)),url('https://images.unsplash.com/photo-1487958449943-2429e8be8625?auto=format&fit=crop&w=1500&q=78&fm=webp') center/cover;color:white}.statement h2{font-size:clamp(3rem,7vw,7rem);letter-spacing:-.07em;line-height:1.02;font-weight:720;max-width:900px}.feature-line{border-top:1px solid #dedee2;padding:1.7rem 0}.feature-number{color:#c5c9d0;font-size:clamp(2.4rem,5vw,4.2rem);font-weight:800;line-height:1;letter-spacing:-.07em;font-variant-numeric:tabular-nums}.feature-title{font-size:1.4rem;font-weight:650;letter-spacing:-.035em}.feature-description{color:#74747a;line-height:1.7}.contact-section{background:#111214;color:#fff}.contact-section .muted{color:#b4b4b9}.contact-section h2{font-size:clamp(3.1rem,7vw,7rem);font-weight:720;letter-spacing:-.07em;line-height:1.05}.footer{background:#111214;color:#a6a6aa;border-top:1px solid #343438;font-size:.85rem}.footer a{color:#dedee0}
.reveal{opacity:0;transform:translateY(24px);transition:opacity .75s ease,transform .75s ease}.reveal.visible{opacity:1;transform:none}
@media(max-width:991px){.site-nav .nav-link{margin-left:0;padding:.8rem 0}.hero-content{padding-bottom:6rem}.hero h1{max-width:700px}.service-img{height:260px}}@media(max-width:575px){.hero{min-height:760px}.hero-content{padding-bottom:5rem}.hero h1{font-size:3.65rem}.statement{min-height:510px}.service-content{padding:1.5rem}.section-pad{padding:5rem 0}}@media(prefers-reduced-motion:reduce){html{scroll-behavior:auto}.reveal{opacity:1;transform:none;transition:none}.service-card,.btn-pill{transition:none}}

/* Premium cinematic motion, with accessibility fallbacks */
@keyframes heroReveal{from{opacity:0;transform:translateY(55px);filter:blur(10px)}to{opacity:1;transform:translateY(0);filter:blur(0)}}
@keyframes softZoom{from{transform:scale(1.14)}to{transform:scale(1.015)}}
@keyframes glowShift{0%,100%{opacity:.25;transform:translate(-20%,-10%)}50%{opacity:.55;transform:translate(15%,10%)}}
@keyframes lineExpand{from{transform:scaleX(0)}to{transform:scaleX(1)}}
@keyframes scrollCue{0%,100%{transform:translateY(0);opacity:.5}55%{transform:translateY(9px);opacity:1}}
.hero:before{animation:softZoom 2.5s cubic-bezier(.2,.8,.2,1) both;will-change:transform}
.hero-content>.eyebrow{animation:heroReveal .85s .15s both}
.hero-content>h1{animation:heroReveal 1.1s .3s both}
.hero-content>.hero-sub{animation:heroReveal 1.1s .5s both}
.hero-content>.d-flex{animation:heroReveal 1s .72s both}
.hero:after{content:"";position:absolute;inset:0;pointer-events:none;background:radial-gradient(ellipse at 75% 55%,rgba(120,175,255,.13),transparent 45%);animation:glowShift 12s ease-in-out infinite alternate}
.hero-content{z-index:2}
.site-nav{transition:box-shadow .3s,background .3s}
.site-nav.is-scrolled{box-shadow:0 8px 35px rgba(0,0,0,.07);background:rgba(255,255,255,.94)}
.nav-link{position:relative}
.site-nav .nav-link:not(.nav-contact):after{content:"";position:absolute;bottom:4px;left:0;right:0;height:1px;background:#0066cc;transform:scaleX(0);transform-origin:left;transition:transform .3s}
.site-nav .nav-link:not(.nav-contact):hover:after{transform:scaleX(1)}
.reveal{transition:opacity .95s cubic-bezier(.22,1,.36,1),transform .95s cubic-bezier(.22,1,.36,1)}
.reveal[data-reveal="left"]{transform:translateX(-42px)}
.reveal[data-reveal="right"]{transform:translateX(42px)}
.reveal.visible{transform:translate(0,0)}
.service-card{transform-style:preserve-3d;will-change:transform;transition:transform .4s cubic-bezier(.2,.8,.2,1),box-shadow .4s}
.service-img{transition:transform 1.2s cubic-bezier(.2,.8,.2,1)}
.service-card:hover .service-img{transform:scale(1.075)}
.service-card:hover{box-shadow:0 28px 70px rgba(0,0,0,.12)}
.feature-line{transition:padding-left .35s,background .35s}
.feature-line:hover{padding-left:12px;background:rgba(0,102,204,.025)}
.btn-pill{position:relative;overflow:hidden}
.btn-pill:before{content:"";position:absolute;inset:0;background:linear-gradient(105deg,transparent 25%,rgba(255,255,255,.3) 50%,transparent 75%);transform:translateX(-150%);transition:transform .65s}
.btn-pill:hover:before{transform:translateX(150%)}
.statement{background-attachment:fixed}
.progress-line{position:fixed;z-index:1050;top:0;left:0;height:3px;width:100%;background:#0066cc;transform:scaleX(0);transform-origin:left;pointer-events:none}
.scroll-indicator{position:absolute;bottom:28px;right:max(5%,20px);z-index:3;font-size:11px;letter-spacing:.18em;text-transform:uppercase;display:flex;align-items:center;gap:12px;color:rgba(255,255,255,.8)}
.scroll-indicator span{font-size:24px;animation:scrollCue 2s infinite}
@media(max-width:767px){.statement{background-attachment:scroll}.service-card{will-change:auto}.hero:after{display:none}}
@media(prefers-reduced-motion:reduce){.hero:before,.hero:after,.hero-content>.eyebrow,.hero-content>h1,.hero-content>.hero-sub,.hero-content>.d-flex,.scroll-indicator span{animation:none!important}.reveal,.reveal[data-reveal]{opacity:1!important;transform:none!important;transition:none!important}.service-img,.service-card,.btn-pill{transition:none!important}.statement{background-attachment:scroll}}


/* Photographic construction gallery */
.showcase-3d{background:#101216;color:#fff;overflow:hidden}.showcase-3d .section-kicker{color:#fff}.showcase-3d .muted{color:#b6bac2}
.photo-showcase{background:#191e27;border:1px solid #353b45;border-radius:24px;overflow:hidden;height:100%;transition:transform .4s,box-shadow .4s}
.photo-showcase:hover{transform:translateY(-6px);box-shadow:0 24px 55px #0006}
.photo-showcase-media{position:relative;overflow:hidden;aspect-ratio:1.24;background:#252b35}
.photo-showcase-media img{display:block;width:100%;height:100%;object-fit:cover;transition:transform .8s ease}
.photo-showcase:hover img{transform:scale(1.055)}
.photo-showcase-tag{position:absolute;top:22px;left:22px;padding:9px 14px;border-radius:99px;background:#fffef1e8;color:#18202c;font-size:.72rem;font-weight:800;letter-spacing:.1em}
.photo-showcase .model-label{padding:25px 28px 30px;display:flex;align-items:center;justify-content:space-between;gap:16px}
.photo-showcase .model-label h3{font-size:1.45rem;letter-spacing:-.04em;font-weight:750;margin:0}
.photo-showcase .model-label p{font-size:.9rem;color:#b6bac2;margin:8px 0 0;line-height:1.6}
.photo-showcase-link{display:grid;place-items:center;flex:none;width:44px;height:44px;border:1px solid #ffffff55;border-radius:50%;color:#fff;font-size:1.4rem}
.photo-showcase-link:hover{background:#fff;color:#101216}
@media(prefers-reduced-motion:reduce){.photo-showcase,.photo-showcase-media img{transition:none}}

.cojuka-hero-video{position:absolute;inset:0;width:100%;height:100%;object-fit:cover;z-index:0;pointer-events:none}.hero:before{z-index:1;background:linear-gradient(90deg,rgba(6,12,21,.72),rgba(6,12,21,.35) 65%,rgba(6,12,21,.25))!important;transform:none!important}.hero-content,.scroll-indicator{position:relative;z-index:3}.hero .cojuka-carousel-controls{z-index:6}.hero .cojuka-video-carousel{z-index:0}.hero .cojuka-video-carousel video{object-fit:cover}.hero:after{z-index:2}@media(prefers-reduced-motion:reduce){.cojuka-hero-video{display:none}.hero:before{background:linear-gradient(90deg,rgba(6,12,21,.62),rgba(6,12,21,.28)),url('https://images.unsplash.com/photo-1600607687939-ce8a6c25118c?auto=format&fit=crop&w=1600&q=78&fm=webp') center/cover no-repeat!important}}
.hero h1{font-size:clamp(3.3rem,7.6vw,7.8rem);max-width:1200px}.hero .cojuka-video-carousel{position:absolute;inset:0;z-index:0}.hero .cojuka-carousel-controls{z-index:6}.hero .hero-content{z-index:3}.hero:before{pointer-events:none;background:linear-gradient(90deg,rgba(5,11,22,.78),rgba(5,11,22,.45) 65%,rgba(5,11,22,.28))!important}@media(max-width:767px){.hero-content{padding-top:4rem;padding-bottom:7rem}.hero h1{font-size:clamp(3.1rem,11vw,5.5rem)}}

/* Editorial hierarchy and a calmer premium motion language */
.hero h1{max-width:1050px;font-weight:760;line-height:.98;letter-spacing:-.075em;text-wrap:balance}
.hero .eyebrow{font-size:.74rem;letter-spacing:.18em;color:#fff}
.hero-sub{font-size:clamp(1.08rem,1.7vw,1.34rem);max-width:630px;line-height:1.75}
.hero:before{background:linear-gradient(90deg,rgba(7,12,20,.78),rgba(7,12,20,.4) 68%,rgba(7,12,20,.2))!important}
.display-heading{font-weight:760;letter-spacing:-.065em;text-wrap:balance}
.section-kicker{color:#86212e}
.btn-pill{min-height:48px}
.btn-white{background:#fff;color:#151517}
.btn-outline-light-custom{background:#ffffff08}
.service-card,.photo-showcase{border-radius:24px}
@media(max-width:575px){.hero h1{font-size:clamp(2.85rem,11.2vw,4.2rem)}.hero .eyebrow{letter-spacing:.12em}.hero-content{padding-top:3rem}}
@media(prefers-reduced-motion:reduce){.hero:before,.hero:after,.hero-content>*{animation:none!important}}
.hero{align-items:center!important}.hero-content{padding-top:clamp(2.5rem,5vh,4.5rem)!important;padding-bottom:clamp(5rem,9vh,7rem)!important}.hero h1{margin-top:1.15rem;margin-bottom:1.5rem}.hero-sub{margin-bottom:1.4rem!important}@media(max-width:767px){.hero-content{padding-top:2.5rem!important;padding-bottom:6.5rem!important}}
/* More legible editorial process steps */
.feature-line{align-items:start;padding:2rem 0}
.feature-line .feature-number{color:#c5c9d0;font-size:clamp(2.4rem,5vw,4.2rem)!important;font-weight:800!important;line-height:1.05}
@media(max-width:575px){.feature-line .feature-number{font-size:2.5rem!important}.feature-line .col-2{width:19%}.feature-line .col-10{width:81%}}
</style>
@endsection
@section('content')
@include('partials.cojuka-intro')
<div class="progress-line" id="readingProgress" aria-hidden="true"></div>

<main>
<section id="accueil" class="hero" aria-labelledby="hero-title">
@include('partials.cojuka-hero-carousel')
<div class="container hero-content">
<div class="eyebrow">GROUPE MULTISECTORIEL · RÉPUBLIQUE DÉMOCRATIQUE DU CONGO</div>
<h1 id="hero-title">COJUKA <span style="color:#fff">Consulting</span><br>Group</h1>
<p class="hero-sub mb-4">Construction, logistique, consultance étatique et privée, investissements et développement des secteurs stratégiques.</p>
<div class="d-flex gap-3 flex-wrap"><a href="{{ route('group') }}" class="btn-pill btn-white">Découvrir Consulting Group <span aria-hidden="true">↗</span></a><a href="{{ route('group.portal') }}" class="btn-pill btn-outline-light-custom">Nos entités <span aria-hidden="true">↓</span></a></div>
</div><div class="scroll-indicator" aria-hidden="true">Défiler <span>↓</span></div>
</section>
@include('partials.cojuka-entities-carousel')
<section id="apropos" class="section-pad">
<div class="container">
 <div class="row g-5 align-items-start">
  <div class="col-lg-4 reveal"><div class="section-kicker mb-4">01 / LE GROUPE</div><p class="muted">Une vision commune, plusieurs entités complémentaires.</p></div>
  <div class="col-lg-8 reveal">
   <h2 class="display-heading mb-4">COJUKA Consulting Group.<br><span class="muted">Un écosystème au service du développement.</span></h2>
   <p class="intro-copy muted mt-4">COJUKA Consulting Group réunit des directions opérationnelles, des sociétés et des participations dans plusieurs secteurs. Son organisation couvre notamment la construction, la logistique, la consultance étatique et privée, l'investissement immobilier et les activités minières.</p>
   <p class="intro-copy muted">Le site principal présente le groupe et centralise les informations de ses entités. Chaque structure dispose d'une page dédiée, avec la perspective de développer progressivement sa propre application web.</p>
   <div class="d-flex flex-wrap gap-3 mt-4"><a class="btn-pill btn-dark-custom" href="{{ route('group') }}">Présentation complète du groupe ↗</a><a class="btn-pill" style="border:1px solid #d9dce2;color:#151517" href="{{ route('group.portal') }}">Découvrir les entités ↗</a></div>
  </div>
 </div>
</div>
</section>
<section id="entites-groupe" class="section-pad soft-section">
<div class="container">
 <div class="section-kicker mb-3">02 / LES ENTITÉS DU GROUPE</div>
 <h2 class="display-heading mb-4">Chaque entité.<br><span class="muted">Sa propre présentation.</span></h2>
 <p class="muted fs-5 mb-5">Explorez les activités, les domaines d'intervention et les perspectives de développement de chaque structure.</p>
 <div class="row g-4">
 @foreach([
 ['COJUKA Consulting Group Construction','construction','Construction et développement de projets.'],
 ['COJUKA Consulting Group Logistique','logistique','Coordination des activités de transport et de logistique.'],
 ['COJUKA Consulting Group Consultance','consultance','Consultance étatique et privée, conseil aux organisations.'],
 ['Eden Park Investments','eden-park-investments','Investissements immobiliers et fonciers au Congo et à l’international.'],
 ['Impact Center','impact-center','Société de droit belge, participation majoritaire du groupe.'],
 ['Kojuka Mining','kojuka-mining','Développement des activités minières au Haut-Katanga.']
 ] as $entity)
 <div class="col-md-6 col-xl-4 reveal"><article class="service-card h-100"><div class="service-content"><div class="section-kicker mb-3">COJUKA CONSULTING GROUP</div><h3 class="h4 fw-bold">{{ $entity[0] }}</h3><p class="muted">{{ $entity[2] }}</p><a class="fw-semibold d-inline-block mt-3" href="{{ route('group.profile', $entity[1]) }}">Voir la page de l'entité ↗</a></div></article></div>
 @endforeach
 </div>
</div>
</section>
<section id="expertises" class="section-pad soft-section">
<div class="container">
<div class="row align-items-end mb-5 g-4"><div class="col-lg-8 reveal"><div class="section-kicker mb-3">02 / NOS EXPERTISES</div><h2 class="display-heading">L'exigence à<br>chaque étape.</h2></div><div class="col-lg-4 reveal"><p class="muted fs-5 mb-0">Une approche globale pour donner forme à des projets cohérents, fonctionnels et inspirants.</p></div></div>
<div class="row g-4">
<div class="col-md-6 col-lg-4 reveal"><article class="service-card"><img class="service-img" src="https://images.unsplash.com/photo-1487958449943-2429e8be8625?auto=format&fit=crop&w=760&q=75&fm=webp" alt="Architecture contemporaine aux lignes épurées" loading="lazy" decoding="async"><div class="service-content"><div class="service-index">01 / CONCEPTION</div><h3 class="service-title">Architecture & design</h3><p class="service-description">Imaginer des espaces où l'esthétique, la fonction et le confort se rencontrent.</p></div></article></div>
<div class="col-md-6 col-lg-4 reveal"><article class="service-card"><img class="service-img" src="https://images.unsplash.com/photo-1504307651254-35680f356dfd?auto=format&fit=crop&w=760&q=75&fm=webp" alt="Chantier de construction en cours" loading="lazy" decoding="async"><div class="service-content"><div class="service-index">02 / RÉALISATION</div><h3 class="service-title">Construction</h3><p class="service-description">Transformer les idées en réalisations concrètes avec rigueur et attention aux détails.</p></div></article></div>
<div class="col-md-6 col-lg-4 reveal"><article class="service-card"><img class="service-img" src="https://images.unsplash.com/photo-1600607687920-4e2a09cf159d?auto=format&fit=crop&w=760&q=75&fm=webp" alt="Intérieur contemporain lumineux" loading="lazy" decoding="async"><div class="service-content"><div class="service-index">03 / ESPACES</div><h3 class="service-title">Aménagement</h3><p class="service-description">Concevoir des environnements harmonieux, pensés pour les personnes qui les habitent.</p></div></article></div>
</div>
</div>
</section>

<section id="galerie-construction" class="section-pad showcase-3d">
<div class="container">
<div class="row align-items-end g-4 mb-5"><div class="col-lg-8 reveal"><div class="section-kicker mb-3">CONSTRUCTION & ARCHITECTURE</div><h2 class="display-heading">L'excellence se révèle<br>dans chaque détail.</h2></div><div class="col-lg-4 reveal"><p class="muted fs-5 mb-0">Découvrez deux univers visuels : la puissance des chantiers et l'élégance de l'architecture contemporaine.</p></div></div>
<div class="row g-4">
<div class="col-lg-6 reveal"><article class="model-card photo-showcase"><div class="photo-showcase-media"><img src="https://images.unsplash.com/photo-1580901368919-7738efb0f87e?auto=format&fit=crop&w=1100&q=76&fm=webp" alt="Engin de chantier photographié sur un site de construction" loading="lazy" decoding="async"><span class="photo-showcase-tag">01 / GÉNIE CIVIL</span></div><div class="model-label"><div><h3>Engins et travaux de chantier</h3><p>Puissance, coordination et précision au service des projets.</p></div><a class="photo-showcase-link" href="{{ route('group.profile','construction') }}" aria-label="Découvrir l'entité Construction">↗</a></div></article></div>
<div class="col-lg-6 reveal"><article class="model-card photo-showcase"><div class="photo-showcase-media"><img src="https://images.unsplash.com/photo-1600607687920-4e2a09cf159d?auto=format&fit=crop&w=1100&q=76&fm=webp" alt="Architecture contemporaine haut de gamme, intérieur lumineux aux finitions soignées" loading="lazy" decoding="async"><span class="photo-showcase-tag">02 / ARCHITECTURE</span></div><div class="model-label"><div><h3>Architecture contemporaine</h3><p>Volumes raffinés, lumière naturelle et matériaux élégants.</p></div><a class="photo-showcase-link" href="{{ route('group.profile','construction') }}" aria-label="Découvrir l'architecture et la construction">↗</a></div></article></div>
</div>
<p class="small mt-4 muted">Photographies d'illustration, non présentées comme des réalisations de COJUKA.</p>
</div></section>
<section id="vision" class="statement"><div class="container reveal"><div class="eyebrow mb-4">03 / NOTRE VISION</div><h2>Le futur prend forme aujourd'hui.</h2><p class="fs-5 mt-4" style="max-width:600px;color:rgba(255,255,255,.85)">Chaque espace peut devenir une nouvelle façon de vivre, de travailler et d'imaginer demain.</p></div></section>
<section class="section-pad"><div class="container"><div class="row g-5"><div class="col-lg-5 reveal"><div class="section-kicker mb-3">NOTRE APPROCHE</div><h2 class="display-heading">Chaque détail compte.</h2></div><div class="col-lg-7 reveal">
<div class="feature-line row g-3"><div class="col-2 feature-number">01</div><div class="col-10"><h3 class="feature-title">Écouter et comprendre</h3><p class="feature-description mb-0">Prendre le temps de saisir les besoins et les ambitions derrière chaque projet.</p></div></div>
<div class="feature-line row g-3"><div class="col-2 feature-number">02</div><div class="col-10"><h3 class="feature-title">Concevoir avec précision</h3><p class="feature-description mb-0">Faire dialoguer créativité, faisabilité et cohérence architecturale.</p></div></div>
<div class="feature-line row g-3"><div class="col-2 feature-number">03</div><div class="col-10"><h3 class="feature-title">Construire pour durer</h3><p class="feature-description mb-0">Privilégier des choix réfléchis et une vision à long terme.</p></div></div>
</div></div></div></section>
<section id="contact" class="section-pad contact-section"><div class="container reveal"><div class="section-kicker mb-4" style="color:#fff">04 / CONTACT</div><h2>Votre prochain projet<br>commence ici.</h2><p class="muted fs-4 mt-4 mb-5">Parlons de votre vision et donnons-lui forme ensemble.</p><a href="mailto:contact@cojuka.com?subject=Projet%20COJUKA" class="btn-pill btn-white" aria-label="Préparer un courriel de contact (adresse provisoire)">Nous écrire <span aria-hidden="true">↗</span></a><p class="small muted mt-3">Coordonnées officielles à renseigner avant publication.</p></div></section>
</main>
@endsection
@section('page_scripts')
<script>
(function(){const elements=document.querySelectorAll('.reveal');if(!('IntersectionObserver' in window)){elements.forEach(el=>el.classList.add('visible'));return;}const observer=new IntersectionObserver(entries=>{entries.forEach(entry=>{if(entry.isIntersecting){entry.target.classList.add('visible');observer.unobserve(entry.target);}})},{threshold:.12});elements.forEach(el=>observer.observe(el));document.querySelectorAll('#mainNav .nav-link').forEach(link=>link.addEventListener('click',()=>{const nav=document.getElementById('mainNav');if(nav.classList.contains('show'))bootstrap.Collapse.getOrCreateInstance(nav).hide();}));})();

(function(){
 const reduced=window.matchMedia('(prefers-reduced-motion: reduce)').matches;
 const progress=document.getElementById('readingProgress');
 const nav=document.querySelector('.site-nav');
 let ticking=false;
 function updateScroll(){const max=document.documentElement.scrollHeight-window.innerHeight;const fraction=max>0?Math.min(1,window.scrollY/max):0;if(progress)progress.style.transform='scaleX('+fraction+')';if(nav)nav.classList.toggle('is-scrolled',window.scrollY>25);ticking=false;}
 window.addEventListener('scroll',()=>{if(!ticking){requestAnimationFrame(updateScroll);ticking=true;}},{passive:true});updateScroll();
 if(reduced)return;
 const cards=document.querySelectorAll('.service-card');
 if(window.matchMedia('(hover: hover) and (pointer: fine)').matches){
  cards.forEach(card=>{
   card.addEventListener('pointermove',event=>{const rect=card.getBoundingClientRect();const x=(event.clientX-rect.left)/rect.width-.5;const y=(event.clientY-rect.top)/rect.height-.5;card.style.transform='perspective(950px) rotateY('+(x*5)+'deg) rotateX('+(-y*5)+'deg) translateY(-5px)';});
   card.addEventListener('pointerleave',()=>{card.style.transform='';});
  });
 }
})();
</script>
@endsection
