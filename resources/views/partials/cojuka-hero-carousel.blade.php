<div class="cojuka-video-carousel" data-cojuka-video-carousel aria-label="Vidéos de présentation COJUKA" style="background:linear-gradient(90deg,rgba(7,12,23,.5),rgba(7,12,23,.15)),url('https://images.unsplash.com/photo-1600607687939-ce8a6c25118c?auto=format&fit=crop&w=1500&q=76&fm=webp') center/cover no-repeat">
 <video class="cojuka-carousel-video is-active" muted playsinline preload="none" autoplay poster="https://images.unsplash.com/photo-1600607687939-ce8a6c25118c?auto=format&fit=crop&w=1400&q=74&fm=webp" data-local="{{ asset('videos/cojuka-hero.mp4') }}" data-remote="https://d8j0ntlcm91z4.cloudfront.net/user_35sq0uUmKRerZDm8Ty4efx2WQSL/hf_20261015_161148_e24a7720-8b37-44eb-aa21-d63f68adde8b.mp4" aria-hidden="true"></video>
 <video class="cojuka-carousel-video" muted playsinline preload="none" poster="https://images.unsplash.com/photo-1600607687939-ce8a6c25118c?auto=format&fit=crop&w=1400&q=74&fm=webp" data-local="{{ asset('videos/cojuka-hero-2.mp4') }}" data-remote="https://d8j0ntlcm91z4.cloudfront.net/user_35sq0uUmKRerZDm8Ty4efx2WQSL/hf_20261015_161148_798130d0-0d7d-47fa-8c17-b7c076aa9bf3.mp4" aria-hidden="true"></video>
 <video class="cojuka-carousel-video" muted playsinline preload="none" poster="https://images.unsplash.com/photo-1600607687939-ce8a6c25118c?auto=format&fit=crop&w=1400&q=74&fm=webp" data-local="{{ asset('videos/cojuka-hero-3.mp4') }}" data-remote="https://d8j0ntlcm91z4.cloudfront.net/user_35sq0uUmKRerZDm8Ty4efx2WQSL/hf_20261015_161147_bbb8b8aa-ee22-4316-b29a-340e357d855c.mp4" aria-hidden="true"></video>
