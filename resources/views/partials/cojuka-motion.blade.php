<style>
/* Reveal only after JavaScript has confirmed that an IntersectionObserver exists. */
.cojuka-motion-ready [data-cojuka-reveal]:not(.cojuka-revealed){opacity:0;transform:translate3d(0,28px,0)}
[data-cojuka-reveal]{transition:opacity .7s cubic-bezier(.2,.8,.2,1),transform .7s cubic-bezier(.2,.8,.2,1);transition-delay:var(--cojuka-reveal-delay,0ms)}
.cojuka-motion-ready [data-cojuka-reveal].cojuka-revealed{opacity:1;transform:none}
@media(prefers-reduced-motion:reduce){.cojuka-motion-ready [data-cojuka-reveal]{opacity:1!important;transform:none!important;transition:none!important}}

/* Immersive editorial motion: animated wine line, parallax-free image reveal and stagger */
@keyframes cojuka-wine-line{from{transform:scaleX(0)}to{transform:scaleX(1)}}
@keyframes cojuka-image-in{from{opacity:.45;clip-path:inset(0 0 18% 0);transform:scale(1.035)}to{opacity:1;clip-path:inset(0);transform:scale(1)}}
.cojuka-motion-ready main :is(.entity-photo-tile,.entity-service-photo) img{transform-origin:center}
.cojuka-motion-ready main :is(.entity-photo-tile,.entity-service-photo).cojuka-revealed img{animation:cojuka-image-in 1.15s cubic-bezier(.2,.8,.2,1) both}
main :is(.eyebrow,.section-kicker,.cojuka-entities-kicker):after{content:"";display:block;width:46px;height:2px;margin-top:12px;background:#a63b50;transform-origin:left;animation:cojuka-wine-line 1s cubic-bezier(.22,1,.36,1) both}
@media(prefers-reduced-motion:reduce){.cojuka-motion-ready main :is(.entity-photo-tile,.entity-service-photo) img,main :is(.eyebrow,.section-kicker,.cojuka-entities-kicker):after{animation:none!important;clip-path:none!important;transform:none!important}}
</style>
<script>
(function(){
 function setup(){
  if(!('IntersectionObserver' in window)||window.matchMedia('(prefers-reduced-motion: reduce)').matches)return;
  var selectors=['main section:not(.hero):not(.entity-hero)','main .info-card','main .entity-photo-tile','main .service-card','main article.service','main .entity-service-photo','main .row.g-4 > [class*="col-"]'];
  var candidates=Array.from(document.querySelectorAll(selectors.join(','))).filter(function(el){
   return !el.closest('[hidden],.carousel-item:not(.active),.modal,.accordion-collapse') && el.getBoundingClientRect().height>0;
  });
  var targets=candidates.filter(function(el){return !candidates.some(function(parent){return parent!==el && parent.contains(el) && parent.matches('main section:not(.hero):not(.entity-hero)')})});
  if(!targets.length)return;
  var observer=new IntersectionObserver(function(entries){
   entries.forEach(function(entry){if(entry.isIntersecting){entry.target.classList.add('cojuka-revealed');observer.unobserve(entry.target)}});
  },{threshold:.08,rootMargin:'0px 0px 50px 0px'});
  targets.forEach(function(el,index){
   el.dataset.cojukaReveal='true';
   var rect=el.getBoundingClientRect();
   if(rect.top<window.innerHeight*1.1){el.classList.add('cojuka-revealed')}
   else{el.style.setProperty('--cojuka-reveal-delay',(index%3)*65+'ms');observer.observe(el)}
  });
  document.documentElement.classList.add('cojuka-motion-ready');
  // Any scroll or browser back navigation can reveal remaining content.
  window.addEventListener('pageshow',function(e){if(e.persisted)targets.forEach(function(el){el.classList.add('cojuka-revealed')})});
 }
 if(document.readyState==='loading')document.addEventListener('DOMContentLoaded',setup,{once:true});else setup();
})();
</script>