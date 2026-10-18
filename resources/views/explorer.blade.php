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
 'use strict';
 const scenes=@json($exploreSceneData);
 const byId=id=>document.getElementById(id);
 const stage=byId('cx-stage'),posters=[byId('cx-poster-a'),byId('cx-poster-b')],players=[byId('cx-video-a'),byId('cx-video-b')];
 const playButton=byId('cx-play'),muteButton=byId('cx-mute'),fullButton=byId('cx-fullscreen'),progress=byId('cx-progress'),timer=byId('cx-time'),note=byId('cx-note'),mode=byId('cx-mode');
 if(!stage||!scenes.length||players.some(v=>!v))return;
 const links={mining:'{{ route('group.profile','kojuka-mining') }}',construction:'{{ route('group.profile','construction') }}',logistique:'{{ route('group.profile','logistique') }}','eden-park-investments':'{{ route('group.profile','eden-park-investments') }}',consultance:'{{ route('group.profile','consultance') }}'};
 const reduced=window.matchMedia('(prefers-reduced-motion: reduce)').matches;
 const saveData=!!(navigator.connection&&navigator.connection.saveData);
 const photoDuration=9500;
 const state={index:0,active:1,poster:0,mode:'photo',wanted:!reduced&&!saveData,sound:false,started:false,inView:false,switching:false,token:0,photoElapsed:0,lastTick:performance.now(),timeout:null,cleanup:null};
 const cards=Array.from(document.querySelectorAll('[data-cx-index]'));
 function format(seconds){const n=Math.max(0,Math.floor(Number(seconds)||0));return String(Math.floor(n/60)).padStart(2,'0')+':'+String(n%60).padStart(2,'0')}
 function allowed(){return state.wanted&&state.inView&&!document.hidden}
 function notice(message){note.textContent=message}
 function sync(){
   playButton.textContent=state.wanted?'Ⅱ Mettre en pause':'▶ Reprendre la visite';
   playButton.setAttribute('aria-pressed',String(state.wanted));
   muteButton.textContent=state.sound?'🔊 Couper le son':'🔇 Activer le son';
   muteButton.setAttribute('aria-pressed',String(state.sound));
   mode.dataset.paused=String(!state.wanted);
   byId('cx-mode-text').textContent=!state.wanted?'Visite en pause':state.mode==='video'?'Visite automatique':'Visite illustrée automatique';
 }
 function information(index){
   const scene=scenes[index];
   byId('cx-title').textContent=scene.title;
   byId('cx-description').textContent=scene.description;
   byId('cx-counter').textContent=String(index+1).padStart(2,'0')+' / '+String(scenes.length).padStart(2,'0');
   byId('cx-link').href=links[scene.slug]||'{{ route('group.portal') }}';
   cards.forEach(card=>card.setAttribute('aria-current',String(Number(card.dataset.cxIndex)===index)));
 }
 function poster(index){
   const incoming=1-state.poster;
   posters[incoming].style.backgroundImage='url("'+scenes[index].poster+'")';
   posters[incoming].classList.add('is-visible');
   posters[state.poster].classList.remove('is-visible');
   state.poster=incoming;
 }
 function seekInfo(){
   if(state.mode==='video'){
     const v=players[state.active],duration=v.duration;
     if(Number.isFinite(duration)&&duration>0){
       progress.value=String(Math.min(100,100*v.currentTime/duration));
       timer.textContent=format(v.currentTime)+' / '+format(duration);
     }
   }else{
     progress.value=String(Math.min(100,state.photoElapsed/photoDuration*100));
     timer.textContent=format(state.photoElapsed/1000)+' / '+format(photoDuration/1000);
   }
 }
 function prepare(player,index){
   if(player.dataset.scene===String(index)&&player.getAttribute('src'))return;
   player.pause();
   player.removeAttribute('src');
   player.dataset.scene=String(index);
   player.preload='auto';
   player.src=scenes[index].video;
   player.load();
 }
 function cancelPending(){
   clearTimeout(state.timeout);
   clearTimeout(state.cleanup);
   state.timeout=null;state.cleanup=null;
   state.token++;
   state.switching=false;
   stage.classList.remove('cx-switching');
 }
 function finishTransition(){
   state.switching=false;
   stage.classList.remove('cx-switching');
   sync();
   seekInfo();
 }
 function showPhoto(index,token,reason){
   if(token!==state.token)return;
   clearTimeout(state.timeout);state.timeout=null;
   const old=players[state.active];
   players.forEach(v=>{v.pause();v.classList.remove('cx-active');v.style.zIndex='1'});
   old.pause();
   state.index=index;state.mode='photo';state.photoElapsed=0;
   poster(index);information(index);finishTransition();
   if(reason)notice(reason);
   else notice(reduced?'Mode sans animation : utilisez les flèches pour découvrir les univers.':saveData?'Mode économie de données : visite illustrée.':'Découverte automatique des secteurs · illustrations non contractuelles.');
 }
 function showVideo(index,slot,token){
   if(token!==state.token)return;
   clearTimeout(state.timeout);state.timeout=null;
   const previous=state.active,old=players[previous],incoming=players[slot];
   state.active=slot;state.index=index;state.mode='video';state.photoElapsed=0;
   poster(index);information(index);
   incoming.style.zIndex='2';old.style.zIndex='1';
   incoming.classList.add('cx-active');
   if(old!==incoming)old.classList.remove('cx-active');
   state.cleanup=window.setTimeout(()=>{
     if(state.active!==previous){old.pause();old.style.zIndex='1'}
     // Prepare the next video only after the outgoing fade finishes.
     if(token===state.token){const standby=players[1-state.active];prepare(standby,(state.index+1)%scenes.length)}
   },1300);
   finishTransition();
   notice('Lecture automatique · transitions douces entre les univers. Les vidéos sont des illustrations.');
   if(!allowed())incoming.pause();
 }
 function change(index){
   if(!state.started)return;
   const target=(index+scenes.length)%scenes.length;
   cancelPending();
   const token=state.token;
   state.switching=true;
   stage.classList.add('cx-switching');
   if(reduced||saveData||!state.wanted){showPhoto(target,token);return}
   const slot=1-state.active,incoming=players[slot];
   const loadFallback=()=>showPhoto(target,token,'La vidéo est momentanément indisponible : la visite continue avec des images.');
   state.timeout=window.setTimeout(loadFallback,6500);
   try{
     prepare(incoming,target);
     incoming.muted=!state.sound;
     incoming.volume=1;
     const started=incoming.play();
     if(started&&typeof started.then==='function'){
       started.then(()=>showVideo(target,slot,token)).catch(error=>{
         if(token!==state.token)return;
         if(error&&error.name==='AbortError')return;
         loadFallback();
       });
     }else{
       incoming.addEventListener('playing',()=>showVideo(target,slot,token),{once:true});
     }
   }catch(error){loadFallback()}
 }
 function resume(){
   if(!allowed()||state.switching)return;
   if(state.mode==='video'){
     players[state.active].muted=!state.sound;
     const p=players[state.active].play();
     if(p&&p.catch)p.catch(()=>{const token=state.token;showPhoto(state.index,token,'Lecture vidéo indisponible : le parcours continue avec les images.')});
   }
 }
 function pause(){players.forEach(v=>v.pause())}
 function setWanted(value){
   state.wanted=value;
   state.lastTick=performance.now();
   if(!value)pause();
   if(value&&state.started){
     if(state.mode==='video')resume();
     // Photo mode remains a timed automatic tour, and still works if videos fail.
   }
   sync();
 }
 // Clock handles both real video playback and timed poster fallback.
 window.setInterval(()=>{
   const now=performance.now(),elapsed=Math.max(0,Math.min(500,now-state.lastTick));
   state.lastTick=now;
   if(!state.started||state.switching||!allowed())return;
   if(state.mode==='photo'){
     state.photoElapsed+=elapsed;
     seekInfo();
     if(state.photoElapsed>=photoDuration)change(state.index+1);
   }else{
     const v=players[state.active],d=v.duration;
     seekInfo();
     if(Number.isFinite(d)&&d>2&&v.currentTime>=d-1.15)change(state.index+1);
   }
 },220);
 posters[0].style.backgroundImage='url("'+scenes[0].poster+'")';
 information(0);sync();seekInfo();
 cards.forEach(card=>card.addEventListener('click',()=>change(Number(card.dataset.cxIndex))));
 byId('cx-prev').addEventListener('click',()=>change(state.index-1));
 byId('cx-next').addEventListener('click',()=>change(state.index+1));
 playButton.addEventListener('click',()=>{
   if(!state.started){state.started=true;state.inView=true;setWanted(true);change(state.index);return}
   setWanted(!state.wanted);
 });
 muteButton.addEventListener('click',()=>{
   state.sound=!state.sound;
   players.forEach((v,i)=>{v.muted=!state.sound||i!==state.active});
   sync();
 });
 fullButton.addEventListener('click',()=>{
   if(document.fullscreenElement){document.exitFullscreen().catch(()=>{});return}
   if(!stage.requestFullscreen){notice('Le plein écran n’est pas disponible sur ce navigateur.');return}
   stage.requestFullscreen().catch(()=>notice('Le navigateur n’a pas autorisé le plein écran.'));
 });
 document.addEventListener('fullscreenchange',()=>{fullButton.textContent=document.fullscreenElement?'⤢ Quitter le plein écran':'⛶ Plein écran'});
 progress.addEventListener('input',()=>{
   if(state.switching)return;
   const v=players[state.active];
   if(state.mode==='video'&&Number.isFinite(v.duration)&&v.duration>0)v.currentTime=v.duration*Number(progress.value)/100;
   else state.photoElapsed=photoDuration*Number(progress.value)/100;
   seekInfo();
 });
 players.forEach((v,i)=>{
   v.addEventListener('ended',()=>{if(i===state.active&&state.mode==='video'&&!state.switching&&allowed())change(state.index+1)});
   v.addEventListener('error',()=>{
     if(i===state.active&&state.mode==='video')showPhoto(state.index,state.token,'La vidéo est indisponible : la visite continue en images.');
   });
 });
 document.addEventListener('keydown',event=>{
   const target=event.target;
   if(event.altKey||event.metaKey||event.ctrlKey||target.closest('input,textarea,select,button,[contenteditable="true"]')||!state.inView)return;
   if(event.key==='ArrowRight'){event.preventDefault();change(state.index+1)}
   if(event.key==='ArrowLeft'){event.preventDefault();change(state.index-1)}
 });
 document.addEventListener('visibilitychange',()=>{state.lastTick=performance.now();if(document.hidden)pause();else resume()});
 window.addEventListener('pagehide',()=>{cancelPending();pause()},{once:true});
 function observe(entry){
   state.inView=entry.isIntersecting;
   state.lastTick=performance.now();
   if(!state.started&&state.inView){
     state.started=true;
     if(state.wanted)change(0);
     else{information(0);sync()}
   }else if(!state.inView)pause();
   else resume();
 }
 if('IntersectionObserver' in window){
   const observer=new IntersectionObserver(entries=>entries.forEach(observe),{threshold:.12});
   observer.observe(stage);
 }else observe({isIntersecting:true});
})();
</script>
@endsection
