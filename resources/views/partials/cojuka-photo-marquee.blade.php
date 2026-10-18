@php
/* Unique illustrative photos on this strip; no cloned DOM cards for seamless motion. */
$cojukaMarqueePhotos=[
 ['photo-1486406146926-c627a92ad1ab','Architecture et perspectives','construction','Construction'],
 ['photo-1565043666747-69f6646db940','Ingénierie et industrie','kojuka-mining','Industrie'],
 ['photo-1519389950473-47ba0277781c','Équipes et technologies','consultance','Innovation'],
 ['photo-1497436072909-60f362e1d4b1','Territoires et énergie','energie','Énergie'],
 ['photo-1556761175-b413da4baf72','Stratégie et collaboration','consultance','Consultance'],
 ['photo-1451187580459-43490279c0fa','Réseaux et connexions','logistique','Logistique'],
 ['photo-1497366754035-f200968a6e72','Environnement professionnel','impact-center','Coopération'],
 ['photo-1460925895917-afdab827c52f','Données et stratégie','consultance','Développement'],
 ['photo-1487958449943-2429e8be8625','Architecture contemporaine','genie','Génie civil'],
 ['photo-1497366811353-6870744d04b2','Espaces de travail modernes','eden-park-investments','Investissement']
];
@endphp
<section class="cg-photo-marquee" aria-labelledby="cg-photo-marquee-title">
 <div class="container cg-photo-heading">
  <div><p class="cg-kicker"><span class="cg-kicker-line"></span> L’univers COJUKA en images</p><h2 id="cg-photo-marquee-title" class="cg-section-title">Une vision <em>sans frontières.</em></h2>
   <p class="cg-section-lead">Construction, mines, logistique et développement : une lecture visuelle de nos univers.</p></div>
  <a class="cg-inline-link" href="{{ route('group.portal') }}">Explorer les structures <i class="bi bi-arrow-up-right" aria-hidden="true"></i></a>
 </div>
 <div class="cg-marquee-viewport" data-cg-marquee tabindex="0" aria-label="Galerie photographique horizontale : faire glisser pour explorer">
  <div class="cg-marquee-track">
   @foreach($cojukaMarqueePhotos as [$photo,$caption,$slug,$sector])
    <a class="cg-marquee-tile" href="{{ route('group.profile',$slug) }}" aria-label="{{ $sector }} — {{ $caption }}">
     <img src="https://images.unsplash.com/{{ $photo }}?auto=format&amp;fit=crop&amp;w=840&amp;q=79&amp;fm=webp" alt="{{ $caption }} — photo illustrative" width="500" height="620" loading="lazy" decoding="async">
     <span class="cg-marquee-shade" aria-hidden="true"></span>
     <span class="cg-marquee-caption"><small>{{ $sector }}</small><strong>{{ $caption }}</strong><i class="bi bi-arrow-up-right" aria-hidden="true"></i></span>
    </a>
   @endforeach
  </div>
 </div>
 <div class="container d-flex justify-content-between align-items-center gap-3 flex-wrap mt-3"><p class="cg-photo-disclaimer mb-0">Visuels d’illustration — non présentés comme des chantiers ou réalisations propres à COJUKA.</p><span class="cg-scroll-instruction">← Défilement automatique · glisser pour explorer →</span></div>
</section>
<script>
(function(){
 'use strict';
 const viewport=document.querySelector('[data-cg-marquee]');
 if(!viewport||!window.requestAnimationFrame||window.matchMedia('(prefers-reduced-motion: reduce)').matches)return;
 const track=viewport.querySelector('.cg-marquee-track');
 if(!track||track.children.length<2)return;
 let running=true,paused=false,visible=false,last=0,stopUntil=0,raf=0;
 const observer=new IntersectionObserver(entries=>{visible=entries[0].isIntersecting;},{threshold:.02});
 observer.observe(viewport);
 function tick(now){
  if(last===0)last=now;
  const step=Math.min(64,now-last);last=now;
  if(running&&visible&&!paused&&now>stopUntil&&!document.hidden){
   viewport.scrollLeft+=step*.038;
   // Reorder, don't clone: each photograph occurs exactly once in the DOM.
   let first=track.firstElementChild;
   if(first){
    const gap=parseFloat(window.getComputedStyle(track).columnGap)||0;
    const stride=first.getBoundingClientRect().width+gap;
    if(stride>0&&viewport.scrollLeft>=stride){
     viewport.scrollLeft-=stride;
     track.appendChild(first);
    }
   }
  }
  raf=requestAnimationFrame(tick);
 }
 viewport.addEventListener('mouseenter',()=>paused=true);
 viewport.addEventListener('mouseleave',()=>paused=false);
 viewport.addEventListener('focusin',()=>paused=true);
 viewport.addEventListener('focusout',()=>paused=false);
 viewport.addEventListener('touchstart',()=>{stopUntil=performance.now()+6500},{passive:true});
 viewport.addEventListener('wheel',()=>{stopUntil=performance.now()+4200},{passive:true});
 document.addEventListener('visibilitychange',()=>{last=0});
 raf=requestAnimationFrame(tick);
 window.addEventListener('pagehide',()=>{running=false;cancelAnimationFrame(raf);observer.disconnect()},{once:true});
})();
</script>