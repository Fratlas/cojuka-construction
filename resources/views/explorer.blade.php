@extends('layouts.cojuka-public')
@section('page_head')
<title>Explorer COJUKA | Immersion dans nos activités</title>
<meta name="description" content="Explorez les activités du groupe COJUKA en immersion vidéo interactive.">
<style>
.cx-page{background:#070b13;color:#fff;min-height:100vh;padding:105px 0 85px}.cx-wrap{max-width:1250px;margin:auto;padding:0 20px}.cx-eyebrow{color:#d4a971;letter-spacing:.24em;text-transform:uppercase;font-size:12px;font-weight:800}.cx-page h1{font-size:clamp(38px,6vw,76px);letter-spacing:-.055em;font-weight:850;margin:15px 0}.cx-intro{max-width:690px;color:#b8c4d1;font-size:17px}.cx-stage{position:relative;overflow:hidden;border:1px solid #ffffff30;border-radius:25px;margin-top:32px;background:#111a25;aspect-ratio:16/8.5;min-height:310px}.cx-stage video,.cx-stage .cx-poster{position:absolute;inset:0;width:100%;height:100%;object-fit:cover}.cx-stage .cx-poster{background-size:cover;background-position:center;transition:transform 1.3s}.cx-stage:after{content:"";position:absolute;inset:0;background:linear-gradient(0deg,#060a13 0%,transparent 75%);pointer-events:none}.cx-stage-info{position:absolute;z-index:2;bottom:30px;left:clamp(18px,4vw,55px);right:25px}.cx-stage-info h2{font-size:clamp(30px,4vw,55px);font-weight:800}.cx-stage-info p{max-width:550px;color:#e4e9ee}.cx-controls{display:flex;flex-wrap:wrap;align-items:center;gap:10px;margin:20px 0}.cx-controls button,.cx-controls a{background:#1c2735;color:#fff;border:1px solid #ffffff40;border-radius:99px;padding:10px 17px;text-decoration:none}.cx-controls button:hover,.cx-controls button[aria-pressed=true]{background:#9b2636}.cx-progress{flex:1;min-width:140px;accent-color:#c44755}.cx-grid{display:grid;grid-template-columns:repeat(5,minmax(0,1fr));gap:12px;margin-top:24px}.cx-card{border:1px solid #ffffff35;background:#121d29;color:white;border-radius:16px;overflow:hidden;text-align:left;padding:0;cursor:pointer}.cx-card[aria-current=true]{outline:2px solid #dca98a}.cx-card img{width:100%;height:112px;object-fit:cover}.cx-card span{display:block;padding:12px;font-size:13px;font-weight:700}.cx-note{color:#a8b7c7;font-size:13px;margin-top:18px}@media(max-width:800px){.cx-grid{grid-template-columns:repeat(2,minmax(0,1fr))}.cx-stage{aspect-ratio:4/5}.cx-stage-info{bottom:22px}.cx-card img{height:100px}}
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
$exploreSceneData=[];
foreach($exploreScenes as $i=>$scene){
 $exploreSceneData[]=['title'=>$scene[0],'description'=>$scene[1],'slug'=>$scene[2],'poster'=>'https://images.unsplash.com/'.$scene[3].'?auto=format&fit=crop&w=1800&q=82','video'=>asset('videos/explorer/scene-'.($i+1).'.mp4')];
}
@endphp
<main class="cx-page"><div class="cx-wrap">
 <div class="cx-eyebrow">COJUKA · Expérience immersive</div>
 <h1>Explorer le groupe.</h1><p class="cx-intro">Une exploration progressive de nos activités. Choisissez un univers, avancez à votre rythme et découvrez les projets qui façonnent notre vision.</p>
 <div class="cx-stage" id="cx-stage" aria-label="Exploration des activités COJUKA">
  <div class="cx-poster" id="cx-poster"></div><video id="cx-video" playsinline preload="metadata" style="display:none"></video>
  <div class="cx-stage-info"><span class="cx-eyebrow" id="cx-counter">01 / 05</span><h2 id="cx-title">Mining</h2><p id="cx-description"></p><a id="cx-link" href="{{ route('group.profile','kojuka-mining') }}" style="color:#fff;font-weight:700">Découvrir cette activité ↗</a></div>
 </div>
 <div class="cx-controls"><button id="cx-prev" type="button" aria-label="Scène précédente">← Précédent</button><button id="cx-play" type="button">▶ Lecture</button><button id="cx-next" type="button" aria-label="Scène suivante">Suivant →</button><button id="cx-mute" type="button">🔇 Son</button><label for="cx-progress" class="visually-hidden">Progression de la scène</label><input id="cx-progress" class="cx-progress" type="range" min="0" max="100" value="0"><span id="cx-time" aria-live="polite">00:00</span></div>
 <div class="cx-grid" id="cx-grid">
 @foreach($exploreScenes as $i=>$scene)
 <button type="button" class="cx-card" data-cx-index="{{ $i }}" aria-current="{{ $i===0?'true':'false' }}"><img loading="lazy" src="https://images.unsplash.com/{{ $scene[3] }}?auto=format&fit=crop&w=450&q=72" alt=""><span>{{ str_pad($i+1,2,'0',STR_PAD_LEFT) }} · {{ $scene[0] }}</span></button>
 @endforeach
 </div>
 <p class="cx-note" id="cx-note">Aperçu illustré : les séquences vidéo 3D seront activées après leur génération et leur ajout dans le dossier public/videos/explorer du site.</p>
</div></main>
@endsection
@section('page_scripts')
<script>
(function(){
 const scenes=@json($exploreSceneData);
 const video=document.getElementById('cx-video'),poster=document.getElementById('cx-poster'),play=document.getElementById('cx-play'),progress=document.getElementById('cx-progress'),note=document.getElementById('cx-note');let current=0,available=false;
 const links={mining:'{{ route('group.profile','kojuka-mining') }}',construction:'{{ route('group.profile','construction') }}',logistique:'{{ route('group.profile','logistique') }}','eden-park-investments':'{{ route('group.profile','eden-park-investments') }}',consultance:'{{ route('group.profile','consultance') }}'};
 function load(i){current=(i+scenes.length)%scenes.length;const s=scenes[current];video.pause();video.removeAttribute('src');video.load();video.style.display='none';poster.style.display='block';poster.style.backgroundImage='url("'+s.poster+'")';available=false;progress.value=0;play.textContent='▶ Lecture';document.getElementById('cx-title').textContent=s.title;document.getElementById('cx-description').textContent=s.description;document.getElementById('cx-counter').textContent=String(current+1).padStart(2,'0')+' / '+String(scenes.length).padStart(2,'0');document.getElementById('cx-link').href=links[s.slug]||'{{ route('group.portal') }}';document.querySelectorAll('[data-cx-index]').forEach(b=>b.setAttribute('aria-current',String(Number(b.dataset.cxIndex)===current)));fetch(s.video,{method:'HEAD'}).then(r=>{if(r.ok&&scenes[current]===s){available=true;video.src=s.video;video.style.display='block';poster.style.display='none';note.textContent='Vidéo immersive disponible : utilisez les commandes pour piloter la scène.'}}).catch(()=>{});note.textContent='Scène illustrée : vidéo 3D en préparation.'}
 document.querySelectorAll('[data-cx-index]').forEach(b=>b.addEventListener('click',()=>load(Number(b.dataset.cxIndex))));document.getElementById('cx-prev').addEventListener('click',()=>load((current-1+scenes.length)%scenes.length));document.getElementById('cx-next').addEventListener('click',()=>load((current+1)%scenes.length));
 play.addEventListener('click',()=>{if(!available){note.textContent='La vidéo 3D de cette activité n’est pas encore publiée.';return}if(video.paused){video.play().then(()=>play.textContent='Ⅱ Pause').catch(()=>note.textContent='Lecture impossible sur cet appareil.')}else{video.pause();play.textContent='▶ Lecture'}});
 document.getElementById('cx-mute').addEventListener('click',e=>{video.muted=!video.muted;e.currentTarget.textContent=video.muted?'🔇 Son':'🔊 Son'});
 video.addEventListener('timeupdate',()=>{if(video.duration){progress.value=100*video.currentTime/video.duration;document.getElementById('cx-time').textContent=Math.floor(video.currentTime/60).toString().padStart(2,'0')+':'+Math.floor(video.currentTime%60).toString().padStart(2,'0')}});progress.addEventListener('input',()=>{if(available&&video.duration)video.currentTime=video.duration*progress.value/100});video.addEventListener('ended',()=>load((current+1)%scenes.length));document.addEventListener('keydown',e=>{if(e.target.matches('input,textarea'))return;if(e.key==='ArrowRight')load((current+1)%scenes.length);if(e.key==='ArrowLeft')load((current-1+scenes.length)%scenes.length)});load(0);
})();
</script>
@endsection
