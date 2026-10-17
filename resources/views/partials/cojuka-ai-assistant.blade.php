@php
$cojukaAssistantAdmin=auth()->check() && \App\Support\GroupAccess::any(auth()->user());
$cojukaAssistantModules=['entites'=>'Sociétés et filiales','projets'=>'Projets','actifs'=>'Actifs','rh'=>'Ressources humaines','finances'=>'Finances','contrats'=>'Contrats','achats'=>'Achats','logistique'=>'Logistique','immobilier'=>'Immobilier','mines'=>'Mines','consulting'=>'Consulting'];
$cojukaAssistantGuides=[
 ['site','Découvrir le site',['Ouvrir l’accueil et découvrir les activités du groupe.','Cliquer sur « Groupe » ou « Entités » pour voir les domaines.','Sélectionner Mining, Construction ou une autre entité pour lire sa présentation.','Utiliser les dossiers sectoriels pour approfondir les informations.'],route('group.portal')],
 ['mining','Explorer Mining',['Ouvrir le portail des entités.','Choisir Mining, secteur prioritaire.','Consulter les images, les domaines d’intervention et les informations disponibles.','Ouvrir le dossier Mining & carrières pour les explications techniques.'],route('group.topic','mining-et-carrieres')],
];
if($cojukaAssistantAdmin){
 $cojukaAssistantGuides[]=['gestion','Guide interne complet',['Ouvrir le guide interne depuis le menu de gestion.','Choisir le module souhaité ou utiliser la recherche.','Suivre les étapes puis ouvrir le module.','Vérifier le résultat après enregistrement.'],route('gestion.guide')];
 foreach($cojukaAssistantModules as $slug=>$label){
  if(!\App\Support\GroupAccess::can(auth()->user(),$slug))continue;
  $link=in_array($slug,['entites','projets','actifs'],true)?route('gestion.group.list',$slug):route('gestion.suite.index',$slug);
  $cojukaAssistantGuides[]=['gestion','Gérer : '.$label,['Ouvrir le tableau de bord de gestion.','Choisir « '.$label.' » dans le menu latéral.','Consulter les enregistrements et utiliser le formulaire si votre rôle permet la création.','Vérifier les champs, enregistrer puis contrôler le résultat.'], $link];
 }
 if(auth()->user()->is_group_admin)$cojukaAssistantGuides[]=['gestion','Gérer les accès',['Ouvrir « Utilisateurs & accès ».','Vérifier le compte utilisateur et son département.','Ouvrir « Permissions départements » pour vérifier les autorisations.','Enregistrer et tester avec un compte de droits limités.'],route('gestion.users.index')];
}
@endphp
<style>
#cojuka-ai-launch{position:fixed;right:clamp(15px,2.5vw,32px);bottom:94px;z-index:1070;border:0;border-radius:100px;padding:12px 17px;background:#1c2937;color:#fff;box-shadow:0 12px 36px #0e1d2c45;display:flex;gap:9px;align-items:center;font-weight:700;font-size:14px}
#cojuka-ai-launch:hover{background:#34485c}
#cojuka-ai-panel{position:fixed;right:clamp(12px,2.5vw,32px);bottom:154px;width:min(410px,calc(100vw - 24px));max-height:min(680px,calc(100dvh - 175px));z-index:1071;background:#fff;border:1px solid #e3e7eb;border-radius:22px;box-shadow:0 25px 75px #11182740;display:none;flex-direction:column;overflow:hidden;color:#202b36;font:14px/1.55 system-ui,sans-serif}
#cojuka-ai-panel.is-open{display:flex}
.cai-head{padding:16px 18px;background:#1c2937;color:white;display:flex;justify-content:space-between;align-items:center;gap:10px}
.cai-head strong{font-size:16px}.cai-head small{display:block;color:#cbd4de;font-size:12px}
.cai-close{border:0;background:transparent;color:white;font-size:26px;line-height:1}
.cai-body{overflow-y:auto;flex:1;min-height:120px;padding:16px;background:#f8f9fa}
.cai-bubble{background:#fff;border:1px solid #e8eaed;border-radius:14px;padding:11px 13px;margin-bottom:12px;white-space:pre-wrap;overflow-wrap:anywhere}
.cai-bubble.is-user{background:#e9eef3;margin-left:30px}
.cai-topics{display:flex;flex-wrap:wrap;gap:7px;margin:12px 0}
.cai-topic{border:1px solid #d7dde3;border-radius:22px;background:#fff;color:#253242;padding:7px 11px;text-align:left;font-size:12px}
.cai-topic:hover{background:#edf1f5}
.cai-guide{background:white;border:1px solid #e6e9ed;border-radius:12px;margin:8px 0;overflow:hidden}
.cai-guide summary{cursor:pointer;font-weight:650;padding:10px 12px}
.cai-guide ol{padding:0 16px 0 33px;margin:5px 0 12px}.cai-guide li{margin-bottom:7px}
.cai-guide a{display:inline-block;margin:0 12px 12px;color:#174c7a}
.cai-form{display:flex;gap:7px;padding:12px;border-top:1px solid #e5e8ed;background:#fff}
.cai-form input{flex:1;min-width:0;border:1px solid #cdd5dd;border-radius:12px;padding:10px;font-size:14px}
.cai-form button{border:0;background:#1c2937;color:white;border-radius:12px;padding:9px 13px}
.cai-voice{display:flex;gap:8px;align-items:center;padding:0 12px 10px;background:#fff;flex-wrap:wrap}.cai-voice button{border:1px solid #cdd5dd;background:#f7f9fb;color:#1c2937;border-radius:20px;padding:7px 11px;font-size:12px;font-weight:650}.cai-voice button[aria-pressed="true"]{background:#dceefb;border-color:#4d8dbd}.cai-voice-status{font-size:11px;color:#536576;flex:1;min-width:135px}.cai-note{font-size:11px;color:#667482;padding:0 14px 11px;background:white}
@media(max-width:600px){#cojuka-ai-launch{bottom:77px;right:13px}#cojuka-ai-panel{bottom:137px;max-height:calc(100dvh - 154px)}}
@media(prefers-reduced-motion:reduce){#cojuka-ai-launch,#cojuka-ai-panel{animation:none!important;transition:none!important}}
.cai-suggest{position:fixed;right:clamp(15px,2.5vw,32px);bottom:154px;z-index:1069;display:flex;align-items:center;gap:8px;max-width:min(310px,calc(100vw - 30px));background:white;color:#1c2937;border:1px solid #dce4ed;border-radius:16px;padding:11px 13px;box-shadow:0 12px 35px #15233430;font:600 13px/1.4 system-ui,sans-serif}
.cai-suggest:after{content:"";position:absolute;bottom:-7px;right:28px;width:13px;height:13px;background:#fff;transform:rotate(45deg);border-right:1px solid #dce4ed;border-bottom:1px solid #dce4ed}
.cai-suggest button{background:transparent;border:0;color:#233c56;font:inherit;text-align:left;padding:0;cursor:pointer}
.cai-suggest .cai-dismiss{font-size:19px;color:#6c7887;line-height:1;padding-left:5px}
.cai-suggest[hidden]{display:none!important}
@media(max-width:600px){.cai-suggest{right:13px;bottom:136px}}
</style>
@if($cojukaAssistantAdmin)
<div class="cai-suggest" id="cojuka-guide-suggestion" role="status"><button type="button" id="cojuka-guide-open">Besoin d’aide ? Découvrez le guide de gestion pas à pas ✨</button><button type="button" class="cai-dismiss" id="cojuka-guide-dismiss" aria-label="Masquer la suggestion">×</button></div>
@endif
<button id="cojuka-ai-launch" type="button" aria-controls="cojuka-ai-panel" aria-expanded="false" aria-label="Ouvrir le guide IA COJUKA">✦ <span>Assistant IA</span></button>
<section id="cojuka-ai-panel" role="dialog" aria-label="Assistant et tutoriels COJUKA" aria-modal="false">
 <div class="cai-head"><div><strong>✦ Assistant COJUKA</strong><small>Questions sur le site · Tutoriels pas à pas</small></div><button type="button" class="cai-close" id="cojuka-ai-close" aria-label="Fermer">×</button></div>
 <div class="cai-body" id="cojuka-ai-body" aria-live="polite">
  <div class="cai-bubble">Bonjour ! Je peux vous orienter sur le site et vous présenter des tutoriels étape par étape{{ $cojukaAssistantAdmin ? ' pour vos modules de gestion autorisés' : '' }}. Choisissez un sujet ou posez une question.</div>
  <div class="cai-topics"><button class="cai-topic" type="button" data-cai-question="Présente-moi les activités du groupe COJUKA">Activités COJUKA</button><button class="cai-topic" type="button" data-cai-question="Explique-moi les activités Mining et carrières">Mining</button>@if($cojukaAssistantAdmin)<button class="cai-topic" type="button" data-cai-question="Comment utiliser mon espace de gestion étape par étape ?">Aide gestion</button>@endif</div>
  <strong>Tutoriels étape par étape</strong>
  @foreach($cojukaAssistantGuides as $guide)
  <details class="cai-guide"><summary>{{ $guide[1] }}</summary><ol>@foreach($guide[2] as $step)<li>{{ $step }}</li>@endforeach</ol><a href="{{ $guide[3] }}">Accéder à cette page ↗</a></details>
  @endforeach
 </div>
 <form class="cai-form" id="cojuka-ai-form"><input id="cojuka-ai-input" maxlength="1500" required placeholder="Posez votre question…" aria-label="Votre question"><button id="cojuka-ai-send" type="submit">Envoyer</button></form>
 <div class="cai-voice"><button type="button" id="cai-call" aria-pressed="false">📞 Appel vocal direct</button><button type="button" id="cai-mic" aria-pressed="false">🎙️ Parler</button><button type="button" id="cai-speak" aria-pressed="false">🔊 Réponses vocales : non</button><button type="button" id="cai-stop-voice">■ Arrêter</button><span class="cai-voice-status" id="cai-voice-status" role="status">Voix facultative · français</span></div>
 <div class="cai-note">Guide informatif : aucune modification des données. Ne communiquez pas de mots de passe ni d’informations confidentielles.</div>
</section>
<script>
(function(){
 var launch=document.getElementById('cojuka-ai-launch'),panel=document.getElementById('cojuka-ai-panel'),close=document.getElementById('cojuka-ai-close'),form=document.getElementById('cojuka-ai-form'),input=document.getElementById('cojuka-ai-input'),body=document.getElementById('cojuka-ai-body'),send=document.getElementById('cojuka-ai-send');
 if(!launch||!panel)return;
 var suggestion=document.getElementById('cojuka-guide-suggestion'),openGuide=document.getElementById('cojuka-guide-open'),dismiss=document.getElementById('cojuka-guide-dismiss');
 if(suggestion){try{if(sessionStorage.getItem('cojuka-guide-tip-dismissed')==='1')suggestion.hidden=true}catch(e){}}
 if(openGuide)openGuide.addEventListener('click',function(){toggle(true);if(suggestion)suggestion.hidden=true;var guide=Array.from(panel.querySelectorAll('.cai-guide')).find(function(item){return item.textContent.includes('Guide interne complet')});if(guide){guide.open=true;guide.scrollIntoView({block:'nearest',behavior:'smooth'})}});
 if(dismiss)dismiss.addEventListener('click',function(){suggestion.hidden=true;try{sessionStorage.setItem('cojuka-guide-tip-dismissed','1')}catch(e){}});
 var history=[];
 var mic=document.getElementById('cai-mic'),speakButton=document.getElementById('cai-speak'),stopVoice=document.getElementById('cai-stop-voice'),voiceStatus=document.getElementById('cai-voice-status');
 var Recognition=window.SpeechRecognition||window.webkitSpeechRecognition,recognition=null,listening=false,voiceEnabled=false,voiceQuestion=false;
 function statusVoice(t){voiceStatus.textContent=t}
 function stopSpeaking(){if('speechSynthesis' in window)window.speechSynthesis.cancel()}
 function readReply(t){if(!voiceEnabled||!('speechSynthesis' in window)||!t)return;stopSpeaking();var utterance=new SpeechSynthesisUtterance(t.slice(0,3000));utterance.lang='fr-FR';utterance.rate=.97;utterance.onstart=function(){statusVoice('L’assistant parle…')};utterance.onend=function(){statusVoice('Prêt à écouter')};utterance.onerror=function(){statusVoice('Lecture vocale indisponible')};window.speechSynthesis.speak(utterance)}
 if(!Recognition){mic.disabled=true;mic.title='Reconnaissance vocale non disponible';statusVoice('Microphone non pris en charge par ce navigateur')}
 if(!('speechSynthesis' in window)){speakButton.disabled=true;speakButton.title='Synthèse vocale indisponible'}
 speakButton.addEventListener('click',function(){voiceEnabled=!voiceEnabled;speakButton.setAttribute('aria-pressed',String(voiceEnabled));speakButton.textContent=voiceEnabled?'🔊 Réponses vocales : oui':'🔊 Réponses vocales : non';if(!voiceEnabled)stopSpeaking()});
 stopVoice.addEventListener('click',function(){voiceQuestion=false;if(recognition&&listening)recognition.stop();stopSpeaking();statusVoice('Voix arrêtée')});
 mic.addEventListener('click',function(){
  if(!Recognition)return;
  if(listening){recognition.stop();return}
  stopSpeaking();recognition=new Recognition();recognition.lang='fr-FR';recognition.interimResults=false;recognition.maxAlternatives=1;
  recognition.onstart=function(){listening=true;mic.setAttribute('aria-pressed','true');mic.textContent='● Écoute…';statusVoice('Parlez maintenant')};
  recognition.onresult=function(e){var transcript=e.results[0][0].transcript.trim();input.value=transcript;voiceQuestion=true;statusVoice('Question reconnue : '+transcript.slice(0,80))};
  recognition.onerror=function(e){voiceQuestion=false;statusVoice('Microphone : '+(e.error==='not-allowed'?'autorisation refusée':e.error))};
  recognition.onend=function(){listening=false;mic.setAttribute('aria-pressed','false');mic.textContent='🎙️ Parler';if(voiceQuestion){voiceQuestion=false;voiceEnabled=true;speakButton.setAttribute('aria-pressed','true');speakButton.textContent='🔊 Réponses vocales : oui';ask(input.value.trim())}};
  try{recognition.start()}catch(e){statusVoice('Impossible de démarrer le microphone')}
 });

 function toggle(open){panel.classList.toggle('is-open',open);launch.setAttribute('aria-expanded',open?'true':'false');if(open)input.focus();else {stopSpeaking();if(recognition&&listening)recognition.stop();launch.focus()}}
 launch.addEventListener('click',function(){toggle(!panel.classList.contains('is-open'))});
 close.addEventListener('click',function(){toggle(false)});
 document.addEventListener('keydown',function(e){if(e.key==='Escape'&&panel.classList.contains('is-open'))toggle(false)});
 function bubble(message,user){var el=document.createElement('div');el.className='cai-bubble'+(user?' is-user':'');el.textContent=message;body.appendChild(el);body.scrollTop=body.scrollHeight;return el}
 async function ask(message){
  if(!message||send.disabled)return;
  bubble(message,true);input.value='';send.disabled=true;
  var waiting=bubble('Recherche d’une réponse…',false);
  try{
   var response=await fetch('{{ route('cojuka.assistant.reply') }}',{method:'POST',headers:{'Content-Type':'application/json','Accept':'application/json','X-CSRF-TOKEN':document.querySelector('meta[name="csrf-token"]')?.content||'{{ csrf_token() }}'},credentials:'same-origin',body:JSON.stringify({message:message,history:history.slice(-8)})});
   if(!response.ok)throw new Error('Service indisponible');
   var data=await response.json();waiting.textContent=data.reply||'Consultez les tutoriels.';
   readReply(waiting.textContent);history.push({role:'user',content:message},{role:'assistant',content:waiting.textContent});history=history.slice(-8);
  }catch(e){waiting.textContent='Le service de réponse est indisponible. Les tutoriels ci-dessus restent accessibles.'}
  send.disabled=false;body.scrollTop=body.scrollHeight;
 }
 form.addEventListener('submit',function(e){e.preventDefault();ask(input.value.trim())});
 panel.querySelectorAll('[data-cai-question]').forEach(function(button){button.addEventListener('click',function(){ask(button.dataset.caiQuestion)})});
})();
</script>
<script>
(function(){
 var button=document.getElementById('cai-call'),status=document.getElementById('cai-voice-status'),panel=document.getElementById('cojuka-ai-panel');
 if(!button)return;
 var pc=null,stream=null,audio=null,channel=null,starting=false;
 function say(t){if(status)status.textContent=t}
 function cleanup(){if(channel){channel.close();channel=null}if(pc){pc.close();pc=null}if(stream){stream.getTracks().forEach(function(t){t.stop()});stream=null}if(audio){audio.pause();audio.srcObject=null;audio.remove();audio=null}button.textContent='📞 Appel vocal direct';button.setAttribute('aria-pressed','false');starting=false}
 async function call(){
  if(pc||starting){cleanup();say('Appel terminé');return}
  if(!navigator.mediaDevices||!navigator.mediaDevices.getUserMedia||!window.RTCPeerConnection){say('Appel vocal non pris en charge par ce navigateur');return}
  starting=true;button.textContent='Connexion…';say('Autorisez le microphone pour commencer l’appel');
  try{
   stream=await navigator.mediaDevices.getUserMedia({audio:{echoCancellation:true,noiseSuppression:true},video:false});
   pc=new RTCPeerConnection();stream.getTracks().forEach(function(t){pc.addTrack(t,stream)});
   audio=document.createElement('audio');audio.autoplay=true;audio.setAttribute('playsinline','');audio.style.display='none';panel.appendChild(audio);
   pc.ontrack=function(e){audio.srcObject=e.streams[0];audio.play().catch(function(){say('Cliquez pour autoriser la lecture audio')})};
   pc.onconnectionstatechange=function(){if(!pc)return;if(pc.connectionState==='failed'||pc.connectionState==='closed'){cleanup();say('Connexion terminée')}};
   channel=pc.createDataChannel('oai-events');
   channel.onmessage=function(e){try{var msg=JSON.parse(e.data);if(msg.type==='error')say('Erreur audio : '+(msg.error?.message||'réessayez'));if(msg.type==='input_audio_buffer.speech_started')say('Je vous écoute…');if(msg.type==='response.created')say('L’assistant répond…');if(msg.type==='response.done')say('À vous de parler')}catch(_){}};
   var offer=await pc.createOffer();await pc.setLocalDescription(offer);
   var res=await fetch('{{ route('cojuka.assistant.realtime') }}',{method:'POST',headers:{'Content-Type':'application/json','Accept':'application/sdp, application/json','X-CSRF-TOKEN':document.querySelector('meta[name="csrf-token"]')?.content||'{{ csrf_token() }}'},credentials:'same-origin',body:JSON.stringify({sdp:offer.sdp})});
   if(!res.ok){var detail=await res.json().catch(function(){return {}});throw new Error(detail.error||'Service vocal indisponible')}
   await pc.setRemoteDescription({type:'answer',sdp:await res.text()});
   starting=false;button.textContent='🔴 Raccrocher';button.setAttribute('aria-pressed','true');say('Appel connecté · parlez naturellement');
  }catch(e){cleanup();say(e.message||'Impossible de démarrer l’appel')}
 }
 button.addEventListener('click',call);
 document.addEventListener('visibilitychange',function(){if(document.hidden&&pc){cleanup();say('Appel terminé : onglet inactif')}});
 window.addEventListener('pagehide',cleanup);
})();
</script>