<div class="cojuka-video-loader" aria-live="polite"><img src="{{ asset('images/cojuka-logo.svg') }}" alt="COJUKA Consulting Group" width="180" height="54"><span class="cojuka-video-loader-ring" aria-hidden="true"></span><span class="cojuka-video-loader-label">Chargement de la vidéo…</span></div>
</div>
<div class="cojuka-carousel-controls" role="group" aria-label="Choisir la vidéo">
<button type="button" class="cojuka-carousel-dot is-active" data-video-index="0" aria-label="Vidéo 1" aria-pressed="true"></button>
<button type="button" class="cojuka-carousel-dot" data-video-index="1" aria-label="Vidéo 2" aria-pressed="false"></button>
<button type="button" class="cojuka-carousel-dot" data-video-index="2" aria-label="Vidéo 3" aria-pressed="false"></button>
</div>
@once
<style>
.cojuka-video-carousel{position:absolute;inset:0;overflow:hidden;z-index:0}
.cojuka-video-carousel .cojuka-carousel-video{position:absolute;inset:0;width:100%;height:100%;object-fit:cover;opacity:0;transition:opacity .85s ease;pointer-events:none}
.cojuka-video-carousel .cojuka-carousel-video.is-active.is-playing{opacity:1}
.cojuka-carousel-controls{position:absolute;bottom:24px;left:50%;transform:translateX(-50%);z-index:6;display:flex;gap:12px;padding:10px 14px;border-radius:99px;background:rgba(0,0,0,.3)}
.cojuka-carousel-dot{width:12px;height:12px;padding:0;border:2px solid #fff;border-radius:50%;background:transparent;cursor:pointer}
.cojuka-carousel-dot.is-active{background:#fff}
.cojuka-carousel-dot:focus-visible{outline:3px solid #e8ba77;outline-offset:4px}
@media(prefers-reduced-motion:reduce){.cojuka-video-carousel .cojuka-carousel-video{transition:none}}
.cojuka-video-loader{display:none!important;position:absolute;inset:0;z-index:2;display:flex;flex-direction:column;align-items:center;justify-content:center;gap:14px;background:#f8f8f8e8;transition:opacity .5s ease;pointer-events:none}
.cojuka-video-loader img{width:180px;height:auto;max-height:64px;object-fit:contain}
.cojuka-video-loader-ring{width:30px;height:30px;border:3px solid #e7d9dd;border-top-color:#86212e;border-radius:50%;animation:cojukaLoaderSpin .85s linear infinite}
.cojuka-video-loader-label{font-size:.78rem;font-weight:650;letter-spacing:.04em;color:#86212e}
.cojuka-video-loader.is-hidden{opacity:0;visibility:hidden}
@keyframes cojukaLoaderSpin{to{transform:rotate(360deg)}}
@media(prefers-reduced-motion:reduce){.cojuka-video-loader-ring{animation:none}}
</style>
<script>
document.addEventListener('DOMContentLoaded',function(){
 document.querySelectorAll('[data-cojuka-video-carousel]').forEach(function(root){
  const videos=Array.from(root.querySelectorAll('video'));
  const dots=Array.from(root.parentElement.querySelectorAll('[data-video-index]'));
  if(!videos.length)return;
  const reduced=window.matchMedia('(prefers-reduced-motion: reduce)').matches;
  const saveData=!!(navigator.connection&&navigator.connection.saveData);
  const state=videos.map(v=>({remote:false,failed:false}));
  let active=0,pending=-1,ready=false,watchdog=null;
  function announceReady(){if(!ready){ready=true;window.dispatchEvent(new Event('cojuka:hero-ready'))}}
  function updateDots(){dots.forEach((b,i)=>{b.classList.toggle('is-active',i===active);b.setAttribute('aria-pressed',String(i===active));b.disabled=state[i].failed})}
  function getSource(i){return state[i].remote?videos[i].dataset.remote:videos[i].dataset.local}
  function prepare(i){const v=videos[i];if(!v.getAttribute('src')){v.src=getSource(i);v.load()}}
  function commit(i){
   if(pending!==i)return;
   clearTimeout(watchdog);
   const previous=active;
   active=i;pending=-1;
   videos[i].classList.add('is-active','is-playing');
   if(previous!==i){
    // Leave the outgoing frame visible until the incoming video has actually started.
    videos[previous].classList.remove('is-active');
    window.setTimeout(()=>{if(active!==previous){videos[previous].classList.remove('is-playing');videos[previous].pause()}},850);
   }
   updateDots();announceReady();
  }
  function fallback(i){
   if(state[i].failed)return;
   const v=videos[i];
   if(!state[i].remote&&v.dataset.remote){
    state[i].remote=true;v.pause();v.removeAttribute('src');v.load();
    v.src=getSource(i);v.load();
    if(pending===i)start(i);
    return;
   }
   state[i].failed=true;
   if(pending===i){
    pending=-1;clearTimeout(watchdog);
    v.classList.remove('is-active','is-playing');
    const next=videos.findIndex((_,j)=>j!==i&&!state[j].failed);
    if(next>=0&&next!==active)start(next);else announceReady();
   }
   updateDots();
  }
  function start(i){
   if(state[i].failed||reduced||saveData)return;
   if(pending===i&&watchdog)return;
   if(pending>=0&&pending!==i){videos[pending].pause();videos[pending].classList.remove('is-active','is-playing')}
   pending=i;
   clearTimeout(watchdog);
   const v=videos[i];
   prepare(i);
   const promise=v.play();
   if(promise&&promise.catch)promise.catch(e=>{
    if(pending!==i)return;
    if(e&&e.name==='AbortError')return;
    if(e&&e.name==='NotAllowedError'){pending=-1;announceReady();return}
    fallback(i);
   });
   watchdog=window.setTimeout(()=>{if(pending===i)fallback(i)},7500);
  }
  videos.forEach((v,i)=>{
   v.addEventListener('playing',()=>commit(i));
   v.addEventListener('error',()=>fallback(i));
   v.addEventListener('ended',()=>{
    if(active!==i||pending>=0||reduced)return;
    for(let step=1;step<=videos.length;step++){
     const next=(i+step)%videos.length;
     if(!state[next].failed){start(next);break}
    }
   });
   v.addEventListener('waiting',()=>{if(i===active&&pending<0)announceReady()});
  });
  dots.forEach((button,i)=>button.addEventListener('click',()=>{
   if(i===active||state[i].failed)return;
   start(i);
  }));
  updateDots();
  if(reduced||saveData){announceReady();return}
  const begin=()=>start(0);
  if('IntersectionObserver' in window){
   const observer=new IntersectionObserver(entries=>{
    if(entries.some(entry=>entry.isIntersecting)){observer.disconnect();begin()}
   },{rootMargin:'150px'});
   observer.observe(root);
  }else begin();
  window.addEventListener('pagehide',()=>{clearTimeout(watchdog);videos.forEach(v=>v.pause())},{once:true});
 });
});
</script>
@endonce