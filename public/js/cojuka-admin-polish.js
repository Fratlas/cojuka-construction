/* COJUKA / Gestion — Polish 2026 : compteurs animés et couleur des statuts.
   Sans ce script, les chiffres et statuts s'affichent normalement. */
(function(){
 'use strict';
 var reduce=window.matchMedia&&window.matchMedia('(prefers-reduced-motion: reduce)').matches;

 // Couleur des badges selon leur texte (terminé, en cours, en attente, suspendu…).
 var tones=[
  ['cx-tone-ok',/(termin|valid|confirm|actif|publi|livr|pay|sign|approuv|clos)/i],
  ['cx-tone-run',/(en cours|cours|progress|planifi|ouvert|administrateur)/i],
  ['cx-tone-wait',/(attente|brouillon|pr[ée]vu|install|cong[ée]|[ée]tude|en pause)/i],
  ['cx-tone-stop',/(annul|suspend|rejet|refus|retard|expir|bloqu|sans acc)/i]
 ];
 document.querySelectorAll('.page-content .badge').forEach(function(b){
  if(/\bbg-(danger|success|warning)\b/.test(b.className))return;
  var t=(b.textContent||'').trim();if(!t||/^\d+/.test(t))return;
  for(var i=0;i<tones.length;i++){if(tones[i][1].test(t)){b.classList.add(tones[i][0]);return}}
  b.classList.add('cx-tone-neutral');
 });

 // Compteurs : de 0 à la valeur, une seule fois, quand la carte est visible.
 var nodes=document.querySelectorAll('[data-cx-count]');
 if(reduce||!nodes.length||!('IntersectionObserver' in window))return;
 var fmt=new Intl.NumberFormat('fr-FR');
 function run(el){
  var target=parseInt(el.getAttribute('data-cx-count'),10);
  if(!isFinite(target)||target<=0)return;
  var start=null,dur=Math.min(1400,500+target*12);
  function step(ts){
   if(start===null)start=ts;
   var p=Math.min(1,(ts-start)/dur),e=1-Math.pow(1-p,3);
   el.textContent=fmt.format(Math.round(target*e));
   if(p<1)requestAnimationFrame(step);
  }
  requestAnimationFrame(step);
 }
 var io=new IntersectionObserver(function(entries){entries.forEach(function(en){if(en.isIntersecting){run(en.target);io.unobserve(en.target)}})},{threshold:.4});
 nodes.forEach(function(n){io.observe(n)});
})();
