<style>
#cojuka-mining-announce{position:fixed;inset:0;z-index:99980;display:none;align-items:center;justify-content:center;padding:20px;background:rgba(16,22,30,.22);backdrop-filter:blur(7px);-webkit-backdrop-filter:blur(7px);opacity:0;transition:opacity .55s ease}
#cojuka-mining-announce.cma-visible{display:flex;opacity:1}
#cojuka-mining-announce .cma-panel{position:relative;isolation:isolate;width:min(960px,100%);min-height:460px;overflow:hidden;border-radius:26px;background:#27313a url('https://images.hellogravel.com/variants/guides/37e44abca47c0db2/bingham-canyon-mine-aerial-scaled-content-900w.webp') center/cover no-repeat;box-shadow:0 40px 110px rgba(0,0,0,.30);transform:translateY(30px) scale(.97);transition:transform .7s cubic-bezier(.18,.8,.18,1)}
#cojuka-mining-announce.cma-visible .cma-panel{transform:translateY(0) scale(1)}
#cojuka-mining-announce .cma-panel:before{content:'';position:absolute;inset:0;z-index:-1;background:linear-gradient(90deg,rgba(15,22,29,.74) 0%,rgba(23,30,36,.44) 48%,rgba(20,25,31,.07) 100%)}
#cojuka-mining-announce .cma-content{padding:clamp(30px,6vw,78px);max-width:680px;color:#fff}
#cojuka-mining-announce .cma-kicker{color:#f4b89a;font-size:.83rem;letter-spacing:.18em;text-transform:uppercase;font-weight:300;margin:0 0 18px}
#cojuka-mining-announce h2{font-size:clamp(2.4rem,5vw,5rem);font-weight:850;line-height:1.03;letter-spacing:-.055em;color:#fff;margin:0 0 20px}
#cojuka-mining-announce .cma-copy{color:#e1e5ea;font-size:clamp(1rem,1.5vw,1.23rem);line-height:1.65;max-width:580px;margin-bottom:30px}
#cojuka-mining-announce .cma-actions{display:flex;flex-wrap:wrap;align-items:center;gap:12px}
#cojuka-mining-announce .cma-primary{display:inline-flex;align-items:center;justify-content:center;min-height:49px;padding:12px 22px;background:#9a2033;border-radius:99px;color:#fff!important;font-weight:750;text-decoration:none;box-shadow:0 12px 28px #0004}
#cojuka-mining-announce .cma-primary:hover{background:#c22f45;transform:translateY(-3px)}
#cojuka-mining-announce .cma-secondary{background:transparent;border:1px solid #ffffff70;color:#fff;border-radius:99px;padding:12px 20px;font-weight:650;min-height:49px}
#cojuka-mining-announce .cma-close{position:absolute;top:16px;right:17px;z-index:2;border:1px solid #ffffff77;background:#20252ac9;color:#fff;border-radius:50%;width:42px;height:42px;font-size:26px;line-height:1;cursor:pointer}
#cojuka-mining-announce .cma-note{font-size:.74rem;color:#c6d0d8;margin-top:24px}
 .cma-navigation{display:flex;align-items:center;gap:12px;margin-top:26px;flex-wrap:wrap}.cma-arrow{width:40px;height:40px;border:1px solid #ffffffa0;background:#15202a8a;color:#fff;border-radius:50%;font-size:28px;line-height:1;cursor:pointer}.cma-arrow:hover,.cma-arrow:focus-visible{background:#fff;color:#1c2833}.cma-dots{display:flex;gap:7px;align-items:center;flex-wrap:wrap}.cma-dot{height:9px;width:9px;border:0;border-radius:99px;background:#ffffff70;cursor:pointer;padding:0;transition:width .25s,background .25s}.cma-dot[aria-current="true"]{background:#fff;width:25px}.cma-count{font-size:12px;color:#f4f5f7;letter-spacing:.08em}.cma-panel{touch-action:pan-y}
@media(max-width:575px){#cojuka-mining-announce .cma-panel{min-height:0}#cojuka-mining-announce .cma-content{padding:65px 25px 30px}#cojuka-mining-announce h2{font-size:2.5rem}}
@media(prefers-reduced-motion:reduce){#cojuka-mining-announce,#cojuka-mining-announce .cma-panel{transition:none!important}}
</style>
<div id="cojuka-mining-announce" role="dialog" aria-modal="true" aria-labelledby="cma-title" aria-hidden="true">
 <div class="cma-panel">
  <button type="button" class="cma-close" id="cma-close" aria-label="Fermer l'annonce">×</button>
  <div class="cma-content">
   <p class="cma-kicker">COJUKA Consulting Group · Domaine prioritaire</p>
   <h2 id="cma-title">Le Mining au cœur de notre vision.</h2>
   <p class="cma-copy">Découvrez COJUKA Mining : notre priorité stratégique dans le développement des activités minières, des projets liés aux ressources naturelles et des carrières.</p>
   <div class="cma-actions">
    <a class="cma-primary" href="{{ route('group.profile','kojuka-mining') }}" id="cma-explore">Découvrir COJUKA Mining ↗</a>

   </div>
   <div class="cma-navigation" aria-label="Parcourir les entités"><button type="button" id="cma-prev" class="cma-arrow" aria-label="Entité précédente">‹</button><div id="cma-dots" class="cma-dots" aria-label="Choisir une entité"></div><button type="button" id="cma-next" class="cma-arrow" aria-label="Entité suivante">›</button><span id="cma-count" class="cma-count"></span></div>
   <p class="cma-note">Photographies d’illustration des activités industrielles et minières.</p>
  </div>
 </div>
</div>
<script>
(function(){
 var dialog=document.getElementById('cojuka-mining-announce');if(!dialog)return;
 var close=document.getElementById('cma-close'),shown=false,previousFocus=null,audioCtx=null,hideTimer=null;
 var sessionKey='cojuka-mining-announcement-seen-v1';
 function alreadySeen(){try{return sessionStorage.getItem(sessionKey)==='1'}catch(e){return false}}
 function markSeen(){try{sessionStorage.setItem(sessionKey,'1')}catch(e){}}

 var panel=dialog.querySelector('.cma-panel'),title=document.getElementById('cma-title'),copy=dialog.querySelector('.cma-copy');
 var campaigns=[
  {title:'Le Mining au cœur de notre vision.',copy:'Découvrez notre orientation stratégique vers les ressources naturelles, les projets miniers et les carrières.',image:'https://images.hellogravel.com/variants/guides/37e44abca47c0db2/bingham-canyon-mine-aerial-scaled-content-900w.webp',slug:'kojuka-mining',label:'Mining'},
  {title:'Construction & infrastructures.',copy:'Découvrez le domaine Construction : bâtiments, chantiers et projets d’infrastructures.',image:'https://images.unsplash.com/photo-1504307651254-35680f356dfd?auto=format&fit=crop&w=1400&q=80',slug:'construction',label:'Construction'},
  {title:'Logistique & transport.',copy:'Explorez les activités de transport, de fret et d’organisation logistique.',image:'https://images.unsplash.com/photo-1586528116311-ad8dd3c8310d?auto=format&fit=crop&w=1400&q=80',slug:'logistique',label:'Logistique'},
  {title:'Eden Park Investments.',copy:'Découvrez l’immobilier et les perspectives d’investissement du groupe.',image:'https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?auto=format&fit=crop&w=1400&q=80',slug:'eden-park-investments',label:'Eden Park Investments'},
  {title:'Consultance & stratégie.',copy:'Découvrez le domaine du conseil et de l’accompagnement des projets.',image:'https://images.unsplash.com/photo-1497366754035-f200968a6e72?auto=format&fit=crop&w=1400&q=80',slug:'consultance',label:'Consultance'},
  {title:'Impact Center.',copy:'Un domaine tourné vers les initiatives, les compétences et la collaboration.',image:'https://images.unsplash.com/photo-1521737711867-e3b97375f902?auto=format&fit=crop&w=1400&q=80',slug:'impact-center',label:'Impact Center'},
  {title:'Génie & savoir-faire technique.',copy:'Explorez le domaine du génie et des solutions techniques.',image:'https://images.unsplash.com/photo-1581092160562-40aa08e78837?auto=format&fit=crop&w=1400&q=80',slug:'genie',label:'Génie'},
  {title:'Énergie & infrastructures.',copy:'Découvrez les perspectives liées à l’énergie et aux équipements.',image:'https://images.unsplash.com/photo-1473341304170-971dccb5ac1e?auto=format&fit=crop&w=1400&q=80',slug:'energie',label:'Énergie'},
  {title:'Cargo & fret.',copy:'Transport de marchandises et solutions de fret.',image:'https://images.unsplash.com/photo-1578575437130-527eed3abbec?auto=format&fit=crop&w=1400&q=80',slug:'cargo',label:'Cargo'},
  {title:'Matériel & équipements.',copy:'Découvrez le domaine du matériel et des équipements industriels.',image:'https://images.unsplash.com/photo-1581092160607-ee22621dd758?auto=format&fit=crop&w=1400&q=80',slug:'materiel',label:'Matériel'},
  {title:'Services au secteur public.',copy:'Découvrez les domaines d’intervention liés aux besoins institutionnels.',image:'https://images.unsplash.com/photo-1487958449943-2429e8be8625?auto=format&fit=crop&w=1400&q=80',slug:'public',label:'Public'},
  {title:'Santé & services.',copy:'Découvrez le domaine de la santé et des services associés.',image:'https://images.unsplash.com/photo-1538108149393-fbbd81895907?auto=format&fit=crop&w=1400&q=80',slug:'sante',label:'Santé'},
  {title:'Éducation & compétences.',copy:'Découvrez le domaine de l’éducation et de la transmission des compétences.',image:'https://images.unsplash.com/photo-1503676260728-1c00da094a0b?auto=format&fit=crop&w=1400&q=80',slug:'education',label:'Éducation'}
 ];
 var current=0,explore=document.getElementById('cma-explore'),dots=document.getElementById('cma-dots'),count=document.getElementById('cma-count'),autoTimer=null;
 campaigns.forEach(function(item,i){var dot=document.createElement('button');dot.type='button';dot.className='cma-dot';dot.setAttribute('aria-label','Voir '+item.label);dot.addEventListener('click',function(){showCampaign(i,true)});dots.appendChild(dot)});
 function showCampaign(i,manual){current=(i+campaigns.length)%campaigns.length;var item=campaigns[current];title.textContent=item.title;copy.textContent=item.copy;panel.style.backgroundImage='url("'+item.image+'")';explore.textContent='Découvrir '+item.label+' ↗';explore.href='{{ url('/groupe/structures') }}/'+encodeURIComponent(item.slug);count.textContent=(current+1)+' / '+campaigns.length;Array.from(dots.children).forEach(function(dot,j){dot.setAttribute('aria-current',j===current?'true':'false')});if(manual)restartAuto()}
 function stopAuto(){if(autoTimer){clearInterval(autoTimer);autoTimer=null}}
 function startAuto(){stopAuto();if(!window.matchMedia('(prefers-reduced-motion: reduce)').matches)autoTimer=setInterval(function(){showCampaign(current+1,false)},6500)}
 function restartAuto(){if(shown)startAuto()}
 document.getElementById('cma-prev').addEventListener('click',function(){showCampaign(current-1,true)});
 document.getElementById('cma-next').addEventListener('click',function(){showCampaign(current+1,true)});
 var touchX=null;panel.addEventListener('touchstart',function(e){if(e.touches.length===1)touchX=e.touches[0].clientX},{passive:true});panel.addEventListener('touchend',function(e){if(touchX===null)return;var delta=e.changedTouches[0].clientX-touchX;touchX=null;if(Math.abs(delta)>55)showCampaign(current+(delta<0?1:-1),true)},{passive:true});
 panel.addEventListener('mouseenter',stopAuto);panel.addEventListener('mouseleave',function(){if(shown)startAuto()});
 function playIntroSound(){
  try{
   var AC=window.AudioContext||window.webkitAudioContext;if(!AC)return;
   audioCtx=audioCtx||new AC();
   if(audioCtx.state==='suspended')audioCtx.resume().catch(function(){});
   if(audioCtx.state!=='running')return;
   var now=audioCtx.currentTime;
   [392,493.88,587.33,783.99].forEach(function(freq,i){
    var osc=audioCtx.createOscillator(),gain=audioCtx.createGain(),at=now+i*.14;
    osc.type='sine';osc.frequency.setValueAtTime(freq,at);
    gain.gain.setValueAtTime(.0001,at);
    gain.gain.exponentialRampToValueAtTime(.04,at+.04);
    gain.gain.exponentialRampToValueAtTime(.0001,at+.42);
    osc.connect(gain);gain.connect(audioCtx.destination);osc.start(at);osc.stop(at+.43);
   });
  }catch(e){}
 }
 function open(){if(shown||alreadySeen())return;shown=true;markSeen();showCampaign(0,false);startAuto();clearTimeout(hideTimer);previousFocus=document.activeElement;dialog.style.display='flex';dialog.setAttribute('aria-hidden','false');requestAnimationFrame(function(){dialog.classList.add('cma-visible');close.focus({preventScroll:true});playIntroSound();});}
 function hide(){if(!shown)return;stopAuto();shown=false;dialog.classList.remove('cma-visible');dialog.setAttribute('aria-hidden','true');hideTimer=window.setTimeout(function(){dialog.style.display='none';},window.matchMedia('(prefers-reduced-motion: reduce)').matches?0:560);if(previousFocus&&previousFocus.focus)previousFocus.focus({preventScroll:true});}
 function waitForIntro(){if(alreadySeen())return;var intro=document.getElementById('cojuka-intro');if(!intro||intro.classList.contains('is-hidden')){window.setTimeout(open,450);return;}var obs=new MutationObserver(function(){if(intro.classList.contains('is-hidden')){obs.disconnect();window.setTimeout(open,450);}});obs.observe(intro,{attributes:true,attributeFilter:['class']});}
 if(document.readyState==='loading')document.addEventListener('DOMContentLoaded',waitForIntro,{once:true});else waitForIntro();
 close.addEventListener('click',hide);dialog.addEventListener('click',function(e){if(e.target===dialog)hide();});
 document.addEventListener('keydown',function(e){if(!dialog.classList.contains('cma-visible'))return;if(e.key==='Escape'){hide();return;}if(e.key==='Tab'){var focusable=Array.from(dialog.querySelectorAll('button,a[href]')).filter(function(el){return !el.disabled});if(!focusable.length)return;var first=focusable[0],last=focusable[focusable.length-1];if(e.shiftKey&&document.activeElement===first){e.preventDefault();last.focus()}else if(!e.shiftKey&&document.activeElement===last){e.preventDefault();first.focus()}}});
 document.getElementById('cma-explore').addEventListener('click',function(){dialog.setAttribute('aria-hidden','true');});

})();
</script>