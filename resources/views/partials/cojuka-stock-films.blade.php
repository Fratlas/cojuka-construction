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
   'poster'=>'https://images.pexels.com/videos/16106604/pexels-photo-16106604.jpeg?auto=compress&dpr=1&h=750&w=1260',
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
  [
   'title'=>'Construction d’un pont','category'=>'CONSTRUCTION',
   'desc'=>'Équipes sur chantier, bétonnage et grue : un aperçu réel de la réalisation d’infrastructures.',
   'src'=>'https://videos.pexels.com/video-files/35039426/14842959_2160_3840_30fps.mp4',
   'poster'=>'https://images.pexels.com/videos/35039426/pexels-photo-35039426.jpeg?auto=compress&dpr=1&h=750&w=1260',
   'credit'=>'SÀI GÒN CÔNG TY CP SẢN XUẤT - THƯƠNG MẠI · Pexels',
   'source'=>'https://www.pexels.com/video/construction-site-with-workers-and-crane-35039426/',
  ],
  [
   'title'=>'Génie civil & grues','category'=>'CONSTRUCTION',
   'desc'=>'Travaux sur une structure en construction : coordination des équipes et interventions en hauteur.',
   'src'=>'https://videos.pexels.com/video-files/31290739/13360377_3840_2160_30fps.mp4',
   'poster'=>'https://images.pexels.com/videos/31290739/construction-site-31290739.jpeg?auto=compress&dpr=1&h=750&w=1260',
   'credit'=>'The Capturist · Pexels',
   'source'=>'https://www.pexels.com/video/construction-site-with-crane-and-workers-31290739/',
  ],
  [
   'title'=>'Manutention portuaire','category'=>'LOGISTIQUE',
   'desc'=>'Un engin de manutention de conteneurs au sein d’un terminal international.',
   'src'=>'https://videos.pexels.com/video-files/31750579/13527183_1920_1080_25fps.mp4',
   'poster'=>'https://images.pexels.com/videos/31750579/large-container-loader-31750579.jpeg?auto=compress&dpr=1&h=750&w=1260',
   'credit'=>'Dominik Zítka · Pexels',
   'source'=>'https://www.pexels.com/video/container-loader-operating-at-a-busy-shipping-port-31750579/',
  ],
  [
   'title'=>'Terminal à conteneurs','category'=>'LOGISTIQUE',
   'desc'=>'Séquence aérienne réelle d’un port, de ses grues et de l’organisation des échanges maritimes.',
   'src'=>'https://videos.pexels.com/video-files/6618033/6618033-uhd_3840_2160_24fps.mp4',
   'poster'=>'https://images.pexels.com/videos/6618033/pexels-photo-6618033.jpeg?auto=compress&dpr=1&h=750&w=1260',
   'credit'=>'8K · Pexels',
   'source'=>'https://www.pexels.com/video/lifting-equipment-for-cargo-containers-6618033/',
  ],
  [
   'title'=>'Construction urbaine en accéléré','category'=>'CONSTRUCTION',
   'desc'=>'Évolution d’un grand chantier urbain filmé depuis les airs, avec les grues et les opérations du génie civil.',
   'src'=>'https://videos.pexels.com/video-files/5513060/5513060-hd_1920_1080_30fps.mp4',
   'poster'=>'https://images.pexels.com/videos/5513060/pexels-photo-5513060.jpeg?auto=compress&dpr=1&h=750&w=1260',
   'credit'=>'Site Engine · Pexels',
   'source'=>'https://www.pexels.com/video/timelapse-video-of-a-construction-site-5513060/',
   ],
  [
   'title'=>'Ingénieurs autour des plans','category'=>'CONSULTANCE',
   'desc'=>'Réunion technique autour de plans et de documents de projet, illustrant le conseil et la coordination.',
   'src'=>'https://videos.pexels.com/video-files/6285700/6285700-uhd_3840_2160_30fps.mp4',
   'poster'=>'https://images.pexels.com/videos/6285700/pexels-photo-6285700.jpeg?auto=compress&dpr=1&h=750&w=1260',
   'credit'=>'Gustavo Fring · Pexels',
   'source'=>'https://www.pexels.com/video/three-men-in-a-meeting-6285700/',
   ],
  [
   'title'=>'Chargement de conteneurs','category'=>'LOGISTIQUE',
   'desc'=>'Manutention réelle de marchandises dans un terminal portuaire avec véhicules et conteneurs.',
   'src'=>'https://videos.pexels.com/video-files/11801939/11801939-hd_1080_1920_30fps.mp4',
   'poster'=>'https://images.pexels.com/videos/11801939/pexels-photo-11801939.jpeg?auto=compress&dpr=1&h=750&w=1260',
   'credit'=>'Mike Hongkong 2 · Pexels',
   'source'=>'https://www.pexels.com/video/vehicle-carrying-container-in-warehouse-11801939/',
   'vertical'=>true,
   ],
  [
   'title'=>'Progression d’un chantier','category'=>'INFRASTRUCTURES',
   'desc'=>'Travaux de construction en accéléré, engins lourds et grues sur un projet d’infrastructure.',
   'src'=>'https://videos.pexels.com/video-files/7825537/7825537-hd_1920_1080_30fps.mp4',
   'poster'=>'https://images.pexels.com/videos/7825537/pexels-photo-7825537.jpeg?auto=compress&dpr=1&h=750&w=1260',
   'credit'=>'Site Engine · Pexels',
   'source'=>'https://www.pexels.com/video/construction-workers-at-a-construction-site-7825537/',
   ],
 ],
 'mining'=>[
  [
   'title'=>'Un site minier en mouvement','category'=>'EXPLOITATION',
   'desc'=>'Opérations de transport et d’extraction observées dans une carrière : une vue réelle des activités minières.',
   'src'=>'https://videos.pexels.com/video-files/17627281/17627281-uhd_3840_2160_24fps.mp4',
   'poster'=>'https://images.pexels.com/videos/17627281/building-site-construction-industry-construction-machinery-construction-site-17627281.jpeg?auto=compress&dpr=1&h=750&w=1260',
   'credit'=>'Be The Observer · Pexels',
   'source'=>'https://www.pexels.com/video/mining-site-17627281/',
  ],
  [
   'title'=>'Engins & travaux lourds','category'=>'MATÉRIELS',
   'desc'=>'Engins de chantier et déplacement de matériaux : images documentaires des équipements lourds.',
   'src'=>'https://videos.pexels.com/video-files/39894304/17017740_3840_2160_60fps.mp4',
   'poster'=>'https://images.pexels.com/videos/39894304/pexels-photo-39894304.jpeg?auto=compress&dpr=1&h=750&w=1260',
   'credit'=>'Faisal Ibne Kalam · Pexels',
   'source'=>'https://www.pexels.com/video/industrial-construction-site-with-heavy-equipment-39894304/',
  ],
  [
   'title'=>'Bulldozer en carrière','category'=>'CARRIÈRES',
   'desc'=>'Engin lourd en action dans une carrière de granulats filmée depuis les airs.',
   'src'=>'https://videos.pexels.com/video-files/30911573/13223535_3840_2160_30fps.mp4',
   'poster'=>'https://images.pexels.com/videos/30911573/pexels-photo-30911573.jpeg?auto=compress&dpr=1&h=750&w=1260',
   'credit'=>'8K · Pexels',
   'source'=>'https://www.pexels.com/video/bulldozer-in-action-at-quarry-site-30911573/',
  ],
  [
   'title'=>'Panorama d’une exploitation','category'=>'EXTRACTION',
   'desc'=>'Vue aérienne d’une vaste carrière et de son environnement opérationnel.',
   'src'=>'https://videos.pexels.com/video-files/31100080/13288380_3840_2160_60fps.mp4',
   'poster'=>'https://images.pexels.com/videos/31100080/pexels-photo-31100080.jpeg?auto=compress&dpr=1&h=750&w=1260',
   'credit'=>'Toàn BDS · Pexels',
   'source'=>'https://www.pexels.com/video/aerial-view-of-industrial-quarry-in-operation-31100080/',
  ],
  [
   'title'=>'Camion minier vu du ciel','category'=>'TRANSPORT MINIER',
   'desc'=>'Camion de transport dans une zone d’extraction : mouvements des matériaux au sein d’une carrière.',
   'src'=>'https://videos.pexels.com/video-files/30911540/13223553_3840_2160_30fps.mp4',
   'poster'=>'https://images.pexels.com/videos/30911540/pexels-photo-30911540.jpeg?auto=compress&dpr=1&h=750&w=1260',
   'credit'=>'8K · Pexels',
   'source'=>'https://www.pexels.com/video/drone-aerial-view-of-mining-dump-truck-30911540/',
  ],
  [
   'title'=>'Pelle mécanique à ciel ouvert','category'=>'EXPLOITATION',
   'desc'=>'Excavatrice en opération sur terrain rocheux dans une exploitation de type mine à ciel ouvert.',
   'src'=>'https://videos.pexels.com/video-files/35357100/14980550_3840_2160_30fps.mp4',
   'poster'=>'https://images.pexels.com/videos/35357100/pexels-photo-35357100.jpeg?auto=compress&dpr=1&h=750&w=1260',
   'credit'=>'celal keser · Pexels',
   'source'=>'https://www.pexels.com/video/excavator-operating-in-open-pit-mine-35357100/',
  ],
  [
   'title'=>'Chargement de matériaux','category'=>'ÉQUIPEMENTS',
   'desc'=>'Excavatrice chargeant un camion-benne : exemple de chaîne de manutention en carrière.',
   'src'=>'https://videos.pexels.com/video-files/36251027/15373413_3840_2160_30fps.mp4',
   'poster'=>'https://images.pexels.com/videos/36251027/pexels-photo-36251027.jpeg?auto=compress&dpr=1&h=750&w=1260',
   'credit'=>'celal keser · Pexels',
   'source'=>'https://www.pexels.com/video/excavator-loading-dump-truck-in-quarry-site-36251027/',
  ],
  [
   'title'=>'Carrière de sable en activité','category'=>'RESSOURCES',
   'desc'=>'Vue aérienne d’une carrière de sable avec engins d’excavation et circulation sur site.',
   'src'=>'https://videos.pexels.com/video-files/35025143/14838034_1920_1080_25fps.mp4',
   'poster'=>'https://images.pexels.com/videos/35025143/pexels-photo-35025143.jpeg?auto=compress&dpr=1&h=750&w=1260',
   'credit'=>'Progga Media · Pexels',
   'source'=>'https://www.pexels.com/video/aerial-view-of-sand-quarry-and-industrial-excavation-35025143/',
  ],
  [
   'title'=>'Camions dans une carrière','category'=>'MINING',
   'desc'=>'Vue aérienne d’une exploitation avec camions et excavatrices mobilisés sur le terrain.',
   'src'=>'https://videos.pexels.com/video-files/8382433/8382433-uhd_3840_2160_30fps.mp4',
   'poster'=>'https://images.pexels.com/videos/8382433/drone-extraction-mining-8382433.jpeg?auto=compress&dpr=1&h=750&w=1260',
   'credit'=>'Musko io · Pexels',
   'source'=>'https://www.pexels.com/video/aerial-video-of-trucks-on-a-mining-site-8382433/',
   ],
  [
   'title'=>'Carrière et engins en activité','category'=>'CARRIÈRES',
   'desc'=>'Panorama documentaire d’une carrière en exploitation, avec circulation d’engins lourds.',
   'src'=>'https://videos.pexels.com/video-files/8382436/8382436-uhd_3840_2160_30fps.mp4',
   'poster'=>'https://images.pexels.com/videos/8382436/drone-extraction-mining-8382436.jpeg?auto=compress&dpr=1&h=750&w=1260',
   'credit'=>'Musko io · Pexels',
   'source'=>'https://www.pexels.com/video/drone-footage-of-trucks-working-in-a-quarry-8382436/',
   ],
  [
   'title'=>'Extraction vue par drone','category'=>'EXTRACTION',
   'desc'=>'Vue plongeante des zones d’extraction et des opérations mécaniques dans une carrière.',
   'src'=>'https://videos.pexels.com/video-files/7779603/7779603-uhd_3840_2160_30fps.mp4',
   'poster'=>'https://images.pexels.com/videos/7779603/aerial-dig-drone-extract-7779603.jpeg?auto=compress&dpr=1&h=750&w=1260',
   'credit'=>'Musko io · Pexels',
   'source'=>'https://www.pexels.com/video/drone-shot-of-a-mine-7779603/',
   ],
  [
   'title'=>'Mine à ciel ouvert','category'=>'GÉOLOGIE',
   'desc'=>'Vue aérienne d’une mine à ciel ouvert et de ses couches de terrain, avec des engins de chantier.',
   'src'=>'https://videos.pexels.com/video-files/17275464/17275464-uhd_3840_2160_30fps.mp4',
   'poster'=>'https://images.pexels.com/videos/17275464/pexels-photo-17275464.jpeg?auto=compress&dpr=1&h=750&w=1260',
   'credit'=>'Siarhei Dalivelia · Pexels',
   'source'=>'https://www.pexels.com/video/an-aerial-view-of-a-quarry-with-trucks-17275464/',
   ],
  [
   'title'=>'Transport sur site minier','category'=>'TRANSPORT MINIER',
   'desc'=>'Un camion emprunte une piste de mine à ciel ouvert dans un paysage d’exploitation.',
   'src'=>'https://videos.pexels.com/video-files/9310149/9310149-uhd_3840_2160_30fps.mp4',
   'poster'=>'https://images.pexels.com/videos/9310149/pexels-photo-9310149.jpeg?auto=compress&dpr=1&h=750&w=1260',
   'credit'=>'Kevin Krämer · Pexels',
   'source'=>'https://www.pexels.com/video/drone-footage-of-a-truck-driving-on-a-mining-site-9310149/',
   ],
  [
   'title'=>'Chargement par excavatrice','category'=>'ENGINS',
   'desc'=>'Une pelle mécanique charge des matériaux dans un camion sur un site d’extraction.',
   'src'=>'https://videos.pexels.com/video-files/6565442/6565442-uhd_3840_2160_30fps.mp4',
   'poster'=>'https://images.pexels.com/videos/6565442/bc-canada-day-construction-dirt-6565442.jpeg?auto=compress&dpr=1&h=750&w=1260',
   'credit'=>'Rhys Abel · Pexels',
   'source'=>'https://www.pexels.com/video/a-back-hoe-excavator-putting-soil-in-a-truck-6565442/',
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
  <div class="cg-real-film-overview">
   <span><i class="bi bi-collection-play" aria-hidden="true"></i> {{ count($cojukaStockFilms) }} vidéos documentaires</span>
   <span><i class="bi bi-badge-hd" aria-hidden="true"></i> Full HD &amp; 4K</span>
   <span><i class="bi bi-play-btn" aria-hidden="true"></i> Lecture sur demande</span>
  </div>
  <div class="cg-real-film-grid cg-real-film-grid--{{ $cojukaStockContext }}" id="cg-film-grid-{{ $cojukaStockContext }}">
   @foreach($cojukaStockFilms as $film)
   <article class="cg-real-film-card{{ !empty($film['vertical']) ? ' cg-real-film-card--portrait' : '' }}">
    <div class="cg-real-film-media" data-cg-film-player>
     <video playsinline muted controls preload="none" poster="{{ $film['poster'] }}"
      aria-label="Vidéo documentaire : {{ $film['title'] }}"
      data-cg-film-src="{{ $film['src'] }}"></video>
     <button type="button" class="cg-real-film-launch" aria-label="Lire la vidéo : {{ $film['title'] }}">
      <span class="cg-real-film-play"><i class="bi bi-play-fill" aria-hidden="true"></i></span>
      <span>Voir la séquence</span>
     </button>
     <span class="cg-real-film-category">{{ $film['category'] }}</span>
     <span class="cg-real-film-quality">{{ preg_match('/(?:3840_2160|2160_3840)/', $film['src']) ? '4K' : 'HD' }}</span>
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
  <button type="button" class="cg-real-film-more" hidden
    aria-controls="cg-film-grid-{{ $cojukaStockContext }}" aria-expanded="false">
    <i class="bi bi-collection-play" aria-hidden="true"></i>
    <span>Afficher les autres vidéos</span>
    <i class="bi bi-arrow-down" aria-hidden="true"></i>
  </button>
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
.cg-real-film-media.is-loading .cg-real-film-play{opacity:.8;animation:cg-real-film-wait 1.8s ease-in-out infinite}
@keyframes cg-real-film-wait{50%{transform:scale(.9);opacity:.57}}
@media(prefers-reduced-motion:reduce){.cg-real-film-media.is-loading .cg-real-film-play{animation:none!important}}
.cg-real-film-overview{display:flex;align-items:center;flex-wrap:wrap;gap:9px 20px;margin:0 0 25px}
.cg-real-film-overview span{display:inline-flex;align-items:center;gap:8px;font-size:11px;font-weight:750;color:#667487}
.cg-real-film-overview i{font-size:15px;color:#65788d}
.cg-real-film-quality{position:absolute;top:15px;right:15px;z-index:2;pointer-events:none;border:1px solid rgba(255,255,255,.4);border-radius:8px;background:rgba(14,24,38,.78);color:#fff;padding:6px 10px;letter-spacing:.08em;font:800 10px/1.2 system-ui,sans-serif}
html[data-cojuka-theme="dark"] body.cojuka-glass-public .cg-real-film-overview :is(span,i){color:#e0e7f0!important}
/* New clips are progressively revealed, rather than creating an endless page. */
.cg-real-film-card[hidden],.cg-real-film-more[hidden]{display:none!important}
.cg-real-film-card--portrait .cg-real-film-media video{object-fit:contain}
.cg-real-film-more{display:flex;align-items:center;justify-content:center;gap:13px;
 margin:30px auto 4px;padding:14px 24px;border:1px solid #bcc7d5;border-radius:99px;
 background:#f7f9fc;color:#26374c;font-size:13px;font-weight:850;cursor:pointer;
 transition:background .18s,border-color .18s,transform .18s}
.cg-real-film-more:hover{background:#e6ebf2;border-color:#94a5b9;transform:translateY(-2px)}
.cg-real-film-more:focus-visible{outline:3px solid #8c9fb4;outline-offset:3px}
html[data-cojuka-theme="dark"] body.cojuka-glass-public .cg-real-film-more{
 background:#293649;color:#fff;border-color:#5d7085}
html[data-cojuka-theme="dark"] body.cojuka-glass-public .cg-real-film-more:hover{background:#43546a}
@media(prefers-reduced-motion:reduce){.cg-real-film-more{transition:none!important}}
</style>
<script>
(function(){
 'use strict';
 function init(){
  // Keep the first six cards instantly visible; reveal the others on demand.
  // With JavaScript disabled all 25 cards remain accessible.
  document.querySelectorAll('[data-cg-real-film]').forEach(section=>{
   const cards=Array.from(section.querySelectorAll('.cg-real-film-card'));
   const expand=section.querySelector('.cg-real-film-more');
   if(!expand||cards.length<=6)return;
   cards.slice(6).forEach(card=>{card.hidden=true});
   const label=expand.querySelector('span');
   if(label)label.textContent='Afficher '+(cards.length-6)+' autres vidéos';
   expand.hidden=false;
   expand.addEventListener('click',()=>{
    cards.slice(6).forEach(card=>{card.hidden=false});
    expand.setAttribute('aria-expanded','true');
    expand.hidden=true;
   });
  });
  document.querySelectorAll('[data-cg-film-player]').forEach(panel=>{
   const video=panel.querySelector('video[data-cg-film-src]');
   const launch=panel.querySelector('.cg-real-film-launch');
   const message=launch?.querySelector('span:last-child');
   const error=panel.querySelector('.cg-real-film-error');
   if(!video||!launch)return;
   let started=false,timeout=null,sequence=0;
   function reset(){
    panel.classList.remove('is-playing','is-loading');
    started=false;
    launch.removeAttribute('aria-busy');
    if(message)message.textContent='Voir la séquence';
   }
   function fail(token){
    if(token!==sequence)return;
    clearTimeout(timeout);
    reset();
    try{video.pause();video.removeAttribute('src');video.load()}catch(_error){}
    if(error)error.hidden=false;
   }
   launch.addEventListener('click',()=>{
    if(started)return;
    started=true;
    const token=++sequence;
    if(error)error.hidden=true;
    panel.classList.add('is-loading');
    launch.setAttribute('aria-busy','true');
    if(message)message.textContent='Chargement de la vidéo…';
    document.querySelectorAll('[data-cg-film-player] video').forEach(other=>{
     if(other!==video&&!other.paused)other.pause();
    });
    // A distant UHD video can be slow; no preload before explicit interaction.
    // A timeout retains the possibility of opening the publisher page.
    timeout=setTimeout(()=>fail(token),17000);
    video.src=video.dataset.cgFilmSrc;
    video.preload='metadata';
    video.load();
    const playing=video.play();
    if(playing&&typeof playing.then==='function'){
     playing.then(()=>{
      if(token!==sequence||!started)return;
      clearTimeout(timeout);
      panel.classList.remove('is-loading');
      panel.classList.add('is-playing');
      launch.removeAttribute('aria-busy');
      if(message)message.textContent='Voir la séquence';
     }).catch(()=>fail(token));
    }
   });
   video.addEventListener('error',()=>{if(started)fail(sequence)});
   document.addEventListener('visibilitychange',()=>{
    if(document.hidden&&!video.paused)video.pause();
   });
  });
 }
 if(document.readyState==='loading')document.addEventListener('DOMContentLoaded',init,{once:true});
 else init();
})();
</script>
@endonce