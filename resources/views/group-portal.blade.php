@extends('layouts.cojuka-public')
@section('page_head')
<link rel="icon" type="image/svg+xml" href="{{ asset('favicon.svg') }}?v=2"><meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1"><title>COJUKA Group — Nos entités</title><style>body{font-family:system-ui;color:#171923}a{text-decoration:none}.hero{background:radial-gradient(circle at 85% 20%,#702332,#101827 45%,#090d16);color:white;padding:160px 0 125px}.hero h1{font-size:clamp(3.5rem,9vw,8rem);letter-spacing:-.07em;font-weight:800;line-height:1}.eyebrow{letter-spacing:.2em;text-transform:uppercase;font-size:.8rem;color:#fff}.card{border:1px solid #e8e8ed;border-radius:22px;transition:.3s}.card:hover{transform:translateY(-6px);box-shadow:0 20px 50px #1112}.tag{color:#ae273d;font-size:.8rem;font-weight:700;text-transform:uppercase}section{padding:90px 0}.btn-dark{border-radius:50px;padding:13px 22px}.cojuka-entities-hero{padding:0!important;position:relative;overflow:hidden;isolation:isolate;background:radial-gradient(circle at 85% 30%,#702332,#101827 48%,#090d16)}.cojuka-entities-hero>.cojuka-video-carousel{position:absolute;inset:0;z-index:0}.cojuka-entities-hero:before{content:"";position:absolute;inset:0;z-index:1;pointer-events:none;background:linear-gradient(90deg,rgba(7,12,23,.88),rgba(7,12,23,.65) 55%,rgba(7,12,23,.35))}.cojuka-entities-hero>#cojukaEntitiesCarousel{position:relative;z-index:2}.cojuka-entities-hero>.cojuka-carousel-controls{z-index:5;bottom:72px}.cojuka-entity-slide{min-height:clamp(590px,calc(100svh - 76px),850px);display:flex;align-items:center;padding-top:100px;padding-bottom:115px}.cojuka-entity-slide .row{width:100%}.cojuka-entity-slide h1{font-size:clamp(3rem,6.5vw,7rem);overflow-wrap:anywhere;line-height:1.05}.cojuka-entity-slide .lead{max-width:700px;line-height:1.7}.cojuka-slide-index{font-weight:700;color:#fff;letter-spacing:.18em}.cojuka-entity-orb{width:clamp(180px,23vw,340px);aspect-ratio:1;border-radius:50%;border:1px solid #efb9c45c;display:grid;place-items:center;background:radial-gradient(circle at 25% 25%,#b65b6c,#541b30 50%,#171f32 75%);box-shadow:0 0 0 45px #edb8c008,0 0 0 95px #edb8c008;animation:cojukaFloat 7s ease-in-out infinite}.cojuka-entity-orb span{font-size:clamp(1.3rem,2.6vw,2.3rem);font-weight:850;letter-spacing:.12em;color:#fff9}.cojuka-carousel-arrow{width:5%;min-width:42px}.cojuka-entity-indicators{bottom:30px;gap:7px}.cojuka-entity-indicators button{width:24px;height:4px;border-radius:10px}.cojuka-entities-hero .carousel-item{transition:opacity .85s ease}@keyframes cojukaFloat{50%{transform:translateY(-18px)}}@media(max-width:767px){.cojuka-entity-slide{padding:85px 35px 110px;min-height:640px}.cojuka-entity-slide h1{font-size:clamp(2.8rem,10vw,4.8rem)}.cojuka-carousel-arrow{min-width:28px}}@media(prefers-reduced-motion:reduce){.cojuka-entity-orb{animation:none}.cojuka-entities-hero .carousel-item{transition:none}}
</style>
@endsection
@section('content')
@php
$presentationSlides = [
 ['name'=>'Eden Park Investments','category'=>'Investissement immobilier · SA','description'=>'Investissements fonciers et immobiliers, avec des projets en cours au Congo et à l’étranger.','number'=>'01','slug'=>'eden-park-investments'],
 ['name'=>'Impact Center','category'=>'Participation internationale · Belgique','description'=>'Société de droit belge détenue majoritairement par COJUKA Group.','number'=>'02','slug'=>'impact-center'],
 ['name'=>'Mining','category'=>'Mines · SA','description'=>'Environ cinquante carrés miniers dans la zone stratégique 30 du Haut-Katanga, avec des activités en développement.','number'=>'03','slug'=>'kojuka-mining'],
 ['name'=>'Construction','category'=>'Direction opérationnelle','description'=>'Construction et développement de projets au sein du groupe.','number'=>'04','slug'=>'construction'],
 ['name'=>'Logistique','category'=>'Direction opérationnelle','description'=>'Coordination des opérations de transport et de logistique.','number'=>'05','slug'=>'logistique'],
 ['name'=>'Consultance','category'=>'Conseil et développement','description'=>'Accompagnement des acteurs privés, des entreprises et des institutions étatiques.','number'=>'06','slug'=>'consultance'],
];
@endphp
<header class="hero cojuka-entities-hero" aria-label="Présentation des entités du groupe">
 @include('partials.cojuka-hero-carousel')
 <div id="cojukaEntitiesCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="6500" data-bs-pause="hover" aria-roledescription="carrousel">
  <div class="carousel-inner">
   @foreach($presentationSlides as $index => $slide)
   <div class="carousel-item {{ $index === 0 ? 'active' : '' }}" data-bs-interval="6500">
    <div class="container cojuka-entity-slide">
     <div class="row align-items-center g-4">
      <div class="col-lg-8">
       <div class="eyebrow mb-4 text-uppercase">COJUKA CONSULTING GROUP / {{ $slide['category'] }}</div>
       <div class="cojuka-slide-index mb-3">{{ $slide['number'] }} / 06</div>
       <h1>{{ $slide['name'] }}</h1>
       <p class="lead text-white-50 mt-4">{{ $slide['description'] }}</p>
       <div class="d-flex flex-wrap gap-3 mt-4">
        <a href="{{ route('group.profile', $slide['slug']) }}" class="btn btn-light rounded-pill px-4 py-3">Découvrir cette entité ↗</a>
        <a href="{{ route('home') }}" class="btn btn-outline-light rounded-pill px-4 py-3">← Accueil</a>
       </div>
      </div>

     </div>
    </div>
   </div>
   @endforeach
  </div>
  <button class="carousel-control-prev cojuka-carousel-arrow" type="button" data-bs-target="#cojukaEntitiesCarousel" data-bs-slide="prev" aria-label="Entité précédente"><span class="carousel-control-prev-icon" aria-hidden="true"></span></button>
  <button class="carousel-control-next cojuka-carousel-arrow" type="button" data-bs-target="#cojukaEntitiesCarousel" data-bs-slide="next" aria-label="Entité suivante"><span class="carousel-control-next-icon" aria-hidden="true"></span></button>
  <div class="carousel-indicators cojuka-entity-indicators">
   @foreach($presentationSlides as $index => $slide)
   <button type="button" data-bs-target="#cojukaEntitiesCarousel" data-bs-slide-to="{{ $index }}" class="{{ $index === 0 ? 'active' : '' }}" aria-current="{{ $index === 0 ? 'true' : 'false' }}" aria-label="Afficher {{ $slide['name'] }}"></button>
   @endforeach
  </div>
 </div>
