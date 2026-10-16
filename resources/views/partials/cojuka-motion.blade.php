<style>
/* COJUKA premium transitions — progressive enhancement, no hidden content without GSAP */
#cojuka-page-curtain{position:fixed;inset:0;z-index:99990;background:#e9e9eb;pointer-events:none;transform:translateY(101%);visibility:hidden;will-change:transform}
#cojuka-page-curtain:after{content:"";position:absolute;inset:0;background:radial-gradient(circle at 80% 15%,rgba(255,255,255,.14),transparent 45%)}
.cojuka-motion-rule{display:block;width:50px;height:2px;background:#7c818b;margin-top:12px;transform-origin:left}
@media(prefers-reduced-motion:reduce){#cojuka-page-curtain{display:none!important}html{scroll-behavior:auto!important}}
</style>
<div id="cojuka-page-curtain" aria-hidden="true"></div>
<script>
(function(){
'use strict';
function init(){
 var gs=window.gsap;
 if(!gs || !gs.timeline || !gs.fromTo)return;
 var reduce=window.matchMedia('(prefers-reduced-motion: reduce)').matches;
 var curtain=document.getElementById('cojuka-page-curtain');
 if(reduce || !curtain)return;
 var scrollTrigger=window.ScrollTrigger;
 if(scrollTrigger && gs.registerPlugin)gs.registerPlugin(scrollTrigger);
 // Entrance is applied only to elements already in the viewport: no flashes of invisible content.
 var hero=document.querySelector('main :is(.hero,.entity-hero,.cojuka-topic-hero)') || document.querySelector('main > header');
 if(hero){
  var intro=Array.from(hero.querySelectorAll('h1,.lead,.eyebrow,.btn')).slice(0,7);
  if(intro.length)gs.fromTo(intro,{autoAlpha:0,y:28},{autoAlpha:1,y:0,duration:.95,stagger:.10,ease:'power3.out',clearProps:'all',delay:.08});
 }
 var sections=Array.from(document.querySelectorAll('main section')).filter(function(el){return !el.closest('.carousel-item,.modal,[hidden]')});
 sections.forEach(function(section){
  var items=Array.from(section.querySelectorAll(':scope > .container > .row > [class*="col-"],:scope > .container > .eyebrow,:scope > .container > h2')).slice(0,16);
  if(!items.length)items=[section.querySelector(':scope > .container')||section];
  if(scrollTrigger){
   gs.fromTo(items,{autoAlpha:0,y:35},{autoAlpha:1,y:0,duration:.9,stagger:.075,ease:'power2.out',clearProps:'all',scrollTrigger:{trigger:section,start:'top 91%',once:true}});
  }else if('IntersectionObserver' in window){
   var io=new IntersectionObserver(function(entries){entries.forEach(function(entry){if(entry.isIntersecting){gs.fromTo(items,{autoAlpha:0,y:25},{autoAlpha:1,y:0,duration:.75,stagger:.055,ease:'power2.out',clearProps:'all'});io.disconnect()}})},{rootMargin:'0px 0px 90px 0px'});
   io.observe(section);
  }
 });
 // Images animate only when scrolled into view; no constant parallax or costly scroll handlers.
 if(scrollTrigger){
  document.querySelectorAll('main :is(.entity-photo-tile,.cojuka-topic-photo,.service-card img)').forEach(function(el){
   gs.fromTo(el,{autoAlpha:.65,scale:1.035},{autoAlpha:1,scale:1,duration:1.05,ease:'power2.out',clearProps:'all',scrollTrigger:{trigger:el,start:'top 95%',once:true}});
  });
 }
 // Only normal same-origin links; never intercept downloads, new tabs, anchors, form submissions or modified clicks.
 var leaving=false;
 document.addEventListener('click',function(event){
  if(leaving || event.defaultPrevented || event.button!==0 || event.metaKey || event.ctrlKey || event.shiftKey || event.altKey)return;
  var a=event.target.closest('a[href]');
  if(!a || a.hasAttribute('download') || a.target && a.target!=='_self' || a.dataset.noTransition!==undefined)return;
  var url;try{url=new URL(a.href,location.href)}catch(e){return}
  if(url.origin!==location.origin || !/^https?:$/.test(url.protocol) || (url.pathname===location.pathname && url.search===location.search) || a.closest('.dropdown-menu') && a.getAttribute('data-bs-toggle'))return;
  event.preventDefault();leaving=true;
  curtain.style.visibility='visible';
  gs.killTweensOf(curtain);
  gs.fromTo(curtain,{yPercent:101},{yPercent:0,duration:.42,ease:'power3.inOut',onComplete:function(){location.assign(url.href)}});
  setTimeout(function(){if(leaving)location.assign(url.href)},850);
 },true);
 window.addEventListener('pageshow',function(event){if(event.persisted){leaving=false;gs.set(curtain,{yPercent:101,visibility:'hidden'});gs.set(document.body,{clearProps:'opacity'})}});
}
if(document.readyState==='loading')document.addEventListener('DOMContentLoaded',init,{once:true});else init();
})();
</script>