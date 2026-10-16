@extends('layouts.cojuka-public')
@section('page_head')
<title>{{ $topic['title'] }} — COJUKA Consulting Group</title>
<meta name="description" content="{{ $topic['description'] }}">
<style>
.cojuka-topic-hero{min-height:66vh;display:flex;align-items:end;padding:clamp(110px,13vw,185px) 0 85px;color:#fff;background-size:cover;background-position:center;position:relative;isolation:isolate}
.cojuka-topic-hero:before{content:"";position:absolute;inset:0;background:linear-gradient(100deg,rgba(93,14,39,.91),rgba(107,28,53,.58) 58%,rgba(97,22,49,.12));z-index:-1}
.cojuka-topic-hero h1{font-size:clamp(2.9rem,7vw,6.8rem);font-weight:850;letter-spacing:-.06em;line-height:1.03;max-width:930px}
.cojuka-topic-hero p{max-width:720px;color:#fff;font-size:clamp(1.05rem,2vw,1.4rem)}
.cojuka-topic-card{border:1px solid #e9e1e5;border-radius:24px;padding:clamp(24px,3vw,40px);height:100%;background:#fff;transition:transform .4s,box-shadow .4s}
.cojuka-topic-card:hover{transform:translateY(-6px);box-shadow:0 22px 45px #5d122524}
.cojuka-topic-photo{width:100%;aspect-ratio:16/10;object-fit:cover;border-radius:22px}
@media(prefers-reduced-motion:reduce){.cojuka-topic-card{transition:none}.cojuka-topic-card:hover{transform:none}}
</style>
@endsection
@section('content')
<main>
<header class="cojuka-topic-hero" style="background-image:url('{{ $topic['photos'][0][0] }}')"><div class="container"><p class="eyebrow text-white mb-4">COJUKA · Dossiers sectoriels</p><h1>{{ $topic['title'] }}</h1><p class="mt-4">{{ $topic['description'] }}</p><a class="btn btn-light rounded-pill px-4 mt-3" href="#explorer">Explorer le dossier ↓</a></div></header>
<section class="py-5" id="explorer"><div class="container py-5"><div class="row g-5 align-items-center"><div class="col-lg-6"><p class="eyebrow">Présentation</p><h2 class="display-5 fw-bold mb-4">{{ $topic['heading'] }}</h2><p class="lead text-secondary">{{ $topic['intro'] }}</p><p class="text-secondary">Ces informations décrivent des axes de travail envisagés. Les opérations et références effectives seront présentées après validation.</p></div><div class="col-lg-6"><img class="cojuka-topic-photo" src="{{ $topic['photos'][1][0] }}" alt="{{ $topic['photos'][1][1] }}" loading="lazy" width="1100" height="680"></div></div></div></section>
<section class="py-5" style="background:#f7f4f5"><div class="container py-5"><p class="eyebrow">Champs d’action</p><h2 class="display-5 fw-bold mb-5">Des activités complémentaires.</h2><div class="row g-4">@foreach($topic['steps'] as $i=>$step)<div class="col-md-4"><article class="cojuka-topic-card"><span class="eyebrow">0{{ $i+1 }}</span><h3 class="h4 fw-bold mt-4">{{ $step[0] }}</h3><p class="text-secondary">{{ $step[1] }}</p></article></div>@endforeach</div></div></section>
<section class="py-5"><div class="container py-5"><p class="eyebrow">Illustrations sectorielles</p><h2 class="display-5 fw-bold mb-4">Le secteur en images.</h2><div class="row g-4">@foreach($topic['photos'] as $photo)<div class="col-md-4"><figure><img class="cojuka-topic-photo" src="{{ $photo[0] }}" alt="{{ $photo[1] }}" loading="lazy" decoding="async" width="900" height="600"><figcaption class="text-secondary small mt-2">{{ $photo[1] }} — illustration non contractuelle</figcaption></figure></div>@endforeach</div><div class="text-center mt-5"><a class="btn btn-dark rounded-pill px-4" href="{{ route('group.profile',$topic['parent']) }}">Découvrir {{ $topic['parent_label'] }} ↗</a></div></div></section>
</main>
@endsection