</header><section id="entites"><div class="container"><p class="eyebrow">Notre organisation</p><h2 class="display-5 fw-bold mb-5">Les entités du groupe</h2><div class="row g-4">@forelse($entities as $entity)<div class="col-md-6 col-lg-4"><article class="card h-100 p-4"><div class="tag mb-4">{{ $entity->sector ?: $entity->type }}</div><h3 class="h4 fw-bold">{{ $entity->name }}</h3><p class="text-secondary flex-grow-1">{{ $entity->summary }}</p><a href="{{ route('group.entity',$entity->slug) }}" class="text-dark fw-semibold">Découvrir →</a></article></div>@empty<div class="col-12"><p class="text-secondary">Les fiches des entités seront publiées prochainement.</p></div>@endforelse</div></div></section><section class="bg-light" id="architecture-groupe"><div class="container"><p class="eyebrow">Panorama institutionnel</p><h2 class="display-6 fw-bold mb-3">Sociétés, participations et directions</h2><p class="text-secondary mb-4">Présentation de l'écosystème du groupe. Les fiches détaillées apparaissent dans le registre ci-dessus lorsqu'elles sont publiées par l'administration.</p><div class="row g-4 mb-5">
@foreach([
['Eden Park Investments','Investissement immobilier · SA','Actifs fonciers et immobiliers, projets au Congo et à l’étranger.','eden-park-investments'],
['Impact Center','Participation · Belgique','Société de droit belge détenue majoritairement par le groupe.','impact-center'],
['Mining','Mines · SA','Environ cinquante carrés miniers dans la zone 30, Haut-Katanga ; activités en développement.','kojuka-mining'],
['Construction','Direction opérationnelle','Construction et développement de projets.','construction'],
['Logistique','Direction opérationnelle','Transport, coordination et logistique.','logistique'],
['Consultance','Direction stratégique','Conseil pour les secteurs privé, entrepreneurial et étatique.','consultance']
] as $structure)
<div class="col-md-6 col-lg-4"><article class="card h-100 p-4"><div class="tag mb-3">{{ $structure[1] }}</div><h3 class="h4 fw-bold">{{ $structure[0] }}</h3><p class="text-secondary mb-0">{{ $structure[2] }}</p><a class="fw-semibold text-dark mt-3 d-inline-block" href="{{ route('group.profile', $structure[3]) }}">Découvrir cette entité ↗</a></article></div>
@endforeach
</div><div class="card p-4 mb-5"><h3 class="h5 fw-bold">Architecture web du groupe</h3><p class="text-secondary mb-0">Le portail principal centralise les informations des différentes structures. Une application web complète par entité est prévue dans l'écosystème numérique, avec des liens vers les sites individuels lors de leur mise en ligne.</p></div><h2 class="display-6 fw-bold mb-4">Projets et initiatives</h2><div class="row g-4">@forelse($projects as $project)<div class="col-md-4"><div class="card p-4 h-100"><div class="tag">{{ $project->entity->name }}</div><h3 class="h5 mt-3">{{ $project->title }}</h3><p class="text-secondary">{{ $project->location }}</p></div></div>@empty<p class="text-secondary">Les projets publics seront présentés ici après validation.</p>@endforelse</div></div></section>
@endsection
@section('page_scripts')
<script>document.addEventListener('DOMContentLoaded',function(){if(window.matchMedia('(prefers-reduced-motion: reduce)').matches){const el=document.getElementById('cojukaEntitiesCarousel');if(el && window.bootstrap)bootstrap.Carousel.getOrCreateInstance(el,{interval:false}).pause();}});</script>
@endsection
