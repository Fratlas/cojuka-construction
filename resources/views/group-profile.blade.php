@extends('layouts.cojuka-public')
@section('page_head')
<meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1">
<meta name="description" content="{{ $profile['summary'] }}">
<title>COJUKA Consulting Group — {{ $profile['name'] }}</title>
<link rel="icon" type="image/svg+xml" href="{{ asset('favicon.svg') }}">

<style>
body{font-family:system-ui,-apple-system,Segoe UI,sans-serif;color:#151923}a{text-decoration:none}
.entity-hero{min-height:76vh;display:flex;align-items:center;position:relative;overflow:hidden;color:#fff;background:#24313d;padding:100px 0;background:#101923 url('https://images.unsplash.com/photo-1518709268805-4e9042af9f23?auto=format&fit=crop&w=1200&q=74&fm=webp') center/cover no-repeat}
.entity-hero .entity-background-video{position:absolute;inset:0;width:100%;height:100%;object-fit:cover;z-index:0;opacity:0;transition:opacity .65s ease}.entity-hero .entity-background-video.is-playing{opacity:.82}.entity-hero .entity-video-overlay{position:absolute;inset:0;z-index:1;background:linear-gradient(90deg,rgba(15,23,32,.72),rgba(22,32,43,.13))}
.entity-hero .container{position:relative;z-index:2}
.eyebrow{font-size:.8rem;font-weight:750;letter-spacing:.17em;text-transform:uppercase;color:#fff}
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
.entity-video-loader{display:none!important;position:absolute;inset:0;z-index:1;display:flex;flex-direction:column;align-items:center;justify-content:center;gap:14px;background:#f7f7f7;transition:opacity .5s ease;pointer-events:none}
.entity-video-loader img{width:190px;max-width:55vw;height:auto;max-height:80px;object-fit:contain}
.entity-video-loader .spinner{width:32px;height:32px;border:3px solid #e8dfe1;border-top-color:#86212e;border-radius:50%;animation:entityLogoSpin .85s linear infinite}
.entity-video-loader .label{color:#86212e;font-weight:650;font-size:.78rem;letter-spacing:.04em}
.entity-video-loader.is-hidden{opacity:0;visibility:hidden}
@keyframes entityLogoSpin{to{transform:rotate(360deg)}}
@media(prefers-reduced-motion:reduce){.entity-video-loader .spinner{animation:none}}

.entity-photo-tile{margin:0;background:#fff;border-radius:22px;overflow:hidden;box-shadow:0 15px 40px rgba(13,25,39,.08);transition:transform .4s ease,box-shadow .4s ease}
.entity-photo-tile img{width:100%;aspect-ratio:4/3;height:auto;object-fit:cover;display:block;transition:transform .8s cubic-bezier(.22,1,.36,1)}
.entity-photo-tile figcaption{padding:18px 20px;color:#3b4755;font-weight:650;line-height:1.5}
.entity-photo-tile:hover{transform:translateY(-7px);box-shadow:0 24px 50px rgba(13,25,39,.15)}
.entity-photo-tile:hover img{transform:scale(1.045)}
.entity-photo-tile img{background:#dfe5ec}
.entity-hero .lead{text-shadow:0 2px 16px rgba(0,0,0,.4)}
.entity-photo-tile:focus-within{outline:2px solid #a22a40;outline-offset:3px}
.entity-service-photo{overflow:hidden}
.entity-service-photo>img{display:block;width:calc(100% + 60px);max-width:none;height:200px;object-fit:cover;margin:-30px -30px 24px;border-radius:20px 20px 0 0}
@media(max-width:767px){.entity-service-photo>img{width:calc(100% + 48px);margin:-24px -24px 22px}}
@media(prefers-reduced-motion:reduce){.entity-photo-tile,.entity-photo-tile img{transition:none!important;transform:none!important}}
</style>
@endsection
@section('content')
@php
// Photographies d'illustration sectorielles : elles ne représentent pas nécessairement des réalisations COJUKA.
$cojukaPhotos = [
 'kojuka-mining.mp4'=>[
  ['https://images.hellogravel.com/variants/guides/37e44abca47c0db2/bingham-canyon-mine-aerial-scaled-content-900w.webp','Vue aérienne illustrative d’une mine à ciel ouvert'],
  ['https://images.unsplash.com/photo-1504307651254-35680f356dfd','Engins et travaux de terrassement'],
  ['https://images.unsplash.com/photo-1581092160607-ee22621dd758','Équipements industriels et activités techniques'],
 ],
 'eden-park-investments.mp4'=>[
  ['https://images.unsplash.com/photo-1600607687939-ce8a6c25118c','Architecture immobilière contemporaine'],
  ['https://images.unsplash.com/photo-1600596542815-ffad4c1539a9','Résidence contemporaine et patrimoine immobilier'],
  ['https://images.unsplash.com/photo-1487958449943-2429e8be8625','Architecture et investissement foncier'],
 ],
 'impact-center.mp4'=>[
  ['https://images.unsplash.com/photo-1497366811353-6870744d04b2','Espace professionnel contemporain'],
  ['https://images.unsplash.com/photo-1497366754035-f200968a6e72','Environnement de travail et collaboration'],
  ['https://images.unsplash.com/photo-1486406146926-c627a92ad1ab','Bâtiments et activités économiques'],
 ],
 'construction.mp4'=>[
  ['https://images.unsplash.com/photo-1503387762-592deb58ef4e','Chantier de construction et équipements'],
  ['https://images.unsplash.com/photo-1527576539890-dfa815648363','Projet architectural contemporain'],
  ['https://images.unsplash.com/photo-1600585154340-be6161a56a0c','Bâtiment et aménagement immobilier'],
 ],
 'logistique.mp4'=>[
  ['https://images.unsplash.com/photo-1494412519320-aa613dfb7738','Transport maritime et conteneurs'],
  ['https://images.unsplash.com/photo-1586528116311-ad8dd3c8310d','Entreposage et organisation logistique'],
  ['https://images.unsplash.com/photo-1578575437130-527eed3abbec','Coordination des moyens opérationnels'],
 ],
 'consultance.mp4'=>[
  ['https://images.unsplash.com/photo-1521737711867-e3b97375f902','Espace de travail collaboratif'],
  ['https://images.unsplash.com/photo-1556761175-b413da4baf72','Bureaux et environnement professionnel'],
  ['https://images.unsplash.com/photo-1460925895917-afdab827c52f','Organisation et développement stratégique'],
 ],
];
 $cojukaPhotos['genie.mp4'] = [
  ['https://images.unsplash.com/photo-1541888946425-d81bb19240f5','Travaux de génie civil et chantier'],
  ['https://images.unsplash.com/photo-1511818966892-d7d671e672a2','Architecture et structures'],
  ['https://images.unsplash.com/photo-1581092160562-40aa08e78837','Ingénierie et études techniques'],
 ];
 $cojukaPhotos['energie.mp4'] = [
  ['https://images.unsplash.com/photo-1473341304170-971dccb5ac1e','Infrastructure électrique et lignes haute tension'],
  ['https://images.unsplash.com/photo-1509391366360-2e959784a276','Installation photovoltaïque'],
  ['https://images.unsplash.com/photo-1497435334941-8c899ee9e8e9','Énergie renouvelable et production'],
 ];
 $cojukaPhotos['materiel.mp4'] = [
  ['https://images.unsplash.com/photo-1581094288338-2314dddb7ece','Équipements et machines industrielles'],
  ['https://images.unsplash.com/photo-1565008447742-97f6f38c985c','Matériel de chantier'],
  ['https://images.unsplash.com/photo-1581092580497-e0d23cbdf1dc','Atelier et équipements techniques'],
 ];
 $cojukaPhotos['education.mp4'] = [
  ['https://images.unsplash.com/photo-1503676260728-1c00da094a0b','Environnement scolaire et apprentissage'],
  ['https://images.unsplash.com/photo-1497633762265-9d179a990aa6','Bibliothèque et documentation'],
  ['https://images.unsplash.com/photo-1427504494785-3a9ca7044f45','Salle d’enseignement'],
 ];
 $cojukaPhotos['cargo.mp4'] = [
  ['https://images.unsplash.com/photo-1565793298595-6ba897a279a7','Fret maritime et transport de conteneurs'],
  ['https://images.unsplash.com/photo-1497436072909-60f362e1d4b1','Conteneurs et transport de marchandises'],
  ['https://images.unsplash.com/photo-1451187580459-43490279c0fa','Entrepôt et préparation des expéditions'],
 ];
 $cojukaPhotos['sante.mp4'] = [
  ['https://images.unsplash.com/photo-1519494026892-80bbd2d6fd0d','Bâtiment hospitalier et infrastructures de santé'],
  ['https://images.unsplash.com/photo-1538108149393-fbbd81895907','Établissement de santé'],
  ['https://images.unsplash.com/photo-1551076805-e1869033e561','Équipements et environnement médical'],
 ];
 $cojukaPhotos['public.mp4'] = [
  ['https://images.unsplash.com/photo-1497366216548-37526070297c','Bâtiments institutionnels'],
  ['https://images.unsplash.com/photo-1529107386315-e1a2ed48a620','Institutions et gouvernance'],
  ['https://images.unsplash.com/photo-1504384308090-c894fdcc538d','Coordination administrative'],
 ];
$entityPhotos = $cojukaPhotos[$profile['video'] ?? ''] ?? (isset($profile['photo']) ? [[$profile['photo'], $profile['category']], ['https://images.unsplash.com/photo-1487958449943-2429e8be8625', 'Perspectives et infrastructures'], ['https://images.unsplash.com/photo-1497366811353-6870744d04b2', 'Coordination des projets']] : $cojukaPhotos['construction.mp4']);

$entityHighlights = [
 'kojuka-mining.mp4'=>[
  ['Ressources naturelles','Présentation des perspectives liées à l’activité minière et aux territoires concernés.'],
  ['Carrières et matériaux','Étude des besoins et des opportunités autour des carrières et des matériaux.'],
  ['Synergies opérationnelles','Articulation des projets miniers avec la construction et la logistique.'],
 ],
 'construction.mp4'=>[
  ['Études préalables','Définition du périmètre technique et des besoins de chaque projet.'],
  ['Organisation des chantiers','Coordination des intervenants et des étapes de réalisation.'],
  ['Infrastructures','Approche adaptée aux bâtiments, aux ouvrages et aux aménagements.'],
 ],
 'logistique.mp4'=>[
  ['Transport et acheminement','Organisation des flux et des moyens nécessaires aux opérations.'],
  ['Chaîne d’approvisionnement','Identification des contraintes et suivi des besoins logistiques.'],
  ['Coordination terrain','Lien entre fournisseurs, transporteurs et porteurs de projets.'],
 ],
 'consultance.mp4'=>[
  ['Conseil stratégique','Clarification des enjeux, des priorités et des objectifs des organisations.'],
  ['Accompagnement institutionnel','Approche adaptée aux besoins des institutions et des organismes publics.'],
  ['Conseil aux entreprises','Appui à la structuration et à l’évolution des activités privées.'],
 ],
 'eden-park-investments.mp4'=>[
  ['Patrimoine immobilier','Présentation des enjeux de suivi et de valorisation des actifs.'],
  ['Développement foncier','Analyse des opportunités et préparation des projets immobiliers.'],
  ['Partenariats','Dialogue avec les investisseurs et professionnels concernés.'],
 ],
 'impact-center.mp4'=>[
  ['Ancrage belge','Mise en valeur de la dimension européenne du groupe.'],
  ['Réseaux et coopération','Identification de pistes d’échange entre partenaires.'],
  ['Projets internationaux','Cadre de présentation des initiatives après validation.'],
 ],
];
$entityHighlightsCurrent = $entityHighlights[$profile['video'] ?? ''] ?? array_map(static fn ($item) => [$item[0], $item[1]], $profile['services'] ?? []);

@endphp

<main class="cojuka-profile-main">
<header class="entity-hero" style="background-image:linear-gradient(90deg,rgba(15,23,32,.43),rgba(20,30,40,.045)),url('{{ $entityPhotos[0][0] }}{{ str_contains($entityPhotos[0][0], 'unsplash.com') ? '?auto=format&fit=crop&w=1600&q=75&fm=webp' : '' }}')">
<div class="entity-video-loader" aria-live="polite"><img src="{{ asset('images/cojuka-logo.svg') }}" alt="COJUKA Consulting Group" width="190" height="60"><span class="spinner" aria-hidden="true"></span><span class="label">Chargement de la vidéo…</span></div>
<video class="entity-background-video" muted loop playsinline preload="none" aria-hidden="true" data-local="{{ asset('videos/entities/'.$profile['video']) }}" data-remote="{{ $profile['video_url'] ?? '' }}" poster="{{ $entityPhotos[0][0] }}{{ str_contains($entityPhotos[0][0], 'unsplash.com') ? '?auto=format&fit=crop&w=1200&q=74&fm=webp' : '' }}"></video>
<div class="entity-video-overlay" aria-hidden="true"></div>
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
<section class="section-pad entity-photo-section" aria-label="Découvrir les activités en images"><div class="container"><div class="row align-items-end g-4 mb-4"><div class="col-lg-8"><p class="eyebrow">Notre univers en images</p><h2 class="display-title mb-0">Des perspectives concrètes pour {{ $profile['name'] }}.</h2></div><div class="col-lg-4"><p class="text-secondary mb-0">Photographies d'illustration des secteurs d'activité. Ces images ne constituent pas un reportage sur les sites ou réalisations du groupe.</p></div></div><div class="row g-4">@foreach($entityPhotos as $photo)<div class="col-md-4"><figure class="entity-photo-tile h-100"><img role="button" tabindex="0" data-cg-photo-popup
 data-photo-title="{{ $photo[1] }}"
 data-photo-sector="{{ $profile['name'] }}"
 data-photo-description="Une illustration de {{ $photo[1] }} dans l’univers {{ $profile['name'] }}. Le visuel présente un domaine d’activité et ne constitue pas une référence de réalisation du groupe."
 src="{{ $photo[0] }}{{ str_contains($photo[0], 'unsplash.com') ? '?auto=format&fit=crop&w=900&q=75&fm=webp' : '' }}" alt="{{ $photo[1] }}" loading="lazy" decoding="async" width="900" height="650"><figcaption>{{ $photo[1] }}</figcaption></figure></div>@endforeach</div></div></section>
{{-- Extensive mineral specimen gallery exclusive to COJUKA Mining.
     Does not alter construction, logistics or the other group structures. --}}
@if(($profile['video'] ?? '') === 'kojuka-mining.mp4')
 @include('partials.cojuka-mining-showcase')
@endif
<section class="section-pad entity-highlights" aria-labelledby="entity-highlights-title"><div class="container"><p class="eyebrow mb-3">Les points clés de cette entité</p><h2 id="entity-highlights-title" class="display-title mb-4">Des priorités adaptées à notre domaine.</h2><div class="row g-4">@foreach($entityHighlightsCurrent as $highlight)<div class="col-md-4"><article class="info-card h-100"><div class="index mb-3">DOMAINE</div><h3 class="h4 fw-bold mb-3">{{ $highlight[0] }}</h3><p class="text-secondary mb-0">{{ $highlight[1] }}</p></article></div>@endforeach</div></div></section>
@php
$topicLinks = [
 'kojuka-mining.mp4'=>['mining-et-carrieres','Mining & carrières','Études préalables, matériaux et logistique minière.'],
 'energie.mp4'=>['energie-et-infrastructures','Énergie & infrastructures','Solutions énergétiques et préparation technique.'],
 'cargo.mp4'=>['cargo-et-fret','Cargo & fret','Acheminement, transport et coordination des marchandises.'],
];
$topicLink=$topicLinks[$profile['video'] ?? ''] ?? null;
@endphp
@if($topicLink)
<section class="py-5" style="background:#27323b;color:white"><div class="container py-5 d-flex flex-column flex-lg-row align-items-lg-center justify-content-between gap-4"><div><p class="eyebrow text-white">Dossier approfondi</p><h2 class="display-5 fw-bold">{{ $topicLink[1] }}</h2><p class="mb-0 text-white">{{ $topicLink[2] }}</p></div><a class="btn btn-light rounded-pill px-4" href="{{ route('group.topic',$topicLink[0]) }}">Explorer le dossier ↗</a></div></section>
@endif
<section class="section-pad soft" id="mission-vision"><div class="container"><div class="row g-4"><div class="col-lg-6"><article class="info-card"><div class="index mb-3">NOTRE MISSION</div><h2 class="h2 fw-bold mb-3">Une action orientée vers les projets.</h2><p class="lead text-secondary mb-0">{{ $profile['mission'] }}</p></article></div><div class="col-lg-6"><article class="info-card"><div class="index mb-3">NOTRE VISION</div><h2 class="h2 fw-bold mb-3">Construire dans la durée.</h2><p class="lead text-secondary mb-0">{{ $profile['vision'] }}</p></article></div></div></div></section>
<section class="section-pad soft"><div class="container"><p class="eyebrow mb-3">Notre positionnement</p><div class="row g-5 align-items-start"><div class="col-lg-5"><h2 class="display-title">{{ $profile['intro'] }}</h2></div><div class="col-lg-7"><p class="lead text-secondary" style="line-height:1.85">{{ $profile['details'] }}</p><div class="d-flex flex-wrap gap-2 mt-4"><span class="badge rounded-pill text-bg-light border px-3 py-2">{{ $profile['category'] }}</span><span class="badge rounded-pill text-bg-light border px-3 py-2">{{ $profile['location'] }}</span></div></div></div></div></section>
<section class="section-pad"><div class="container"><p class="eyebrow mb-3">Domaines d'intervention</p><h2 class="display-title mb-5">Nos activités et expertises</h2><div class="row g-4">
@foreach($profile['services'] as $index => $service)
<div class="col-md-6"><article class="info-card"><div class="index mb-3">EXPERTISE</div><h3 class="h4 fw-bold mb-3">{{ $service[0] }}</h3><p class="text-secondary mb-0">{{ $service[1] }}</p></article></div>
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
<section class="section-pad"><div class="container"><div class="row align-items-center g-4"><div class="col-lg-8"><p class="eyebrow">Un groupe, des expertises</p><h2 class="display-title mb-3">Des activités au service de projets concrets.</h2><p class="text-secondary lead">COJUKA Consulting Group privilégie le secteur minier et s’appuie sur des entités complémentaires dans les carrières, l’immobilier, la construction, la logistique et la consultance.</p></div><div class="col-lg-4 text-lg-end"><a class="btn btn-dark btn-pill" href="{{ route('group.portal') }}">Explorer le groupe ↗</a></div></div></div></section>
<section class="section-pad" style="background:#111724;color:#fff"><div class="container"><div class="row align-items-center g-4"><div class="col-lg-8"><p class="eyebrow mb-3">Entrons en contact</p><h2 class="display-title mb-3">Parlons de votre projet.</h2><p class="lead text-white-50 mb-0">Présentez votre besoin à COJUKA Consulting Group pour être orienté vers l'entité et les interlocuteurs concernés.</p></div><div class="col-lg-4 text-lg-end"><a class="btn btn-light btn-pill" href="{{ route('home') }}#contact">Contacter le groupe ↗</a></div></div></div></section>
</main>
@endsection
@section('page_scripts')
<script>
document.addEventListener('DOMContentLoaded',function(){
 document.querySelectorAll('.entity-background-video').forEach(function(video){
  const loader=video.parentElement.querySelector('.entity-video-loader');
  const remote=video.dataset.remote;
  let source=remote?1:0,timeout=null,finished=false;
  function hide(){if(loader)loader.classList.add('is-hidden');clearTimeout(timeout)}
  function start(url){
   if(!url){video.style.display='none';hide();return}
   clearTimeout(timeout);video.src=url;video.load();
   const promise=video.play();
   if(promise&&promise.catch)promise.catch(e=>{if(e&&e.name==='NotAllowedError'){hide();return}if(video.error)fail()});
   timeout=setTimeout(()=>{if(video.readyState<2)fail();else hide()},4500);
  }
  function fail(){
   if(finished)return;
   if(source===0&&remote){source=1;start(remote)}
   else{finished=true;video.pause();video.classList.remove('is-playing');video.style.display='none';hide()}
  }
  video.addEventListener('error',fail);
  video.addEventListener('loadeddata',hide);
  video.addEventListener('playing',function(){video.classList.add('is-playing');hide()});
  video.addEventListener('waiting',function(){video.classList.remove('is-playing');hide()});
  const begin=()=>start(remote||video.dataset.local);
  if(window.matchMedia('(prefers-reduced-motion: reduce)').matches || (navigator.connection&&navigator.connection.saveData)){hide();return}
  if('IntersectionObserver' in window){const observer=new IntersectionObserver(entries=>{if(entries.some(e=>e.isIntersecting)){observer.disconnect();begin()}},{rootMargin:'150px'});observer.observe(video)}else begin();
 });
});
</script>
@endsection
