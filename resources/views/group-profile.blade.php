<!doctype html>
<html lang="fr">
<head>
<meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1">
<meta name="description" content="{{ $profile['summary'] }}">
<title>COJUKA Consulting Group — {{ $profile['name'] }}</title>
<link rel="icon" type="image/svg+xml" href="{{ asset('favicon.svg') }}">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
body{font-family:system-ui,-apple-system,Segoe UI,sans-serif;color:#151923}a{text-decoration:none}
.entity-hero{min-height:76vh;display:flex;align-items:center;position:relative;overflow:hidden;color:#fff;background:radial-gradient(circle at 85% 40%,#78283e 0%,#20253b 42%,#090f1d 90%);padding:100px 0}
.entity-hero .entity-background-video{position:absolute;inset:0;width:100%;height:100%;object-fit:cover;z-index:0;opacity:.7}.entity-hero .entity-video-overlay{position:absolute;inset:0;z-index:1;background:linear-gradient(90deg,rgba(6,12,24,.88),rgba(6,12,24,.42))}
.entity-hero .container{position:relative;z-index:2}
.eyebrow{font-size:.8rem;font-weight:750;letter-spacing:.17em;text-transform:uppercase;color:#e8aebc}
.entity-hero h1{font-size:clamp(3.3rem,7vw,7.5rem);line-height:1.02;letter-spacing:-.07em;font-weight:850;overflow-wrap:anywhere}
.entity-hero .lead{max-width:720px;color:#e4e5ec;line-height:1.8}
.section-pad{padding:clamp(65px,8vw,115px) 0}
.display-title{font-size:clamp(2.2rem,4vw,4.3rem);font-weight:800;letter-spacing:-.06em}
.info-card{border:1px solid #e7e9ed;border-radius:22px;padding:30px;background:#fff;height:100%;transition:transform .25s,box-shadow .25s}
.info-card:hover{transform:translateY(-5px);box-shadow:0 18px 50px #15192312}
.info-card .index{color:#a32e42;font-weight:800;font-size:.85rem;letter-spacing:.12em}
.soft{background:#f5f6f8}
.btn-pill{border-radius:99px;padding:13px 25px}
footer{background:#111724;color:#fff;padding:32px 0}
@media(max-width:767px){.entity-hero{min-height:70vh;padding:90px 0}.entity-hero h1{font-size:clamp(2.7rem,10vw,4.5rem)}.info-card{padding:24px}}@media(prefers-reduced-motion:reduce){.info-card{transition:none}}
.entity-video-loader{position:absolute;inset:0;z-index:1;display:flex;flex-direction:column;align-items:center;justify-content:center;gap:14px;background:#f7f7f7;transition:opacity .5s ease;pointer-events:none}
.entity-video-loader img{width:190px;max-width:55vw;height:auto;max-height:80px;object-fit:contain}
.entity-video-loader .spinner{width:32px;height:32px;border:3px solid #e8dfe1;border-top-color:#86212e;border-radius:50%;animation:entityLogoSpin .85s linear infinite}
.entity-video-loader .label{color:#86212e;font-weight:650;font-size:.78rem;letter-spacing:.04em}
.entity-video-loader.is-hidden{opacity:0;visibility:hidden}
@keyframes entityLogoSpin{to{transform:rotate(360deg)}}
@media(prefers-reduced-motion:reduce){.entity-video-loader .spinner{animation:none}}
</style>
@include('partials.cojuka-design')
</head>
<body>
@include('partials.cojuka-header')
<main>
<header class="entity-hero">
<div class="entity-video-loader" aria-live="polite"><img src="{{ asset('images/cojuka-logo.svg') }}" alt="COJUKA Consulting Group" width="190" height="60"><span class="spinner" aria-hidden="true"></span><span class="label">Chargement de la vidéo…</span></div>
<video class="entity-background-video" autoplay muted loop playsinline preload="metadata" aria-hidden="true" data-local="{{ asset('videos/entities/'.$profile['video']) }}" data-remote="{{ $profile['video_url'] ?? '' }}" poster="https://images.unsplash.com/photo-1518709268805-4e9042af9f23?auto=format&fit=crop&w=1800&q=85"></video>
<script>
document.addEventListener('DOMContentLoaded',function(){
 document.querySelectorAll('.entity-background-video').forEach(function(video){
  const loader=video.parentElement.querySelector('.entity-video-loader');
  const remote=video.dataset.remote;
  let source=0,timeout=null,finished=false;
  function hide(){if(loader)loader.classList.add('is-hidden');clearTimeout(timeout)}
  function start(url){
   if(!url){video.style.display='none';hide();return}
   clearTimeout(timeout);video.src=url;video.load();
   const promise=video.play();
   if(promise&&promise.catch)promise.catch(e=>{if(e&&e.name==='NotAllowedError'){hide();return}if(video.error)fail()});
   timeout=setTimeout(()=>{if(video.readyState<2)fail();else hide()},8500);
  }
  function fail(){
   if(finished)return;
   if(source===0&&remote){source=1;start(remote)}
   else{finished=true;video.pause();video.style.display='none';hide()}
  }
  video.addEventListener('error',fail);
  video.addEventListener('loadeddata',hide);
  video.addEventListener('playing',hide);
  video.addEventListener('waiting',()=>{if(video.readyState<2&&loader&&!finished)loader.classList.remove('is-hidden')});
  start(video.dataset.local);
 });
});
</script><div class="entity-video-overlay" aria-hidden="true"></div>
<div class="container">
<p class="eyebrow mb-3">COJUKA CONSULTING GROUP</p><p class="text-white-50 mb-4">Entité / {{ $profile['category'] }}</p>
<h1 class="mb-4">{{ $profile['name'] }}</h1>
<p class="lead mb-4">{{ $profile['summary'] }}</p>
<div class="d-flex gap-3 flex-wrap"><a class="btn btn-light btn-pill" href="#presentation">Découvrir l'entité ↗</a><a class="btn btn-outline-light btn-pill" href="{{ route('group.portal') }}">Toutes les entités</a></div>
</div></header>
<section class="section-pad" id="presentation"><div class="container"><div class="row g-5">
<div class="col-lg-8"><p class="eyebrow">Présentation institutionnelle</p><h2 class="display-title mb-4">{{ $profile['headline'] }}</h2><p class="lead text-secondary" style="line-height:1.9">{{ $profile['description'] }}</p></div>
<div class="col-lg-4"><div class="info-card"><h3 class="h5 fw-bold mb-4">Informations</h3><p><strong>Secteur :</strong> {{ $profile['category'] }}</p><p><strong>Implantation :</strong> {{ $profile['location'] }}</p><p class="text-secondary small mb-0">Les coordonnées, documents et informations complémentaires seront ajoutés après validation par l'administration.</p></div></div>
</div></div></section>
<section class="section-pad soft" id="mission-vision"><div class="container"><div class="row g-4"><div class="col-lg-6"><article class="info-card"><div class="index mb-3">NOTRE MISSION</div><h2 class="h2 fw-bold mb-3">Une action orientée vers les projets.</h2><p class="lead text-secondary mb-0">{{ $profile['mission'] }}</p></article></div><div class="col-lg-6"><article class="info-card"><div class="index mb-3">NOTRE VISION</div><h2 class="h2 fw-bold mb-3">Construire dans la durée.</h2><p class="lead text-secondary mb-0">{{ $profile['vision'] }}</p></article></div></div></div></section>
<section class="section-pad soft"><div class="container"><p class="eyebrow mb-3">Notre positionnement</p><div class="row g-5 align-items-start"><div class="col-lg-5"><h2 class="display-title">{{ $profile['intro'] }}</h2></div><div class="col-lg-7"><p class="lead text-secondary" style="line-height:1.85">{{ $profile['details'] }}</p><div class="d-flex flex-wrap gap-2 mt-4"><span class="badge rounded-pill text-bg-light border px-3 py-2">{{ $profile['category'] }}</span><span class="badge rounded-pill text-bg-light border px-3 py-2">{{ $profile['location'] }}</span></div></div></div></div></section>
<section class="section-pad"><div class="container"><p class="eyebrow mb-3">Domaines d'intervention</p><h2 class="display-title mb-5">Nos activités et expertises</h2><div class="row g-4">
@foreach($profile['services'] as $index => $service)
<div class="col-md-6"><article class="info-card"><div class="index mb-3">{{ str_pad($index+1,2,'0',STR_PAD_LEFT) }} / EXPERTISE</div><h3 class="h4 fw-bold mb-3">{{ $service[0] }}</h3><p class="text-secondary mb-0">{{ $service[1] }}</p></article></div>
@endforeach
</div></div></section>
<section class="section-pad soft" id="publics"><div class="container"><p class="eyebrow mb-3">À qui nous nous adressons</p><h2 class="display-title mb-5">Des interlocuteurs, des besoins spécifiques.</h2><div class="row g-4">@foreach($profile['audiences'] as $index => $audience)<div class="col-md-4"><article class="info-card"><div class="index mb-3">0{{ $index+1 }} / PARTENAIRES</div><h3 class="h4 fw-bold mb-3">{{ $audience[0] }}</h3><p class="text-secondary mb-0">{{ $audience[1] }}</p></article></div>@endforeach</div></div></section>
<section class="section-pad soft"><div class="container"><p class="eyebrow mb-3">Activités &amp; perspectives</p><h2 class="display-title mb-5">Nos axes de développement</h2><div class="row g-4">
@foreach($profile['focus'] as $index => $item)
<div class="col-md-4"><article class="info-card"><div class="index mb-3">{{ str_pad($index+1,2,'0',STR_PAD_LEFT) }}</div><h3 class="h5 fw-bold mb-3">{{ $item[0] }}</h3><p class="text-secondary mb-0">{{ $item[1] }}</p></article></div>
@endforeach
</div></div></section>
<section class="section-pad"><div class="container"><p class="eyebrow mb-3">Notre démarche</p><h2 class="display-title mb-5">Une approche structurée</h2><div class="row g-4">
@foreach($profile['method'] as $index => $step)
<div class="col-md-4"><article class="info-card"><div class="index mb-3">ÉTAPE {{ str_pad($index+1,2,'0',STR_PAD_LEFT) }}</div><h3 class="h4 fw-bold mb-3">{{ $step[0] }}</h3><p class="text-secondary mb-0">{{ $step[1] }}</p></article></div>
@endforeach
</div></div></section>
<section class="section-pad soft" id="livrables"><div class="container"><p class="eyebrow mb-3">Exemples de livrables</p><h2 class="display-title mb-3">Des résultats documentés.</h2><p class="text-secondary mb-5">Selon le périmètre convenu, les interventions peuvent s'appuyer sur les documents et supports suivants.</p><div class="row g-4">@foreach($profile['deliverables'] as $index => $deliverable)<div class="col-md-4"><article class="info-card"><div class="index mb-3">0{{ $index+1 }} / LIVRABLE</div><h3 class="h4 fw-bold mb-3">{{ $deliverable[0] }}</h3><p class="text-secondary mb-0">{{ $deliverable[1] }}</p></article></div>@endforeach</div></div></section>
<section class="section-pad" id="questions"><div class="container"><div class="row g-5"><div class="col-lg-4"><p class="eyebrow">Questions fréquentes</p><h2 class="display-title">L'essentiel à savoir.</h2></div><div class="col-lg-8"><div class="accordion" id="cojukaEntityFaq">@foreach($profile['faq'] as $index => $faq)<div class="accordion-item border-0 border-bottom"><h3 class="accordion-header"><button class="accordion-button {{ $index===0?'':'collapsed' }} px-0 py-4 fw-semibold" type="button" data-bs-toggle="collapse" data-bs-target="#cojukaFaq{{ $index }}" aria-expanded="{{ $index===0?'true':'false' }}" aria-controls="cojukaFaq{{ $index }}">{{ $faq[0] }}</button></h3><div id="cojukaFaq{{ $index }}" class="accordion-collapse collapse {{ $index===0?'show':'' }}" data-bs-parent="#cojukaEntityFaq"><div class="accordion-body px-0 text-secondary">{{ $faq[1] }}</div></div></div>@endforeach</div></div></div></div></section>
<section class="section-pad soft"><div class="container"><div class="row align-items-center g-4"><div class="col-lg-8"><p class="eyebrow">Une organisation intégrée</p><h2 class="display-title mb-3">La force d'un écosystème.</h2><p class="lead text-secondary">COJUKA Consulting Group associe des expertises complémentaires. Découvrez les autres structures du groupe, leurs domaines d'intervention et leurs perspectives.</p></div><div class="col-lg-4 text-lg-end"><a class="btn btn-dark btn-pill" href="{{ route('group.portal') }}">Voir toutes les entités ↗</a></div></div><div class="row g-3 mt-4">
@foreach(\App\Http\Controllers\GroupProfileController::PROFILES as $slug => $related)
@if($related['name'] !== $profile['name'])
<div class="col-md-6 col-lg-4"><a class="info-card d-block text-dark text-decoration-none" href="{{ route('group.profile', $slug) }}"><div class="eyebrow mb-2">{{ $related['category'] }}</div><h3 class="h5 fw-bold mb-2">{{ $related['name'] }}</h3><span class="text-secondary">Découvrir ↗</span></a></div>
@endif
@endforeach
</div></div></section>
<section class="section-pad"><div class="container"><div class="row align-items-center g-4"><div class="col-lg-8"><p class="eyebrow">Écosystème numérique</p><h2 class="display-title mb-3">Une entité, une présence digitale.</h2><p class="text-secondary lead">Cette page institutionnelle fait partie du portail COJUKA Consulting Group. Une application web dédiée pourra être reliée ici lors de son développement et de sa mise en service.</p></div><div class="col-lg-4 text-lg-end"><a class="btn btn-dark btn-pill" href="{{ route('group.portal') }}">Explorer le groupe ↗</a></div></div></div></section>
<section class="section-pad" style="background:#111724;color:#fff"><div class="container"><div class="row align-items-center g-4"><div class="col-lg-8"><p class="eyebrow mb-3">Entrons en contact</p><h2 class="display-title mb-3">Parlons de votre projet.</h2><p class="lead text-white-50 mb-0">Présentez votre besoin à COJUKA Consulting Group pour être orienté vers l'entité et les interlocuteurs concernés.</p></div><div class="col-lg-4 text-lg-end"><a class="btn btn-light btn-pill" href="{{ route('home') }}#contact">Contacter le groupe ↗</a></div></div></div></section>
</main>
<footer><div class="container d-flex flex-wrap justify-content-between gap-3"><strong>COJUKA Consulting Group · {{ $profile['name'] }}</strong><span>© {{ date('Y') }}</span><a class="text-white" href="{{ route('home') }}">← Accueil</a></div></footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body></html>