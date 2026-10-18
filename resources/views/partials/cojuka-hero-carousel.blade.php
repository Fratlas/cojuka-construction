<div class="cojuka-video-carousel" data-cojuka-video-carousel aria-label="Vidéos de présentation COJUKA" style="background:linear-gradient(90deg,rgba(7,12,23,.5),rgba(7,12,23,.15)),url('https://images.unsplash.com/photo-1600607687939-ce8a6c25118c?auto=format&fit=crop&w=1500&q=76&fm=webp') center/cover no-repeat">
 <video data-slide class="cojuka-carousel-video is-active" muted playsinline loop preload="metadata" autoplay poster="https://images.unsplash.com/photo-1600607687939-ce8a6c25118c?auto=format&fit=crop&w=1400&q=74&fm=webp" data-local="{{ asset('videos/cojuka-hero.mp4') }}" data-remote="https://d8j0ntlcm91z4.cloudfront.net/user_35sq0uUmKRerZDm8Ty4efx2WQSL/hf_20261015_161148_e24a7720-8b37-44eb-aa21-d63f68adde8b.mp4" aria-hidden="true"></video>
 <video data-slide class="cojuka-carousel-video" muted playsinline loop preload="metadata" poster="https://images.unsplash.com/photo-1522071820081-009f0129c71c?auto=format&fit=crop&w=1400&q=74&fm=webp" data-local="{{ asset('videos/cojuka-hero-2.mp4') }}" data-remote="https://d8j0ntlcm91z4.cloudfront.net/user_35sq0uUmKRerZDm8Ty4efx2WQSL/hf_20261015_161148_798130d0-0d7d-47fa-8c17-b7c076aa9bf3.mp4" aria-hidden="true"></video>
 <video data-slide class="cojuka-carousel-video" muted playsinline loop preload="metadata" poster="https://images.unsplash.com/photo-1507679799987-c73779587ccf?auto=format&fit=crop&w=1400&q=74&fm=webp" data-local="{{ asset('videos/cojuka-hero-3.mp4') }}" data-remote="https://d8j0ntlcm91z4.cloudfront.net/user_35sq0uUmKRerZDm8Ty4efx2WQSL/hf_20261015_161147_bbb8b8aa-ee22-4316-b29a-340e357d855c.mp4" aria-hidden="true"></video>

