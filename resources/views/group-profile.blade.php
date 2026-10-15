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
.entity-hero:after{content:"";position:absolute;width:46vw;aspect-ratio:1;right:-10%;top:0;border:1px solid #ffffff20;border-radius:50%;box-shadow:0 0 0 80px #ffffff08,0 0 0 160px #ffffff04;pointer-events:none}
.entity-hero .container{position:relative;z-index:1}
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
</style>
@include('partials.cojuka-design')
</head>
<body>
@include('partials.cojuka-header')
<main>
<header class="entity-hero"><div class="container">
<p class="eyebrow mb-3">COJUKA CONSULTING GROUP</p><p class="text-white-50 mb-4">Entité / {{ $profile['category'] }}</p>
<h1 class="mb-4">{{ $profile['name'] }}</h1>
<p class="lead mb-4">{{ $profile['summary'] }}</p>
<div class="d-flex gap-3 flex-wrap"><a class="btn btn-light btn-pill" href="#presentation">Découvrir l'entité ↗</a><a class="btn btn-outline-light btn-pill" href="{{ route('group.portal') }}">Toutes les entités</a></div>
</div></header>
<section class="section-pad" id="presentation"><div class="container"><div class="row g-5">
<div class="col-lg-8"><p class="eyebrow">Présentation institutionnelle</p><h2 class="display-title mb-4">{{ $profile['headline'] }}</h2><p class="lead text-secondary" style="line-height:1.9">{{ $profile['description'] }}</p></div>
<div class="col-lg-4"><div class="info-card"><h3 class="h5 fw-bold mb-4">Informations</h3><p><strong>Secteur :</strong> {{ $profile['category'] }}</p><p><strong>Implantation :</strong> {{ $profile['location'] }}</p><p class="text-secondary small mb-0">Les coordonnées, documents et informations complémentaires seront ajoutés après validation par l'administration.</p></div></div>
</div></div></section>
<section class="section-pad soft"><div class="container"><p class="eyebrow mb-3">Activités &amp; perspectives</p><h2 class="display-title mb-5">Nos axes de développement</h2><div class="row g-4">
@foreach($profile['focus'] as $index => $item)
<div class="col-md-4"><article class="info-card"><div class="index mb-3">{{ str_pad($index+1,2,'0',STR_PAD_LEFT) }}</div><h3 class="h5 fw-bold mb-3">{{ $item[0] }}</h3><p class="text-secondary mb-0">{{ $item[1] }}</p></article></div>
@endforeach
</div></div></section>
<section class="section-pad"><div class="container"><div class="row align-items-center g-4"><div class="col-lg-8"><p class="eyebrow">Écosystème numérique</p><h2 class="display-title mb-3">Une entité, une présence digitale.</h2><p class="text-secondary lead">Cette page institutionnelle fait partie du portail COJUKA Group. Une application web dédiée pourra être reliée ici lors de son développement et de sa mise en service.</p></div><div class="col-lg-4 text-lg-end"><a class="btn btn-dark btn-pill" href="{{ route('group.portal') }}">Explorer le groupe ↗</a></div></div></div></section>
</main>
<footer><div class="container d-flex flex-wrap justify-content-between gap-3"><strong>COJUKA Consulting Group · {{ $profile['name'] }}</strong><span>© {{ date('Y') }}</span><a class="text-white" href="{{ route('home') }}">← Accueil</a></div></footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body></html>