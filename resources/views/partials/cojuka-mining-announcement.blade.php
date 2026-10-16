<style>
#cojuka-mining-announce{position:fixed;inset:0;z-index:99980;display:none;align-items:center;justify-content:center;padding:20px;background:rgba(8,14,24,.42);backdrop-filter:blur(7px);-webkit-backdrop-filter:blur(7px);opacity:0;transition:opacity .55s ease}
#cojuka-mining-announce.cma-visible{display:flex;opacity:1}
#cojuka-mining-announce .cma-panel{position:relative;isolation:isolate;width:min(960px,100%);min-height:460px;overflow:hidden;border-radius:26px;background:#293646 url('https://images.hellogravel.com/variants/guides/37e44abca47c0db2/bingham-canyon-mine-aerial-scaled-content-900w.webp') center/cover no-repeat;box-shadow:0 40px 110px rgba(0,0,0,.30);transform:translateY(30px) scale(.97);transition:transform .7s cubic-bezier(.18,.8,.18,1)}
#cojuka-mining-announce.cma-visible .cma-panel{transform:translateY(0) scale(1)}
#cojuka-mining-announce .cma-panel:before{content:'';position:absolute;inset:0;z-index:-1;background:linear-gradient(90deg,rgba(6,13,23,.79) 0%,rgba(6,13,23,.53) 50%,rgba(6,13,23,.10) 100%)}
#cojuka-mining-announce .cma-content{padding:clamp(30px,6vw,78px);max-width:680px;color:#fff}
#cojuka-mining-announce .cma-kicker{color:#f4b89a;font-size:.83rem;letter-spacing:.18em;text-transform:uppercase;font-weight:300;margin:0 0 18px}
#cojuka-mining-announce h2{font-size:clamp(2.4rem,5vw,5rem);font-weight:850;line-height:1.03;letter-spacing:-.055em;color:#fff;margin:0 0 20px}
#cojuka-mining-announce .cma-copy{color:#e1e5ea;font-size:clamp(1rem,1.5vw,1.23rem);line-height:1.65;max-width:580px;margin-bottom:30px}
#cojuka-mining-announce .cma-actions{display:flex;flex-wrap:wrap;align-items:center;gap:12px}
#cojuka-mining-announce .cma-primary{display:inline-flex;align-items:center;justify-content:center;min-height:49px;padding:12px 22px;background:#9a2033;border-radius:99px;color:#fff!important;font-weight:750;text-decoration:none;box-shadow:0 12px 28px #0004}
#cojuka-mining-announce .cma-primary:hover{background:#c22f45;transform:translateY(-3px)}
#cojuka-mining-announce .cma-secondary{background:transparent;border:1px solid #ffffff70;color:#fff;border-radius:99px;padding:12px 20px;font-weight:650;min-height:49px}
#cojuka-mining-announce .cma-close{position:absolute;top:16px;right:17px;z-index:2;border:1px solid #ffffff77;background:#09131bd9;color:#fff;border-radius:50%;width:42px;height:42px;font-size:26px;line-height:1;cursor:pointer}
#cojuka-mining-announce .cma-note{font-size:.74rem;color:#c6d0d8;margin-top:24px}
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
  {title:'Le Mining au cœur de notre vision.',copy:'Explorez notre orientation stratégique vers les ressources naturelles, les projets miniers et les carrières.',image:'https://images.hellogravel.com/variants/guides/37e44abca47c0db2/bingham-canyon-mine-aerial-scaled-content-900w.webp'},
  {title:'Des ressources. De nouvelles perspectives.',copy:'COJUKA place le développement minier au premier plan, avec une vision de long terme et des expertises complémentaires.',image:'https://images.unsplash.com/photo-1504307651254-35680f356dfd?auto=format&fit=crop&w=1400&q=80'},
  {title:'Mining, carrières et infrastructures.',copy:'Découvrez comment les activités minières s’articulent avec la construction, la logistique et les investissements du groupe.',image:'https://images.unsplash.com/photo-1487958449943-2429e8be8625?auto=format&fit=crop&w=1400&q=80'}
 ];
 function setCampaign(){var index=0;try{index=Number(sessionStorage.getItem('cojuka-mining-variant')||0)%campaigns.length;sessionStorage.setItem('cojuka-mining-variant',String(index+1))}catch(e){index=Math.floor(Math.random()*campaigns.length)}var item=campaigns[index];title.textContent=item.title;copy.textContent=item.copy;panel.style.backgroundImage='url("'+item.image+'")';}
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
 function open(){if(shown||alreadySeen())return;shown=true;markSeen();setCampaign();clearTimeout(hideTimer);previousFocus=document.activeElement;dialog.style.display='flex';dialog.setAttribute('aria-hidden','false');requestAnimationFrame(function(){dialog.classList.add('cma-visible');close.focus({preventScroll:true});playIntroSound();});}
 function hide(){if(!shown)return;shown=false;dialog.classList.remove('cma-visible');dialog.setAttribute('aria-hidden','true');hideTimer=window.setTimeout(function(){dialog.style.display='none';},window.matchMedia('(prefers-reduced-motion: reduce)').matches?0:560);if(previousFocus&&previousFocus.focus)previousFocus.focus({preventScroll:true});}
 function waitForIntro(){if(alreadySeen())return;var intro=document.getElementById('cojuka-intro');if(!intro||intro.classList.contains('is-hidden')){window.setTimeout(open,450);return;}var obs=new MutationObserver(function(){if(intro.classList.contains('is-hidden')){obs.disconnect();window.setTimeout(open,450);}});obs.observe(intro,{attributes:true,attributeFilter:['class']});}
 if(document.readyState==='loading')document.addEventListener('DOMContentLoaded',waitForIntro,{once:true});else waitForIntro();
 close.addEventListener('click',hide);dialog.addEventListener('click',function(e){if(e.target===dialog)hide();});
 document.addEventListener('keydown',function(e){if(!dialog.classList.contains('cma-visible'))return;if(e.key==='Escape'){hide();return;}if(e.key==='Tab'){var focusable=Array.from(dialog.querySelectorAll('button,a[href]')).filter(function(el){return !el.disabled});if(!focusable.length)return;var first=focusable[0],last=focusable[focusable.length-1];if(e.shiftKey&&document.activeElement===first){e.preventDefault();last.focus()}else if(!e.shiftKey&&document.activeElement===last){e.preventDefault();first.focus()}}});
 document.getElementById('cma-explore').addEventListener('click',function(){dialog.setAttribute('aria-hidden','true');});

})();
</script>