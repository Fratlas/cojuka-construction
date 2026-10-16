@php
$homeEntities = [
 ['Mining','kojuka-mining','Développement des activités minières au Haut-Katanga.','Domaine prioritaire'],
 ['Construction','construction','Construction et coordination des projets.','Construction'],
 ['Logistique','logistique','Transport, approvisionnement et coordination des opérations.','Logistique'],
 ['Eden Park Investments','eden-park-investments','Investissements immobiliers et fonciers.','Investissement immobilier'],
 ['Consultance','consultance','Conseil aux institutions et aux entreprises.','Conseil stratégique'],
 ['Impact Center','impact-center','Participation belge et coopération internationale.','Coopération'],
];
$entityPhotos = [
 'construction' => 'https://images.unsplash.com/photo-1504307651254-35680f356dfd?auto=format&fit=crop&w=1200&q=72&fm=webp',
 'logistique' => 'https://images.unsplash.com/photo-1586528116311-ad8dd3c8310d?auto=format&fit=crop&w=1200&q=72&fm=webp',
 'consultance' => 'https://images.unsplash.com/photo-1497366811353-6870744d04b2?auto=format&fit=crop&w=1200&q=72&fm=webp',
 'eden-park-investments' => 'https://images.unsplash.com/photo-1600607687920-4e2a09cf159d?auto=format&fit=crop&w=1200&q=72&fm=webp',
 'impact-center' => 'https://images.unsplash.com/photo-1497366754035-f200968a6e72?auto=format&fit=crop&w=1200&q=72&fm=webp',
 'kojuka-mining' => 'https://images.unsplash.com/photo-1519003722824-194d4455a60c?auto=format&fit=crop&w=1200&q=72&fm=webp',
];
@endphp
<section id="carrousel-entites" class="cojuka-home-entities" aria-labelledby="cojuka-home-entities-title">
 <div class="container">
  <div class="d-flex justify-content-between align-items-end flex-wrap gap-3 mb-4">
   <div><div class="cojuka-entities-kicker mb-2">COJUKA CONSULTING GROUP · NOTRE ÉCOSYSTÈME</div><h2 id="cojuka-home-entities-title" class="cojuka-entities-heading">Découvrez nos entités.</h2></div>
   <a href="{{ route('group.portal') }}" class="cojuka-all-entities">Toutes les entités ↗</a>
  </div>
  <div id="cojukaHomeEntitiesCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="7000" data-bs-pause="hover" aria-label="Présentation des six entités">
   <div class="carousel-inner">
    @foreach($homeEntities as $i => $entity)
    <div class="carousel-item {{ $i === 0 ? 'active' : '' }}">
     <article class="cojuka-entity-panel" data-entity-photo="{{ $entityPhotos[$entity[1]] }}" @if($i === 0) style="--entity-photo:url('{{ $entityPhotos[$entity[1]] }}')" @endif>
      <div class="cojuka-entity-content">
       <div class="cojuka-entity-label">COJUKA CONSULTING GROUP / {{ $entity[3] }} <span class="cojuka-entity-count">{{ str_pad($i + 1, 2, '0', STR_PAD_LEFT) }} / 06</span></div>
       <h3>{{ $entity[0] }}</h3>
       <p>{{ $entity[2] }}</p>
       <a class="cojuka-entity-link" href="{{ route('group.profile', $entity[1]) }}">Découvrir cette entité ↗</a>
      </div>
      <div class="cojuka-entity-photo" aria-hidden="true"></div>
     </article>
    </div>
    @endforeach
   </div>
   <div class="cojuka-entities-footer">
    <div class="carousel-indicators cojuka-entity-dots">
     @foreach($homeEntities as $i => $entity)
     <button type="button" data-bs-target="#cojukaHomeEntitiesCarousel" data-bs-slide-to="{{ $i }}" class="{{ $i === 0 ? 'active' : '' }}" @if($i === 0) aria-current="true" @endif aria-label="Afficher {{ $entity[0] }}"></button>
     @endforeach
    </div>
    <div class="d-flex gap-2">
     <button class="cojuka-entity-arrow" type="button" data-bs-target="#cojukaHomeEntitiesCarousel" data-bs-slide="prev" aria-label="Entité précédente">←</button>
     <button class="cojuka-entity-arrow" type="button" data-bs-target="#cojukaHomeEntitiesCarousel" data-bs-slide="next" aria-label="Entité suivante">→</button>
    </div>
   </div>
  </div>
 </div>
