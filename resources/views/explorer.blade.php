@extends('layouts.cojuka-public')
@section('page_head')
<title>Explorer COJUKA | Immersion dans nos activités</title>
<meta name="description" content="Explorez les activités du groupe COJUKA en immersion vidéo interactive.">
<style>
/* COJUKA — immersive cinema tour; scoped so the rest of the site is unaffected. */
.cx-page{--cx-cream:#f9f2e6;--cx-gold:#e3bc87;--cx-red:#ae4150;background:#080d16;color:#fff;min-height:100svh;padding:clamp(42px,6vw,85px) 0 88px;overflow:hidden}
.cx-wrap{max-width:1600px;margin:auto;padding:0 clamp(16px,3.4vw,56px)}
.cx-heading{display:flex;align-items:end;justify-content:space-between;gap:24px;margin-bottom:clamp(20px,3vw,32px)}
.cx-eyebrow{color:var(--cx-gold);letter-spacing:.2em;text-transform:uppercase;font-size:clamp(10px,.9vw,12px);font-weight:750}
.cx-page h1{font-size:clamp(38px,5.2vw,80px);line-height:1.03;letter-spacing:-.065em;font-weight:770;margin:13px 0}
.cx-intro{max-width:560px;color:#aebcca;font-size:clamp(14px,1.2vw,17px);line-height:1.75;margin:0}
.cx-mode{display:inline-flex;align-items:center;gap:9px;flex-shrink:0;color:#d0d8e2;font-size:12px;letter-spacing:.035em;padding:10px 13px;background:#ffffff0d;border:1px solid #ffffff20;border-radius:99px}
.cx-mode-dot{height:7px;width:7px;border-radius:50%;background:#76d8a8;box-shadow:0 0 0 5px #76d8a81d}
.cx-mode[data-paused="true"] .cx-mode-dot{background:#f1c88a;box-shadow:0 0 0 5px #f1c88a1d}
.cx-stage{position:relative;isolation:isolate;overflow:hidden;border:1px solid #ffffff25;border-radius:clamp(18px,2vw,28px);background:linear-gradient(140deg,#1b2734,#080c15);height:min(73svh,850px);min-height:420px;box-shadow:0 30px 95px #0008}
.cx-poster,.cx-stage video{position:absolute;inset:0;width:100%;height:100%;object-fit:cover}
.cx-poster{z-index:0;opacity:0;transform:scale(1.055);background-size:cover;background-position:center;transition:opacity 1.25s ease,transform 10s ease}
.cx-poster.is-visible{opacity:1;transform:scale(1)}
.cx-stage video{z-index:1;opacity:0;pointer-events:none;filter:saturate(1.04) contrast(1.025);transition:opacity 1.15s cubic-bezier(.22,1,.36,1);object-position:center}
.cx-stage video.cx-active{opacity:1}
.cx-stage:after{content:"";position:absolute;inset:0;z-index:3;background:linear-gradient(90deg,rgba(4,8,16,.68),transparent 78%),linear-gradient(0deg,rgba(4,8,16,.88) 0%,rgba(4,8,16,.32) 31%,transparent 64%);pointer-events:none}
.cx-stage-top{position:absolute;z-index:5;top:clamp(17px,2vw,30px);left:clamp(18px,3vw,44px);right:clamp(18px,3vw,44px);display:flex;align-items:center;justify-content:space-between;gap:12px}
.cx-stage-label{display:inline-flex;align-items:center;gap:8px;color:#fff;font-size:11px;letter-spacing:.14em;text-transform:uppercase;font-weight:750;text-shadow:0 1px 14px #000}
.cx-stage-label:before{content:"";width:17px;height:1px;background:var(--cx-gold)}
.cx-stage-info{position:absolute;z-index:5;bottom:clamp(35px,5vw,68px);left:clamp(22px,5vw,74px);right:clamp(22px,5vw,74px);max-width:760px;transition:opacity .45s ease,transform .7s ease}
.cx-stage.cx-switching .cx-stage-info{opacity:.15;transform:translateY(16px)}
.cx-stage-info h2{font-size:clamp(36px,5.8vw,86px);font-weight:790;line-height:1.04;letter-spacing:-.065em;margin:15px 0 16px;color:white}
.cx-stage-info p{font-size:clamp(14px,1.35vw,19px);line-height:1.65;max-width:530px;color:#e1e9f1;margin-bottom:25px;text-shadow:0 1px 10px #0005}
.cx-stage-info a{display:inline-flex;align-items:center;gap:10px;color:#fff!important;border:1px solid #ffffff80;border-radius:99px;padding:12px 20px;text-decoration:none;font-size:13px;font-weight:650;background:#ffffff14;backdrop-filter:blur(8px);transition:background .2s,transform .2s}
.cx-stage-info a:hover{background:#ffffff36;transform:translateY(-2px)}
.cx-stage-count{font-size:12px;color:var(--cx-gold);font-weight:800;letter-spacing:.18em}
.cx-stage-side{position:absolute;z-index:5;right:clamp(18px,3vw,40px);top:50%;transform:translateY(-50%);display:flex;flex-direction:column;gap:9px}
.cx-stage-side button{width:40px;height:40px;border-radius:50%;background:#1119237a;border:1px solid #ffffff5c;color:#fff;font-size:20px;backdrop-filter:blur(10px);transition:background .2s,transform .2s}
.cx-stage-side button:hover{background:#86212e;transform:scale(1.06)}
.cx-controls{display:flex;align-items:center;gap:10px;margin:20px 0 6px;flex-wrap:wrap}
.cx-controls button{display:inline-flex;align-items:center;justify-content:center;gap:8px;border:1px solid #ffffff2c;background:#172331;color:#f7f8fb;border-radius:99px;padding:10px 16px;font-size:13px;font-weight:650;min-height:44px;transition:background .2s,border-color .2s}
.cx-controls button:hover,.cx-controls button[aria-pressed="true"]{background:#833045;border-color:#a85160}
.cx-controls button:focus-visible,.cx-stage button:focus-visible,.cx-stage a:focus-visible,.cx-card:focus-visible{outline:3px solid var(--cx-gold);outline-offset:3px}
.cx-progress-wrap{display:flex;align-items:center;gap:12px;flex:1 1 190px;min-width:140px;margin-left:auto}
.cx-progress{flex:1;min-width:95px;accent-color:var(--cx-gold);cursor:pointer;height:18px;background:transparent}
.cx-time{font-size:12px;color:#b6c6d2;white-space:nowrap;font-variant-numeric:tabular-nums}
.cx-grid{display:grid;grid-template-columns:repeat(5,minmax(0,1fr));gap:12px;margin-top:20px}
.cx-card{position:relative;border:1px solid #ffffff24;background:#15202d;color:#fff;border-radius:17px;overflow:hidden;text-align:left;padding:0;cursor:pointer;transition:transform .3s,background .3s,border-color .3s}
.cx-card:hover{transform:translateY(-4px);border-color:#ffffff87}
.cx-card[aria-current="true"]{border-color:var(--cx-gold);background:#26303e;box-shadow:0 0 0 1px var(--cx-gold)}
.cx-card img{width:100%;height:clamp(90px,10vw,150px);object-fit:cover;display:block;filter:saturate(.82);transition:filter .35s,transform .6s}
.cx-card:hover img,.cx-card[aria-current="true"] img{filter:saturate(1.05);transform:scale(1.035)}
.cx-card span{display:block;padding:13px 14px;font-size:clamp(11px,1vw,13px);font-weight:650}
.cx-card[aria-current="true"]:after{content:"";position:absolute;left:0;right:0;bottom:0;height:3px;background:var(--cx-gold)}
.cx-note{color:#aab8c8;font-size:12px;line-height:1.5;margin:17px 0 0;min-height:19px}
.cx-stage:fullscreen{width:100vw;height:100vh!important;min-height:0;border:0;border-radius:0}
.cx-stage:fullscreen .cx-stage-info{bottom:clamp(35px,6vh,90px)}
@media(max-width:950px){
 .cx-heading{align-items:flex-start;flex-direction:column}
 .cx-stage{height:64svh;min-height:420px}
 .cx-grid{grid-template-columns:repeat(3,minmax(0,1fr))}
}
@media(max-width:600px){
 .cx-page{padding-top:35px}
 .cx-stage{height:65svh;min-height:420px;border-radius:18px}
 .cx-stage-info{bottom:35px;right:22px}
 .cx-stage-info h2{font-size:clamp(36px,10vw,56px)}
 .cx-stage-info p{font-size:14px;margin-bottom:16px}
 .cx-stage-side{top:76px;right:12px;transform:none;flex-direction:row}
 .cx-stage-side button{width:36px;height:36px}
 .cx-stage-info a{padding:10px 15px;font-size:12px}
 .cx-grid{grid-template-columns:repeat(2,minmax(0,1fr));gap:9px}
 .cx-card span{padding:10px;font-size:11px}
 .cx-card img{height:95px}
 .cx-controls{gap:8px}
 .cx-controls button{padding:9px 12px;font-size:12px}
 .cx-progress-wrap{flex-basis:100%;margin:8px 0 0}
}
@media(prefers-reduced-motion:reduce){
 .cx-stage video,.cx-poster,.cx-stage-info,.cx-card,.cx-card img{transition:none!important;animation:none!important;transform:none!important}
}
/* Immersion dégagée : aucun cache, aucun panneau vitré sur la vidéo.
   Les textes descriptifs sont placés HORS du visuel. */
.cx-page{--cx-gold:#e0e6ed;--cx-red:#dce4ee;background:#111822!important}
.cx-page .cx-stage{background:#111822!important;box-shadow:none!important;
 border:1px solid #394454!important;border-radius:16px!important}
.cx-page .cx-stage:after{display:none!important;background:none!important}
.cx-page .cx-stage-info{position:static!important;max-width:1100px!important;
 display:grid;grid-template-columns:minmax(0,1fr) auto;gap:10px 22px;align-items:center;
 margin:23px 0 25px;padding:0!important;transform:none!important;
 transition:opacity .6s ease!important;background:none!important;
 box-shadow:none!important;-webkit-backdrop-filter:none!important;backdrop-filter:none!important}
.cx-page .cx-stage-info .cx-eyebrow{grid-column:1/-1;color:#d8e1ea!important}
.cx-page .cx-stage-info h2{grid-column:1;margin:0!important;color:#fff!important;
 font-size:clamp(29px,3.6vw,50px)!important}
.cx-page .cx-stage-info p{grid-column:1;margin:0!important;max-width:830px!important;
 color:#d5dee9!important;text-shadow:none!important}
.cx-page .cx-stage-info a{grid-column:2;grid-row:2/4;
 align-self:center;justify-self:end;border:1px solid #778494!important;
 background:#263140!important;color:#FFFFFF!important;
 border-radius:12px!important;padding:14px 20px!important;
 -webkit-backdrop-filter:none!important;backdrop-filter:none!important}
.cx-page .cx-stage-info a:hover{background:#394658!important}
.cx-page .cx-stage.cx-switching .cx-stage-info{opacity:1!important;transform:none!important}
.cx-page .cx-stage-side button{background:#263241!important;-webkit-backdrop-filter:none!important;backdrop-filter:none!important}
.cx-page .cx-stage-side button:hover{background:#465468!important}
.cx-page .cx-mode{background:transparent!important;border-color:#526174!important;border-radius:12px!important;
 -webkit-backdrop-filter:none!important;backdrop-filter:none!important}
.cx-page .cx-controls button{background:#222d3c!important;border-color:#526071!important;border-radius:12px!important;
 -webkit-backdrop-filter:none!important;backdrop-filter:none!important}
.cx-page .cx-controls button[aria-pressed="true"],.cx-page .cx-controls button:hover{background:#465368!important;border-color:#8390a0!important}
.cx-page .cx-card{background:#1a2635!important;-webkit-backdrop-filter:none!important;backdrop-filter:none!important}
.cx-page .cx-card[aria-current="true"]{border-color:#e8edf3!important;box-shadow:inset 0 0 0 1px #e8edf3!important}
.cx-page .cx-stage-top{pointer-events:none}
.cx-page .cx-stage-top span{background:none!important;-webkit-backdrop-filter:none!important;backdrop-filter:none!important}
@media(max-width:750px){
 .cx-page .cx-stage{height:55svh;min-height:310px;border-radius:10px!important}
 .cx-page .cx-stage-info{display:flex;flex-direction:column;align-items:flex-start;gap:10px;margin:18px 0 24px}
 .cx-page .cx-stage-info h2{font-size:clamp(27px,8vw,43px)!important}
 .cx-page .cx-stage-info a{align-self:flex-start;margin-top:10px}
}
/* Anti-legacy-glass override: previously global selectors carried stronger specificity. */
body.cojuka-glass-public .cx-page .cx-stage{
 box-shadow:none!important;
 border-color:#394454!important;
 backdrop-filter:none!important;-webkit-backdrop-filter:none!important;
}
body.cojuka-glass-public .cx-page .cx-stage:after{
 content:none!important;display:none!important;background:none!important;
}
body.cojuka-glass-public .cx-page .cx-stage-info{
 position:static!important;
 padding:0!important;margin:23px 0 25px!important;
 background:transparent!important;background-image:none!important;
 border:0!important;border-radius:0!important;
 box-shadow:none!important;
 backdrop-filter:none!important;-webkit-backdrop-filter:none!important;
}
body.cojuka-glass-public .cx-page
 :is(.cx-mode,.cx-card,.cx-controls button,.cx-stage-side button){
 background:#1D2938!important;background-image:none!important;
 box-shadow:none!important;backdrop-filter:none!important;
 -webkit-backdrop-filter:none!important;
 border-color:#526174!important;
}
body.cojuka-glass-public .cx-page .cx-controls button:hover,
body.cojuka-glass-public .cx-page .cx-controls button[aria-pressed="true"],
body.cojuka-glass-public .cx-page .cx-stage-side button:hover{
 background:#465568!important;background-image:none!important;
}
body.cojuka-glass-public .cx-page .cx-stage-info a{
 background:#273548!important;box-shadow:none!important;
 -webkit-backdrop-filter:none!important;backdrop-filter:none!important;
}
@media(max-width:767px){
 body.cojuka-glass-public .cx-page .cx-stage-info{
  padding:0!important;margin:20px 0 25px!important;
 }
}

/* ===== Timeline immersive 2026 : chapitres, barres de progression, halo ===== */
.cx-page{position:relative}
.cx-ambient{position:absolute;inset:0;z-index:0;pointer-events:none;overflow:hidden;-webkit-mask-image:linear-gradient(180deg,#000 55%,transparent 100%);mask-image:linear-gradient(180deg,#000 55%,transparent 100%)}
.cx-ambient i{position:absolute;inset:0;background-size:cover;background-position:center;filter:blur(70px) saturate(1.5) brightness(.55);opacity:0;transform:scale(1.15);transition:opacity 1.6s ease}
.cx-ambient i.is-on{opacity:.75}
.cx-page .cx-wrap{position:relative;z-index:1}
.cx-stage-wrap{position:relative}
body.cojuka-glass-public .cx-page .cx-stage{box-shadow:0 40px 120px -40px rgba(0,0,0,.9),0 0 0 1px rgba(255,255,255,.06)!important}
/* Barres « story » en haut de la vidéo */
.cx-segments{position:absolute;z-index:6;left:clamp(18px,3vw,44px);right:clamp(18px,3vw,44px);top:clamp(10px,1.2vw,16px);display:flex;gap:6px;pointer-events:none}
.cx-segments span{flex:1 1 0!important;min-width:0;width:auto!important;height:3px;padding:0!important;margin:0!important;border-radius:3px;background:rgba(255,255,255,.28)!important;overflow:hidden}
.cx-segments i{display:block;height:100%;width:100%;transform-origin:left;transform:scaleX(var(--p,0));background:linear-gradient(90deg,#fff,#f1d3a8);border-radius:3px}
.cx-page .cx-stage-top{top:clamp(26px,2.6vw,38px)}
/* Titre : apparition à chaque scène */
@keyframes cx-title-in{from{opacity:0;transform:translateY(.45em);filter:blur(6px)}to{opacity:1;transform:none;filter:none}}
@keyframes cx-text-in{from{opacity:0;transform:translateY(10px)}to{opacity:1;transform:none}}
.cx-stage-info.cx-enter h2{animation:cx-title-in .8s cubic-bezier(.22,1,.36,1) both}
.cx-stage-info.cx-enter p{animation:cx-text-in .8s .12s cubic-bezier(.22,1,.36,1) both}
.cx-stage-info.cx-enter .cx-eyebrow{animation:cx-text-in .6s cubic-bezier(.22,1,.36,1) both}
/* Timeline de chapitres */
.cx-timeline{list-style:none;display:flex;gap:10px;margin:22px 0 0;padding:0}
.cx-timeline li{flex:1 1 0;min-width:0;transition:flex-grow .8s cubic-bezier(.22,1,.36,1)}
.cx-timeline li:has(.cx-card[aria-current="true"]){flex-grow:2.3}
body.cojuka-glass-public .cx-page .cx-timeline .cx-card{
 position:relative;display:flex;flex-direction:column;width:100%;height:100%;padding:0;border-radius:16px!important;
 background:#141d29!important;border:1px solid rgba(255,255,255,.12)!important;overflow:hidden;
 transition:border-color .4s,transform .5s cubic-bezier(.22,1,.36,1),box-shadow .5s!important
}
body.cojuka-glass-public .cx-page .cx-timeline .cx-card:hover{transform:translateY(-4px);border-color:rgba(255,255,255,.35)!important}
body.cojuka-glass-public .cx-page .cx-timeline .cx-card[aria-current="true"]{border-color:rgba(241,211,168,.7)!important;box-shadow:0 22px 50px -24px rgba(0,0,0,.9),0 0 0 1px rgba(241,211,168,.35)!important}
.cx-timeline .cx-chap-media{position:relative;display:block;height:clamp(84px,8.5vw,128px);overflow:hidden}
.cx-timeline .cx-chap-media img{width:100%;height:100%!important;object-fit:cover;filter:saturate(.6) brightness(.7)!important;transform:scale(1.02);transition:filter .6s,transform 1.2s cubic-bezier(.22,1,.36,1)!important}
.cx-timeline .cx-card:hover .cx-chap-media img{filter:saturate(1) brightness(.9)!important;transform:scale(1.08)}
.cx-timeline .cx-card[aria-current="true"] .cx-chap-media img{filter:saturate(1.08) brightness(1)!important;animation:cx-kenburns 12s ease-out both}
@keyframes cx-kenburns{from{transform:scale(1.02)}to{transform:scale(1.14) translate(-2%,-1%)}}
.cx-timeline .cx-chap-media::after{content:"";position:absolute;inset:0;background:linear-gradient(0deg,rgba(10,15,24,.85),transparent 60%)}
.cx-timeline .cx-chap-num{position:absolute;z-index:1;left:14px;bottom:8px;font-size:clamp(22px,2.2vw,34px);font-weight:800;letter-spacing:-.04em;color:rgba(255,255,255,.55);line-height:1;transition:color .4s}
.cx-timeline .cx-card[aria-current="true"] .cx-chap-num{color:#f1d3a8}
.cx-timeline .cx-card .cx-chap-text{display:block;padding:12px 14px 16px}
.cx-timeline .cx-card .cx-chap-title{display:block;padding:0;font-size:clamp(12px,1vw,14px);font-weight:700;color:#fff;white-space:nowrap;overflow:hidden;text-overflow:ellipsis}
.cx-timeline .cx-card .cx-chap-desc{display:block;padding:0;margin-top:6px;font-size:12.5px;font-weight:450;line-height:1.5;color:#b8c4d2;max-height:0;opacity:0;overflow:hidden;transition:max-height .7s cubic-bezier(.22,1,.36,1),opacity .5s}
.cx-timeline .cx-card[aria-current="true"] .cx-chap-desc{max-height:5em;opacity:1;transition-delay:.15s}
.cx-timeline .cx-chap-bar{position:absolute;left:0;right:0;bottom:0;height:3px;padding:0;background:rgba(255,255,255,.08)}
.cx-timeline .cx-chap-bar i{display:block;height:100%;transform-origin:left;transform:scaleX(var(--p,0));background:linear-gradient(90deg,#a52d41,#f1d3a8)}
body.cojuka-glass-public .cx-page .cx-timeline .cx-card[aria-current="true"]::after{display:none}
.cx-timeline .cx-card:focus:not(:focus-visible){outline:none}
.cx-page .cx-card span{padding:0}
@media(max-width:950px){
 .cx-timeline{overflow-x:auto;scroll-snap-type:x mandatory;scrollbar-width:none;padding-bottom:4px;margin-inline:calc(-1*clamp(16px,3.4vw,56px));padding-inline:clamp(16px,3.4vw,56px)}
 .cx-timeline::-webkit-scrollbar{display:none}
 .cx-timeline li{flex:0 0 42%;scroll-snap-align:start}
 .cx-timeline li:has(.cx-card[aria-current="true"]){flex:0 0 62%}
}
@media(max-width:600px){
 .cx-timeline li{flex:0 0 58%}
 .cx-timeline li:has(.cx-card[aria-current="true"]){flex:0 0 78%}
 .cx-page .cx-stage-label{display:none}
 .cx-page .cx-stage-count{white-space:nowrap;margin-left:auto}
 .cx-ambient{display:none}
}
@media(prefers-reduced-motion:reduce){
 .cx-timeline li,.cx-timeline .cx-chap-desc,.cx-timeline .cx-chap-media img,.cx-ambient i{transition:none!important;animation:none!important}
 .cx-stage-info.cx-enter :is(h2,p,.cx-eyebrow){animation:none!important}
}

/* ===== Visite au défilement : la vidéo reste à l'écran, le scroll change de scène ===== */
.cx-page{overflow:clip!important}
.cx-scrolly{position:relative;height:calc(var(--cx-n,5) * 70svh + 100svh - var(--cx-nav,70px))}
.cx-sticky{position:sticky;top:var(--cx-nav,70px);height:calc(100svh - var(--cx-nav,70px));display:flex;flex-direction:column;gap:12px;padding:12px 0 14px}
body.cojuka-glass-public .cx-page .cx-scrolly .cx-stage{flex:1 1 auto;height:auto!important;min-height:0!important}
.cx-scrolly .cx-timeline{margin:0;flex:0 0 auto}
.cx-scrolly .cx-timeline .cx-chap-media{height:clamp(46px,7svh,78px)}
.cx-scrolly .cx-timeline .cx-chap-num{font-size:clamp(18px,1.8vw,26px);bottom:6px}
.cx-scrolly .cx-timeline .cx-card .cx-chap-text{padding:9px 12px 12px}
.cx-scrolly .cx-timeline .cx-card[aria-current="true"] .cx-chap-desc{max-height:3em}
.cx-scroll-hint{position:absolute;z-index:6;left:50%;bottom:16px;transform:translateX(-50%);display:inline-flex;align-items:center;gap:8px;padding:8px 14px;border-radius:99px;background:rgba(10,15,24,.55);border:1px solid rgba(255,255,255,.25);color:#fff;font-size:12px;font-weight:650;letter-spacing:.03em;pointer-events:none;transition:opacity .5s}
.cx-scroll-hint i{display:inline-block;animation:cx-bob 1.6s ease-in-out infinite}
@keyframes cx-bob{0%,100%{transform:translateY(-2px)}50%{transform:translateY(3px)}}
.cx-scrolly.cx-scrolled .cx-scroll-hint{opacity:0}
@media(max-width:950px){.cx-scrolly .cx-timeline li{flex:0 0 40%}.cx-scrolly .cx-timeline li:has(.cx-card[aria-current="true"]){flex:0 0 60%}}
@media(max-width:600px){
 .cx-sticky{gap:9px;padding:8px 0 10px}
 .cx-scrolly .cx-timeline .cx-chap-media{height:44px}
 .cx-scrolly .cx-timeline li{flex:0 0 46%}
 .cx-scrolly .cx-timeline li:has(.cx-card[aria-current="true"]){flex:0 0 70%}
 .cx-scrolly .cx-timeline .cx-card .cx-chap-desc{display:none}
}
@media(prefers-reduced-motion:reduce){.cx-scroll-hint i{animation:none}}
</style>
@endsection
@section('content')
@php
$exploreScenes=[
 ['Mining','Découvrez les carrières, les ressources et la coordination des projets miniers.','mining','photo-1519003722824-194d4455a60c'],
 ['Construction','Explorez les chantiers, les bâtiments et les infrastructures.','construction','photo-1487958449943-2429e8be8625'],
 ['Logistique','Suivez les flux de marchandises et les opérations de transport.','logistique','photo-1586528116311-ad8dd3c8310d'],
 ['Eden Park Investments','Découvrez les perspectives immobilières et d’investissement.','eden-park-investments','photo-1600596542815-ffad4c1539a9'],
 ['Consultance & Impact Center','Entrez dans l’univers du conseil, des partenariats et de l’impact.','consultance','photo-1497366754035-f200968a6e72'],
];
$exploreVideoUrls=['https://d8j0ntlcm91z4.cloudfront.net/user_35sq0uUmKRerZDm8Ty4efx2WQSL/hf_20261018_055303_e5327436-5542-4802-b1a7-fcae58f0bb0d.mp4','https://d8j0ntlcm91z4.cloudfront.net/user_35sq0uUmKRerZDm8Ty4efx2WQSL/hf_20261018_055303_34a4da7d-b175-49de-86ac-1e635e123f02.mp4','https://d8j0ntlcm91z4.cloudfront.net/user_35sq0uUmKRerZDm8Ty4efx2WQSL/hf_20261018_055303_7e41daae-8e36-4770-9109-e5b61a934518.mp4','https://d8j0ntlcm91z4.cloudfront.net/user_35sq0uUmKRerZDm8Ty4efx2WQSL/hf_20261018_055303_58a64106-b04d-44dc-93ec-465dc705393d.mp4','https://d8j0ntlcm91z4.cloudfront.net/user_35sq0uUmKRerZDm8Ty4efx2WQSL/hf_20261018_055303_5c86fd41-237a-4d66-b40f-86ca5661c1b7.mp4'];
$exploreSceneData=[];
foreach($exploreScenes as $i=>$scene){
 $exploreSceneData[]=['title'=>$scene[0],'description'=>$scene[1],'slug'=>$scene[2],'poster'=>'https://images.unsplash.com/'.$scene[3].'?auto=format&fit=crop&w=1800&q=82','video'=>($exploreVideoUrls[$i] ?? asset('videos/explorer/scene-'.($i+1).'.mp4'))];
}
@endphp
<main class="cx-page"><div class="cx-ambient" aria-hidden="true"><i id="cx-amb-a"></i><i id="cx-amb-b"></i></div><div class="cx-wrap">
 <div class="cx-heading"><div><div class="cx-eyebrow">COJUKA · Expérience immersive</div>
 <h1>Explorer le groupe.</h1><p class="cx-intro">Faites défiler la page pour traverser cinq univers du groupe : chaque scène change et se lance au fil de votre descente.</p></div><span class="cx-mode" id="cx-mode" data-paused="false"><span class="cx-mode-dot" aria-hidden="true"></span><span id="cx-mode-text">Défilez pour explorer</span></span></div>
 <section class="cx-scrolly" id="cx-scrolly" aria-label="Visite au défilement"><div class="cx-sticky">
 <div class="cx-stage" id="cx-stage" aria-label="Exploration des activités COJUKA">
  <div class="cx-poster is-visible" id="cx-poster-a" aria-hidden="true"></div><div class="cx-poster" id="cx-poster-b" aria-hidden="true"></div>
  <video id="cx-video-a" playsinline webkit-playsinline preload="metadata" muted aria-hidden="true"></video><video id="cx-video-b" playsinline webkit-playsinline preload="metadata" muted aria-hidden="true"></video>
  <div class="cx-segments" aria-hidden="true">@foreach($exploreScenes as $i=>$scene)<span><i data-cx-seg="{{ $i }}"></i></span>@endforeach</div>
  <div class="cx-stage-top"><span class="cx-stage-label">Un voyage au cœur de nos secteurs</span><span class="cx-stage-count" id="cx-counter">01 / 05</span></div>
  <div class="cx-stage-side"><button id="cx-prev" type="button" aria-label="Scène précédente" title="Précédent">‹</button><button id="cx-next" type="button" aria-label="Scène suivante" title="Suivant">›</button></div>
  <span class="cx-scroll-hint" aria-hidden="true"><i class="bi bi-mouse"></i> Faites défiler</span>
 </div>
 <ol class="cx-timeline" id="cx-grid" aria-label="Chapitres de la visite">
 @foreach($exploreScenes as $i=>$scene)
 <li><button type="button" class="cx-card" data-cx-index="{{ $i }}" aria-current="{{ $i===0?'true':'false' }}"><span class="cx-chap-media"><img loading="lazy" src="https://images.unsplash.com/{{ $scene[3] }}?auto=format&fit=crop&w=600&q=72" alt=""><span class="cx-chap-num" aria-hidden="true">{{ str_pad($i+1,2,'0',STR_PAD_LEFT) }}</span></span><span class="cx-chap-text"><span class="cx-chap-title">{{ $scene[0] }}</span><span class="cx-chap-desc">{{ $scene[1] }}</span></span><span class="cx-chap-bar" aria-hidden="true"><i data-cx-bar="{{ $i }}"></i></span></button></li>
 @endforeach
 </ol>
 </div></section>
 <div class="cx-stage-info"><span class="cx-eyebrow">COJUKA CONSULTING GROUP</span><h2 id="cx-title">Mining</h2><p id="cx-description"></p><a id="cx-link" href="{{ route('group.profile','kojuka-mining') }}" style="font-weight:700">Découvrir cette activité ↗</a></div>
 <div class="cx-controls" role="group" aria-label="Commandes de la visite"><button id="cx-play" type="button" aria-pressed="true">Ⅱ Pause automatique</button><button id="cx-mute" type="button" aria-pressed="false">🔇 Activer le son</button><button id="cx-fullscreen" type="button" aria-label="Afficher l'expérience en plein écran">⛶ Plein écran</button><div class="cx-progress-wrap"><label for="cx-progress" class="visually-hidden">Progression de la scène</label><input id="cx-progress" class="cx-progress" type="range" min="0" max="100" value="0" aria-label="Progression de la scène"><span id="cx-time" class="cx-time">00:00</span></div></div>
 <p class="cx-note" id="cx-note">Faites défiler pour changer de scène. Les vidéos se lancent sans son. Les images et vidéos servent à illustrer les secteurs du groupe.</p>
</div></main>
@endsection
@section('page_scripts')
<script>
(function(){
 'use strict';
 const scenes=@json($exploreSceneData);
 const byId=id=>document.getElementById(id);
 const stage=byId('cx-stage'),posters=[byId('cx-poster-a'),byId('cx-poster-b')],players=[byId('cx-video-a'),byId('cx-video-b')];
 const playButton=byId('cx-play'),muteButton=byId('cx-mute'),fullButton=byId('cx-fullscreen'),progress=byId('cx-progress'),timer=byId('cx-time'),note=byId('cx-note'),mode=byId('cx-mode');
 if(!stage||!scenes.length||players.some(v=>!v))return;
 const links={mining:'{{ route('group.profile','kojuka-mining') }}',construction:'{{ route('group.profile','construction') }}',logistique:'{{ route('group.profile','logistique') }}','eden-park-investments':'{{ route('group.profile','eden-park-investments') }}',consultance:'{{ route('group.profile','consultance') }}'};
 const reduced=window.matchMedia('(prefers-reduced-motion: reduce)').matches;
 const saveData=!!(navigator.connection&&navigator.connection.saveData);
 const photoDuration=9500,minScene=9.5;
 // Courtes vidéos : rejouées sans coupure pour rester ~10 s sur chaque univers.
 function loopsFor(d){return Math.max(1,Math.ceil(minScene/Math.max(1,d-1.15)))}
 const state={index:0,active:1,poster:0,mode:'photo',wanted:!reduced&&!saveData,sound:false,started:false,inView:false,switching:false,token:0,photoElapsed:0,lastTick:performance.now(),timeout:null,cleanup:null};
 const cards=Array.from(document.querySelectorAll('[data-cx-index]'));
 // Mode défilement : la position dans la page choisit la scène ; pas de minuterie.
 const scrolly=byId('cx-scrolly');
 const scrollMode=!!(scrolly&&window.CSS&&CSS.supports('position','sticky'));
 function format(seconds){const n=Math.max(0,Math.floor(Number(seconds)||0));return String(Math.floor(n/60)).padStart(2,'0')+':'+String(n%60).padStart(2,'0')}
 function allowed(){return state.wanted&&state.inView&&!document.hidden}
 function notice(message){note.textContent=message}
 function sync(){
   playButton.textContent=state.wanted?'Ⅱ Mettre en pause':'▶ Reprendre la visite';
   playButton.setAttribute('aria-pressed',String(state.wanted));
   muteButton.textContent=state.sound?'🔊 Couper le son':'🔇 Activer le son';
   muteButton.setAttribute('aria-pressed',String(state.sound));
   mode.dataset.paused=String(!state.wanted);
   byId('cx-mode-text').textContent=!state.wanted?'Visite en pause':scrollMode?'Défilez pour explorer':state.mode==='video'?'Visite automatique':'Visite illustrée automatique';
 }
 function information(index){
   const scene=scenes[index];
   byId('cx-title').textContent=scene.title;
   byId('cx-description').textContent=scene.description;
   byId('cx-counter').textContent=String(index+1).padStart(2,'0')+' / '+String(scenes.length).padStart(2,'0');
   byId('cx-link').href=links[scene.slug]||'{{ route('group.portal') }}';
   cards.forEach(card=>card.setAttribute('aria-current',String(Number(card.dataset.cxIndex)===index)));
   immersive(index);
 }
 // Timeline immersive : barres de progression, halo, animation du titre, défilement mobile.
 const segs=Array.from(document.querySelectorAll('[data-cx-seg]')),bars=Array.from(document.querySelectorAll('[data-cx-bar]'));
 const ambient=[byId('cx-amb-a'),byId('cx-amb-b')],info=document.querySelector('.cx-stage-info'),timeline=byId('cx-grid');
 let ambSlot=0,lastIndex=-1;
 function fill(index,fraction){
   const f=Math.max(0,Math.min(1,fraction||0));
   segs.forEach((el,i)=>el.style.setProperty('--p',i<index?1:i===index?f:0));
   bars.forEach((el,i)=>el.style.setProperty('--p',i<index?1:i===index?f:0));
 }
 function immersive(index){
   fill(index,0);
   if(index===lastIndex)return;
   lastIndex=index;
   if(ambient[0]){
     const next=1-ambSlot;
     ambient[next].style.backgroundImage='url("'+scenes[index].poster+'")';
     ambient[next].classList.add('is-on');ambient[ambSlot].classList.remove('is-on');ambSlot=next;
   }
   if(info){info.classList.remove('cx-enter');void info.offsetWidth;info.classList.add('cx-enter')}
   const card=cards[index];
   if(timeline&&card&&timeline.scrollWidth>timeline.clientWidth+4){
     const li=card.parentElement;timeline.scrollTo({left:li.offsetLeft-parseFloat(getComputedStyle(timeline).paddingLeft||0),behavior:reduced?'auto':'smooth'});
   }
 }
 function poster(index){
   const incoming=1-state.poster;
   posters[incoming].style.backgroundImage='url("'+scenes[index].poster+'")';
   posters[incoming].classList.add('is-visible');
   posters[state.poster].classList.remove('is-visible');
   state.poster=incoming;
 }
 function seekInfo(){
   if(state.mode==='video'){
     const v=players[state.active],duration=v.duration;
     if(Number.isFinite(duration)&&duration>0){
       progress.value=String(Math.min(100,100*v.currentTime/duration));
       const seg=Math.max(1,duration-1.15);if(!scrollMode)fill(state.index,((state.loops||0)*seg+Math.min(v.currentTime,seg))/(seg*loopsFor(duration)));
       timer.textContent=format(v.currentTime)+' / '+format(duration);
     }
   }else{
     progress.value=String(Math.min(100,state.photoElapsed/photoDuration*100));
     if(!scrollMode)fill(state.index,state.photoElapsed/photoDuration);
     timer.textContent=format(state.photoElapsed/1000)+' / '+format(photoDuration/1000);
   }
 }
 function prepare(player,index){
   if(player.dataset.scene===String(index)&&player.getAttribute('src'))return;
   player.pause();
   player.removeAttribute('src');
   player.dataset.scene=String(index);
   player.preload='auto';
   player.src=scenes[index].video;
   player.load();
 }
 function cancelPending(){
   clearTimeout(state.timeout);
   clearTimeout(state.cleanup);
   state.timeout=null;state.cleanup=null;
   state.token++;
   state.switching=false;
   stage.classList.remove('cx-switching');
 }
 function finishTransition(){
   state.switching=false;
   stage.classList.remove('cx-switching');
   sync();
   seekInfo();
 }
 function showPhoto(index,token,reason){
   if(token!==state.token)return;
   // Invalidate slow media promises so they cannot replace a successful image fallback.
   state.token++;
   clearTimeout(state.timeout);state.timeout=null;
   const old=players[state.active];
   players.forEach(v=>{v.pause();v.classList.remove('cx-active');v.style.zIndex='1'});
   old.pause();
   state.index=index;state.mode='photo';state.photoElapsed=0;
   poster(index);information(index);finishTransition();
   if(reason)notice(reason);
   else notice(reduced?'Mode sans animation : utilisez les flèches pour découvrir les univers.':saveData?'Mode économie de données : visite illustrée.':'Découverte automatique des secteurs · illustrations non contractuelles.');
 }
 function showVideo(index,slot,token){
   if(token!==state.token)return;
   clearTimeout(state.timeout);state.timeout=null;
   const previous=state.active,old=players[previous],incoming=players[slot];
   state.active=slot;state.index=index;state.mode='video';state.photoElapsed=0;state.loops=0;
   poster(index);information(index);
   // Prevent two audio tracks playing simultaneously during the picture crossfade.
   if(old!==incoming)old.muted=true;
   incoming.style.zIndex='2';old.style.zIndex='1';
   incoming.classList.add('cx-active');
   if(old!==incoming)old.classList.remove('cx-active');
   state.cleanup=window.setTimeout(()=>{
     if(state.active!==previous){old.pause();old.style.zIndex='1'}
     // Prepare the next video only after the outgoing fade finishes.
     if(token===state.token){const standby=players[1-state.active];prepare(standby,(state.index+1)%scenes.length)}
   },1300);
   finishTransition();
   notice(scrollMode?'Faites défiler pour passer à l’univers suivant. Les vidéos sont des illustrations.':'Lecture automatique · transitions douces entre les univers. Les vidéos sont des illustrations.');
   if(!allowed())incoming.pause();
 }
 function change(index){
   if(!state.started)return;
   const target=(index+scenes.length)%scenes.length;
   cancelPending();
   const token=state.token;
   state.switching=true;
   // Keep the outgoing scene and its caption fully visible while the next clip buffers.
   if(reduced||saveData||!state.wanted){showPhoto(target,token);return}
   const slot=1-state.active,incoming=players[slot];
   const loadFallback=()=>showPhoto(target,token,'La vidéo est momentanément indisponible : la visite continue avec des images.');
   state.timeout=window.setTimeout(loadFallback,6500);
   try{
     prepare(incoming,target);
     incoming.muted=!state.sound;
     incoming.volume=1;
     const started=incoming.play();
     if(started&&typeof started.then==='function'){
       started.then(()=>showVideo(target,slot,token)).catch(error=>{
         if(token!==state.token)return;
         if(error&&error.name==='AbortError')return;
         loadFallback();
       });
     }else{
       incoming.addEventListener('playing',()=>showVideo(target,slot,token),{once:true});
     }
   }catch(error){loadFallback()}
 }
 function resume(){
   if(!allowed()||state.switching)return;
   if(state.mode==='video'){
     players[state.active].muted=!state.sound;
     const p=players[state.active].play();
     if(p&&p.catch)p.catch(()=>{const token=state.token;showPhoto(state.index,token,'Lecture vidéo indisponible : le parcours continue avec les images.')});
   }
 }
 function pause(){players.forEach(v=>v.pause())}
 function setWanted(value){
   state.wanted=value;
   state.lastTick=performance.now();
   if(!value){
     if(state.switching){cancelPending();showPhoto(state.index,state.token)}
     pause();
   }
   if(value&&state.started){
     if(state.mode==='video')resume();
     // Photo mode remains a timed automatic tour, and still works if videos fail.
   }
   sync();
 }
 // Clock handles both real video playback and timed poster fallback.
 window.setInterval(()=>{
   const now=performance.now(),elapsed=Math.max(0,Math.min(500,now-state.lastTick));
   state.lastTick=now;
   if(!state.started||state.switching||!allowed())return;
   if(state.mode==='photo'){
     state.photoElapsed+=elapsed;
     seekInfo();
     if(state.photoElapsed>=photoDuration){if(scrollMode)state.photoElapsed=0;else change(state.index+1)}
   }else{
     const v=players[state.active],d=v.duration;
     seekInfo();
     if(Number.isFinite(d)&&d>2&&v.currentTime>=d-1.15){if(scrollMode||(state.loops||0)+1<loopsFor(d)){state.loops=(state.loops||0)+1;v.currentTime=0}else change(state.index+1)}
   }
 },220);
 posters[0].style.backgroundImage='url("'+scenes[0].poster+'")';
 information(0);sync();seekInfo();
 function go(index){
   if(!scrollMode||document.fullscreenElement){change(index);return}
   const n=scenes.length,t=((index%n)+n)%n;
   window.scrollTo({top:sceneTop(t),behavior:reduced?'auto':'smooth'});
 }
 cards.forEach(card=>card.addEventListener('click',()=>go(Number(card.dataset.cxIndex))));
 byId('cx-prev').addEventListener('click',()=>go(state.index-1));
 byId('cx-next').addEventListener('click',()=>go(state.index+1));
 // Défilement → scène + remplissage des barres.
 function navHeight(){const nav=document.querySelector('.cojuka-global-nav');return nav?Math.round(nav.getBoundingClientRect().height):70}
 function range(){const top=scrolly.getBoundingClientRect().top+window.scrollY-navHeight();const len=Math.max(1,scrolly.offsetHeight-(window.innerHeight-navHeight()));return {top,len}}
 function sceneTop(i){const r=range();return Math.round(r.top+r.len*(i+.02)/scenes.length)}
 let scrollTimer=null,wantedIndex=0,rafPending=false;
 function onScroll(){
   if(rafPending)return;rafPending=true;
   requestAnimationFrame(()=>{
     rafPending=false;
     const r=range(),p=Math.max(0,Math.min(.9999,(window.scrollY-r.top)/r.len)),n=scenes.length;
     const idx=Math.floor(p*n),frac=p*n-idx;
     scrolly.classList.toggle('cx-scrolled',window.scrollY>r.top+20);
     if(idx===state.index&&!state.switching)fill(idx,frac);
     if(idx!==wantedIndex){wantedIndex=idx;clearTimeout(scrollTimer);scrollTimer=setTimeout(()=>{if(state.started&&wantedIndex!==state.index)change(wantedIndex)},140)}
   });
 }
 if(scrollMode){
   document.documentElement.style.setProperty('--cx-nav',navHeight()+'px');
   scrolly.style.setProperty('--cx-n',scenes.length);
   window.addEventListener('scroll',onScroll,{passive:true});
   window.addEventListener('resize',()=>{document.documentElement.style.setProperty('--cx-nav',navHeight()+'px');onScroll()},{passive:true});
 }
 playButton.addEventListener('click',()=>{
   if(!state.started){state.started=true;state.inView=true;setWanted(true);change(state.index);return}
   setWanted(!state.wanted);
 });
 muteButton.addEventListener('click',()=>{
   state.sound=!state.sound;
   players.forEach((v,i)=>{v.muted=!state.sound||i!==state.active});
   sync();
 });
 fullButton.addEventListener('click',()=>{
   if(document.fullscreenElement){document.exitFullscreen().catch(()=>{});return}
   if(!stage.requestFullscreen){notice('Le plein écran n’est pas disponible sur ce navigateur.');return}
   stage.requestFullscreen().catch(()=>notice('Le navigateur n’a pas autorisé le plein écran.'));
 });
 document.addEventListener('fullscreenchange',()=>{fullButton.textContent=document.fullscreenElement?'⤢ Quitter le plein écran':'⛶ Plein écran'});
 progress.addEventListener('input',()=>{
   if(state.switching)return;
   const v=players[state.active];
   if(state.mode==='video'&&Number.isFinite(v.duration)&&v.duration>0)v.currentTime=v.duration*Number(progress.value)/100;
   else state.photoElapsed=photoDuration*Number(progress.value)/100;
   seekInfo();
 });
 players.forEach((v,i)=>{
   v.addEventListener('ended',()=>{if(i!==state.active||state.mode!=='video'||state.switching||!allowed())return;if(scrollMode||(state.loops||0)+1<loopsFor(v.duration)){state.loops=(state.loops||0)+1;v.currentTime=0;v.play().catch(()=>{})}else change(state.index+1)});
   v.addEventListener('error',()=>{
     if(i===state.active&&state.mode==='video')showPhoto(state.index,state.token,'La vidéo est indisponible : la visite continue en images.');
   });
 });
 // Glisser sur la vidéo (mobile) pour changer de scène.
 let touchX=null,touchY=null;if(!scrollMode){
 stage.addEventListener('touchstart',e=>{const t=e.changedTouches[0];touchX=t.clientX;touchY=t.clientY},{passive:true});
 stage.addEventListener('touchend',e=>{
   if(touchX===null)return;const t=e.changedTouches[0],dx=t.clientX-touchX,dy=t.clientY-touchY;touchX=null;
   if(Math.abs(dx)>45&&Math.abs(dx)>Math.abs(dy)*1.4)change(state.index+(dx<0?1:-1));
 },{passive:true});}
 document.addEventListener('keydown',event=>{
   const target=event.target;
   if(event.altKey||event.metaKey||event.ctrlKey||target.closest('input,textarea,select,button,[contenteditable="true"]')||!state.inView)return;
   if(event.key==='ArrowRight'){event.preventDefault();go(state.index+1)}
   if(event.key==='ArrowLeft'){event.preventDefault();go(state.index-1)}
 });
 document.addEventListener('visibilitychange',()=>{state.lastTick=performance.now();if(document.hidden)pause();else resume()});
 window.addEventListener('pagehide',()=>{cancelPending();pause()},{once:true});
 function observe(entry){
   state.inView=entry.isIntersecting;
   state.lastTick=performance.now();
   if(!state.started&&state.inView){
     state.started=true;
     if(scrollMode)onScroll();
     if(state.wanted)change(scrollMode?wantedIndex:0);
     else{information(0);sync()}
   }else if(!state.inView)pause();
   else resume();
 }
 if('IntersectionObserver' in window){
   const observer=new IntersectionObserver(entries=>entries.forEach(observe),{threshold:.12});
   observer.observe(stage);
 }else observe({isIntersecting:true});
})();
</script>
@endsection
