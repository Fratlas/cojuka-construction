{{-- Public cookie preferences: no optional tracking loads before affirmative consent. --}}
<div id="cojukaCookieBanner" class="cg-cookie-banner" role="dialog" aria-modal="false" aria-labelledby="cojukaCookieTitle" aria-describedby="cojukaCookieInfo" hidden>
 <div class="cg-cookie-head"><i class="bi bi-shield-check" aria-hidden="true"></i><span>Vos préférences</span></div>
 <h2 id="cojukaCookieTitle">Cookies et confidentialité</h2>
 <p id="cojukaCookieInfo">Les cookies indispensables assurent la sécurité et la connexion à COJUKA. Vous pouvez accepter ou refuser les cookies facultatifs, et changer d’avis à tout moment.</p>
 <div class="cg-cookie-custom" id="cojukaCookieCustom" hidden>
  <label class="cg-cookie-option"><span><strong>Cookies indispensables</strong><small>Sécurité, session et mémorisation de votre choix. Toujours actifs.</small></span><input type="checkbox" checked disabled aria-label="Cookies indispensables toujours actifs"></label>
  <label class="cg-cookie-option"><span><strong>Mesure d’audience</strong><small>Seulement si une mesure d’audience optionnelle est installée et autorisée.</small></span><input type="checkbox" id="cojukaCookieAnalytics" aria-label="Autoriser la mesure d’audience"></label>
  <label class="cg-cookie-option"><span><strong>Marketing facultatif</strong><small>Aucun outil publicitaire facultatif n’est activé à ce jour.</small></span><input type="checkbox" id="cojukaCookieMarketing" aria-label="Autoriser les cookies marketing facultatifs"></label>
  <button type="button" class="cg-cookie-btn cg-cookie-save" id="cojukaCookieSave">Enregistrer mes préférences</button>
 </div>
 <div class="cg-cookie-actions">
  <button type="button" class="cg-cookie-btn cg-cookie-reject" id="cojukaCookieReject">Refuser les facultatifs</button>
  <button type="button" class="cg-cookie-btn cg-cookie-accept" id="cojukaCookieAccept">Tout accepter</button>
  <button type="button" class="cg-cookie-adjust" id="cojukaCookieSettings" aria-expanded="false" aria-controls="cojukaCookieCustom">Personnaliser</button>
 </div>
 <a class="cg-cookie-privacy" href="{{ route('cojuka.privacy') }}">Lire la politique de confidentialité et de cookies <i class="bi bi-arrow-up-right" aria-hidden="true"></i></a>
