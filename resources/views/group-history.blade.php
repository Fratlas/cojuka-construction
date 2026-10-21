@extends('layouts.cojuka-public')
@section('page_head')
<title>Histoire, fondateur et ancrage belge — COJUKA Consulting Group</title>
<meta name="description" content="Découvrez le parcours de Jules Kabongo, l'histoire de COJUKA et les liens historiques du groupe avec la Belgique et l'Afrique.">
<style>
.history-hero{position:relative;background:#111a26;color:#fff;padding:clamp(110px,12vw,180px) 0 clamp(70px,9vw,130px);overflow:hidden}
.history-hero:before{content:"";position:absolute;inset:0;background:linear-gradient(90deg,rgba(16,23,34,.56),rgba(16,23,34,.24)),url('https://images.unsplash.com/photo-1497366754035-f200968a6e72?auto=format&fit=crop&w=1400&q=75&fm=webp') center/cover}
.history-hero .container{position:relative;z-index:1}
.history-kicker{font-size:.79rem;font-weight:800;letter-spacing:.2em;text-transform:uppercase;color:#fff}
.history-hero h1{max-width:900px;font-size:clamp(3rem,6.8vw,6.8rem);line-height:1.02;letter-spacing:-.065em;font-weight:800;margin:25px 0}
.history-hero p{max-width:700px;font-size:clamp(1.1rem,1.5vw,1.35rem);line-height:1.7;color:#f0f2f4}
.history-section{padding:clamp(65px,8vw,115px) 0}
.history-section h2{font-size:clamp(2.1rem,4vw,4rem);letter-spacing:-.05em;font-weight:800;line-height:1.13}
.history-section p{font-size:1.04rem;line-height:1.85;color:#515e6e}
.history-label{font-size:.79rem;letter-spacing:.18em;font-weight:800;text-transform:uppercase;color:#87202f;margin-bottom:18px}
.history-photo{width:100%;min-height:350px;object-fit:cover;border-radius:25px}
.history-card{height:100%;border:1px solid #e4e7eb;background:#fff;border-radius:20px;padding:clamp(24px,3vw,40px)}
.history-card h3{font-size:1.3rem;font-weight:750;margin:0 0 14px}
.history-timeline{border-left:3px solid #8a1e30;padding-left:28px;margin:30px 0}
.history-timeline li{margin-bottom:25px;padding-left:8px;line-height:1.7;color:#4d5966}
.history-timeline strong{display:block;color:#161c25;font-size:1.1rem}
.history-belgium{background:#101b2a;color:#fff}
.history-belgium p{color:#d9e0e9}
.history-belgium .history-label{color:#fff}
.history-belgium .history-card{background:#1b2a3c;border-color:#3b4a5b;color:#fff}
.history-belgium .history-card p{color:#e1e7ed}
.history-quote{border-left:4px solid #9a2435;padding:15px 0 15px 25px;font-size:clamp(1.3rem,2.4vw,2rem);line-height:1.45;font-weight:700;letter-spacing:-.025em}
.history-source{font-size:.84rem!important;color:#6d7783!important}
@media(max-width:767px){.history-photo{min-height:240px}.history-section{padding:60px 0}}

/* Founder portrait belongs to Histoire, never to generic entity photo sets. */
.history-founder-portrait{margin:0;overflow:hidden;background:#fff;border:1px solid #e4e9ef;border-radius:23px;box-shadow:0 16px 45px rgba(12,25,42,.1)}
.history-founder-open{display:block;width:100%;padding:0;margin:0;border:0;position:relative;overflow:hidden;background:#e7eaed;cursor:zoom-in}
.history-founder-open img{width:100%;height:auto;aspect-ratio:400/414;object-fit:cover;display:block;filter:none;transition:transform .5s ease}
.history-founder-open:hover img{transform:scale(1.025)}
.history-founder-zoom{position:absolute;right:15px;bottom:15px;display:grid;place-items:center;width:38px;height:38px;border-radius:11px;background:rgba(20,32,47,.78);color:#fff}
.history-founder-portrait figcaption{display:block;padding:16px 20px;font-size:15px;font-weight:800;color:#263649;line-height:1.45}
.history-founder-portrait figcaption small{display:block;margin-top:3px;font-weight:500;color:#637386;font-size:12px}
.history-founder-milestones{height:auto!important;padding:clamp(22px,2.5vw,32px)!important}
.history-founder-open:focus-visible{outline:3px solid #8395a9;outline-offset:-3px}
html[data-cojuka-theme="dark"] body.cojuka-glass-public .history-founder-portrait{background:#253345;border-color:#405268}
html[data-cojuka-theme="dark"] body.cojuka-glass-public .history-founder-portrait figcaption{color:#fff}
html[data-cojuka-theme="dark"] body.cojuka-glass-public .history-founder-portrait figcaption small{color:#ced7e4}
@media(max-width:767px){.history-founder-portrait{border-radius:18px}}
@media(prefers-reduced-motion:reduce){.history-founder-open img{transition:none!important;transform:none!important}}


/* The biography and portrait now share a row. Historical milestones sit
   BELOW the portrait, removing the empty upper-left vertical space. */
body.cojuka-glass-public main > .history-founder-section{
 padding-top:clamp(44px,5.2vw,75px)!important;
 padding-bottom:clamp(48px,5.5vw,78px)!important;
 background:#FFFFFF!important;
}
.history-founder-shell{max-width:1210px}
.history-founder-grid{display:grid;grid-template-columns:minmax(0,1.12fr) minmax(0,.82fr);
 gap:clamp(36px,5.7vw,94px);align-items:start}
.history-founder-grid > *{min-width:0}
.history-founder-copy{padding-top:clamp(4px,.9vw,15px)}
.history-founder-copy .history-label{position:relative;color:#697586!important;
 padding-left:43px;font-size:11px;letter-spacing:.16em;margin:0 0 23px!important}
.history-founder-copy .history-label:before{content:"";position:absolute;left:0;top:50%;
 width:28px;height:1px;background:#8b98a7}
body.cojuka-glass-public .history-founder-copy h2{
 max-width:720px;margin:0 0 clamp(23px,2.5vw,34px)!important;
 font-size:clamp(2.75rem,4.25vw,4.6rem)!important;
 font-weight:850!important;line-height:1.045!important;
 letter-spacing:-.065em!important;color:#182333!important;
 text-wrap:balance}
.history-founder-copy h2 span{display:block}
.history-founder-copy h2 span+span{color:#3f4d5e}
.history-founder-copy p{font-size:clamp(.96rem,1.08vw,1.06rem)!important;
 line-height:1.74!important;color:#526172!important;
 max-width:650px;margin:0 0 17px}
.history-founder-copy p.history-source{font-size:.79rem!important;color:#7b8794!important;
 margin:25px 0 0!important}
.history-founder-next{display:inline-flex;gap:12px;align-items:center;
 padding:10px 0;margin-top:14px;border-bottom:1px solid #98a6b6;
 text-decoration:none;font-size:13px;font-weight:800;color:#2a394b!important}
.history-founder-next:hover{color:#151f2e!important;border-color:#26364b}
.history-founder-next:focus-visible{outline:3px solid #8d9dae;outline-offset:3px}
.history-founder-portrait{align-self:start;max-width:465px;width:100%;justify-self:end}
.history-founder-open img{aspect-ratio:1/1.035;object-position:center 42%}
.history-founder-portrait figcaption strong{display:block}
.history-founder-milestones{
 margin-top:clamp(35px,4vw,58px);
 padding-top:clamp(20px,2.3vw,32px);
 border-top:1px solid #dbe1e9;
}
.history-founder-milestones-head{display:flex;justify-content:space-between;align-items:flex-end;
 gap:16px 26px;margin-bottom:22px}
.history-founder-milestones-head .history-label{margin:0!important;font-size:11px;color:#7a8796!important}
.history-founder-milestones-head h3{margin:0;font-weight:840;letter-spacing:-.04em;
 font-size:clamp(1.25rem,1.75vw,1.7rem);color:#2a3647}
.history-founder-steps{display:grid;grid-template-columns:repeat(4,minmax(0,1fr));
 gap:clamp(15px,2vw,28px);margin:0;padding:0;list-style:none;counter-reset:milestone}
.history-founder-steps li{position:relative;min-width:0;padding:16px 0 0;border-top:1px solid #d5dce5;
 color:#627083;font-size:13px;line-height:1.65}
.history-founder-steps li:before{content:"";position:absolute;left:0;top:-2px;width:42px;
 height:3px;border-radius:2px;background:#8492a3}
.history-founder-steps strong{display:block;font-size:14px;font-weight:800;
 margin-bottom:6px;color:#243349}
.history-founder-steps span{display:block;max-width:260px}
/* Use neutral metallic details, not the former burgundy timeline. */
body.cojuka-glass-public .history-section .history-timeline{border-left-color:#8a97a6}
body.cojuka-glass-public .history-section .history-quote{border-left-color:#8a97a6}
body.cojuka-glass-public .history-section .history-label{color:#657286}
body.cojuka-glass-public main .history-section h2{overflow-wrap:normal}
html[data-cojuka-theme="dark"] body.cojuka-glass-public main > .history-founder-section{
 background:#171f2c!important}
html[data-cojuka-theme="dark"] body.cojuka-glass-public .history-founder-copy h2,
html[data-cojuka-theme="dark"] body.cojuka-glass-public .history-founder-copy h2 span,
html[data-cojuka-theme="dark"] body.cojuka-glass-public .history-founder-milestones-head h3,
html[data-cojuka-theme="dark"] body.cojuka-glass-public .history-founder-steps strong{
 color:#FFFFFF!important}
html[data-cojuka-theme="dark"] body.cojuka-glass-public .history-founder-copy p,
html[data-cojuka-theme="dark"] body.cojuka-glass-public .history-founder-steps li{color:#d4dce7!important}
html[data-cojuka-theme="dark"] body.cojuka-glass-public .history-founder-copy .history-label,
html[data-cojuka-theme="dark"] body.cojuka-glass-public .history-founder-milestones-head .history-label,
html[data-cojuka-theme="dark"] body.cojuka-glass-public .history-founder-copy p.history-source{color:#cad3df!important}
html[data-cojuka-theme="dark"] body.cojuka-glass-public .history-founder-next{
 color:#FFFFFF!important;border-color:#9cadbf}
html[data-cojuka-theme="dark"] body.cojuka-glass-public .history-founder-milestones,
html[data-cojuka-theme="dark"] body.cojuka-glass-public .history-founder-steps li{border-color:#405164}
html[data-cojuka-theme="dark"] body.cojuka-glass-public .history-founder-steps li:before{background:#d8e0eb}
@media(max-width:991.98px){
 .history-founder-grid{grid-template-columns:minmax(0,1fr) minmax(0,.85fr);gap:29px}
 body.cojuka-glass-public .history-founder-copy h2{font-size:clamp(2.3rem,4.3vw,3.7rem)!important}
 .history-founder-steps{grid-template-columns:repeat(2,minmax(0,1fr));row-gap:25px}
}
@media(max-width:767.98px){
 body.cojuka-glass-public main > .history-founder-section{
  padding-block:clamp(34px,6vw,52px)!important}
 .history-founder-grid{grid-template-columns:1fr;gap:25px}
 .history-founder-copy{padding-top:0}
 body.cojuka-glass-public .history-founder-copy h2{
  font-size:clamp(2.2rem,9.2vw,3.6rem)!important;line-height:1.08!important}
 .history-founder-portrait{justify-self:start;max-width:480px}
 .history-founder-milestones{margin-top:31px}
 .history-founder-milestones-head{align-items:flex-start;flex-direction:column;gap:6px}
 .history-founder-steps{gap:22px 17px}
}
@media(max-width:410px){.history-founder-steps{grid-template-columns:1fr}
 .history-founder-steps li{padding-top:12px}
}

</style>
@endsection
@section('content')
<main>
<section class="history-hero"><div class="container"><div class="history-kicker">COJUKA Consulting Group · Histoire &amp; vision</div><h1>Une histoire entre la Belgique et l’Afrique.</h1><p>Des racines africaines, une expérience européenne et une conviction : le développement durable se construit avec les compétences et les communautés locales.</p><a href="#fondateur" class="btn btn-light rounded-pill px-4 py-3 mt-3 fw-semibold">Découvrir notre histoire ↗</a></div></section>
<section id="fondateur" class="history-section history-founder-section" aria-labelledby="history-founder-title">
 <div class="container history-founder-shell">
  <div class="history-founder-grid">
   <div class="history-founder-copy">
    <div class="history-label">Biographie du fondateur</div>
    <h2 id="history-founder-title"><span>Jules Kabongo.</span><span>Une vision tournée vers l’avenir.</span></h2>
    <p>Originaire de l’ancien Zaïre, aujourd’hui République démocratique du Congo, <strong>Jules Kabongo</strong> arrive en Belgique en 1985. Son parcours universitaire, notamment en chimie, s’accompagne d’un intérêt pour la technologie et l’ingénierie.</p>
    <p>En 2001, il fonde <strong>COJUKA Consultancy Group</strong>, entouré de spécialistes de plusieurs disciplines. Son ambition, telle que rapportée dans un entretien de presse, consiste à mettre l’expertise technique au service de projets concrets et de l’amélioration des conditions de vie en Afrique.</p>
    <p>Cette trajectoire relie deux espaces complémentaires : la Belgique, lieu de formation et d’activités professionnelles, et l’Afrique, au cœur de la vision de développement portée par le groupe.</p>
    <p class="history-source">Source historique : entretien « African Visionary », Cindy-Lou Dale, document d’archive communiqué par COJUKA.</p>
    <a class="history-founder-next" href="#belgique">Découvrir l’ancrage belge <i class="bi bi-arrow-down-right" aria-hidden="true"></i></a>
   </div>
   <figure class="history-founder-portrait">
    <button type="button" class="history-founder-open" data-cg-photo-popup
     data-photo-title="Jules Kabongo" data-photo-sector="COJUKA CONSULTING GROUP · HISTOIRE"
     data-photo-description="Portrait institutionnel de Jules Kabongo, présenté dans l’histoire de COJUKA Consulting Group. Photographie communiquée pour cette page."
     data-photo-original="1" aria-label="Agrandir le portrait de Jules Kabongo">
     <img src="{{ asset('images/history/jules-kabongo.avif') }}" alt="Portrait en noir et blanc de Jules Kabongo, en costume, installé à un bureau" width="360" height="373" loading="eager" decoding="async" fetchpriority="high">
     <span class="history-founder-zoom" aria-hidden="true"><i class="bi bi-arrows-fullscreen"></i></span>
    </button>
    <figcaption><strong>Jules Kabongo</strong><small>Portrait institutionnel · Document communiqué</small></figcaption>
   </figure>
  </div>
  <div class="history-founder-milestones" aria-labelledby="history-founder-milestones-title">
   <div class="history-founder-milestones-head">
    <p class="history-label">Repères historiques</p>
    <h3 id="history-founder-milestones-title">Les étapes d’un parcours.</h3>
   </div>
   <ol class="history-founder-steps">
    <li><strong>1985 · Belgique</strong><span>Arrivée de Jules Kabongo en Belgique depuis le Zaïre, selon l’entretien d’archive.</span></li>
    <li><strong>Formation &amp; ingénierie</strong><span>Études de chimie, puis intérêt pour les technologies et les métiers de l’ingénierie.</span></li>
    <li><strong>2001 · COJUKA</strong><span>Création de COJUKA Consultancy Group, selon la même source.</span></li>
    <li><strong>Vision euro-africaine</strong><span>Coopération, transfert de connaissances et participation des acteurs locaux.</span></li>
   </ol>
  </div>
 </div>
</section>
<section id="belgique" class="history-section history-belgium"><div class="container"><div class="row align-items-center g-5"><div class="col-lg-6"><div class="history-label">Belgique · Dimension internationale</div><h2>La Belgique, un ancrage majeur dans l’histoire de COJUKA.</h2><p>Les archives du groupe documentent une présence professionnelle en Belgique, notamment à <strong>Tervuren, dans la région bruxelloise</strong>, où un entretien avec Jules Kabongo a été réalisé.</p><p>Ce parcours belge nourrit une approche transversale : conseil, coordination de projets et relations entre partenaires européens et africains.</p><p>Dans l’organisation présentée sur le site, <strong>Impact Center</strong> constitue également une composante belge de l’écosystème COJUKA. Les informations sur ses activités contemporaines sont à compléter avec ses documents institutionnels actualisés.</p><a class="btn btn-light rounded-pill px-4 py-3 mt-3 fw-semibold" href="{{ route('group.profile','impact-center') }}">Découvrir Impact Center ↗</a></div><div class="col-lg-6"><img class="history-photo" loading="lazy" decoding="async" width="1000" height="700" src="https://images.unsplash.com/photo-1497366811353-6870744d04b2?auto=format&fit=crop&w=1000&q=74&fm=webp" alt="Bureaux contemporains illustrant les activités professionnelles européennes"><p class="mt-3 mb-0" style="font-size:.82rem;color:#cbd5e1">Photographie d’illustration — elle ne représente pas un bureau COJUKA identifié.</p></div></div><div class="row g-4 mt-5"><div class="col-md-6"><div class="history-card"><h3>Conseil &amp; expertise</h3><p>Échanges de compétences et accompagnement technique entre environnements professionnels européens et africains.</p></div></div><div class="col-md-6"><div class="history-card"><h3>Coopération durable</h3><p>Une philosophie fondée sur l’implication des équipes locales et la transmission de savoir-faire.</p></div></div></div></div></section>
<section id="philosophie" class="history-section" style="background:#f5f6f8"><div class="container"><div class="row g-5 align-items-center"><div class="col-lg-5"><div class="history-label">Notre philosophie</div><h2>Développer des projets. Transmettre des savoirs.</h2></div><div class="col-lg-7"><p>Dans son texte « Philosophie du Groupe », Jules Kabongo défend une coopération économique qui ne se limite pas à la réalisation de projets. Il insiste sur l’<strong>implication de la main-d’œuvre locale</strong>, l’amélioration des conditions de vie et le <strong>transfert de connaissances</strong>.</p><p>Le document présente <strong>Cojuka University</strong> comme le département associé à cette mission de transmission. Cette référence est ici présentée comme un élément de la philosophie historique du groupe, sans préjuger du fonctionnement actuel d’un établissement de formation.</p><div class="history-quote">Une coopération durable se mesure aussi à ce qu’elle transmet aux générations suivantes.</div><p class="history-source mt-3">Synthèse éditoriale du document « Philosophie du Groupe », signé Jules Kabongo, CEO.</p></div></div></div></section>
<section class="history-section"><div class="container"><div class="history-label">Expertises historiques</div><h2>Une vision multisectorielle.</h2><div class="row g-4 mt-3"><div class="col-md-6"><div class="history-card"><h3>Construction</h3><p>Études, réalisation, installation et rénovation de bâtiments et d’infrastructures.</p></div></div><div class="col-md-6 col-lg-3"><div class="history-card"><h3>Conseil institutionnel</h3><p>Solutions étudiées pour la sécurité, la communication, la surveillance et la gestion urbaine.</p></div></div></div><p class="history-source mt-4">Présentation historique des activités du groupe ; les prestations actuelles sont décrites dans les pages de chaque entité.</p><div class="mt-5"><a class="btn rounded-pill px-4 py-3 text-white" style="background:#364353" href="{{ route('group.portal') }}">Explorer les entités actuelles ↗</a></div></div></section>
</main>
@endsection