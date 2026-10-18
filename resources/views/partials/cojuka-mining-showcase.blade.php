@php
/*
 * COJUKA Mining — illustrative mineral specimen gallery.
 * Filenames correspond to Wikimedia Commons file pages. Every picture has a
 * visible source/licensing link. They do NOT represent COJUKA mining output.
 * A photo exists only once in the DOM, including the moving image strip.
 */
$cgMiningMinerals=[
 ['file'=>'Chalcopyrite Ore.jpg','title'=>'Cuivre · Chalcopyrite','group'=>'Cuivre','desc'=>'La chalcopyrite est un minerai important de cuivre. Sa teinte métallisée accompagne les travaux d’étude et de caractérisation des ressources.'],
 ['file'=>'Cobaltite (Cobalt, Ontario, Canada) 2 (18599841324).jpg','title'=>'Cobalt · Cobaltite','group'=>'Cobalt','desc'=>'La cobaltite est un minéral contenant du cobalt. Le cobalt est utilisé notamment dans les alliages et certaines technologies de stockage énergétique.'],
 ['file'=>'Gold Nugget.jpg','title'=>'Or natif','group'=>'Or','desc'=>'L’or se rencontre parfois sous forme de pépites naturelles. L’identification et l’évaluation de la teneur demandent une analyse adaptée.'],
 ['file'=>'Columbite-tantalite from She County (b).jpg','title'=>'Coltan · Columbite-tantalite','group'=>'Coltan','desc'=>'Le coltan regroupe des minéraux de la famille columbite-tantalite, associés notamment au niobium et au tantale.'],
 ['file'=>'Cassiterite-113392.jpg','title'=>'Cassitérite','group'=>'Étain','desc'=>'La cassitérite est une source minérale majeure de l’étain, reconnaissable notamment à ses cristaux denses et foncés.'],
 ['file'=>'Azurite et malachite sur cuivre 1(Maroc).jpg','title'=>'Azurite et malachite','group'=>'Cuivre','desc'=>'L’azurite et la malachite sont des minéraux secondaires du cuivre, remarquables par leurs nuances bleues et vertes.'],
 ['file'=>'Spherocobaltite-117548.jpg','title'=>'Sphérocobaltite du Katanga','group'=>'Cobalt','desc'=>'Un minéral du cobalt documenté à Kamoto, près de Kolwezi, dans le Katanga. La photo illustre la diversité géologique régionale.'],
 ['file'=>'Copper-Azurite-Malachite-22970.jpg','title'=>'Cuivre natif et minéraux associés','group'=>'Cuivre','desc'=>'Ce spécimen associe du cuivre natif à des traces d’azurite et de malachite. Il illustre les associations minérales d’un gisement.'],
 ['file'=>'Chalcopyrite 2026.jpg','title'=>'Cristal de chalcopyrite','group'=>'Cuivre','desc'=>'Un aperçu supplémentaire de la chalcopyrite, minéral sulfuré largement étudié pour la présence de cuivre.'],
 ['file'=>'Cassiterite-121379.jpg','title'=>'Cristaux de cassitérite','group'=>'Étain','desc'=>'D’autres formes de cristallisation de la cassitérite, présentées ici à titre de découverte géologique.'],
];
$cgMiningFlow=[
 ['file'=>'Chalcopyrite Cross-section.jpg','title'=>'Section de minerai cuprifère','group'=>'Cuivre','desc'=>'Une coupe de minerai qui met en évidence la texture et la répartition des grains minéralisés.'],
 ['file'=>'GoldNugget.jpg','title'=>'Pépite d’or','group'=>'Or','desc'=>'Un autre exemple d’or natif, conservé dans une collection d’histoire naturelle.'],
 ['file'=>'Columbite with Tantalite (47975489662).jpg','title'=>'Columbite et tantalite','group'=>'Coltan','desc'=>'Un spécimen des familles minérales associées au niobium et au tantale, documenté dans la région du Katanga.'],
 ['file'=>'Cassiterite-164024.jpg','title'=>'Cassitérite cristallisée','group'=>'Étain','desc'=>'Des cristaux sombres de cassitérite, minéral important dans la filière de l’étain.'],
 ['file'=>'Cobaltite.jpg','title'=>'Minéral de cobalt','group'=>'Cobalt','desc'=>'Spécimen de cobaltite à l’éclat métallique, pour illustrer les ressources contenant du cobalt.'],
 ['file'=>'Azurite-Malachite-148077.jpg','title'=>'Minéraux bleus et verts','group'=>'Cuivre','desc'=>'Association d’azurite et de malachite, deux espèces minérales liées aux gisements de cuivre.'],
 ['file'=>'Chalcopyrite-Copper-m06-62a.jpg','title'=>'Chalcopyrite et cuivre','group'=>'Cuivre','desc'=>'Association de chalcopyrite et de cuivre, avec des structures et textures de minerai caractéristiques.'],
 ['file'=>'Cassiterite-54386.jpg','title'=>'Cassitérite brute','group'=>'Étain','desc'=>'Échantillon de cassitérite présentant des cristaux naturels, issu d’une ancienne région minière.'],
];
@endphp
<section class="cg-mine-showcase" id="minerais" aria-labelledby="cg-mine-title">
 <div class="container">
  <div class="cg-mine-heading">
   <p class="cg-mine-kicker"><i class="bi bi-gem" aria-hidden="true"></i> COJUKA MINING · UNIVERS DES MINERAIS</p>
   <h2 id="cg-mine-title">La richesse des <span>ressources minérales.</span></h2>
   <p>Cuivre, cobalt, coltan, cassitérite et or : découvrez en images différentes familles de minerais, leurs textures et leurs caractéristiques. Une galerie documentaire pour mieux comprendre l’univers des ressources naturelles.</p>
  </div>
  <div class="cg-mine-grid">
   @foreach($cgMiningMinerals as $item)
    @php
      $photoSrc='https://commons.wikimedia.org/wiki/Special:FilePath/'.rawurlencode($item['file']).'?width=780';
      $sourceUrl='https://commons.wikimedia.org/wiki/File:'.str_replace('%2F','/',rawurlencode(str_replace(' ','_',$item['file'])));
    @endphp
    <article class="cg-mine-card">
     <button type="button" class="cg-mine-photo" data-cg-photo-popup
       data-photo-title="{{ $item['title'] }}"
       data-photo-sector="{{ $item['group'] }} · COJUKA MINING"
       data-photo-description="{{ $item['desc'] }}"
       aria-label="Voir le spécimen et sa description : {{ $item['title'] }}">
      <img src="{{ $photoSrc }}" alt="Échantillon minéral illustrant : {{ $item['title'] }}" width="780" height="585" loading="lazy" decoding="async" referrerpolicy="no-referrer">
      <span class="cg-mine-zoom" aria-hidden="true"><i class="bi bi-arrows-fullscreen"></i></span>
     </button>
     <div class="cg-mine-body">
      <span class="cg-mine-type">{{ $item['group'] }}</span>
      <h3>{{ $item['title'] }}</h3>
      <p>{{ $item['desc'] }}</p>
      <a class="cg-mine-credit" href="{{ $sourceUrl }}" target="_blank" rel="noopener noreferrer">Photo, auteur et licence <i class="bi bi-box-arrow-up-right" aria-hidden="true"></i></a>
     </div>
    </article>
   @endforeach
  </div>
 </div>
 <div class="cg-mine-flow-section">
  <div class="container cg-mine-flow-head">
   <div><p class="cg-mine-kicker">EXPLORATION PHOTOGRAPHIQUE</p><h2>Les minerais <span>en mouvement.</span></h2></div>
   <span class="cg-mine-flow-tip"><i class="bi bi-arrow-left-right" aria-hidden="true"></i> Défilement automatique · glissez pour explorer</span>
  </div>
  <div class="cg-mine-viewport" data-cg-mine-flow tabindex="0" aria-label="Galerie de minéraux défilant de droite à gauche ; glissez pour explorer">
   <div class="cg-mine-track">
    @foreach($cgMiningFlow as $item)
     @php
       $photoSrc='https://commons.wikimedia.org/wiki/Special:FilePath/'.rawurlencode($item['file']).'?width=650';
       $sourceUrl='https://commons.wikimedia.org/wiki/File:'.str_replace('%2F','/',rawurlencode(str_replace(' ','_',$item['file'])));
     @endphp
     <div class="cg-mine-flow-card">
      <button type="button" class="cg-mine-flow-image" data-cg-photo-popup
       data-photo-title="{{ $item['title'] }}"
       data-photo-sector="{{ $item['group'] }} · COJUKA MINING"
       data-photo-description="{{ $item['desc'] }}"
       aria-label="Afficher la photo : {{ $item['title'] }}">
       <img src="{{ $photoSrc }}" alt="Minéral : {{ $item['title'] }}" width="650" height="520" loading="lazy" decoding="async" referrerpolicy="no-referrer">
       <span aria-hidden="true"><i class="bi bi-search"></i></span>
      </button>
      <div class="cg-mine-flow-meta"><strong>{{ $item['title'] }}</strong><a href="{{ $sourceUrl }}" target="_blank" rel="noopener noreferrer" aria-label="Source et licence pour {{ $item['title'] }}"><i class="bi bi-info-circle" aria-hidden="true"></i></a></div>
     </div>
    @endforeach
   </div>
  </div>
  <div class="container"><p class="cg-mine-illustration"><i class="bi bi-info-circle" aria-hidden="true"></i> Photographies de spécimens provenant de Wikimedia Commons, parfois prises hors de RDC. Elles illustrent les minerais et ne constituent ni une preuve d’exploitation ni des photographies des sites COJUKA. Les crédits et licences sont accessibles sous chaque image.</p></div>
 </div>
