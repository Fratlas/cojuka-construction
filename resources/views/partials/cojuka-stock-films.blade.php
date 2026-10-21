@php
/*
 * Real-world documentary footage, chosen from Pexels Free License.
 * These are STOCK illustrations — NOT filmed on any COJUKA property.
 * Download URLs below resolve to the publisher's video CDN, which may
 * change. Playback is on demand; never preload 4K stock on page load.
 */
$cojukaStockContext=$cojukaStockContext??'home';
$cojukaStockFilms=[
 'home'=>[
  [
   'title'=>'Extraction & carrières','category'=>'MINING',
   'desc'=>'Vue aérienne d’une carrière en activité. Des images documentaires pour illustrer les réalités de l’industrie extractive.',
   'src'=>'https://videos.pexels.com/video-files/30789021/13169175_3840_2160_30fps.mp4',
   'poster'=>'https://images.pexels.com/videos/30789021/pexels-photo-30789021.jpeg?auto=compress&dpr=1&h=750&w=1260',
   'credit'=>'David Pickup · Pexels',
   'source'=>'https://www.pexels.com/video/aerial-view-of-industrial-mining-site-operation-30789021/',
  ],
  [
   'title'=>'Chantiers & infrastructures','category'=>'CONSTRUCTION',
   'desc'=>'Travaux, structures et équipes sur un chantier réel : la dimension concrète des métiers de la construction.',
   'src'=>'https://videos.pexels.com/video-files/16106604/16106604-uhd_3840_2160_30fps.mp4',
   'poster'=>'https://images.unsplash.com/photo-1504307651254-35680f356dfd?auto=format&fit=crop&w=900&q=75&fm=webp',
   'credit'=>'Sururi Ballıdağ · Pexels',
   'source'=>'https://www.pexels.com/video/men-working-at-a-construction-site-16106604/',
  ],
  [
   'title'=>'Transport & terminaux portuaires','category'=>'LOGISTIQUE',
   'desc'=>'Grues, conteneurs et opérations maritimes : une illustration des chaînes logistiques internationales.',
   'src'=>'https://videos.pexels.com/video-files/32746857/13960902_3840_2160_60fps.mp4',
   'poster'=>'https://images.pexels.com/videos/32746857/cai-mep-port-cai-mep-thi-vai-container-port-container-terminals-32746857.jpeg?auto=compress&dpr=1&h=750&w=1260',
   'credit'=>'Toàn BDS · Pexels',
   'source'=>'https://www.pexels.com/video/aerial-view-of-container-port-operations-32746857/',
  ],
 ],
 'mining'=>[
  [
   'title'=>'Un site minier en mouvement','category'=>'EXPLOITATION',
   'desc'=>'Opérations de transport et d’extraction observées dans une carrière : une vue réelle des activités minières.',
   'src'=>'https://videos.pexels.com/video-files/17627281/17627281-uhd_3840_2160_24fps.mp4',
   'poster'=>'https://images.unsplash.com/photo-1513828583688-c52646db42da?auto=format&fit=crop&w=900&q=75&fm=webp',
   'credit'=>'Be The Observer · Pexels',
   'source'=>'https://www.pexels.com/video/mining-site-17627281/',
  ],
  [
   'title'=>'Engins & travaux lourds','category'=>'MATÉRIELS',
   'desc'=>'Engins de chantier et déplacement de matériaux : images documentaires des équipements lourds.',
   'src'=>'https://videos.pexels.com/video-files/39894304/17017740_3840_2160_60fps.mp4',
   'poster'=>'https://images.unsplash.com/photo-1504307651254-35680f356dfd?auto=format&fit=crop&w=900&q=75&fm=webp',
   'credit'=>'Faisal Ibne Kalam · Pexels',
   'source'=>'https://www.pexels.com/video/industrial-construction-site-with-heavy-equipment-39894304/',
  ],
 ],
];
$cojukaStockFilms=$cojukaStockFilms[$cojukaStockContext]??$cojukaStockFilms['home'];
@endphp
<section class="cg-real-film-section" aria-labelledby="cg-stock-film-title-{{ $cojukaStockContext }}" data-cg-real-film>
 <div class="container">
  <div class="cg-real-film-intro">
   <div>
    <p class="cg-real-film-eyebrow"><span class="cg-real-film-rule" aria-hidden="true"></span> DOCUMENTAIRE · IMAGES RÉELLES</p>
    <h2 id="cg-stock-film-title-{{ $cojukaStockContext }}">
     @if($cojukaStockContext==='mining') L'univers minier <em>sur le terrain.</em>
     @else Des métiers en <em>mouvement.</em>
     @endif
    </h2>
   </div>
   <p class="cg-real-film-intro-text">Au-delà des créations audiovisuelles, découvrez des séquences filmées sur de véritables sites industriels, chantiers et infrastructures.</p>
  </div>
  <div class="cg-real-film-grid cg-real-film-grid--{{ $cojukaStockContext }}">
   @foreach($cojukaStockFilms as $film)
   <article class="cg-real-film-card">
    <div class="cg-real-film-media" data-cg-film-player>
     <video playsinline muted controls preload="none" poster="{{ $film['poster'] }}"
      aria-label="Vidéo documentaire : {{ $film['title'] }}"
      data-cg-film-src="{{ $film['src'] }}"></video>
     <button type="button" class="cg-real-film-launch" aria-label="Lire la vidéo : {{ $film['title'] }}">
      <span class="cg-real-film-play"><i class="bi bi-play-fill" aria-hidden="true"></i></span>
      <span>Voir la séquence</span>
     </button>
     <span class="cg-real-film-category">{{ $film['category'] }}</span>
     <div class="cg-real-film-error" role="status" hidden>La vidéo n’est pas disponible ici. <a href="{{ $film['source'] }}" target="_blank" rel="noopener noreferrer">Ouvrir la source sur Pexels ↗</a></div>
    </div>
    <div class="cg-real-film-body">
     <h3>{{ $film['title'] }}</h3>
     <p>{{ $film['desc'] }}</p>
     <a href="{{ $film['source'] }}" target="_blank" rel="noopener noreferrer" class="cg-real-film-source">
       {{ $film['credit'] }} <i class="bi bi-box-arrow-up-right" aria-hidden="true"></i>
     </a>
    </div>
   </article>
   @endforeach
  </div>
  <p class="cg-real-film-notice"><i class="bi bi-info-circle" aria-hidden="true"></i>
   Vidéos de stock utilisées à titre d’illustration, sous <a href="https://www.pexels.com/license/" target="_blank" rel="noopener noreferrer">licence gratuite Pexels</a>.
   Les séquences ne représentent pas des chantiers ou sites miniers appartenant à COJUKA.
   La lecture est activée à votre demande pour limiter le chargement des données.
  </p>
 </div>
