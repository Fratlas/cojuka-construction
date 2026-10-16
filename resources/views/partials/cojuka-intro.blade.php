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
</style>
<div id="cojuka-intro" role="status" aria-label="Bienvenue chez COJUKA" aria-live="off">
 <div class="ci-glow" aria-hidden="true"></div>
 <div class="ci-stage">
  <div class="mb-4">@include('partials.cojuka-logo', ['logoClass'=>'cojuka-brand-logo--large'])</div>
  <div class="ci-name">COJUKA</div>
  <div class="ci-caption">CONSULTING GROUP</div>
  <div class="ci-line"></div>
 </div>
 <button type="button" class="ci-skip" id="cojuka-intro-skip">Accéder au site <span aria-hidden="true">→</span></button>
</div>
<script>
(function(){
 var el=document.getElementById('cojuka-intro');if(!el)return;
 var reduced=window.matchMedia&&window.matchMedia('(prefers-reduced-motion: reduce)').matches;
 var started=Date.now(),ready=false,minimum=5000,maximum=14000,done=false;
 function finish(){if(done)return;done=true;el.classList.add('is-hidden');window.setTimeout(function(){if(el&&el.parentNode)el.remove()},700)}
 function attempt(){if(ready&&Date.now()-started>=minimum)finish()}
 window.addEventListener('cojuka:hero-ready',function(){ready=true;attempt()},{once:true});
 document.getElementById('cojuka-intro-skip').addEventListener('click',finish);
 if(reduced){finish()}else{window.setTimeout(attempt,minimum);window.setTimeout(finish,maximum)}

})();
</script>