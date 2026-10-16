<style>
#cojuka-back-to-top{position:fixed;right:clamp(14px,2.5vw,32px);bottom:clamp(20px,4vw,40px);z-index:1050;width:48px;height:48px;border:1px solid #d8dde3;border-radius:50%;background:rgba(255,255,255,.96);color:#202b36;box-shadow:0 9px 28px rgba(12,22,32,.18);display:flex;align-items:center;justify-content:center;opacity:0;visibility:hidden;transform:translateY(14px);transition:opacity .28s,visibility .28s,transform .28s,background .28s;cursor:pointer;backdrop-filter:blur(12px)}
#cojuka-back-to-top.is-visible{opacity:1;visibility:visible;transform:translateY(0)}
#cojuka-back-to-top:hover{background:#202b36;color:#fff;transform:translateY(-3px)}
#cojuka-back-to-top:focus-visible{outline:3px solid #b58a57;outline-offset:3px}
#cojuka-back-to-top svg{width:21px;height:21px}
@media(max-width:767px){#cojuka-back-to-top{right:15px;bottom:20px;width:44px;height:44px}}
@media(prefers-reduced-motion:reduce){#cojuka-back-to-top{transition:none!important;transform:none!important}}
</style>
<button type="button" id="cojuka-back-to-top" aria-label="Remonter en haut de la page" title="Retour en haut">
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="m18 15-6-6-6 6"/><path d="M12 9v12"/></svg>
</button>
<script>
(function(){
 var button=document.getElementById('cojuka-back-to-top');if(!button)return;
 var pending=false;
 function update(){pending=false;button.classList.toggle('is-visible',window.scrollY>360)}
 window.addEventListener('scroll',function(){if(!pending){pending=true;requestAnimationFrame(update)}},{passive:true});
 window.addEventListener('pageshow',update);
 button.addEventListener('click',function(){
  window.scrollTo({top:0,behavior:window.matchMedia('(prefers-reduced-motion: reduce)').matches?'instant':'smooth'});
 });
 update();
})();
</script>