<div class="cojuka-video-carousel" data-cojuka-video-carousel aria-label="Vidéos de présentation COJUKA" style="background:linear-gradient(90deg,rgba(7,12,23,.5),rgba(7,12,23,.15)),url('https://images.unsplash.com/photo-1600607687939-ce8a6c25118c?auto=format&fit=crop&w=2000&q=80') center/cover no-repeat">
 <video class="cojuka-carousel-video is-active" muted playsinline preload="metadata" autoplay poster="https://images.unsplash.com/photo-1600607687939-ce8a6c25118c?auto=format&fit=crop&w=1600&q=75" data-local="{{ asset('videos/cojuka-hero.mp4') }}" data-remote="https://d8j0ntlcm91z4.cloudfront.net/user_35sq0uUmKRerZDm8Ty4efx2WQSL/hf_20261015_161148_e24a7720-8b37-44eb-aa21-d63f68adde8b.mp4" aria-hidden="true"></video>
 <video class="cojuka-carousel-video" muted playsinline preload="none" poster="https://images.unsplash.com/photo-1600607687939-ce8a6c25118c?auto=format&fit=crop&w=1600&q=75" data-local="{{ asset('videos/cojuka-hero-2.mp4') }}" data-remote="https://d8j0ntlcm91z4.cloudfront.net/user_35sq0uUmKRerZDm8Ty4efx2WQSL/hf_20261015_161148_798130d0-0d7d-47fa-8c17-b7c076aa9bf3.mp4" aria-hidden="true"></video>
 <video class="cojuka-carousel-video" muted playsinline preload="none" poster="https://images.unsplash.com/photo-1600607687939-ce8a6c25118c?auto=format&fit=crop&w=1600&q=75" data-local="{{ asset('videos/cojuka-hero-3.mp4') }}" data-remote="https://d8j0ntlcm91z4.cloudfront.net/user_35sq0uUmKRerZDm8Ty4efx2WQSL/hf_20261015_161147_bbb8b8aa-ee22-4316-b29a-340e357d855c.mp4" aria-hidden="true"></video>
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
</style>
<script>
document.addEventListener('DOMContentLoaded',function(){
 document.querySelectorAll('[data-cojuka-video-carousel]').forEach(function(root){
  const videos=Array.from(root.querySelectorAll('video'));
  const controls=root.parentElement.querySelector('.cojuka-carousel-controls');
  const dots=controls?Array.from(controls.querySelectorAll('[data-video-index]')):[];
  const reduced=window.matchMedia('(prefers-reduced-motion: reduce)').matches;
  const status=videos.map(()=>({source:0,failed:false,ready:false}));
  let active=0,changing=false;
  function refreshDots(){
   dots.forEach((dot,i)=>{dot.classList.toggle('is-active',i===active);dot.setAttribute('aria-pressed',String(i===active));dot.disabled=status[i].failed;});
  }
  function sourceFor(i){
   return status[i].source===0?videos[i].dataset.local:videos[i].dataset.remote;
  }
  function loadSource(i){
   const video=videos[i];
   video.src=sourceFor(i);
   video.load();
  }
  function failSource(i){
   if(status[i].source===0){status[i].source=1;status[i].ready=false;loadSource(i);}
   else{status[i].failed=true;videos[i].pause();videos[i].classList.remove('is-active');refreshDots();if(i===active)nextAvailable();}
  }
  function start(i){
   if(status[i].failed)return;
   if(!videos[i].getAttribute('src'))loadSource(i);
   const attempt=videos[i].play();
   if(attempt&&typeof attempt.catch==='function')attempt.catch(function(err){
    if(err&&err.name==='NotAllowedError')return;
    if(videos[i].error)failSource(i);
   });
  }
  function show(i){
   if(i<0||i>=videos.length||status[i].failed)return;
   const old=videos[active];
   active=i;
   videos.forEach((v,j)=>{v.classList.toggle('is-active',j===i);if(j!==i)v.pause();});
   refreshDots();
   start(i);
  }
  function nextAvailable(){
   for(let step=1;step<=videos.length;step++){
    const i=(active+step)%videos.length;
    if(!status[i].failed){show(i);return;}
   }
   // The static background remains visible when every source is unavailable.
  }
  videos.forEach((video,i)=>{
   video.addEventListener('error',()=>failSource(i));
   video.addEventListener('ended',()=>{if(i===active&&!reduced)nextAvailable();});
   video.addEventListener('stalled',()=>{if(i===active&&video.readyState<2)video.dataset.stalled='1';});
  });
  dots.forEach((dot,i)=>dot.addEventListener('click',()=>show(i)));
  if(reduced){root.style.backgroundSize='cover';return;}
  show(0);
 });
});
</script>
@endonce