</div>
<style>
.cg-cookie-banner[hidden],.cg-cookie-custom[hidden]{display:none!important}
.cg-cookie-banner{
 position:fixed;z-index:11000;bottom:clamp(15px,3vw,30px);left:clamp(12px,3vw,30px);
 width:min(480px,calc(100vw - 24px));max-height:min(86svh,740px);overflow:auto;
 padding:clamp(20px,2.5vw,29px);border-radius:23px;
 background:rgba(255,255,255,.97);color:#253244;
 border:1px solid rgba(193,202,213,.85);box-shadow:0 26px 80px rgba(12,22,37,.25);
 -webkit-backdrop-filter:blur(12px);backdrop-filter:blur(12px);
 font:400 14px/1.55 system-ui,-apple-system,"Segoe UI",sans-serif;
}
.cg-cookie-head{display:flex;gap:9px;align-items:center;margin-bottom:9px;color:#596879;font-size:11px;font-weight:850;letter-spacing:.12em;text-transform:uppercase}
.cg-cookie-head i{font-size:18px}
.cg-cookie-banner h2{font-size:clamp(20px,2vw,25px)!important;font-weight:850;letter-spacing:-.04em;color:#192638!important;margin:0 0 12px}
.cg-cookie-banner p{color:#46566c!important;font-size:13px;line-height:1.75;margin:0 0 18px}
.cg-cookie-actions{display:flex;gap:9px;flex-wrap:wrap;align-items:center}
.cg-cookie-btn{border:1px solid #cad2dd;border-radius:12px;padding:11px 13px;background:#f7f9fc;color:#202f42;font-size:12px;font-weight:800;line-height:1.35}
.cg-cookie-btn:hover{background:#e9eef4}
.cg-cookie-accept,.cg-cookie-save{background:#27374b;color:#fff;border-color:#27374b}
.cg-cookie-accept:hover,.cg-cookie-save:hover{background:#172333;color:#fff}
.cg-cookie-adjust{border:0;background:none;color:#3d4e61;padding:10px 4px;font-size:12px;font-weight:750;text-decoration:underline;text-underline-offset:3px}
.cg-cookie-privacy{display:inline-flex;align-items:center;gap:6px;margin-top:15px;font-size:12px;color:#465a70!important;text-decoration:underline;text-underline-offset:3px}
.cg-cookie-banner :is(button,a,input):focus-visible{outline:3px solid #8fa4ba;outline-offset:3px}
.cg-cookie-custom{margin:0 0 15px;padding-top:5px;border-top:1px solid #e1e6ee}
.cg-cookie-option{display:flex;align-items:center;justify-content:space-between;gap:16px;padding:14px 0;border-bottom:1px solid #e7ebf0;cursor:pointer}
.cg-cookie-option span{min-width:0}
.cg-cookie-option strong{display:block;color:#253449;font-size:13px;margin-bottom:3px}
.cg-cookie-option small{display:block;color:#57677c;font-size:11px;line-height:1.5}
.cg-cookie-option input{flex:none;width:19px;height:19px;accent-color:#405267}
.cg-cookie-save{margin-top:15px;width:100%}
@media(max-width:575px){
 .cg-cookie-banner{bottom:calc(10px + env(safe-area-inset-bottom,0px));left:10px;width:calc(100vw - 20px);padding:18px;border-radius:18px}
 .cg-cookie-actions .cg-cookie-reject,.cg-cookie-actions .cg-cookie-accept{flex:1 1 45%}
}
@media(prefers-reduced-motion:reduce){.cg-cookie-banner *{transition:none!important}}
</style>
<script>
(function(){
 'use strict';
 const NAME='cojuka_cookie_preferences';
 const banner=document.getElementById('cojukaCookieBanner');
 if(!banner)return;
 const customized=document.getElementById('cojukaCookieCustom');
 const stats=document.getElementById('cojukaCookieAnalytics');
 const marketing=document.getElementById('cojukaCookieMarketing');
 const customize=document.getElementById('cojukaCookieSettings');
 const $=id=>document.getElementById(id);
 let current=null;
 function read(){
  const match=document.cookie.split('; ').find(entry=>entry.startsWith(NAME+'='));
  if(!match)return null;
  try{
   const data=JSON.parse(decodeURIComponent(match.slice(NAME.length+1)));
   if(data&&data.v===1&&typeof data.analytics==='boolean'&&typeof data.marketing==='boolean')return data;
  }catch(_error){}
  return null;
 }
 function write(data){
  const payload=encodeURIComponent(JSON.stringify({v:1,analytics:!!data.analytics,marketing:!!data.marketing}));
  const secure=location.protocol==='https:'?'; Secure':'';
  document.cookie=NAME+'='+payload+'; Path=/; Max-Age=15552000; SameSite=Lax'+secure;
 }
 function activateOptional(data){
  // Optional embeds/scripts MUST opt in with data-cojuka-cookie-category.
  // There are currently no marketing or analytics scripts installed in this project.
  document.querySelectorAll('[data-cojuka-cookie-category]').forEach(element=>{
   const category=element.getAttribute('data-cojuka-cookie-category');
   if(!['analytics','marketing'].includes(category)||!data[category])return;
   const url=element.getAttribute('data-cookie-src');
   if(element.tagName==='IFRAME'&&url&&!element.src)element.src=url;
   if(element.tagName==='SCRIPT'&&element.type==='text/plain'&&!element.dataset.cookieLoaded){
    const script=document.createElement('script');
    if(url)script.src=url;
    else script.textContent=element.textContent;
    script.async=true;
    element.dataset.cookieLoaded='true';element.after(script);
   }
  });
 }
 function save(choice){
  const previous=current;
  current={v:1,analytics:!!choice.analytics,marketing:!!choice.marketing};
  write(current);
  activateOptional(current);
  banner.hidden=true;
  window.dispatchEvent(new CustomEvent('cojuka:cookies-updated',{detail:current}));
  // When an optional category is revoked, refresh to unload any optional
  // scripts already inserted during the previous consent choice.
  if(previous&&((previous.analytics&&!current.analytics)||(previous.marketing&&!current.marketing))){
   window.location.reload();
  }
 }
 function open(){
  current=read();
  stats.checked=!!current?.analytics;
  marketing.checked=!!current?.marketing;
  customized.hidden=true;customize.setAttribute('aria-expanded','false');
  banner.hidden=false;
 }
 $('cojukaCookieReject').addEventListener('click',()=>save({analytics:false,marketing:false}));
 $('cojukaCookieAccept').addEventListener('click',()=>save({analytics:true,marketing:true}));
 $('cojukaCookieSave').addEventListener('click',()=>save({analytics:stats.checked,marketing:marketing.checked}));
 customize.addEventListener('click',function(){
  customized.hidden=!customized.hidden;
  customize.setAttribute('aria-expanded',String(!customized.hidden));
 });
 document.addEventListener('click',event=>{
  const link=event.target.closest('[data-cojuka-open-cookies]');
  if(!link)return;
  event.preventDefault();open();customize.focus();
 });
 current=read();
 if(current)activateOptional(current);
 else banner.hidden=false;
 window.CojukaCookies={open:open,get:()=>current?{...current}:null};
})();
</script>