<div class="cojuka-carousel-photo" data-slide aria-hidden="true"><img src="https://images.unsplash.com/photo-1581091226825-a6a2a5aee158?auto=format&amp;fit=crop&amp;w=1800&amp;q=80&amp;fm=webp" alt="" loading="lazy" decoding="async"></div>
<div class="cojuka-carousel-photo" data-slide aria-hidden="true"><img src="https://images.unsplash.com/photo-1504307651254-35680f356dfd?auto=format&amp;fit=crop&amp;w=1800&amp;q=80&amp;fm=webp" alt="" loading="lazy" decoding="async"></div>
<div class="cojuka-carousel-photo" data-slide aria-hidden="true"><img src="https://images.unsplash.com/photo-1586528116311-ad8dd3c8310d?auto=format&amp;fit=crop&amp;w=1800&amp;q=80&amp;fm=webp" alt="" loading="lazy" decoding="async"></div>
<div class="cojuka-video-loader" aria-live="polite"><img src="{{ asset('images/cojuka-logo.svg') }}" alt="COJUKA Consulting Group" width="180" height="54"><span class="cojuka-video-loader-ring" aria-hidden="true"></span><span class="cojuka-video-loader-label">Chargement de la vidéo…</span></div>
</div>
<div class="cojuka-carousel-controls" role="group" aria-label="Navigation des six slides COJUKA">
<button type="button" class="cojuka-carousel-arrow" data-carousel-direction="-1" aria-label="Slide précédent">‹</button>
<div class="cojuka-carousel-dots" role="group" aria-label="Choisir une présentation"><button type="button" class="cojuka-carousel-dot is-active" data-video-index="0" aria-label="Vidéo du groupe 1, slide 1 sur 6" aria-pressed="true"></button>
<button type="button" class="cojuka-carousel-dot" data-video-index="1" aria-label="Vidéo du groupe 2, slide 2 sur 6" aria-pressed="false"></button>
<button type="button" class="cojuka-carousel-dot" data-video-index="2" aria-label="Vidéo du groupe 3, slide 3 sur 6" aria-pressed="false"></button>
<button type="button" class="cojuka-carousel-dot" data-video-index="3" aria-label="Mining, slide 4 sur 6" aria-pressed="false"></button>
<button type="button" class="cojuka-carousel-dot" data-video-index="4" aria-label="Construction, slide 5 sur 6" aria-pressed="false"></button>
<button type="button" class="cojuka-carousel-dot" data-video-index="5" aria-label="Logistique, slide 6 sur 6" aria-pressed="false"></button></div>
<button type="button" class="cojuka-carousel-arrow" data-carousel-direction="1" aria-label="Slide suivant">›</button>
<span class="cojuka-carousel-count" aria-live="polite"><span data-current-slide>01</span> / 06</span>
</div>
@once
<style>
.cojuka-video-carousel{position:absolute;inset:0;overflow:hidden;z-index:0}
.cojuka-video-carousel .cojuka-carousel-video,.cojuka-video-carousel .cojuka-carousel-photo{position:absolute;inset:0;width:100%;height:100%;opacity:0;transition:opacity .85s ease;pointer-events:none}
.cojuka-video-carousel .cojuka-carousel-video{object-fit:cover}
.cojuka-video-carousel .cojuka-carousel-photo img{display:block;width:100%;height:100%;object-fit:cover}
.cojuka-video-carousel .cojuka-carousel-video.is-active.is-playing,.cojuka-video-carousel .cojuka-carousel-video.is-active.is-still,.cojuka-video-carousel .cojuka-carousel-photo.is-active{opacity:1}
.cojuka-video-carousel .cojuka-carousel-video{background:#101924;will-change:opacity}
.cojuka-video-carousel .cojuka-carousel-photo{will-change:opacity}
.cojuka-carousel-controls{position:absolute;bottom:max(20px,env(safe-area-inset-bottom));left:50%;transform:translateX(-50%);z-index:6;display:flex;align-items:center;gap:10px;padding:8px 12px;border:1px solid rgba(255,255,255,.25);border-radius:99px;background:rgba(8,13,23,.58);backdrop-filter:blur(14px);-webkit-backdrop-filter:blur(14px);white-space:nowrap}
.cojuka-carousel-dots{display:flex;gap:9px;align-items:center}
.cojuka-carousel-dot{flex:none;width:12px;height:12px;padding:0;border:2px solid #fff;border-radius:50%;background:transparent;cursor:pointer;transition:background .2s ease,transform .2s ease}
.cojuka-carousel-dot.is-active{background:#fff;transform:scale(1.12)}.cojuka-carousel-dot:disabled{opacity:.3;cursor:not-allowed}
.cojuka-carousel-arrow{flex:none;display:grid;place-items:center;width:34px;height:34px;padding:0;border:1px solid rgba(255,255,255,.32);border-radius:50%;background:rgba(255,255,255,.1);color:#fff;font:300 27px/1 system-ui;cursor:pointer;transition:background .2s ease}
.cojuka-carousel-arrow:hover{background:rgba(255,255,255,.28)}
.cojuka-carousel-count{font:600 11px/1.2 system-ui,sans-serif;letter-spacing:.05em;color:#fff;margin-left:2px;font-variant-numeric:tabular-nums}

/* Smooth, genuine two-phase text fade, synchronized with committed slide.
   Disable conflicting one-time heroReveal fill animations so opacity can change. */
.cojuka-hero-copy :is(
 [data-cojuka-hero-eyebrow],
 [data-cojuka-hero-title],
 [data-cojuka-hero-description],
 [data-cojuka-hero-cta]
){
 animation:none!important;
 opacity:1;
 transform:translate3d(0,0,0);
 transition:
  opacity .76s cubic-bezier(.22,1,.36,1),
  transform .82s cubic-bezier(.22,1,.36,1);
 will-change:opacity;
}
.cojuka-hero-copy.is-copy-switching :is(
 [data-cojuka-hero-eyebrow],
 [data-cojuka-hero-title],
 [data-cojuka-hero-description],
 [data-cojuka-hero-cta]
){
 opacity:0!important;
 transform:translate3d(0,12px,0);
 transition-duration:.40s,.40s;
 transition-timing-function:ease-in,ease-in;
}
@media(prefers-reduced-motion:reduce){
 .cojuka-hero-copy :is(
  [data-cojuka-hero-eyebrow],[data-cojuka-hero-title],
  [data-cojuka-hero-description],[data-cojuka-hero-cta]
 ){
  transition:none!important;animation:none!important;
  transform:none!important;will-change:auto;
 }
}

.cojuka-carousel-dot:focus-visible,.cojuka-carousel-arrow:focus-visible{outline:3px solid #e8ba77;outline-offset:3px}
.cojuka-video-loader{display:none!important;position:absolute;inset:0;z-index:2;flex-direction:column;align-items:center;justify-content:center;gap:14px;background:#f8f8f8e8;transition:opacity .5s ease;pointer-events:none}
.cojuka-video-loader img{width:180px;height:auto;max-height:64px;object-fit:contain}.cojuka-video-loader-ring{width:30px;height:30px;border:3px solid #e7d9dd;border-top-color:#86212e;border-radius:50%;animation:cojukaLoaderSpin .85s linear infinite}.cojuka-video-loader-label{font-size:.78rem;font-weight:650;letter-spacing:.04em;color:#86212e}
.cojuka-video-loader.is-hidden{opacity:0;visibility:hidden}
@keyframes cojukaLoaderSpin{to{transform:rotate(360deg)}}
@media(max-width:575px){.cojuka-carousel-controls{bottom:20px;gap:8px;padding:7px 9px}.cojuka-carousel-dots{gap:8px}.cojuka-carousel-dot{width:11px;height:11px}.cojuka-carousel-arrow{width:32px;height:32px}.cojuka-carousel-count{font-size:10px}}
@media(prefers-reduced-motion:reduce){.cojuka-video-carousel .cojuka-carousel-video,.cojuka-video-carousel .cojuka-carousel-photo,.cojuka-carousel-dot{transition:none}.cojuka-video-loader-ring{animation:none}}
</style>
<script>
document.addEventListener('DOMContentLoaded',function(){
 document.querySelectorAll('[data-cojuka-video-carousel]').forEach(function(root){
  const slides=Array.from(root.querySelectorAll('[data-slide]'));
  const host=root.parentElement;
  const dots=Array.from(host.querySelectorAll('[data-video-index]'));
  const arrows=Array.from(host.querySelectorAll('[data-carousel-direction]'));
  const counter=host.querySelector('[data-current-slide]');
  const copy=host.querySelector('[data-cojuka-hero-copy]');
  const messages=[
   {
    eyebrow:'COJUKA CONSULTING GROUP · RDC',
    title:'COJUKA Consulting Group',
    description:"Le Mining est notre priorité : activités minières, carrières et ressources naturelles, soutenues par l’immobilier, la construction et la logistique.",
    cta:'Découvrir le groupe',href:"{{ route('group') }}"
   },
   {
    eyebrow:'COJUKA CONSULTING GROUP · NOTRE VISION',
    title:'Une vision. Plusieurs expertises.',
    description:"COJUKA Consulting Group rassemble des activités complémentaires autour des mines, de la construction, de la logistique, de l’immobilier et de la consultance.",
    cta:'Notre vision',href:"{{ route('group') }}"
   },
   {
    eyebrow:'COJUKA CONSULTING GROUP · NOS ENTITÉS',
    title:'Ensemble, développer les opportunités.',
    description:"Les entités de COJUKA Consulting Group réunissent leurs savoir-faire pour accompagner les projets et investissements dans plusieurs secteurs stratégiques.",
    cta:'Explorer nos entités',href:"{{ route('group.portal') }}"
   },
   {
    eyebrow:'COJUKA MINING · SECTEUR PRIORITAIRE',
    title:'Le Mining au cœur de notre ambition.',
    description:"COJUKA Mining incarne notre priorité : les activités minières, les carrières et le développement de projets liés aux ressources naturelles.",
    cta:'Découvrir COJUKA Mining',href:"{{ route('group.profile','kojuka-mining') }}"
   },
   {
    eyebrow:'COJUKA CONSULTING GROUP · CONSTRUCTION',
    title:'Construire pour demain.',
    description:"À travers ses activités de construction, COJUKA Consulting Group accompagne le développement des infrastructures et des projets immobiliers.",
    cta:'Découvrir la construction',href:"{{ route('group.profile','construction') }}"
   },
   {
    eyebrow:'COJUKA CONSULTING GROUP · LOGISTIQUE',
    title:'Relier les projets aux ressources.',
    description:"Transport, approvisionnement et coordination : la logistique soutient les opérations et les ambitions de COJUKA Consulting Group.",
    cta:'Découvrir la logistique',href:"{{ route('group.profile','logistique') }}"
   }
  ];
  let copyTimer=null,copyIndex=-1;
  const targets=copy?{
   eyebrow:copy.querySelector('[data-cojuka-hero-eyebrow]'),
   title:copy.querySelector('[data-cojuka-hero-title]'),
   description:copy.querySelector('[data-cojuka-hero-description]'),
   cta:copy.querySelector('[data-cojuka-hero-cta]')
  }:null;
  function updateHeroCopy(i,immediate){
   if(!copy||!targets||Object.values(targets).some(el=>!el)||!messages[i])return;
   if(copyIndex===i)return;
   copyIndex=i;
   window.clearTimeout(copyTimer);
   const message=copy.dataset.cojukaHeroContext==='group'&&i===0
    ?{...messages[0],cta:'Découvrir nos expertises',href:'#expertises'}
    :messages[i];
   const apply=()=>{
    targets.eyebrow.textContent=message.eyebrow;
    targets.title.textContent=message.title;
    targets.description.textContent=message.description;
    targets.cta.href=message.href;
    targets.cta.replaceChildren(document.createTextNode(message.cta+' '));
    const arrow=document.createElement('span');
    arrow.setAttribute('aria-hidden','true');
    arrow.textContent='↗';
    targets.cta.appendChild(arrow);
    copy.classList.remove('is-copy-switching');
   };
   if(immediate||window.matchMedia('(prefers-reduced-motion: reduce)').matches){apply();return}
   copy.classList.add('is-copy-switching');
   // Let old words fade completely before inserting the next scene's text.
   // The new text then fades into place over 760 ms.
   copyTimer=window.setTimeout(apply,415);
  }
  if(!slides.length)return;
  const reduced=window.matchMedia('(prefers-reduced-motion: reduce)').matches;
  const saveData=!!(navigator.connection&&navigator.connection.saveData);
  const state=slides.map(()=>({remote:false,failed:false}));
  let active=0,pending=-1,ready=false,watchdog=null,advanceTimer=null,stallTimer=null;
  const retireTimers=new Set();
  const isVideo=i=>slides[i].tagName==='VIDEO';
  const announceReady=()=>{if(!ready){ready=true;window.dispatchEvent(new Event('cojuka:hero-ready'))}};
  function clearTimers(){
   window.clearTimeout(watchdog);window.clearTimeout(advanceTimer);window.clearTimeout(stallTimer);
  }
  function nextAvailable(from,direction){
   for(let n=1;n<=slides.length;n++){
    const i=(from+direction*n+slides.length*2)%slides.length;
    if(!state[i].failed)return i;
   }
   return from;
  }
  function updateControls(){
   dots.forEach((button,i)=>{
    button.classList.toggle('is-active',i===active);
    button.setAttribute('aria-pressed',String(i===active));
    button.disabled=state[i].failed;
   });
   if(counter)counter.textContent=String(active+1).padStart(2,'0');
  }
  /* Prepare the NEXT source well before a change, without interrupting the
     visible video. All three video nodes are muted and can overlap for a fade. */
  function warm(i){
   if(reduced||saveData||i<0||i>=slides.length||!isVideo(i)||state[i].failed)return;
   const video=slides[i];
   if(!video.getAttribute('src')){
    const source=state[i].remote?video.dataset.remote:video.dataset.local;
    if(!source)return;
    video.preload='auto';
    video.src=source;
    video.load();
   }else video.preload='auto';
  }
  function warmUpcoming(i){
   // The playlist's first videos are decoded early; photos need no playback.
   const n=nextAvailable(i,1);
   if(n!==i)warm(n);
   // Also keep the next video ready when the next slide is a photo.
   for(let step=2;step<=3;step++){
    const j=(i+step)%slides.length;
    if(isVideo(j)){warm(j);break}
   }
  }
  function queueAdvance(mode){
   window.clearTimeout(advanceTimer);
   if(reduced||saveData||document.hidden)return;
   let duration=6400;
   if(mode==='playing'&&isVideo(active)){
    const seconds=slides[active].duration;
    // Transition BEFORE video end (or let short clips loop seamlessly).
    if(Number.isFinite(seconds)&&seconds>2.5){
     duration=Math.max(2200,Math.min(6400,(seconds-1.15)*1000));
    }
   }
   advanceTimer=window.setTimeout(()=>{
    if(pending<0)show(nextAvailable(active,1));
   },duration);
  }
  function retire(i){
   if(!isVideo(i))return;
   const old=slides[i];
   const timer=window.setTimeout(()=>{
    retireTimers.delete(timer);
    if(active!==i&&pending!==i){
     old.pause();
     old.classList.remove('is-playing','is-still');
    }
   },1150);
   retireTimers.add(timer);
  }
  function commit(i,mode){
   if(pending!==i)return;
   const previous=active;
   clearTimers();
   pending=-1;active=i;
   slides.forEach((slide,j)=>{
    slide.classList.toggle('is-active',j===i);
    if(isVideo(j)){
     if(j===i){
      slide.classList.toggle('is-playing',mode==='playing');
      slide.classList.toggle('is-still',mode!=='playing');
     }else slide.classList.remove('is-still');
    }
   });
   // The outgoing video keeps playing until the crossfade has COMPLETED.
   if(previous!==i)retire(previous);
   updateControls();
   updateHeroCopy(i,false);
   announceReady();
   warmUpcoming(i);
   queueAdvance(mode);
  }
  function fail(i){
   if(state[i].failed)return;
   const video=slides[i];
   if(isVideo(i)&&!state[i].remote&&video.dataset.remote){
    state[i].remote=true;
    video.pause();
    video.removeAttribute('src');
    video.load();
    if(pending===i)playVideo(i);
    return;
   }
   state[i].failed=true;
   if(pending===i){
    pending=-1;
    clearTimers();
    const next=nextAvailable(active,1);
    if(next!==active)show(next);
    else{announceReady();queueAdvance('photo')}
   }else if(active===i){
    const next=nextAvailable(i,1);
    if(next!==i)show(next);
   }
   updateControls();
  }
  function playVideo(i){
   if(pending!==i)return;
   warm(i);
   const video=slides[i];
   if(!video.getAttribute('src')){fail(i);return}
   clearTimeout(watchdog);
   watchdog=window.setTimeout(()=>{if(pending===i)fail(i)},8500);
   // Do not fade the previous slide before this new video is ACTUALLY playing.
   const attempt=video.play();
   if(attempt&&typeof attempt.then==='function'){
    attempt.then(()=>{
     if(pending===i&&video.readyState>=2&&!video.paused)commit(i,'playing');
    }).catch(error=>{
     if(pending!==i)return;
     if(error&&error.name==='AbortError')return;
     if(error&&error.name==='NotAllowedError'){commit(i,'still');return}
     fail(i);
    });
   }
  }
  function show(i){
   if(!Number.isInteger(i)||i<0||i>=slides.length)return;
   if(state[i].failed){
    const alternate=nextAvailable(i,1);
    if(alternate!==i)show(alternate);
    return;
   }
   if(pending===i)return;
   if(i===active&&pending<0&&slides[i].classList.contains('is-active')&&
    (!isVideo(i)||slides[i].classList.contains('is-playing')||slides[i].classList.contains('is-still')))return;
   clearTimers();
   if(pending>=0&&pending!==i&&isVideo(pending)&&pending!==active)slides[pending].pause();
   pending=i;
   if(isVideo(i)){
    if(reduced||saveData){commit(i,'still');return}
    playVideo(i);
   }else commit(i,'photo');
  }
  slides.forEach((slide,i)=>{
   if(!isVideo(i))return;
   slide.loop=true;
   slide.addEventListener('playing',()=>{
    if(pending===i&&slide.readyState>=2)commit(i,'playing');
   });
   slide.addEventListener('error',()=>{if(pending===i||active===i)fail(i)});
   slide.addEventListener('stalled',()=>{
    if(active===i&&pending<0&&!reduced&&!saveData){
     clearTimeout(stallTimer);
     stallTimer=setTimeout(()=>{if(active===i&&pending<0&&slide.readyState<3)show(nextAvailable(i,1))},1700);
    }
   });
   slide.addEventListener('playing',()=>clearTimeout(stallTimer));
   // Looping footage stays alive until the incoming video is ready.
   slide.addEventListener('ended',()=>{
    if(active===i&&pending<0&&!reduced&&!saveData)show(nextAvailable(i,1));
   });
  });
  // Ensure next video is in the buffer even while the intro is visible.
  if(!reduced&&!saveData){warm(0);warm(1)}
  dots.forEach((button,i)=>button.addEventListener('click',()=>show(i)));
  arrows.forEach(button=>button.addEventListener('click',()=>{
   const dir=Number(button.dataset.carouselDirection);show(nextAvailable(active,dir));
  }));
  // Support left and right swipes on the entire Hero, without blocking vertical scrolling.
  let touch=null;
  host.addEventListener('touchstart',event=>{
   if(event.touches.length!==1||event.target.closest('a,button,input,textarea,select')){touch=null;return}
   touch={x:event.touches[0].clientX,y:event.touches[0].clientY};
  },{passive:true});
  host.addEventListener('touchend',event=>{
   if(!touch||!event.changedTouches.length)return;
   const dx=event.changedTouches[0].clientX-touch.x;
   const dy=event.changedTouches[0].clientY-touch.y;
   touch=null;
   if(Math.abs(dx)>=45&&Math.abs(dx)>Math.abs(dy)*1.3)show(nextAvailable(active,dx<0?1:-1));
  },{passive:true});
  host.addEventListener('touchcancel',()=>{touch=null},{passive:true});
  updateControls();updateHeroCopy(0,true);
  const begin=()=>show(0);
  if('IntersectionObserver' in window){
   const observer=new IntersectionObserver(entries=>{
    if(entries.some(entry=>entry.isIntersecting)){observer.disconnect();begin()}
   },{rootMargin:'150px'});
   observer.observe(root);
  }else begin();
  window.addEventListener('pagehide',()=>{clearTimers();retireTimers.forEach(t=>clearTimeout(t));window.clearTimeout(copyTimer);slides.filter(s=>s.tagName==='VIDEO').forEach(v=>v.pause())},{once:true});
 });
});
</script>
@endonce