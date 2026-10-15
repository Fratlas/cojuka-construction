<div class="cojuka-video-carousel" data-cojuka-video-carousel aria-label="Vidéos de présentation COJUKA" style="background:linear-gradient(90deg,rgba(7,12,23,.5),rgba(7,12,23,.15)),url('https://images.unsplash.com/photo-1600607687939-ce8a6c25118c?auto=format&fit=crop&w=2000&q=80') center/cover no-repeat">
 <video class="cojuka-carousel-video is-active" muted playsinline preload="metadata" autoplay poster="https://images.unsplash.com/photo-1600607687939-ce8a6c25118c?auto=format&fit=crop&w=1600&q=75" data-local="{{ asset('videos/cojuka-hero.mp4') }}" data-remote="https://d8j0ntlcm91z4.cloudfront.net/user_35sq0uUmKRerZDm8Ty4efx2WQSL/hf_20261015_161148_e24a7720-8b37-44eb-aa21-d63f68adde8b.mp4" aria-hidden="true"></video>
 <video class="cojuka-carousel-video" muted playsinline preload="none" poster="https://images.unsplash.com/photo-1600607687939-ce8a6c25118c?auto=format&fit=crop&w=1600&q=75" data-local="{{ asset('videos/cojuka-hero-2.mp4') }}" data-remote="https://d8j0ntlcm91z4.cloudfront.net/user_35sq0uUmKRerZDm8Ty4efx2WQSL/hf_20261015_161148_798130d0-0d7d-47fa-8c17-b7c076aa9bf3.mp4" aria-hidden="true"></video>
 <video class="cojuka-carousel-video" muted playsinline preload="none" poster="https://images.unsplash.com/photo-1600607687939-ce8a6c25118c?auto=format&fit=crop&w=1600&q=75" data-local="{{ asset('videos/cojuka-hero-3.mp4') }}" data-remote="https://d8j0ntlcm91z4.cloudfront.net/user_35sq0uUmKRerZDm8Ty4efx2WQSL/hf_20261015_161147_bbb8b8aa-ee22-4316-b29a-340e357d855c.mp4" aria-hidden="true"></video>
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
.cojuka-video-carousel .cojuka-carousel-video{position:absolute;inset:0;width:100%;height:100%;object-fit:cover;opacity:0;transition:opacity .8s ease;pointer-events:none}
.cojuka-video-carousel .cojuka-carousel-video.is-active{opacity:1}
.cojuka-carousel-controls{position:absolute;bottom:24px;left:50%;transform:translateX(-50%);z-index:6;display:flex;gap:12px;padding:10px 14px;border-radius:99px;background:rgba(0,0,0,.3)}
.cojuka-carousel-dot{width:12px;height:12px;padding:0;border:2px solid #fff;border-radius:50%;background:transparent;cursor:pointer}
.cojuka-carousel-dot.is-active{background:#fff}
.cojuka-carousel-dot:focus-visible{outline:3px solid #e8ba77;outline-offset:4px}
@media(prefers-reduced-motion:reduce){.cojuka-video-carousel .cojuka-carousel-video{transition:none}}
.cojuka-video-loader{position:absolute;inset:0;z-index:2;display:flex;flex-direction:column;align-items:center;justify-content:center;gap:14px;background:#f8f8f8e8;transition:opacity .5s ease;pointer-events:none}
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
  const loader=root.querySelector('.cojuka-video-loader');
  const dots=Array.from(root.parentElement.querySelectorAll('[data-video-index]'));
  const reduced=window.matchMedia('(prefers-reduced-motion: reduce)').matches;
  const state=videos.map(()=>({source:0,failed:false,loaded:false}));
  let active=0,request=0,timeout=null;
  function loading(on){if(loader)loader.classList.toggle('is-hidden',!on)}
  function dotsUpdate(){dots.forEach((b,i)=>{b.classList.toggle('is-active',i===active);b.setAttribute('aria-pressed',String(i===active));b.disabled=state[i].failed})}
  function next(){for(let j=1;j<=videos.length;j++){const i=(active+j)%videos.length;if(!state[i].failed){show(i);return}}loading(false)}
  function source(i){return state[i].source===0?videos[i].dataset.local:videos[i].dataset.remote}
  function fail(i){
   if(state[i].failed)return;
   if(state[i].source===0&&videos[i].dataset.remote){state[i].source=1;state[i].loaded=false;videos[i].src=source(i);videos[i].load();if(i===active)play(i);return}
   state[i].failed=true;videos[i].pause();videos[i].classList.remove('is-active');
   if(i===active)next();
  }
  function play(i){
   const v=videos[i];
   if(!v.src){v.src=source(i);v.load()}
   const p=v.play();
   if(p&&p.catch)p.catch(e=>{if(e&&e.name==='NotAllowedError'){loading(false);return}if(v.error)fail(i)});
  }
  function show(i){
   if(state[i].failed)return;
   active=i;const token=++request;
   clearTimeout(timeout);loading(!reduced);
   videos.forEach((v,j)=>{v.classList.toggle('is-active',i===j);if(j!==i)v.pause()});
   dotsUpdate();
   if(reduced){loading(false);return}
   play(i);
   if(videos[i].readyState>=2)loading(false);
   timeout=setTimeout(()=>{if(token!==request)return;if(videos[i].readyState<2)fail(i);else loading(false)},8500);
  }
  videos.forEach((v,i)=>{
   v.addEventListener('loadeddata',()=>{state[i].loaded=true;if(i===active)loading(false)});
   v.addEventListener('playing',()=>{if(i===active)loading(false)});
   v.addEventListener('error',()=>fail(i));
   v.addEventListener('ended',()=>{if(i===active&&!reduced)next()});
   v.addEventListener('waiting',()=>{if(i===active&&v.readyState<2)loading(true)});
  });
  dots.forEach((b,i)=>b.addEventListener('click',()=>show(i)));
  show(0);
 });
});
</script>
@endonce