<div class="cojuka-video-carousel" data-cojuka-video-carousel aria-label="Diaporama vidéo COJUKA">
  <video class="cojuka-carousel-video is-active" muted autoplay playsinline preload="metadata" aria-hidden="true"><source src="{{ asset('videos/cojuka-hero.mp4') }}" type="video/mp4"><source src="https://d8j0ntlcm91z4.cloudfront.net/user_35sq0uUmKRerZDm8Ty4efx2WQSL/hf_20261015_161148_e24a7720-8b37-44eb-aa21-d63f68adde8b.mp4" type="video/mp4"></video>
  <video class="cojuka-carousel-video" muted playsinline preload="metadata" aria-hidden="true"><source src="{{ asset('videos/cojuka-hero-2.mp4') }}" type="video/mp4"><source src="https://d8j0ntlcm91z4.cloudfront.net/user_35sq0uUmKRerZDm8Ty4efx2WQSL/hf_20261015_161148_798130d0-0d7d-47fa-8c17-b7c076aa9bf3.mp4" type="video/mp4"></video>
  <video class="cojuka-carousel-video" muted playsinline preload="metadata" aria-hidden="true"><source src="{{ asset('videos/cojuka-hero-3.mp4') }}" type="video/mp4"><source src="https://d8j0ntlcm91z4.cloudfront.net/user_35sq0uUmKRerZDm8Ty4efx2WQSL/hf_20261015_161147_bbb8b8aa-ee22-4316-b29a-340e357d855c.mp4" type="video/mp4"></video>
</div>
<div class="cojuka-carousel-controls" role="group" aria-label="Choix de la vidéo">
    <button type="button" class="cojuka-carousel-dot is-active" data-video-index="0" aria-label="Afficher la vidéo 1" aria-pressed="true"></button>
    <button type="button" class="cojuka-carousel-dot" data-video-index="1" aria-label="Afficher la vidéo 2" aria-pressed="false"></button>
    <button type="button" class="cojuka-carousel-dot" data-video-index="2" aria-label="Afficher la vidéo 3" aria-pressed="false"></button>
</div>
@once
<style>
.cojuka-video-carousel{position:absolute;inset:0;overflow:hidden;z-index:0}
.cojuka-video-carousel .cojuka-carousel-video{position:absolute;inset:0;width:100%;height:100%;object-fit:cover;opacity:0;transition:opacity .8s ease;pointer-events:none}
.cojuka-video-carousel .cojuka-carousel-video.is-active{opacity:1}
.cojuka-carousel-controls{position:absolute;bottom:24px;left:50%;transform:translateX(-50%);z-index:6;display:flex;gap:12px;padding:10px 14px;border-radius:99px;background:rgba(0,0,0,.3)}
.cojuka-carousel-dot{width:12px;height:12px;padding:0;border:2px solid white;border-radius:50%;background:transparent;cursor:pointer}
.cojuka-carousel-dot.is-active{background:white}
.cojuka-carousel-dot:focus-visible{outline:3px solid #e8ba77;outline-offset:4px}
@media(prefers-reduced-motion:reduce){.cojuka-video-carousel .cojuka-carousel-video{transition:none}.cojuka-carousel-controls{display:none}}
</style>
<script>
document.addEventListener('DOMContentLoaded', function () {
 document.querySelectorAll('[data-cojuka-video-carousel]').forEach(function (root) {
  const videos = Array.from(root.querySelectorAll('video'));
  const controls = root.parentElement.querySelector('.cojuka-carousel-controls');
  const dots = controls ? Array.from(controls.querySelectorAll('[data-video-index]')) : [];
  const reduced = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
  let active = 0;
  let switching = false;
  function show(index) {
   if (reduced || switching || index === active) return;
   switching = true;
   const old = videos[active];
   const next = videos[index];
   try { next.currentTime = 0; } catch (e) {}
   const play = next.play();
   if (play && typeof play.catch === 'function') play.catch(function () { switching = false; });
   next.classList.add('is-active');
   old.classList.remove('is-active');
   old.pause();
   active = index;
   dots.forEach((dot, i) => {
    dot.classList.toggle('is-active', i === active);
    dot.setAttribute('aria-pressed', String(i === active));
   });
   window.setTimeout(() => { try { old.currentTime = 0; } catch(e) {} switching = false; }, 850);
  }
  function advance() {
   if (switching || reduced) return;
   show((active + 1) % videos.length);
  }
  videos.forEach((video, i) => {
   video.addEventListener('ended', () => { if (i === active) advance(); });
   video.addEventListener('error', () => { if (i === active) advance(); });
  });
  dots.forEach((dot, i) => dot.addEventListener('click', () => show(i)));
  if (reduced) { videos.forEach(v => v.pause()); return; }
  const start = videos[0].play();
  if (start && typeof start.catch === 'function') start.catch(() => { if(videos.length>1) show(1); });
 });
});
</script>
@endonce