</section>
@once
<style>
.cojuka-home-entities{padding:clamp(65px,8vw,110px) 0;background:#f5f6f8;color:#151923}
.cojuka-entities-kicker{font-size:.75rem;letter-spacing:.18em;font-weight:800;color:#9a3044}
.cojuka-entities-heading{font-size:clamp(2.2rem,5vw,4.5rem);font-weight:800;letter-spacing:-.055em;margin:0}
.cojuka-all-entities{font-weight:700;color:#862738}
.cojuka-entity-panel{min-height:clamp(420px,44vw,530px);background:#111b27;border-radius:24px;display:flex;align-items:center;position:relative;overflow:hidden;padding:clamp(30px,5vw,76px);color:white}
.cojuka-entity-content{position:relative;z-index:2;max-width:760px}
.cojuka-entity-label{font-size:.76rem;letter-spacing:.13em;font-weight:800;color:#ffffff;margin-bottom:28px}
.cojuka-entity-count{margin-left:20px;color:#fff9}
.cojuka-entity-panel h3{font-size:clamp(2.25rem,4.3vw,4.75rem);font-weight:850;line-height:1.1;letter-spacing:-.06em;margin-bottom:22px;overflow-wrap:anywhere}
.cojuka-entity-panel p{color:#e2e4ea;font-size:clamp(1rem,1.6vw,1.25rem);max-width:610px;line-height:1.7}
.cojuka-entity-link{display:inline-flex;margin-top:20px;padding:13px 24px;border-radius:50px;background:#fff;color:#141823;font-weight:750}
.cojuka-entity-link:hover{background:#f0e6e8;color:#141823}
.cojuka-entity-photo{position:absolute;inset:0;background-image:linear-gradient(90deg,rgba(82,12,33,.82) 0%,rgba(101,24,49,.55) 42%,rgba(85,14,37,.12) 100%),var(--entity-photo);background-position:center;background-size:cover;transform:scale(1.01);transition:transform 7s ease;z-index:0}
.carousel-item.active .cojuka-entity-photo{transform:scale(1.065)}
.cojuka-entity-panel:after{content:"";position:absolute;inset:0;background:linear-gradient(0deg,rgba(79,12,34,.34),transparent 45%);pointer-events:none;z-index:1}
.cojuka-entities-footer{position:absolute;z-index:5;right:clamp(14px,3vw,32px);bottom:clamp(14px,3vw,32px);display:flex;align-items:center;gap:12px;pointer-events:none}
.cojuka-entities-footer>div{pointer-events:auto}
.cojuka-entity-dots{position:absolute!important;bottom:13px;right:115px;min-width:160px;justify-content:flex-end!important}
.cojuka-home-entities .carousel{position:relative}
.cojuka-entity-dots{position:static;display:flex;justify-content:flex-start;margin:0;gap:7px}
.cojuka-entity-dots button{width:27px;height:5px;border-radius:8px;background:#9a3044;border:0;opacity:.35}
.cojuka-entity-dots button.active{opacity:1}
.cojuka-entity-arrow{width:48px;height:48px;border-radius:50%;border:1px solid rgba(255,255,255,.65);background:rgba(255,255,255,.92);color:#141923;font-size:1.25rem;cursor:pointer;box-shadow:0 6px 18px rgba(0,0,0,.2);transition:transform .2s,background .2s}
.cojuka-entity-arrow:hover{background:#fff;color:#86212e;transform:translateY(-2px)}
.cojuka-entity-arrow:focus-visible{outline:3px solid #fff;outline-offset:3px}
@media(max-width:767px){.cojuka-entities-footer{right:16px;bottom:18px}.cojuka-entity-arrow{width:48px;height:48px}.cojuka-entity-dots{bottom:17px;right:112px;min-width:100px}.cojuka-entity-panel{padding-bottom:100px;min-height:560px}.cojuka-entity-photo{background-image:linear-gradient(90deg,rgba(87,15,39,.89),rgba(92,18,44,.45)),var(--entity-photo);background-position:center}.cojuka-entity-label{font-size:.67rem}.cojuka-entity-panel h3{font-size:clamp(2.2rem,9vw,3.5rem)}}
@media(prefers-reduced-motion:reduce){.cojuka-home-entities .carousel-item{transition:none}}
</style>
<script>
document.addEventListener('DOMContentLoaded',function(){
 const el=document.getElementById('cojukaHomeEntitiesCarousel');
 if(el && window.bootstrap && window.matchMedia('(prefers-reduced-motion: reduce)').matches){
  bootstrap.Carousel.getOrCreateInstance(el,{interval:false}).pause();
 }
});
</script>
@endonce
<script>
document.addEventListener('DOMContentLoaded',function(){
 const carousel=document.getElementById('cojukaHomeEntitiesCarousel');
 if(!carousel)return;
 const panels=Array.from(carousel.querySelectorAll('[data-entity-photo]'));
 const setPhoto=function(index){
  const panel=panels[index];
  if(!panel||panel.dataset.photoLoaded==='1')return;
  panel.style.setProperty('--entity-photo','url("'+panel.dataset.entityPhoto+'")');
  panel.dataset.photoLoaded='1';
 };
 if(panels[0])panels[0].dataset.photoLoaded='1';
 carousel.addEventListener('slide.bs.carousel',function(e){
  setPhoto(e.to);
  if(e.to+1<panels.length && !(navigator.connection&&navigator.connection.saveData))setTimeout(function(){setPhoto(e.to+1)},1200);
 });
 const section=carousel.closest('section');
 if('IntersectionObserver' in window && section){
  const observer=new IntersectionObserver(function(entries){
   if(entries.some(function(e){return e.isIntersecting})){setPhoto(0);observer.disconnect()}
  },{rootMargin:'250px'});
  observer.observe(section);
 }else{setPhoto(0)}
});
</script>
