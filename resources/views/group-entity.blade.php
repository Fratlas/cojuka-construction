@extends('layouts.cojuka-public')
@section('page_head')
<link rel="icon" type="image/svg+xml" href="{{ asset('favicon.svg') }}?v=2"><meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1"><title>{{ $entity->name }} — COJUKA Group</title><style>body{font-family:system-ui}.hero{background:radial-gradient(circle at 75% 20%,#78313f,#121722 65%);color:white;padding:145px 0 120px}h1{font-size:clamp(3.2rem,7vw,6rem);font-weight:800;letter-spacing:-.065em}.tag{color:#ffffff;text-transform:uppercase;letter-spacing:.2em;font-weight:700;font-size:.8rem}</style>

@endsection
@section('content')
@php
$slug=strtolower((string)($entity->slug ?? ''));
$sector=strtolower((string)($entity->sector ?? ''));
$entityVisuals=match(true){
 str_contains($slug,'mining'),str_contains($sector,'min')=>[
  ['https://images.unsplash.com/photo-1519003722824-194d4455a60c','Équipements et activité industrielle'],
  ['https://images.unsplash.com/photo-1504307651254-35680f356dfd','Travaux et chantier'],
 ],
 str_contains($slug,'eden'),str_contains($sector,'immob')=>[
  ['https://images.unsplash.com/photo-1600607687939-ce8a6c25118c','Architecture immobilière'],
  ['https://images.unsplash.com/photo-1600596542815-ffad4c1539a9','Investissement immobilier'],
 ],
 str_contains($slug,'logist')=>[
  ['https://images.unsplash.com/photo-1494412519320-aa613dfb7738','Transport et chaîne logistique'],
  ['https://images.unsplash.com/photo-1586528116311-ad8dd3c8310d','Entrepôt et logistique'],
 ],
 str_contains($slug,'impact'),str_contains($slug,'consult')=>[
  ['https://images.unsplash.com/photo-1497366754035-f200968a6e72','Collaboration et environnement professionnel'],
  ['https://images.unsplash.com/photo-1486406146926-c627a92ad1ab','Activités économiques'],
 ],
 default=>[
  ['https://images.unsplash.com/photo-1504307651254-35680f356dfd','Construction et développement de projets'],
  ['https://images.unsplash.com/photo-1487958449943-2429e8be8625','Architecture et infrastructures'],
 ],
};
@endphp

<header class="hero" style="background:linear-gradient(90deg,rgba(8,15,28,.89),rgba(8,15,28,.42)),url('{{ $entityVisuals[0][0] }}?auto=format&fit=crop&w=1600&q=75&fm=webp') center/cover no-repeat"><div class="container"><div class="tag mb-3">{{ $entity->sector ?: $entity->type }}</div><h1>{{ $entity->name }}</h1><p class="lead text-white-50 mt-3">{{ $entity->summary }}</p></div></header><main class="container py-5"><div class="row g-5"><div class="col-lg-8"><h2 class="fw-bold">Présentation</h2><p class="lead text-secondary" style="white-space:pre-line">{{ $entity->description ?: $entity->summary }}</p></div><div class="col-lg-4"><div class="p-4 bg-light rounded-4"><h3 class="h5">Informations</h3><p><strong>Implantation :</strong> {{ $entity->country ?: 'À préciser' }}</p>@if($entity->website)<a href="{{ $entity->website }}" target="_blank" rel="noopener noreferrer" rel="noopener noreferrer">Site officiel ↗</a>@endif</div></div></div><div class="row g-4 mt-4 mb-5">@foreach($entityVisuals as $photo)<div class="col-md-6"><figure class="overflow-hidden rounded-4 bg-light h-100 shadow-sm"><img src="{{ $photo[0] }}?auto=format&fit=crop&w=900&q=75&fm=webp" alt="{{ $photo[1] }}" loading="lazy" decoding="async" width="900" height="600" style="width:100%;aspect-ratio:3/2;object-fit:cover"><figcaption class="p-3 fw-semibold">{{ $photo[1] }}</figcaption></figure></div>@endforeach</div><p class="small text-secondary mb-4">Photographies d'illustration sectorielle, ne représentant pas nécessairement les réalisations de COJUKA.</p><h2 class="fw-bold mt-5 mb-4">Projets</h2><div class="row g-3">@forelse($projects as $project)<div class="col-md-6"><div class="border rounded-4 p-4 h-100"><h3 class="h5">{{ $project->title }}</h3><p class="text-secondary">{{ $project->description }}</p><small>{{ $project->location }}</small></div></div>@empty<p class="text-secondary">Aucun projet publié pour le moment.</p>@endforelse</div></main>
@endsection
