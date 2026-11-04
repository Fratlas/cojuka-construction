/* COJUKA / Polish 2026 — état de la navigation et apparitions au défilement.
   Amélioration progressive : sans ce script, tout le contenu reste visible. */
(function(){
 'use strict';
 var doc=document.documentElement,body=document.body;
 var reduce=window.matchMedia&&window.matchMedia('(prefers-reduced-motion: reduce)').matches;

 // Ombre sous la barre de navigation dès que la page défile.
 var ticking=false;
 function onScroll(){if(ticking)return;ticking=true;requestAnimationFrame(function(){body.classList.toggle('cx-scrolled',window.scrollY>12);ticking=false})}
 window.addEventListener('scroll',onScroll,{passive:true});onScroll();

 if(reduce||!('IntersectionObserver' in window))return;

 // Cartes et tuiles : apparition en cascade quand elles entrent à l'écran.
 var selector='.cg-real-film-card,.cojuka-atlas-photo,.cojuka-footer-links,.cojuka-footer-brand';
 var items=Array.prototype.slice.call(document.querySelectorAll(selector)).filter(function(el){return !el.closest('.modal,[hidden],.carousel-item')});
 if(!items.length)return;
 doc.classList.add('cx-js');
 var vh=window.innerHeight;
 items.forEach(function(el){
  var siblings=el.parentElement?Array.prototype.filter.call(el.parentElement.children,function(c){return c.matches(selector)}):[el];
  el.style.setProperty('--cx-delay',Math.min(siblings.indexOf(el),6)*0.07+'s');
  el.classList.add('cx-reveal');
  if(el.getBoundingClientRect().top<vh)el.classList.add('cx-in');
 });
 var io=new IntersectionObserver(function(entries){entries.forEach(function(e){if(e.isIntersecting){e.target.classList.add('cx-in');io.unobserve(e.target)}})},{rootMargin:'0px 0px -6% 0px',threshold:.05});
 items.forEach(function(el){if(!el.classList.contains('cx-in'))io.observe(el)});
 // Filet de sécurité : rien ne reste caché.
 setTimeout(function(){items.forEach(function(el){el.classList.add('cx-in')})},6000);
})();
