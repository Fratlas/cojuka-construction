@extends('layouts.cojuka-public')
@section('page_head')
<title>Explorer COJUKA | Immersion dans nos activités</title>
<meta name="description" content="Explorez les activités du groupe COJUKA en immersion vidéo interactive.">
<style>
/* COJUKA — immersive cinema tour; scoped so the rest of the site is unaffected. */
.cx-page{--cx-cream:#f9f2e6;--cx-gold:#e3bc87;--cx-red:#ae4150;background:#080d16;color:#fff;min-height:100svh;padding:clamp(42px,6vw,85px) 0 88px;overflow:hidden}
.cx-wrap{max-width:1600px;margin:auto;padding:0 clamp(16px,3.4vw,56px)}
.cx-heading{display:flex;align-items:end;justify-content:space-between;gap:24px;margin-bottom:clamp(20px,3vw,32px)}
.cx-eyebrow{color:var(--cx-gold);letter-spacing:.2em;text-transform:uppercase;font-size:clamp(10px,.9vw,12px);font-weight:750}
.cx-page h1{font-size:clamp(38px,5.2vw,80px);line-height:1.03;letter-spacing:-.065em;font-weight:770;margin:13px 0}
.cx-intro{max-width:560px;color:#aebcca;font-size:clamp(14px,1.2vw,17px);line-height:1.75;margin:0}
.cx-mode{display:inline-flex;align-items:center;gap:9px;flex-shrink:0;color:#d0d8e2;font-size:12px;letter-spacing:.035em;padding:10px 13px;background:#ffffff0d;border:1px solid #ffffff20;border-radius:99px}
.cx-mode-dot{height:7px;width:7px;border-radius:50%;background:#76d8a8;box-shadow:0 0 0 5px #76d8a81d}
.cx-mode[data-paused="true"] .cx-mode-dot{background:#f1c88a;box-shadow:0 0 0 5px #f1c88a1d}
.cx-stage{position:relative;isolation:isolate;overflow:hidden;border:1px solid #ffffff25;border-radius:clamp(18px,2vw,28px);background:linear-gradient(140deg,#1b2734,#080c15);height:min(73svh,850px);min-height:420px;box-shadow:0 30px 95px #0008}
.cx-poster,.cx-stage video{position:absolute;inset:0;width:100%;height:100%;object-fit:cover}
.cx-poster{z-index:0;opacity:0;transform:scale(1.055);background-size:cover;background-position:center;transition:opacity 1.25s ease,transform 10s ease}
.cx-poster.is-visible{opacity:1;transform:scale(1)}
.cx-stage video{z-index:1;opacity:0;pointer-events:none;filter:saturate(1.04) contrast(1.025);transition:opacity 1.15s cubic-bezier(.22,1,.36,1);object-position:center}
.cx-stage video.cx-active{opacity:1}
.cx-stage:after{content:"";position:absolute;inset:0;z-index:3;background:linear-gradient(90deg,rgba(4,8,16,.68),transparent 78%),linear-gradient(0deg,rgba(4,8,16,.88) 0%,rgba(4,8,16,.32) 31%,transparent 64%);pointer-events:none}
.cx-stage-top{position:absolute;z-index:5;top:clamp(17px,2vw,30px);left:clamp(18px,3vw,44px);right:clamp(18px,3vw,44px);display:flex;align-items:center;justify-content:space-between;gap:12px}
.cx-stage-label{display:inline-flex;align-items:center;gap:8px;color:#fff;font-size:11px;letter-spacing:.14em;text-transform:uppercase;font-weight:750;text-shadow:0 1px 14px #000}
.cx-stage-label:before{content:"";width:17px;height:1px;background:var(--cx-gold)}
.cx-stage-info{position:absolute;z-index:5;bottom:clamp(35px,5vw,68px);left:clamp(22px,5vw,74px);right:clamp(22px,5vw,74px);max-width:760px;transition:opacity .45s ease,transform .7s ease}
.cx-stage.cx-switching .cx-stage-info{opacity:.15;transform:translateY(16px)}
.cx-stage-info h2{font-size:clamp(36px,5.8vw,86px);font-weight:790;line-height:1.04;letter-spacing:-.065em;margin:15px 0 16px;color:white}
.cx-stage-info p{font-size:clamp(14px,1.35vw,19px);line-height:1.65;max-width:530px;color:#e1e9f1;margin-bottom:25px;text-shadow:0 1px 10px #0005}
.cx-stage-info a{display:inline-flex;align-items:center;gap:10px;color:#fff!important;border:1px solid #ffffff80;border-radius:99px;padding:12px 20px;text-decoration:none;font-size:13px;font-weight:650;background:#ffffff14;backdrop-filter:blur(8px);transition:background .2s,transform .2s}
.cx-stage-info a:hover{background:#ffffff36;transform:translateY(-2px)}
.cx-stage-count{font-size:12px;color:var(--cx-gold);font-weight:800;letter-spacing:.18em}
.cx-stage-side{position:absolute;z-index:5;right:clamp(18px,3vw,40px);top:50%;transform:translateY(-50%);display:flex;flex-direction:column;gap:9px}
.cx-stage-side button{width:40px;height:40px;border-radius:50%;background:#1119237a;border:1px solid #ffffff5c;color:#fff;font-size:20px;backdrop-filter:blur(10px);transition:background .2s,transform .2s}
.cx-stage-side button:hover{background:#86212e;transform:scale(1.06)}
.cx-controls{display:flex;align-items:center;gap:10px;margin:20px 0 6px;flex-wrap:wrap}
.cx-controls button{display:inline-flex;align-items:center;justify-content:center;gap:8px;border:1px solid #ffffff2c;background:#172331;color:#f7f8fb;border-radius:99px;padding:10px 16px;font-size:13px;font-weight:650;min-height:44px;transition:background .2s,border-color .2s}
.cx-controls button:hover,.cx-controls button[aria-pressed="true"]{background:#833045;border-color:#a85160}
.cx-controls button:focus-visible,.cx-stage button:focus-visible,.cx-stage a:focus-visible,.cx-card:focus-visible{outline:3px solid var(--cx-gold);outline-offset:3px}
.cx-progress-wrap{display:flex;align-items:center;gap:12px;flex:1 1 190px;min-width:140px;margin-left:auto}
.cx-progress{flex:1;min-width:95px;accent-color:var(--cx-gold);cursor:pointer;height:18px;background:transparent}
.cx-time{font-size:12px;color:#b6c6d2;white-space:nowrap;font-variant-numeric:tabular-nums}
.cx-grid{display:grid;grid-template-columns:repeat(5,minmax(0,1fr));gap:12px;margin-top:20px}
.cx-card{position:relative;border:1px solid #ffffff24;background:#15202d;color:#fff;border-radius:17px;overflow:hidden;text-align:left;padding:0;cursor:pointer;transition:transform .3s,background .3s,border-color .3s}
.cx-card:hover{transform:translateY(-4px);border-color:#ffffff87}
.cx-card[aria-current="true"]{border-color:var(--cx-gold);background:#26303e;box-shadow:0 0 0 1px var(--cx-gold)}
.cx-card img{width:100%;height:clamp(90px,10vw,150px);object-fit:cover;display:block;filter:saturate(.82);transition:filter .35s,transform .6s}
.cx-card:hover img,.cx-card[aria-current="true"] img{filter:saturate(1.05);transform:scale(1.035)}
.cx-card span{display:block;padding:13px 14px;font-size:clamp(11px,1vw,13px);font-weight:650}
.cx-card[aria-current="true"]:after{content:"";position:absolute;left:0;right:0;bottom:0;height:3px;background:var(--cx-gold)}
.cx-note{color:#aab8c8;font-size:12px;line-height:1.5;margin:17px 0 0;min-height:19px}
.cx-stage:fullscreen{width:100vw;height:100vh!important;min-height:0;border:0;border-radius:0}
.cx-stage:fullscreen .cx-stage-info{bottom:clamp(35px,6vh,90px)}
@media(max-width:950px){
 .cx-heading{align-items:flex-start;flex-direction:column}
 .cx-stage{height:64svh;min-height:420px}
 .cx-grid{grid-template-columns:repeat(3,minmax(0,1fr))}
}
@media(max-width:600px){
 .cx-page{padding-top:35px}
 .cx-stage{height:65svh;min-height:420px;border-radius:18px}
 .cx-stage-info{bottom:35px;right:22px}
 .cx-stage-info h2{font-size:clamp(36px,10vw,56px)}
 .cx-stage-info p{font-size:14px;margin-bottom:16px}
 .cx-stage-side{top:76px;right:12px;transform:none;flex-direction:row}
 .cx-stage-side button{width:36px;height:36px}
 .cx-stage-info a{padding:10px 15px;font-size:12px}
 .cx-grid{grid-template-columns:repeat(2,minmax(0,1fr));gap:9px}
 .cx-card span{padding:10px;font-size:11px}
 .cx-card img{height:95px}
 .cx-controls{gap:8px}
 .cx-controls button{padding:9px 12px;font-size:12px}
 .cx-progress-wrap{flex-basis:100%;margin:8px 0 0}
}
@media(prefers-reduced-motion:reduce){
 .cx-stage video,.cx-poster,.cx-stage-info,.cx-card,.cx-card img{transition:none!important;animation:none!important;transform:none!important}
}
</style>
@endsection
@section('content')
@php
$exploreScenes=[
 ['Mining','Découvrez les carrières, les ressources et la coordination des projets miniers.','mining','photo-1519003722824-194d4455a60c'],
 ['Construction','Explorez les chantiers, les bâtiments et les infrastructures.','construction','photo-1487958449943-2429e8be8625'],
 ['Logistique','Suivez les flux de marchandises et les opérations de transport.','logistique','photo-1586528116311-ad8dd3c8310d'],
 ['Eden Park Investments','Découvrez les perspectives immobilières et d’investissement.','eden-park-investments','photo-1600596542815-ffad4c1539a9'],
 ['Consultance & Impact Center','Entrez dans l’univers du conseil, des partenariats et de l’impact.','consultance','photo-1497366754035-f200968a6e72'],
];
$exploreVideoUrls=['https://d8j0ntlcm91z4.cloudfront.net/user_35sq0uUmKRerZDm8Ty4efx2WQSL/hf_20261018_055303_e5327436-5542-4802-b1a7-fcae58f0bb0d.mp4','https://d8j0ntlcm91z4.cloudfront.net/user_35sq0uUmKRerZDm8Ty4efx2WQSL/hf_20261018_055303_34a4da7d-b175-49de-86ac-1e635e123f02.mp4','https://d8j0ntlcm91z4.cloudfront.net/user_35sq0uUmKRerZDm8Ty4efx2WQSL/hf_20261018_055303_7e41daae-8e36-4770-9109-e5b61a934518.mp4','https://d8j0ntlcm91z4.cloudfront.net/user_35sq0uUmKRerZDm8Ty4efx2WQSL/hf_20261018_055303_58a64106-b04d-44dc-93ec-465dc705393d.mp4','https://d8j0ntlcm91z4.cloudfront.net/user_35sq0uUmKRerZDm8Ty4efx2WQSL/hf_20261018_055303_5c86fd41-237a-4d66-b40f-86ca5661c1b7.mp4'];
$exploreSceneData=[];
foreach($exploreScenes as $i=>$scene){
 $exploreSceneData[]=['title'=>$scene[0],'description'=>$scene[1],'slug'=>$scene[2],'poster'=>'https://images.unsplash.com/'.$scene[3].'?auto=format&fit=crop&w=1800&q=82','video'=>($exploreVideoUrls[$i] ?? asset('videos/explorer/scene-'.($i+1).'.mp4'))];
}
@endphp
<main class="cx-page"><div class="cx-wrap">
 <div class="cx-heading"><div><div class="cx-eyebrow">COJUKA · Expérience immersive</div>
 <h1>Explorer le groupe.</h1><p class="cx-intro">Parcourez automatiquement cinq univers du groupe, avec des transitions cinématographiques. Reprenez le contrôle à tout moment.</p></div><span class="cx-mode" id="cx-mode" data-paused="false"><span class="cx-mode-dot" aria-hidden="true"></span><span id="cx-mode-text">Visite automatique</span></span></div>
 <div class="cx-stage" id="cx-stage" aria-label="Exploration des activités COJUKA">
  <div class="cx-poster is-visible" id="cx-poster-a" aria-hidden="true"></div><div class="cx-poster" id="cx-poster-b" aria-hidden="true"></div>
  <video id="cx-video-a" playsinline webkit-playsinline preload="metadata" muted aria-hidden="true"></video><video id="cx-video-b" playsinline webkit-playsinline preload="metadata" muted aria-hidden="true"></video>
  <div class="cx-stage-top"><span class="cx-stage-label">Un voyage au cœur de nos secteurs</span><span class="cx-stage-count" id="cx-counter">01 / 05</span></div>
  <div class="cx-stage-side"><button id="cx-prev" type="button" aria-label="Scène précédente" title="Précédent">‹</button><button id="cx-next" type="button" aria-label="Scène suivante" title="Suivant">›</button></div>
  <div class="cx-stage-info"><span class="cx-eyebrow">COJUKA CONSULTING GROUP</span><h2 id="cx-title">Mining</h2><p id="cx-description"></p><a id="cx-link" href="{{ route('group.profile','kojuka-mining') }}" style="color:#fff;font-weight:700">Découvrir cette activité ↗</a></div>
 </div>
 <div class="cx-controls" role="group" aria-label="Commandes de la visite"><button id="cx-play" type="button" aria-pressed="true">Ⅱ Pause automatique</button><button id="cx-mute" type="button" aria-pressed="false">🔇 Activer le son</button><button id="cx-fullscreen" type="button" aria-label="Afficher l'expérience en plein écran">⛶ Plein écran</button><div class="cx-progress-wrap"><label for="cx-progress" class="visually-hidden">Progression de la scène</label><input id="cx-progress" class="cx-progress" type="range" min="0" max="100" value="0" aria-label="Progression de la scène"><span id="cx-time" class="cx-time">00:00</span></div></div>
 <div class="cx-grid" id="cx-grid">
 @foreach($exploreScenes as $i=>$scene)
 <button type="button" class="cx-card" data-cx-index="{{ $i }}" aria-current="{{ $i===0?'true':'false' }}"><img loading="lazy" src="https://images.unsplash.com/{{ $scene[3] }}?auto=format&fit=crop&w=450&q=72" alt=""><span>{{ str_pad($i+1,2,'0',STR_PAD_LEFT) }} · {{ $scene[0] }}</span></button>
 @endforeach
 </div>
 <p class="cx-note" id="cx-note">L’expérience démarre automatiquement, sans son. Les images et vidéos servent à illustrer les secteurs du groupe.</p>
</div></main>
@endsection
@section('page_scripts')
<script>
(function(){
 const scenes=@json($exploreSceneData);
 const stage=document.getElementById('cx-stage'),poster=document.getElementById('cx-poster'),players=[document.getElementById('cx-video-a'),document.getElementById('cx-video-b')],play=document.getElementById('cx-play'),progress=document.getElementById('cx-progress'),note=document.getElementById('cx-note');
 const links={mining:'{{ route('group.profile','kojuka-mining') }}',construction:'{{ route('group.profile','construction') }}',logistique:'{{ route('group.profile','logistique') }}','eden-park-investments':'{{ route('group.profile','eden-park-investments') }}',consultance:'{{ route('group.profile','consultance') }}'};
 const reduced=window.matchMedia('(prefers-reduced-motion: reduce)').matches;
 let current=0,active=0,serial=0,playing=false,sound=false,transitioning=false;
 const format=n=>String(Math.floor(n/60)).padStart(2,'0')+':'+String(Math.floor(n%60)).padStart(2,'0');
 function syncButtons(){play.textContent=playing?'Ⅱ Pause':'▶ Lecture';document.getElementById('cx-mute').textContent=sound?'🔊 Son':'🔇 Son'}
 function updateInfo(){const s=scenes[current];document.getElementById('cx-title').textContent=s.title;document.getElementById('cx-description').textContent=s.description;document.getElementById('cx-counter').textContent=String(current+1).padStart(2,'0')+' / '+String(scenes.length).padStart(2,'0');document.getElementById('cx-link').href=links[s.slug]||'{{ route('group.portal') }}';document.querySelectorAll('[data-cx-index]').forEach(b=>b.setAttribute('aria-current',String(Number(b.dataset.cxIndex)===current)))}
 function prepare(v,index){if(v.dataset.scene!==String(index)){v.pause();v.src=scenes[index].video;v.dataset.scene=String(index);v.load()}v.muted=!sound;v.volume=1}
 function preloadNext(){const v=players[1-active];if(transitioning)return;prepare(v,(current+1)%scenes.length)}
 function switchScene(index,autoplay=true){
  const target=(index+scenes.length)%scenes.length;
  if(target===current&&playing)return;
  const token=++serial,old=players[active],nextIndex=1-active,next=players[nextIndex];
  transitioning=true;current=target;stage.classList.add('cx-switching');
  prepare(next,current);next.currentTime=0;next.muted=!sound;
  const reveal=()=>{
   if(token!==serial)return;
   updateInfo();poster.style.backgroundImage='url("'+scenes[current].poster+'")';
   const show=()=>{
    if(token!==serial)return;
    next.classList.add('cx-active');old.classList.remove('cx-active');stage.classList.add('cx-live');
    active=nextIndex;playing=autoplay;syncButtons();
    window.setTimeout(()=>{if(token!==serial)return;old.pause();old.classList.remove('cx-active');stage.classList.remove('cx-switching');transitioning=false;preloadNext()},reduced?0:1500);
   };
   if(autoplay){next.play().then(show).catch(()=>{playing=false;syncButtons();show();playing=false;syncButtons();note.textContent='Appuyez sur Lecture pour activer la vidéo.'})}
   else{next.pause();show()}
   note.textContent='Exploration immersive · passage fluide entre les univers';
  };
  if(next.readyState>=2){reveal();return}
  let done=false;
  const ready=()=>{if(done)return;done=true;next.removeEventListener('loadeddata',ready);next.removeEventListener('error',failed);reveal()};
  const failed=()=>{if(done)return;done=true;next.removeEventListener('loadeddata',ready);next.removeEventListener('error',failed);if(token===serial){transitioning=false;stage.classList.remove('cx-switching');note.textContent='Chargement vidéo indisponible. Réessayez.'}};
  next.addEventListener('loadeddata',ready);next.addEventListener('error',failed);
 }
 function start(){prepare(players[0],0);poster.style.backgroundImage='url("'+scenes[0].poster+'")';updateInfo();players[0].play().then(()=>{players[0].classList.add('cx-active');stage.classList.add('cx-live');playing=true;syncButtons();preloadNext()}).catch(()=>{playing=false;syncButtons();note.textContent='Appuyez sur Lecture pour démarrer l’expérience.'})}
 document.querySelectorAll('[data-cx-index]').forEach(b=>b.addEventListener('click',()=>switchScene(Number(b.dataset.cxIndex))));
 document.getElementById('cx-prev').addEventListener('click',()=>switchScene(current-1));
 document.getElementById('cx-next').addEventListener('click',()=>switchScene(current+1));
 play.addEventListener('click',()=>{const v=players[active];if(playing){v.pause();playing=false;syncButtons()}else{v.play().then(()=>{playing=true;syncButtons()}).catch(()=>{note.textContent='Lecture bloquée : réessayez.'})}});
 document.getElementById('cx-mute').addEventListener('click',()=>{sound=!sound;players.forEach((v,i)=>v.muted=!sound||i!==active);syncButtons()});
 players.forEach(v=>{v.addEventListener('timeupdate',()=>{if(v!==players[active]||transitioning||!v.duration)return;progress.value=100*v.currentTime/v.duration;document.getElementById('cx-time').textContent=format(v.currentTime);if(playing&&v.duration-v.currentTime<1.45&&v.duration>2){switchScene(current+1)}});v.addEventListener('ended',()=>{if(v===players[active]&&!transitioning)switchScene(current+1)})});
 progress.addEventListener('input',()=>{const v=players[active];if(v.duration)v.currentTime=v.duration*progress.value/100});
 document.addEventListener('keydown',e=>{if(e.target.matches('input,textarea,button'))return;if(e.key==='ArrowRight')switchScene(current+1);if(e.key==='ArrowLeft')switchScene(current-1)});
 document.addEventListener('visibilitychange',()=>{if(document.hidden){players.forEach(v=>v.pause());playing=false;syncButtons()}});
 start();
})();
</script>
@endsection