</section>
<style>
/* Exclusive COJUKA Mining photography, compatible with public graphite modes. */
.cg-mine-showcase{background:#FFFFFF;padding:clamp(65px,8vw,118px) 0 0;color:#202c3d}
.cg-mine-heading{max-width:920px;margin-bottom:36px}
.cg-mine-kicker{display:flex;align-items:center;gap:10px;text-transform:uppercase;font-size:11px;font-weight:850;letter-spacing:.15em;color:#687482!important;margin:0 0 17px}
.cg-mine-heading h2,.cg-mine-flow-head h2{font-size:clamp(2.7rem,5.2vw,5.7rem);letter-spacing:-.065em;line-height:1.02;color:#202b3b;font-weight:880;margin:0 0 20px}
.cg-mine-heading h2 span,.cg-mine-flow-head h2 span{color:#566273}
.cg-mine-heading>p:last-child{font-size:clamp(1rem,1.2vw,1.16rem);color:#546273;line-height:1.75;max-width:800px;margin:0}
.cg-mine-grid{display:grid;grid-template-columns:repeat(5,minmax(0,1fr));gap:clamp(12px,1.3vw,20px)}
.cg-mine-card{display:flex;flex-direction:column;min-width:0;overflow:hidden;border:1px solid #e6e9ee;background:#FFFFFF;border-radius:20px;box-shadow:0 14px 36px rgba(19,33,49,.07);transition:transform .35s,box-shadow .35s}
.cg-mine-card:hover{transform:translateY(-5px);box-shadow:0 22px 52px rgba(19,33,49,.13)}
.cg-mine-photo,.cg-mine-flow-image{position:relative;display:block;width:100%;border:0;padding:0;margin:0;background:#dfe3e9;cursor:zoom-in;overflow:hidden}
.cg-mine-photo{aspect-ratio:4/3}
.cg-mine-photo img,.cg-mine-flow-image img{width:100%;height:100%;object-fit:cover;display:block;transition:transform .65s cubic-bezier(.22,1,.36,1)}
.cg-mine-photo:hover img,.cg-mine-flow-image:hover img{transform:scale(1.06)}
.cg-mine-zoom{position:absolute;right:13px;bottom:13px;display:grid;place-items:center;width:30px;height:30px;color:#fff;background:rgba(22,30,42,.78);border-radius:9px}
.cg-mine-body{display:flex;flex-direction:column;flex:1;padding:17px}
.cg-mine-type{font-size:10px;letter-spacing:.15em;text-transform:uppercase;font-weight:820;color:#667586;margin:0 0 9px}
.cg-mine-body h3{font-size:clamp(16px,1.2vw,20px);font-weight:850;line-height:1.2;letter-spacing:-.03em;color:#1b293a;margin:0 0 10px}
.cg-mine-body p{font-size:12px;line-height:1.65;color:#536375;flex:1;margin:0 0 15px}
.cg-mine-credit{display:inline-flex;align-items:center;gap:7px;font-size:11px;font-weight:720;color:#435366;text-decoration:underline;text-underline-offset:3px}
.cg-mine-credit:hover{color:#1a283a}
.cg-mine-flow-section{margin-top:clamp(60px,8vw,115px);padding:clamp(55px,7vw,90px) 0 clamp(50px,7vw,75px);background:#f5f6f8}
.cg-mine-flow-head{display:flex;align-items:flex-end;justify-content:space-between;gap:25px;margin-bottom:24px}
.cg-mine-flow-head h2{font-size:clamp(2.2rem,4vw,4.7rem);margin:0}
.cg-mine-flow-tip{color:#617184;font-size:12px;white-space:nowrap}
.cg-mine-viewport{width:100%;overflow-x:auto;overflow-y:hidden;scrollbar-width:none;overscroll-behavior-x:contain;-webkit-overflow-scrolling:touch;overflow-anchor:none;outline-offset:-4px;padding:10px 0 19px}
.cg-mine-viewport::-webkit-scrollbar{display:none}
.cg-mine-viewport:focus-visible,.cg-mine-flow-image:focus-visible,.cg-mine-photo:focus-visible{outline:3px solid #8898ac;outline-offset:3px}
.cg-mine-track{display:flex;gap:17px;align-items:stretch;width:max-content;padding:0 clamp(16px,3vw,52px)}
.cg-mine-flow-card{width:clamp(215px,22vw,340px);flex:none;background:#fff;border-radius:20px;border:1px solid #e3e8ee;overflow:hidden;box-shadow:0 17px 36px rgba(16,25,37,.09)}
.cg-mine-flow-image{height:clamp(190px,22vw,275px)}
.cg-mine-flow-image span{position:absolute;top:15px;right:15px;display:grid;place-items:center;color:white;border-radius:50%;width:30px;height:30px;background:rgba(16,30,44,.72)}
.cg-mine-flow-meta{display:flex;align-items:center;justify-content:space-between;gap:12px;padding:18px}
.cg-mine-flow-meta strong{color:#273549;font-weight:810;font-size:15px}
.cg-mine-flow-meta a{color:#526377;font-size:15px}
.cg-mine-illustration{font-size:12px;color:#606f82;line-height:1.7;margin:18px 0 0}
.cg-mine-illustration i{margin-right:7px}
html[data-cojuka-theme="dark"] body.cojuka-glass-public .cg-mine-showcase{background:#151f2c!important;color:#f4f7fa}
html[data-cojuka-theme="dark"] body.cojuka-glass-public .cg-mine-flow-section{background:#202b3a!important}
html[data-cojuka-theme="dark"] body.cojuka-glass-public .cg-mine-card,
html[data-cojuka-theme="dark"] body.cojuka-glass-public .cg-mine-flow-card{background:#273446!important;border-color:#455468!important}
html[data-cojuka-theme="dark"] body.cojuka-glass-public .cg-mine-heading h2,
html[data-cojuka-theme="dark"] body.cojuka-glass-public .cg-mine-flow-head h2,
html[data-cojuka-theme="dark"] body.cojuka-glass-public .cg-mine-card h3,
html[data-cojuka-theme="dark"] body.cojuka-glass-public .cg-mine-flow-meta strong,
html[data-cojuka-theme="dark"] body.cojuka-glass-public .cg-mine-heading h2 span,
html[data-cojuka-theme="dark"] body.cojuka-glass-public .cg-mine-flow-head h2 span{color:#FFFFFF!important}
html[data-cojuka-theme="dark"] body.cojuka-glass-public .cg-mine-heading>p:last-child,
html[data-cojuka-theme="dark"] body.cojuka-glass-public .cg-mine-card p,
html[data-cojuka-theme="dark"] body.cojuka-glass-public .cg-mine-illustration,
html[data-cojuka-theme="dark"] body.cojuka-glass-public .cg-mine-flow-tip{color:#ced9e6!important}
html[data-cojuka-theme="dark"] body.cojuka-glass-public :is(.cg-mine-kicker,.cg-mine-type,.cg-mine-credit,.cg-mine-flow-meta a){color:#eff4fb!important}
@media(max-width:1250px){.cg-mine-grid{grid-template-columns:repeat(4,minmax(0,1fr))}}
@media(max-width:990px){.cg-mine-grid{grid-template-columns:repeat(3,minmax(0,1fr))}}
@media(max-width:660px){.cg-mine-grid{grid-template-columns:repeat(2,minmax(0,1fr));gap:12px}
 .cg-mine-card{border-radius:16px}.cg-mine-body{padding:13px}.cg-mine-body h3{font-size:16px}.cg-mine-body p{font-size:12px}
 .cg-mine-flow-head{display:block}.cg-mine-flow-tip{display:block;margin-top:13px}
 .cg-mine-flow-card{width:clamp(210px,67vw,275px)}.cg-mine-flow-image{height:210px}}
@media(max-width:390px){.cg-mine-grid{grid-template-columns:1fr}.cg-mine-card .cg-mine-photo{aspect-ratio:1.5}}
@media(prefers-reduced-motion:reduce){.cg-mine-photo img,.cg-mine-flow-image img,.cg-mine-card{transition:none!important;transform:none!important}}
</style>
<script>
(function(){
 'use strict';
 const viewport=document.querySelector('[data-cg-mine-flow]');
 if(!viewport||!window.requestAnimationFrame||window.matchMedia('(prefers-reduced-motion: reduce)').matches)return;
 const track=viewport.querySelector('.cg-mine-track');
 if(!track||track.children.length<2)return;
 let active=true,paused=false,visible=false,holdUntil=0,last=0,raf=0;
 const observer=typeof IntersectionObserver==='function'?
  new IntersectionObserver(entries=>{visible=entries[0].isIntersecting},{threshold:.01}):null;
 if(observer)observer.observe(viewport);else visible=true;
 function frame(time){
  if(!active)return;
  if(!last)last=time;
  const elapsed=Math.min(64,time-last);last=time;
  if(visible&&!paused&&!document.hidden&&time>holdUntil){
   viewport.scrollLeft+=elapsed*.037;
   const card=track.firstElementChild;
   if(card){
    const width=card.getBoundingClientRect().width+(parseFloat(getComputedStyle(track).columnGap)||0);
    if(width>0&&viewport.scrollLeft>=width){
     viewport.scrollLeft-=width;
     track.appendChild(card); // no duplicates, each image appears ONCE
    }
   }
  }
  raf=requestAnimationFrame(frame);
 }
 viewport.addEventListener('mouseenter',()=>paused=true);
 viewport.addEventListener('mouseleave',()=>paused=false);
 viewport.addEventListener('focusin',()=>paused=true);
 viewport.addEventListener('focusout',()=>paused=false);
 viewport.addEventListener('touchstart',()=>holdUntil=performance.now()+6500,{passive:true});
 viewport.addEventListener('wheel',()=>holdUntil=performance.now()+4200,{passive:true});
 document.addEventListener('visibilitychange',()=>last=0);
 raf=requestAnimationFrame(frame);
 window.addEventListener('pagehide',()=>{active=false;cancelAnimationFrame(raf);observer?.disconnect()},{once:true});
})();
</script>