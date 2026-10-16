<style>
#cojuka-mining-announce{position:fixed;inset:0;z-index:99980;display:none;align-items:center;justify-content:center;padding:20px;background:rgba(4,10,18,.78);backdrop-filter:blur(14px);-webkit-backdrop-filter:blur(14px);opacity:0;transition:opacity .55s ease}
#cojuka-mining-announce.cma-visible{display:flex;opacity:1}
#cojuka-mining-announce .cma-panel{position:relative;isolation:isolate;width:min(960px,100%);min-height:460px;overflow:hidden;border-radius:26px;background:#101b29 url('https://images.unsplash.com/photo-1519003722824-194d4455a60c?auto=format&fit=crop&w=1300&q=76&fm=webp') center/cover no-repeat;box-shadow:0 40px 110px rgba(0,0,0,.52);transform:translateY(30px) scale(.97);transition:transform .7s cubic-bezier(.18,.8,.18,1)}
#cojuka-mining-announce.cma-visible .cma-panel{transform:translateY(0) scale(1)}
#cojuka-mining-announce .cma-panel:before{content:'';position:absolute;inset:0;z-index:-1;background:linear-gradient(90deg,rgba(6,13,23,.96) 0%,rgba(6,13,23,.86) 50%,rgba(6,13,23,.35) 100%)}
#cojuka-mining-announce .cma-content{padding:clamp(30px,6vw,78px);max-width:740px;color:#fff}
#cojuka-mining-announce .cma-kicker{color:#f4b89a;font-size:.83rem;letter-spacing:.18em;text-transform:uppercase;font-weight:800;margin:0 0 18px}
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
    <button type="button" class="cma-secondary" id="cma-sound" aria-pressed="false">♪ Activer le son</button>
   </div>
   <p class="cma-note">Le son ne se déclenche qu'après votre clic. Vous pouvez fermer cette annonce à tout moment.</p>
  </div>
 </div>
</div>
<script>
(function(){
 var dialog=document.getElementById('cojuka-mining-announce');if(!dialog)return;
 var close=document.getElementById('cma-close'),sound=document.getElementById('cma-sound'),shown=false,previousFocus=null,audioCtx=null;
 function open(){if(shown)return;shown=true;previousFocus=document.activeElement;dialog.style.display='flex';dialog.setAttribute('aria-hidden','false');requestAnimationFrame(function(){dialog.classList.add('cma-visible');close.focus({preventScroll:true});});}
 function hide(){dialog.classList.remove('cma-visible');dialog.setAttribute('aria-hidden','true');window.setTimeout(function(){dialog.style.display='none';},560);if(previousFocus&&previousFocus.focus)previousFocus.focus({preventScroll:true});}
 function waitForIntro(){var intro=document.getElementById('cojuka-intro');if(!intro||intro.classList.contains('is-hidden')){window.setTimeout(open,450);return;}var obs=new MutationObserver(function(){if(intro.classList.contains('is-hidden')){obs.disconnect();window.setTimeout(open,450);}});obs.observe(intro,{attributes:true,attributeFilter:['class']});}
 if(document.readyState==='loading')document.addEventListener('DOMContentLoaded',waitForIntro,{once:true});else waitForIntro();
 close.addEventListener('click',hide);dialog.addEventListener('click',function(e){if(e.target===dialog)hide();});
 document.addEventListener('keydown',function(e){if(dialog.classList.contains('cma-visible')&&e.key==='Escape')hide();});
 document.getElementById('cma-explore').addEventListener('click',function(){dialog.setAttribute('aria-hidden','true');});
 sound.addEventListener('click',function(){
  try{var AC=window.AudioContext||window.webkitAudioContext;if(!AC)return;audioCtx=audioCtx||new AC();if(audioCtx.state==='suspended')audioCtx.resume();
   var now=audioCtx.currentTime;[392,493.88,587.33,783.99].forEach(function(freq,i){var osc=audioCtx.createOscillator(),gain=audioCtx.createGain();osc.type='sine';osc.frequency.setValueAtTime(freq,now+i*.13);gain.gain.setValueAtTime(.0001,now+i*.13);gain.gain.exponentialRampToValueAtTime(.065,now+i*.13+.035);gain.gain.exponentialRampToValueAtTime(.0001,now+i*.13+.45);osc.connect(gain);gain.connect(audioCtx.destination);osc.start(now+i*.13);osc.stop(now+i*.13+.46);});
   sound.textContent='♪ Son activé';sound.setAttribute('aria-pressed','true');window.setTimeout(function(){sound.textContent='♪ Réécouter le son';sound.setAttribute('aria-pressed','false');},1300);
  }catch(e){sound.textContent='Son indisponible';}
 });
})();
</script>