</section>
@once
<style>
.cg-real-film-section{background:#FFFFFF;color:#202b3b;padding:clamp(50px,6vw,84px) 0!important}
.cg-real-film-intro{display:grid;grid-template-columns:minmax(0,1.25fr) minmax(0,.75fr);align-items:end;gap:24px;margin:0 0 30px}
.cg-real-film-eyebrow{display:flex;align-items:center;gap:10px;margin:0 0 15px;font-size:11px;letter-spacing:.17em;font-weight:820;color:#637181!important}
.cg-real-film-rule{height:1px;width:30px;background:#7b8b9e}
.cg-real-film-intro h2{font-size:clamp(2.25rem,4.2vw,4.3rem);line-height:1.04;letter-spacing:-.06em;font-weight:850;color:#1b2838;margin:0}
.cg-real-film-intro h2 em{font-style:normal;color:#626f80}
.cg-real-film-intro-text{font-size:15px;line-height:1.75;color:#5c6b7c!important;margin:0}
.cg-real-film-grid{display:grid;grid-template-columns:repeat(3,minmax(0,1fr));gap:18px}
.cg-real-film-grid--mining{grid-template-columns:repeat(2,minmax(0,1fr))}
.cg-real-film-card{border:1px solid #e2e8ee;border-radius:22px;overflow:hidden;min-width:0;background:#fff;box-shadow:0 14px 35px rgba(20,30,45,.07)}
.cg-real-film-media{position:relative;background:#111a27;aspect-ratio:16/10;overflow:hidden}
.cg-real-film-media video{width:100%;height:100%;object-fit:cover;display:block;background:#111a27}
.cg-real-film-launch{position:absolute;inset:0;display:flex;flex-direction:column;align-items:center;justify-content:center;gap:13px;border:0;padding:20px;cursor:pointer;background:linear-gradient(180deg,rgba(12,19,30,.08),rgba(12,19,30,.12));color:#fff;font-weight:800;font-size:13px;text-shadow:0 2px 10px rgba(0,0,0,.55)}
.cg-real-film-launch:hover{background:rgba(17,24,38,.13)}
.cg-real-film-play{display:grid;place-items:center;height:60px;width:60px;background:rgba(255,255,255,.95);color:#172535;border-radius:50%;font-size:26px;box-shadow:0 14px 30px rgba(7,14,26,.2);transition:transform .2s}
.cg-real-film-launch:hover .cg-real-film-play{transform:scale(1.08)}
.cg-real-film-category{position:absolute;top:15px;left:15px;pointer-events:none;color:#fff;background:rgba(16,26,42,.7);border:1px solid rgba(255,255,255,.3);border-radius:8px;padding:6px 11px;font-size:10px;letter-spacing:.12em;font-weight:800}
.cg-real-film-media.is-playing .cg-real-film-launch,.cg-real-film-media.is-playing .cg-real-film-category{display:none}
.cg-real-film-error[hidden]{display:none!important}
.cg-real-film-error{position:absolute;bottom:10px;left:10px;right:10px;background:rgba(20,30,45,.95);padding:13px;color:#fff;font-size:12px;line-height:1.6;border-radius:12px}
.cg-real-film-error a{color:#fff;text-decoration:underline}
.cg-real-film-body{padding:21px}
.cg-real-film-body h3{font-size:clamp(17px,1.5vw,21px);font-weight:850;line-height:1.2;color:#1d2a3b;letter-spacing:-.032em;margin:0 0 9px}
.cg-real-film-body p{font-size:13px;line-height:1.7;color:#647284;margin:0 0 14px}
.cg-real-film-source{font-size:12px;font-weight:740;color:#526273;text-decoration:underline;text-underline-offset:3px}
.cg-real-film-notice{margin:19px 0 0;color:#617084!important;font-size:12px;line-height:1.65}
.cg-real-film-notice a{color:inherit;text-decoration:underline}
html[data-cojuka-theme="dark"] body.cojuka-glass-public .cg-real-film-section{background:#161f2b!important;color:#fff}
html[data-cojuka-theme="dark"] body.cojuka-glass-public .cg-real-film-card{background:#233044;border-color:#405064}
html[data-cojuka-theme="dark"] body.cojuka-glass-public .cg-real-film-intro h2,
html[data-cojuka-theme="dark"] body.cojuka-glass-public .cg-real-film-intro h2 em,
html[data-cojuka-theme="dark"] body.cojuka-glass-public .cg-real-film-body h3{color:#fff!important}
html[data-cojuka-theme="dark"] body.cojuka-glass-public :is(.cg-real-film-intro-text,.cg-real-film-body p,.cg-real-film-notice,.cg-real-film-source,.cg-real-film-eyebrow){color:#d0dbea!important}
@media(max-width:900px){.cg-real-film-grid{grid-template-columns:repeat(2,minmax(0,1fr))}.cg-real-film-intro{grid-template-columns:1fr;gap:14px}}
@media(max-width:600px){.cg-real-film-grid{grid-template-columns:1fr}.cg-real-film-section{padding:38px 0!important}.cg-real-film-media{aspect-ratio:16/10}}
@media(prefers-reduced-motion:reduce){.cg-real-film-play{transition:none!important}}
</style>
<script>
(function(){
 'use strict';
 function init(){
  document.querySelectorAll('[data-cg-film-player]').forEach(panel=>{
   const video=panel.querySelector('video[data-cg-film-src]');
   const launch=panel.querySelector('.cg-real-film-launch');
   const error=panel.querySelector('.cg-real-film-error');
   if(!video||!launch)return;
   let started=false;
   launch.addEventListener('click',()=>{
    if(started)return;
    started=true;
    // Only one documentary video plays at a time, keeping CPU/bandwidth low.
    document.querySelectorAll('[data-cg-film-player] video').forEach(other=>{
     if(other!==video&&!other.paused)other.pause();
    });
    video.src=video.dataset.cgFilmSrc;
    video.preload='metadata';
    video.load();
    video.play().then(()=>{
     panel.classList.add('is-playing');
     if(error)error.hidden=true;
    }).catch(()=>{
     started=false;
     video.removeAttribute('src');
     video.load();
     if(error)error.hidden=false;
    });
   });
   video.addEventListener('error',()=>{
    started=false;
    if(error)error.hidden=false;
    panel.classList.remove('is-playing');
   });
  });
 }
 if(document.readyState==='loading')document.addEventListener('DOMContentLoaded',init,{once:true});
 else init();
})();
</script>
@endonce