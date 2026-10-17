@php
$cojukaAssistantAdmin=auth()->check() && \App\Support\GroupAccess::any(auth()->user());
$cojukaAssistantModules=['entites'=>'Sociétés et filiales','projets'=>'Projets','actifs'=>'Actifs','rh'=>'Ressources humaines','finances'=>'Finances','contrats'=>'Contrats','achats'=>'Achats','logistique'=>'Logistique','immobilier'=>'Immobilier','mines'=>'Mines','consulting'=>'Consulting'];
$cojukaAssistantGuides=[
 ['site','Découvrir le site',['Ouvrir l’accueil et découvrir les activités du groupe.','Cliquer sur « Groupe » ou « Entités » pour voir les domaines.','Sélectionner Mining, Construction ou une autre entité pour lire sa présentation.','Utiliser les dossiers sectoriels pour approfondir les informations.'],route('group.portal')],
 ['mining','Explorer Mining',['Ouvrir le portail des entités.','Choisir Mining, secteur prioritaire.','Consulter les images, les domaines d’intervention et les informations disponibles.','Ouvrir le dossier Mining & carrières pour les explications techniques.'],route('group.topic','mining-et-carrieres')],
];
if($cojukaAssistantAdmin){
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
.cai-note{font-size:11px;color:#667482;padding:0 14px 11px;background:white}
@media(max-width:600px){#cojuka-ai-launch{bottom:77px;right:13px}#cojuka-ai-panel{bottom:137px;max-height:calc(100dvh - 154px)}}
@media(prefers-reduced-motion:reduce){#cojuka-ai-launch,#cojuka-ai-panel{animation:none!important;transition:none!important}}
</style>
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
 <div class="cai-note">Guide informatif : aucune modification des données. Ne communiquez pas de mots de passe ni d’informations confidentielles.</div>
</section>
<script>
(function(){
 var launch=document.getElementById('cojuka-ai-launch'),panel=document.getElementById('cojuka-ai-panel'),close=document.getElementById('cojuka-ai-close'),form=document.getElementById('cojuka-ai-form'),input=document.getElementById('cojuka-ai-input'),body=document.getElementById('cojuka-ai-body'),send=document.getElementById('cojuka-ai-send');
 if(!launch||!panel)return;
 var history=[];
 function toggle(open){panel.classList.toggle('is-open',open);launch.setAttribute('aria-expanded',open?'true':'false');if(open)input.focus();else launch.focus()}
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
   history.push({role:'user',content:message},{role:'assistant',content:waiting.textContent});history=history.slice(-8);
  }catch(e){waiting.textContent='Le service de réponse est indisponible. Les tutoriels ci-dessus restent accessibles.'}
  send.disabled=false;body.scrollTop=body.scrollHeight;
 }
 form.addEventListener('submit',function(e){e.preventDefault();ask(input.value.trim())});
 panel.querySelectorAll('[data-cai-question]').forEach(function(button){button.addEventListener('click',function(){ask(button.dataset.caiQuestion)})});
})();
</script>