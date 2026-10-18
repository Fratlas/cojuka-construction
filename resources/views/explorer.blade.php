@extends('layouts.cojuka-public')
@section('page_head')
<title>Explorer COJUKA | Immersion dans nos activités</title>
<meta name="description" content="Explorez les activités du groupe COJUKA en immersion vidéo interactive.">
<style>
.cx-page{background:#070b13;color:#fff;min-height:100vh;padding:105px 0 85px}.cx-wrap{max-width:1250px;margin:auto;padding:0 20px}.cx-eyebrow{color:#d4a971;letter-spacing:.24em;text-transform:uppercase;font-size:12px;font-weight:800}.cx-page h1{font-size:clamp(38px,6vw,76px);letter-spacing:-.055em;font-weight:850;margin:15px 0}.cx-intro{max-width:690px;color:#b8c4d1;font-size:17px}.cx-stage{position:relative;overflow:hidden;border:1px solid #ffffff30;border-radius:25px;margin-top:32px;background:#111a25;aspect-ratio:16/8.5;min-height:310px}.cx-stage video,.cx-stage .cx-poster{position:absolute;inset:0;width:100%;height:100%;object-fit:cover}.cx-stage .cx-poster{background-size:cover;background-position:center;transition:transform 1.3s}.cx-stage video{opacity:0;transition:opacity 1.45s cubic-bezier(.22,1,.36,1);transform:scale(1.025);filter:saturate(1.06);will-change:opacity}.cx-stage video.cx-active{opacity:1}.cx-stage .cx-poster{transition:opacity 1.2s ease,transform 8s linear;transform:scale(1.06)}.cx-stage.cx-live .cx-poster{opacity:0}.cx-stage:after{content:"";position:absolute;inset:0;background:linear-gradient(0deg,#060a13 0%,transparent 75%);pointer-events:none}.cx-stage-info{transition:opacity .7s ease,transform .9s ease}.cx-stage.cx-switching .cx-stage-info{opacity:.25;transform:translateY(12px)}.cx-stage-info{position:absolute;z-index:2;bottom:30px;left:clamp(18px,4vw,55px);right:25px}.cx-stage-info h2{font-size:clamp(30px,4vw,55px);font-weight:800}.cx-stage-info p{max-width:550px;color:#e4e9ee}.cx-controls{display:flex;flex-wrap:wrap;align-items:center;gap:10px;margin:20px 0}.cx-controls button,.cx-controls a{background:#1c2735;color:#fff;border:1px solid #ffffff40;border-radius:99px;padding:10px 17px;text-decoration:none}.cx-controls button:hover,.cx-controls button[aria-pressed=true]{background:#9b2636}.cx-progress{flex:1;min-width:140px;accent-color:#c44755}.cx-grid{display:grid;grid-template-columns:repeat(5,minmax(0,1fr));gap:12px;margin-top:24px}.cx-card{border:1px solid #ffffff35;background:#121d29;color:white;border-radius:16px;overflow:hidden;text-align:left;padding:0;cursor:pointer}.cx-card[aria-current=true]{outline:2px solid #dca98a}.cx-card img{width:100%;height:112px;object-fit:cover}.cx-card span{display:block;padding:12px;font-size:13px;font-weight:700}.cx-note{color:#a8b7c7;font-size:13px;margin-top:18px}@media(prefers-reduced-motion:reduce){.cx-stage video,.cx-stage .cx-poster,.cx-stage-info{transition:none!important}}@media(max-width:800px){.cx-grid{grid-template-columns:repeat(2,minmax(0,1fr))}.cx-stage{aspect-ratio:4/5}.cx-stage-info{bottom:22px}.cx-card img{height:100px}}
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
 <div class="cx-eyebrow">COJUKA · Expérience immersive</div>
 <h1>Explorer le groupe.</h1><p class="cx-intro">Une exploration progressive de nos activités. Choisissez un univers, avancez à votre rythme et découvrez les projets qui façonnent notre vision.</p>
 <div class="cx-stage" id="cx-stage" aria-label="Exploration des activités COJUKA">
  <div class="cx-poster" id="cx-poster"></div><video id="cx-video-a" playsinline preload="auto" muted></video><video id="cx-video-b" playsinline preload="auto" muted></video>
  <div class="cx-stage-info"><span class="cx-eyebrow" id="cx-counter">01 / 05</span><h2 id="cx-title">Mining</h2><p id="cx-description"></p><a id="cx-link" href="{{ route('group.profile','kojuka-mining') }}" style="color:#fff;font-weight:700">Découvrir cette activité ↗</a></div>
 </div>
 <div class="cx-controls"><button id="cx-prev" type="button" aria-label="Scène précédente">← Précédent</button><button id="cx-play" type="button">▶ Lecture</button><button id="cx-next" type="button" aria-label="Scène suivante">Suivant →</button><button id="cx-mute" type="button">🔇 Son</button><label for="cx-progress" class="visually-hidden">Progression de la scène</label><input id="cx-progress" class="cx-progress" type="range" min="0" max="100" value="0"><span id="cx-time" aria-live="polite">00:00</span></div>
 <div class="cx-grid" id="cx-grid">
 @foreach($exploreScenes as $i=>$scene)
 <button type="button" class="cx-card" data-cx-index="{{ $i }}" aria-current="{{ $i===0?'true':'false' }}"><img loading="lazy" src="https://images.unsplash.com/{{ $scene[3] }}?auto=format&fit=crop&w=450&q=72" alt=""><span>{{ str_pad($i+1,2,'0',STR_PAD_LEFT) }} · {{ $scene[0] }}</span></button>
 @endforeach
 </div>
 <p class="cx-note" id="cx-note">Les cinq vidéos 3D sont prêtes. Choisissez un secteur puis lancez la lecture.</p>
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
