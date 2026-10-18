@extends('layouts.cojuka-public')
@section('page_head')
<link rel="icon" type="image/svg+xml" href="{{ asset('favicon.svg') }}?v=2"><meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1">
<title>COJUKA Consulting Group — Mines, carrières, immobilier et construction</title>
<meta name="description" content="COJUKA Consulting Group : activités minières, carrières, investissements immobiliers, construction, logistique et consultance.">

<style>
:root{--wine:#a62532;--ink:#151923}html{scroll-behavior:smooth}body{font-family:system-ui,-apple-system,Segoe UI,sans-serif;color:var(--ink);overflow-x:hidden}nav{background:#fffffff0;backdrop-filter:blur(20px)}.brand{font-weight:850;letter-spacing:-.06em}.brand b,.eyebrow{color:var(--wine)}.hero{min-height:94vh;background:radial-gradient(circle at 80% 25%,#f2dce1,transparent 38%),#f8f9fb;display:flex;align-items:center;padding:120px 0 75px}.eyebrow{font-size:.8rem;letter-spacing:.2em;font-weight:800;text-transform:uppercase}h1{font-size:clamp(3.3rem,7vw,6.6rem);font-weight:850;letter-spacing:-.07em;line-height:1.04}h2{font-size:clamp(2.2rem,4vw,3.8rem);font-weight:800;letter-spacing:-.055em}p{line-height:1.8;color:#68717f}.accent{color:var(--wine)}.btn-brand{background:var(--wine);color:white;border-radius:99px;padding:13px 25px}.btn-brand:hover{background:#7d1724;color:white}.motion-stage{position:relative;aspect-ratio:1.2;background:#121725;border-radius:30px;overflow:hidden;box-shadow:0 35px 80px #15192344}.motion-stage video{width:100%;height:100%;object-fit:cover;position:absolute;inset:0}.motion-fallback{position:absolute;inset:0;display:grid;place-items:center;overflow:hidden}.ring{position:absolute;width:65%;aspect-ratio:1;border:1px solid #f4b6c3;border-radius:50%;animation:rotate 20s linear infinite}.ring:nth-child(2){width:48%;border-style:dashed;animation-direction:reverse}.orb{width:30%;aspect-ratio:1;border-radius:50%;background:radial-gradient(circle at 25% 20%,#ffc0c8,#b32d40 55%,#440a18);box-shadow:0 0 100px #bb304855;animation:levitate 5s ease-in-out infinite}.motion-stage:has(video:not([src])) .motion-fallback{display:grid}.motion-stage video{z-index:2}.motion-label{position:absolute;bottom:22px;left:24px;color:#fff;z-index:3;font-size:.7rem;letter-spacing:.18em;font-weight:800}section{padding:100px 0}.soft{background:#f5f6f8}.service{background:white;border:1px solid #e7e9ed;border-radius:26px;padding:35px;height:100%;transition:.4s;position:relative;overflow:hidden}.service:hover{transform:translateY(-9px);box-shadow:0 24px 65px #1b223015}.service .number{font-size:.8rem;color:var(--wine);font-weight:800;letter-spacing:.15em}.service h3{font-size:1.35rem;font-weight:750;margin:24px 0 12px}.motion-symbol{width:75px;height:75px;border:3px solid var(--wine);border-radius:22px;display:grid;place-items:center;color:var(--wine);font-size:2rem;margin-top:25px;animation:levitate 4s ease-in-out infinite}.sector{padding:19px 0;border-bottom:1px solid #dce0e6;font-weight:700;display:flex;justify-content:space-between}.sector span{color:var(--wine)}.reveal{opacity:0;transform:translateY(28px);transition:opacity .8s,transform .8s}.reveal.visible{opacity:1;transform:none}.contact{border:1px solid #e5e7ed;border-radius:24px;padding:30px;height:100%}footer{background:#141923;color:white;padding:35px 0}@keyframes rotate{to{transform:rotate(360deg)}}@keyframes levitate{50%{transform:translateY(-17px)}}@media(max-width:767px){section{padding:65px 0}.hero{padding-top:110px}}@media(prefers-reduced-motion:reduce){*,*:before,*:after{animation:none!important;scroll-behavior:auto!important}.reveal{opacity:1;transform:none}}

/* Visual language shared with the original COJUKA Construction homepage */
:root{--wine:#a62532;--ink:#151517}
.hero{min-height:calc(100svh - 64px);padding:0;position:relative;display:flex;align-items:flex-end;background:#111722;color:#fff;overflow:hidden}
.hero>.container{position:relative;z-index:3;padding-top:10rem;padding-bottom:7rem}
.hero .row{display:block}.hero .col-lg-7{width:100%;max-width:100%}.hero h1{font-size:clamp(3.6rem,9vw,9rem);font-weight:720;line-height:.96;max-width:1080px;letter-spacing:-.075em}
.hero .lead{max-width:620px;color:#f0f0f3!important;font-size:clamp(1rem,2vw,1.35rem);text-shadow:0 2px 20px #0008}
.hero .eyebrow{color:#fff}.hero .accent{color:#fff}
.hero .col-lg-5{position:absolute;inset:0;width:100%;max-width:none;z-index:-1;pointer-events:none}
.hero .motion-stage{position:absolute;inset:0;aspect-ratio:auto;border-radius:0;box-shadow:none;background:radial-gradient(ellipse at 75% 45%,#442331 0%,#182232 48%,#090d16 100%)}
.hero .motion-stage:after{content:"";position:absolute;inset:0;z-index:3;background:linear-gradient(90deg,#0a101ce0 0%,#0b1019a3 48%,#0b101930 100%),linear-gradient(0deg,#0a0d19ac,transparent 65%);pointer-events:none}
.hero .motion-fallback{background:radial-gradient(ellipse at 72% 44%,#643746 0%,#202c3b 38%,#0c1422 75%)}
.hero .ring{width:46%;left:53%;top:18%;border-color:#ffd5dc88;box-shadow:0 0 55px #b43d5344;animation:rotate 25s linear infinite}
.hero .ring:nth-child(2){width:35%;left:58%;top:23%;animation-direction:reverse}
.hero .orb{width:18%;position:absolute;left:67%;top:38%;filter:drop-shadow(0 0 65px #d4416077)}
.hero .motion-stage video{opacity:.75}
.hero .motion-label{z-index:4;bottom:32px;right:5%;left:auto;opacity:.8}
.btn-brand{background:#fff;color:#161616;font-weight:650;padding:16px 27px;transition:transform .25s,background .25s}
.btn-brand:hover{background:#f3f3f3;color:#161616;transform:translateY(-3px)}
nav{min-height:64px;box-shadow:0 1px 0 #00000012}
.brand{font-size:1.15rem}.brand b{color:var(--wine)}
.service{border:0;background:#fff;box-shadow:0 6px 30px #15192309}
.service:hover{box-shadow:0 28px 70px #1519231a}
#apropos h2,#expertises h2,#secteurs h2,#contact h2{font-weight:720;letter-spacing:-.065em}
.reveal{transition:opacity .9s cubic-bezier(.22,1,.36,1),transform .9s cubic-bezier(.22,1,.36,1)}
.hero .reveal{animation:heroEntry 1.1s both;opacity:1;transform:none}
@keyframes heroEntry{from{opacity:0;transform:translateY(45px);filter:blur(8px)}to{opacity:1;transform:none;filter:blur(0)}}
@media(max-width:767px){.hero{min-height:760px}.hero>.container{padding-top:8rem;padding-bottom:5rem}.hero .ring{width:90%;left:30%;top:28%}.hero .ring:nth-child(2){width:70%;left:40%;top:34%}.hero .orb{width:38%;left:62%;top:45%}.hero .motion-stage:after{background:linear-gradient(90deg,#0a101ce6,#0a101c70),linear-gradient(0deg,#0a101cba,transparent)}.hero .motion-label{font-size:.55rem}}
@media(prefers-reduced-motion:reduce){.hero .reveal{animation:none!important}}
.hero .motion-stage video{opacity:1;object-fit:cover}.hero .motion-stage:after{background:linear-gradient(90deg,rgba(8,14,26,.9) 0%,rgba(8,14,26,.65) 45%,rgba(8,14,26,.26) 100%),linear-gradient(0deg,rgba(8,14,26,.45),transparent 70%)}.hero .motion-label{display:none}@media(prefers-reduced-motion:reduce){.hero .motion-stage video{display:none}}
.consulting-video-hero{position:relative;overflow:hidden;min-height:calc(100svh - 76px);background:#0b1220;color:#fff;isolation:isolate}.consulting-video-hero .cojuka-video-carousel{position:absolute;inset:0;z-index:0}.consulting-video-hero:before{content:"";position:absolute;inset:0;z-index:1;background:linear-gradient(90deg,rgba(7,13,24,.86),rgba(7,13,24,.58) 65%,rgba(7,13,24,.3));pointer-events:none}.consulting-video-hero .container{position:relative;z-index:3}.consulting-video-hero h1{color:white}.consulting-video-hero .accent{color:#fff}.consulting-video-hero .lead{color:#e5e7ed}.consulting-video-hero .cojuka-carousel-controls{z-index:6}.consulting-video-hero .btn-brand{background:#fff;color:#151923}.consulting-video-hero .btn-brand:hover{background:#f1e6e8;color:#151923}@media(max-width:767px){.consulting-video-hero{padding:105px 0 130px}.consulting-video-hero h1{font-size:clamp(3.1rem,11vw,5rem)}}

/* Hero sur l'image, sans cache ni glassmorphisme : libellé uniquement. */
.hero [data-cojuka-hero-eyebrow],
.consulting-video-hero [data-cojuka-hero-eyebrow]{
  display:inline-block!important;
  width:auto!important;
  max-width:100%;
  padding:0!important;
  margin-left:0!important;
  margin-right:0!important;
  background:none!important;
  background-color:transparent!important;
  background-image:none!important;
  border:0!important;
  border-radius:0!important;
  box-shadow:none!important;
  backdrop-filter:none!important;
  -webkit-backdrop-filter:none!important;
  outline:0!important;
  isolation:auto!important;
}
.hero [data-cojuka-hero-eyebrow]::before,
.hero [data-cojuka-hero-eyebrow]::after,
.consulting-video-hero [data-cojuka-hero-eyebrow]::before,
.consulting-video-hero [data-cojuka-hero-eyebrow]::after{content:none!important;display:none!important}
</style>
@endsection
@section('content')
@include('partials.cojuka-intro')

<main><header class="hero consulting-video-hero">@include('partials.cojuka-hero-carousel')<div class="container"><div class="row align-items-center g-5"><div class="col-lg-9 reveal cojuka-hero-copy" data-cojuka-hero-copy data-cojuka-hero-context="group"><div class="eyebrow mb-4" data-cojuka-hero-eyebrow>COJUKA CONSULTING GROUP · RDC</div><h1 data-cojuka-hero-title>COJUKA Consulting Group</h1><p class="lead my-4" data-cojuka-hero-description>Le Mining est notre priorité : activités minières, carrières et ressources naturelles, soutenues par l'immobilier, la construction et la logistique.</p><a class="btn btn-brand" data-cojuka-hero-cta href="#expertises">Découvrir nos expertises <span aria-hidden="true">↗</span></a></div></div></div></header>
<section id="apropos"><div class="container"><div class="row g-5">
<div class="col-lg-5 reveal"><div class="eyebrow mb-3">Présentation du groupe</div><h2>COJUKA Consulting Group : une vision, plusieurs secteurs.</h2></div>
<div class="col-lg-7 reveal"><p class="lead">COJUKA Consulting Group est un groupe multisectoriel structuré autour de directions opérationnelles, de sociétés et de participations. Son domaine prioritaire est le secteur minier, autour de COJUKA Mining. Le groupe intervient également dans les carrières, l'investissement immobilier, la construction, la logistique et la consultance.</p><p>Le groupe s'appuie sur une organisation multisectorielle, des sociétés spécialisées et des partenariats pour accompagner ses projets et investissements. Les activités des entités se complètent au service des projets et des partenaires.</p><a href="{{ route('group.portal') }}" class="btn btn-brand mt-3">Découvrir les entités ↗</a></div>
</div></div></section>
<section id="expertises" class="soft"><div class="container"><div class="eyebrow mb-3">Nos métiers</div><h2 class="mb-5">Le Mining d'abord.<br>Des expertises complémentaires.</h2><div class="row g-4">
<div class="col-md-6 reveal"><article class="service"><div class="number">MINING PRIORITAIRE</div><div class="motion-symbol">◇</div><h3>Activités minières</h3><p>Développement de projets miniers, valorisation des ressources et suivi des concessions, dans le respect du cadre réglementaire applicable.</p></article></div>
<div class="col-md-6 reveal"><article class="service"><div class="number">CARRIÈRES</div><div class="motion-symbol">⌘</div><h3>Carrières et matériaux</h3><p>Projets liés aux carrières, aux matériaux de construction et à leur chaîne d'approvisionnement.</p></article></div>
<div class="col-md-6 reveal"><article class="service"><div class="number">IMMOBILIER</div><div class="motion-symbol">◎</div><h3>Investissement immobilier</h3><p>Développement et gestion de projets fonciers et immobiliers, notamment à travers Eden Park Investments.</p></article></div>
<div class="col-md-6 reveal"><article class="service"><div class="number">OPÉRATIONS</div><div class="motion-symbol">↗</div><h3>Construction et logistique</h3><p>Construction, transport, approvisionnement et coordination des opérations liées aux projets du groupe.</p></article></div>
</div></div></section>
<section id="ecosysteme" class="cojuka-ecosystem soft" aria-labelledby="ecosysteme-title">
<div class="container">
 <div class="eyebrow mb-3">Organisation &amp; écosystème</div>
 <div class="row align-items-end g-4 mb-5"><div class="col-lg-8"><h2 id="ecosysteme-title">Un groupe intégré.<br>Des expertises complémentaires.</h2><p class="lead">COJUKA Group place les activités minières au premier plan, soutenues par la construction, la logistique, l'immobilier et le conseil. Son portail central présente les structures du groupe et leurs projets.</p></div><div class="col-lg-4 text-lg-end"><a class="btn btn-brand" href="{{ route('group.portal') }}">Découvrir les entités ↗</a></div></div>
 <div class="row g-4">
 <div class="col-md-6 col-xl-4"><article class="service h-100"><div class="number">ACTIVITÉ MINIÈRE · SA</div><h3>COJUKA Mining</h3><p>Société minière disposant d'environ cinquante carrés miniers dans la zone stratégique dite « zone 30 », au Haut-Katanga, et poursuivant le développement de ses activités.</p></article></div>
 <div class="col-md-6 col-xl-4"><article class="service h-100"><div class="number">DIRECTION OPÉRATIONNELLE</div><h3>Construction</h3><p>Activités de construction et développement de projets, intégrées à l'organisation du groupe.</p></article></div>
 <div class="col-md-6 col-xl-4"><article class="service h-100"><div class="number">DIRECTION OPÉRATIONNELLE</div><h3>Logistique</h3><p>Coordination des opérations de transport et de logistique.</p></article></div>
 <div class="col-md-6 col-xl-4"><article class="service h-100"><div class="number">CONSEIL &amp; DÉVELOPPEMENT</div><h3>Consultance stratégique</h3><p>Accompagnement des acteurs privés, des entreprises et des institutions étatiques, avec une orientation vers les secteurs stratégiques.</p></article></div>
 <div class="col-md-6 col-xl-4"><article class="service h-100"><div class="number">INVESTISSEMENT IMMOBILIER · SA</div><h3>Eden Park Investments</h3><p>Société d'investissement immobilier détenant des actifs fonciers et immobiliers, avec des projets en cours au Congo et à l'étranger.</p></article></div>
 <div class="col-md-6 col-xl-4"><article class="service h-100"><div class="number">PARTICIPATION INTERNATIONALE</div><h3>Impact Center</h3><p>Société de droit belge détenue majoritairement par le groupe.</p></article></div>
 
 </div>
 <div class="mt-5 p-4 p-lg-5 rounded-4 bg-white border"><div class="row align-items-center g-3"><div class="col-lg-8"><h3 class="h4 fw-bold mb-2">Des filiales spécialisées dans des secteurs stratégiques</h3><p class="mb-0">Le groupe rassemble des activités complémentaires dans les mines, les carrières, l'immobilier, la construction, la logistique et la consultance. Ce site présente ses entités et ses orientations.</p></div><div class="col-lg-4 text-lg-end"><a class="btn btn-outline-dark rounded-pill" href="{{ route('group.portal') }}">Portail du groupe ↗</a></div></div></div>
</div></section>
<section id="heritage-belge" class="soft"><div class="container"><div class="row align-items-center g-5"><div class="col-lg-7"><div class="eyebrow mb-3">Héritage · Belgique &amp; Afrique</div><h2>Une histoire internationale, une ambition africaine.</h2><p class="lead">Le parcours de Jules Kabongo, fondateur de COJUKA, s'est construit entre la Belgique et l'Afrique. Des archives historiques documentent la création du groupe en 2001, son ancrage à Tervuren et une philosophie fondée sur la coopération et le transfert de connaissances.</p><a href="{{ route('group.history') }}" class="btn btn-brand mt-3">Découvrir l'histoire et le fondateur ↗</a></div><div class="col-lg-5"><div class="service"><div class="number">BELGIQUE · COOPÉRATION INTERNATIONALE</div><h3>Des liens européens durables</h3><p>Un parcours historique lié à la région de Bruxelles, et une dimension belge aujourd'hui représentée dans l'écosystème par Impact Center.</p><a href="{{ route('group.profile','impact-center') }}" class="fw-bold" style="color:#86212e">Découvrir Impact Center ↗</a></div></div></div></div></section>
<section id="secteurs"><div class="container"><div class="row g-5"><div class="col-lg-5 reveal"><div class="eyebrow mb-3">Nos secteurs</div><h2>Des solutions adaptées à chaque industrie.</h2></div><div class="col-lg-7 reveal"><div class="sector">Mines et concessions minières <span>↗</span></div><div class="sector">Carrières et matériaux de construction <span>↗</span></div><div class="sector">Immobilier et investissements fonciers <span>↗</span></div><div class="sector">Construction, transport et logistique <span>↗</span></div></div></div></div></section>
@include('partials.cojuka-photo-atlas')
<section id="contact" class="soft"><div class="container"><div class="text-center mb-5 reveal"><div class="eyebrow mb-3">Contact</div><h2>Parlons de votre prochain projet.</h2></div><div class="row g-4"><div class="col-md-6 reveal"><div class="contact"><h3>Kinshasa, RDC</h3><p>277, avenue Niangue, Lingwala, Kinshasa</p></div></div><div class="col-md-6 reveal"><div class="contact"><h3>Bruxelles, Belgique</h3><p>25, rue Baron de Castro, 1040 Bruxelles</p></div></div></div><div class="text-center mt-5"><button type="button" class="btn btn-brand" data-bs-toggle="modal" data-bs-target="#cojukaContactModal">Écrire au groupe ↗</button></div>
</div></section>
<div class="modal fade" id="cojukaContactModal" tabindex="-1" aria-labelledby="cojukaContactTitle" aria-hidden="true">
 <div class="modal-dialog modal-dialog-centered modal-lg"><div class="modal-content border-0 rounded-4 overflow-hidden" style="box-shadow:0 30px 90px #0003">
  <div class="modal-header px-4 px-lg-5 pt-4 border-0"><div><p class="eyebrow mb-2" style="color:#86212e">Contacter le groupe</p><h2 class="modal-title h3 fw-bold" id="cojukaContactTitle">Parlons de votre projet.</h2></div><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button></div>
  <div class="modal-body px-4 px-lg-5 pb-5">
   <p class="text-secondary mb-4">Présentez votre demande. Le bouton préparera un message dans votre application de messagerie, prêt à être envoyé au groupe.</p>
   <form id="cojukaContactForm">
    <div class="row g-3">
     <div class="col-md-6"><label for="cojukaContactName" class="form-label">Nom complet *</label><input class="form-control rounded-3 p-3" id="cojukaContactName" name="name" maxlength="120" autocomplete="name" required></div>
     <div class="col-md-6"><label for="cojukaContactEmail" class="form-label">Adresse e-mail *</label><input type="email" class="form-control rounded-3 p-3" id="cojukaContactEmail" name="email" maxlength="180" autocomplete="email" required></div>
     <div class="col-md-6"><label for="cojukaContactPhone" class="form-label">Téléphone</label><input type="tel" class="form-control rounded-3 p-3" id="cojukaContactPhone" name="phone" maxlength="40" autocomplete="tel"></div>
     <div class="col-md-6"><label for="cojukaContactSector" class="form-label">Domaine concerné *</label><select class="form-select rounded-3 p-3" id="cojukaContactSector" name="sector" required><option value="">Choisir un domaine</option><option>Mining</option><option>Carrières</option><option>Construction</option><option>Logistique</option><option>Consultance</option><option>Immobilier / Eden Park Investments</option><option>Impact Center</option><option>Autre demande</option></select></div>
     <div class="col-12"><label for="cojukaContactMessage" class="form-label">Votre message *</label><textarea class="form-control rounded-3 p-3" id="cojukaContactMessage" name="message" rows="5" minlength="10" maxlength="4000" placeholder="Expliquez votre projet, votre besoin ou votre demande de collaboration..." required></textarea></div>
     <div class="col-12 d-flex flex-column flex-sm-row align-items-sm-center justify-content-between gap-3 mt-4"><small class="text-secondary">* Champs obligatoires. Aucun message n'est envoyé automatiquement.</small><button type="submit" class="btn btn-brand px-4 py-3">Préparer mon e-mail ↗</button></div>
    </div>
   </form>
  </div>
 </div></div>
</div></main>
@endsection
@section('page_scripts')
<script>document.addEventListener('DOMContentLoaded',function(){var form=document.getElementById('cojukaContactForm');if(!form)return;form.addEventListener('submit',function(e){e.preventDefault();if(!form.reportValidity())return;var value=function(id){return document.getElementById(id).value.trim()};var subject='Demande COJUKA — '+value('cojukaContactSector');var body=['Bonjour COJUKA Consulting Group,','','Nom : '+value('cojukaContactName'),'E-mail : '+value('cojukaContactEmail'),'Téléphone : '+(value('cojukaContactPhone')||'Non renseigné'),'Domaine : '+value('cojukaContactSector'),'','Message :',value('cojukaContactMessage'),'','Cordialement,',value('cojukaContactName')].join('\\n');window.location.href='mailto:info@cojukagroup.com?subject='+encodeURIComponent(subject)+'&body='+encodeURIComponent(body)})});</script>
<script>const o=new IntersectionObserver(es=>es.forEach(e=>{if(e.isIntersecting){e.target.classList.add('visible');o.unobserve(e.target)}}),{threshold:.08});document.querySelectorAll('.reveal').forEach(e=>o.observe(e));</script>
@endsection
