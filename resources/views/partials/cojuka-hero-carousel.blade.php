<div class="cojuka-video-carousel" data-cojuka-video-carousel aria-label="Diaporama vidéo COJUKA">
  <video class="cojuka-carousel-video is-active" muted autoplay playsinline preload="metadata" aria-hidden="true"><source src="{{ asset('videos/cojuka-hero.mp4') }}" type="video/mp4"></video>
  <video class="cojuka-carousel-video" muted playsinline preload="none" aria-hidden="true"><source src="{{ asset('videos/cojuka-hero-2.mp4') }}" type="video/mp4"></video>
  <div class="cojuka-carousel-controls" role="group" aria-label="Choix de la vidéo">
    <button type="button" class="cojuka-carousel-dot is-active" data-video-index="0" aria-label="Afficher la vidéo 1" aria-pressed="true"></button>
    <button type="button" class="cojuka-carousel-dot" data-video-index="1" aria-label="Afficher la vidéo 2" aria-pressed="false"></button>
  </div>
</div>
@once
<style>
.cojuka-video-carousel{position:absolute;inset:0;overflow:hidden;z-index:0}
.cojuka-video-carousel .cojuka-carousel-video{position:absolute;inset:0;width:100%;height:100%;object-fit:cover;opacity:0;transition:opacity .8s ease;pointer-events:none}
.cojuka-video-carousel .cojuka-carousel-video.is-active{opacity:1}
.cojuka-carousel-controls{position:absolute;bottom:24px;left:50%;transform:translateX(-50%);z-index:5;display:flex;gap:12px;padding:10px 14px;border-radius:99px;background:rgba(0,0,0,.3)}
.cojuka-carousel-dot{width:12px;height:12px;padding:0;border:2px solid white;border-radius:50%;background:transparent;cursor:pointer}
.cojuka-carousel-dot.is-active{background:white}
.cojuka-carousel-dot:focus-visible{outline:3px solid #e8ba77;outline-offset:4px}
@media(prefers-reduced-motion:reduce){.cojuka-video-carousel .cojuka-carousel-video{transition:none}.cojuka-carousel-controls{display:none}}
</style>
<script>
document.addEventListener('DOMContentLoaded',function(){
 document.querySelectorAll('[data-cojuka-video-carousel]').forEach(function(root){
  const videos=Array.from(root.querySelectorAll('video'));
  const dots=Array.from(root.querySelectorAll('[data-video-index]'));
  const reduced=window.matchMedia('(prefers-reduced-motion: reduce)').matches;
  let active=0;
  function show(index){
   if(reduced)return;
   const previous=active;active=index;
   videos.forEach((video,i)=>{video.classList.toggle('is-active',i===active);if(i!==active){video.pause();video.currentTime=0;}});
   dots.forEach((dot,i)=>{dot.classList.toggle('is-active',i===active);dot.setAttribute('aria-pressed',String(i===active));});
   const current=videos[active];current.load();current.play().catch(()=>{});
  }
  videos.forEach((video,i)=>{
   video.addEventListener('ended',()=>{if(i===active)show((i+1)%videos.length);});
   video.addEventListener('error',()=>{if(i===active && !reduced)show((i+1)%videos.length);});
   const source=video.querySelector('source');
   if(source)source.addEventListener('error',()=>{if(i===active && !reduced)show((i+1)%videos.length);});
  });
  dots.forEach((dot,i)=>dot.addEventListener('click',()=>show(i)));
  if(reduced){videos.forEach(v=>v.pause());return;}
  videos[0].play().catch(()=>{});
 });
});
</script>
@endonce