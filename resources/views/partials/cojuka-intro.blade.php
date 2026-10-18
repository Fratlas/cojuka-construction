<style>
#cojuka-intro{position:fixed;inset:0;z-index:99999;background:radial-gradient(ellipse at 50% 42%,#243146 0%,#0b101b 65%,#060910 100%);display:grid;place-items:center;color:#fff;opacity:1;transition:opacity .65s ease,visibility .65s ease;overflow:hidden}
#cojuka-intro.is-hidden{opacity:0;visibility:hidden;pointer-events:none}
#cojuka-intro .ci-stage{text-align:center;padding:26px;position:relative;z-index:2}
#cojuka-intro .ci-glow{position:absolute;width:430px;height:430px;max-width:90vw;border-radius:50%;background:#b18b5424;filter:blur(65px);left:50%;top:44%;transform:translate(-50%,-50%)}
#cojuka-intro .ci-symbol{width:166px;height:166px;margin:0 auto 28px;position:relative;animation:ci-arrive 1.35s cubic-bezier(.2,.8,.2,1) both}
#cojuka-intro .ci-globe{position:absolute;inset:30px;border-radius:50%;background:radial-gradient(circle at 32% 27%,#ffd6a0,#a84a43 44%,#48141c 76%,#1b1824);border:2px solid #e5b46e;box-shadow:inset -18px -12px 23px #1c0b17b0,0 0 32px #d79e5844;overflow:hidden}
#cojuka-intro .ci-globe:before{content:'';position:absolute;inset:0;border-radius:50%;background:repeating-linear-gradient(0deg,transparent 0 17px,#ffdda833 18px 19px,transparent 20px 34px),repeating-linear-gradient(90deg,transparent 0 21px,#ffdda82c 22px 23px,transparent 24px 42px);transform:rotate(-18deg)}
#cojuka-intro .ci-globe:after{content:'✦';font-size:55px;color:#ffd5a07d;position:absolute;inset:14px;line-height:70px}
#cojuka-intro .ci-arc{position:absolute;background:linear-gradient(130deg,#8b1225,#d65351 46%,#76091c);border:2px solid #dfad70;box-shadow:0 6px 15px #0006;border-radius:6px}
#cojuka-intro .ci-top,#cojuka-intro .ci-bottom{height:25px;width:77px;left:45px}
#cojuka-intro .ci-top{top:0;transform:perspective(80px) rotateX(-15deg)}#cojuka-intro .ci-bottom{bottom:0;transform:perspective(80px) rotateX(15deg)}
#cojuka-intro .ci-left,#cojuka-intro .ci-right{width:25px;height:77px;top:45px}
#cojuka-intro .ci-left{left:0;transform:perspective(80px) rotateY(15deg)}#cojuka-intro .ci-right{right:0;transform:perspective(80px) rotateY(-15deg)}
#cojuka-intro .ci-name{font:700 clamp(36px,6vw,68px)/1.05 Georgia,serif;letter-spacing:.1em;background:linear-gradient(#fff3d6,#d5a76a 60%,#9b693d);-webkit-background-clip:text;background-clip:text;color:transparent;animation:ci-fade 1.2s .25s both}
#cojuka-intro .ci-caption{font:600 clamp(10px,1.6vw,14px)/1.8 system-ui,sans-serif;letter-spacing:.23em;color:#ddc5a7;margin-top:13px;animation:ci-fade 1.2s .5s both}
#cojuka-intro .ci-line{width:110px;height:2px;margin:30px auto 0;background:linear-gradient(90deg,transparent,#e4b77e,transparent);animation:ci-fade 1s .6s both}
#cojuka-intro .ci-skip{position:absolute;right:22px;bottom:20px;z-index:3;background:transparent;border:1px solid #ffffff55;border-radius:30px;color:#fff;padding:9px 18px;font:500 12px system-ui;cursor:pointer}
#cojuka-intro .ci-skip:hover{background:#ffffff18}
@keyframes ci-arrive{from{opacity:0;transform:translateY(24px) scale(.8) rotate(-20deg);filter:blur(9px)}to{opacity:1;transform:none;filter:none}}
@keyframes ci-fade{from{opacity:0;transform:translateY(12px)}to{opacity:1;transform:none}}
@media(prefers-reduced-motion:reduce){#cojuka-intro,#cojuka-intro *{animation:none!important;transition:none!important}}
#cojuka-intro .ci-heartbeat{position:relative;width:min(520px,86vw);height:clamp(180px,30vw,285px);margin:0 auto 4px;display:grid;place-items:center;isolation:isolate}#cojuka-intro .ci-intro-emblem{position:relative;z-index:2;width:clamp(165px,28vw,275px);height:100%;object-fit:contain;filter:drop-shadow(0 0 20px #f2333855);animation:ci-pulse 1.5s ease-in-out infinite}#cojuka-intro .ci-beat-line{position:absolute;inset:49% 0 auto;height:2px;background:linear-gradient(90deg,transparent,#f8494b 15%,#ffce8a 50%,#f8494b 85%,transparent);box-shadow:0 0 13px #f94845;animation:ci-heartline 1.5s ease-in-out infinite}#cojuka-intro .ci-name{margin-top:0}#cojuka-intro .ci-caption{margin-top:6px}#cojuka-intro .ci-stage{max-width:95vw}@keyframes ci-pulse{0%,100%{transform:scale(1)}12%{transform:scale(1.09)}22%{transform:scale(1.02)}33%{transform:scale(1.065)}47%{transform:scale(1)}}@keyframes ci-heartline{0%,100%{opacity:.4;transform:scaleX(.75)}18%,34%{opacity:1;transform:scaleX(1)}}@media(prefers-reduced-motion:reduce){#cojuka-intro .ci-intro-emblem,#cojuka-intro .ci-beat-line{animation:none!important}}

/* Artwork faithful to the approved COJUKA globe image; only the wordmark's tint changes. */
#cojuka-intro .ci-final-art{display:none;position:relative;width:min(690px,90vw,68svh);aspect-ratio:1;margin:0 auto;animation:ci-pulse 1.65s ease-in-out infinite;transform-origin:center}
#cojuka-intro .ci-final-art img{position:absolute;inset:0;width:100%;height:100%;display:block;object-fit:contain}
#cojuka-intro .ci-final-art .ci-final-wordmark{clip-path:inset(74% 0 18.5% 0);filter:brightness(0) saturate(100%) invert(88%) sepia(21%) saturate(653%) hue-rotate(349deg) brightness(108%) contrast(95%);pointer-events:none}
#cojuka-intro.ci-image-loaded .ci-final-art{display:block}
#cojuka-intro.ci-image-loaded .ci-old-art{display:none}
@media(max-height:540px){#cojuka-intro .ci-final-art{width:min(460px,82vw,60svh)}}
@media(prefers-reduced-motion:reduce){#cojuka-intro .ci-final-art{animation:none!important}}
</style>
<div id="cojuka-intro" role="status" aria-label="Bienvenue chez COJUKA" aria-live="off">
 <div class="ci-glow" aria-hidden="true"></div>
 <div class="ci-stage">
  <div class="ci-final-art" aria-label="COJUKA CONSULTING GROUP">
   <img id="ci-official-image" src="{{ asset('images/cojuka-welcome-final.avif') }}?v=20261018" alt="COJUKA Consulting Group — globe rouge, Afrique centrée" width="1254" height="1254" decoding="async" fetchpriority="high">
   <img class="ci-final-wordmark" src="{{ asset('images/cojuka-welcome-final.avif') }}?v=20261018" alt="" aria-hidden="true" width="1254" height="1254">
  </div>
  <div class="ci-old-art">
   <div class="ci-heartbeat" aria-hidden="true"><span class="ci-beat-line"></span><img class="ci-intro-emblem" src="{{ asset('images/cojuka-intro-africa.svg') }}?v=2" alt=""></div>
   <div class="ci-name">COJUKA</div>
   <div class="ci-caption">CONSULTING GROUP</div>
   <div class="ci-line"></div>
  </div>
 </div>
 <button type="button" class="ci-skip" id="cojuka-intro-skip">Accéder au site <span aria-hidden="true">→</span></button>
</div>
<script>
(function(){
 var el=document.getElementById('cojuka-intro');if(!el)return;
 var official=document.getElementById('ci-official-image');
 if(official){
  var showOfficial=function(){if(official.naturalWidth>0)el.classList.add('ci-image-loaded')};
  official.addEventListener('load',showOfficial,{once:true});
  if(official.complete)showOfficial();
 }
 var reduced=window.matchMedia&&window.matchMedia('(prefers-reduced-motion: reduce)').matches;
 var started=Date.now(),ready=false,minimum=5000,maximum=14000,done=false;
 function finish(){if(done)return;done=true;el.classList.add('is-hidden');window.setTimeout(function(){if(el&&el.parentNode)el.remove()},700)}
 function attempt(){if(ready&&Date.now()-started>=minimum)finish()}
 window.addEventListener('cojuka:hero-ready',function(){ready=true;attempt()},{once:true});
 document.getElementById('cojuka-intro-skip').addEventListener('click',finish);
 if(reduced){finish()}else{window.setTimeout(attempt,minimum);window.setTimeout(finish,maximum)}

})();
</script>