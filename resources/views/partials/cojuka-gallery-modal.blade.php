{{-- Shared gallery lightbox for photographic illustrations across COJUKA pages. --}}
<div class="modal fade cg-gallery-modal" id="cojukaGalleryModal" tabindex="-1" aria-hidden="true"
 aria-labelledby="cojukaGalleryTitle" aria-describedby="cojukaGalleryDescription">
 <div class="modal-dialog modal-dialog-centered modal-xl modal-fullscreen-sm-down">
  <div class="modal-content">
   <button type="button" class="cg-gallery-close" data-bs-dismiss="modal" aria-label="Fermer la photo"><i class="bi bi-x-lg" aria-hidden="true"></i></button>
   <div class="cg-gallery-layout">
    <div class="cg-gallery-media">
     <button type="button" class="cg-gallery-nav cg-gallery-prev" id="cojukaGalleryPrev" aria-label="Photo précédente"><i class="bi bi-chevron-left" aria-hidden="true"></i></button>
     <img id="cojukaGalleryImage" src="" alt="" loading="eager" decoding="async">
     <button type="button" class="cg-gallery-nav cg-gallery-next" id="cojukaGalleryNext" aria-label="Photo suivante"><i class="bi bi-chevron-right" aria-hidden="true"></i></button>
    </div>
    <div class="cg-gallery-details">
     <p class="cg-gallery-eyebrow" id="cojukaGallerySector">COJUKA CONSULTING GROUP</p>
     <h2 id="cojukaGalleryTitle">Découvrir une image</h2>
     <div class="cg-gallery-rule" aria-hidden="true"></div>
     <p id="cojukaGalleryDescription">Découvrez les métiers et domaines d’intervention du groupe.</p>
     <p class="cg-gallery-disclaimer"><i class="bi bi-info-circle" aria-hidden="true"></i> Photographie d’illustration : elle ne représente pas nécessairement une réalisation de COJUKA.</p>
     <a id="cojukaGalleryLink" class="cg-gallery-link" href="#" hidden>Explorer ce secteur <i class="bi bi-arrow-up-right" aria-hidden="true"></i></a>
     <p class="cg-gallery-count" id="cojukaGalleryCount" aria-live="polite"></p>
     <div class="cg-gallery-thumbnails" id="cojukaGalleryThumbnails" role="group" aria-label="Photos de la galerie"></div>
    </div>
   </div>
  </div>
 </div>
</div>
<style>
.cg-gallery-modal{--cg-gallery-ink:#1c2635;--cg-gallery-muted:#506073}
.cg-gallery-modal .modal-dialog{max-width:1120px}
.cg-gallery-modal .modal-content{position:relative;overflow:hidden;border:1px solid rgba(255,255,255,.82);border-radius:27px;background:#FFFFFF!important;box-shadow:0 42px 110px rgba(5,13,28,.32)}
.cg-gallery-layout{display:grid;grid-template-columns:minmax(0,1.22fr) minmax(280px,.78fr);min-height:425px}
.cg-gallery-media{min-width:0;background:#e8edf3;display:flex;align-items:center;justify-content:center}
.cg-gallery-media img{display:block;width:100%;height:100%;max-height:80svh;min-height:400px;object-fit:cover}
.cg-gallery-details{display:flex;flex-direction:column;align-items:flex-start;justify-content:center;min-width:0;padding:clamp(28px,4vw,60px);color:var(--cg-gallery-ink)}
.cg-gallery-eyebrow{font-size:11px;font-weight:850;letter-spacing:.19em;text-transform:uppercase;color:#606c7a!important;margin:0 0 18px}
.cg-gallery-details h2{font-size:clamp(2rem,3.4vw,3.2rem);line-height:1.09;letter-spacing:-.065em;font-weight:850;color:#192536!important;margin:0;overflow-wrap:anywhere}
.cg-gallery-rule{width:48px;height:2px;background:#9ea8b4;margin:23px 0}
.cg-gallery-details #cojukaGalleryDescription{font-size:clamp(1rem,1.2vw,1.12rem);line-height:1.8;color:#445367!important;margin:0 0 22px}
.cg-gallery-disclaimer{font-size:12px;line-height:1.65;color:#637188!important;margin:0 0 22px}
.cg-gallery-disclaimer i{margin-right:5px}
.cg-gallery-link{display:inline-flex;align-items:center;gap:14px;background:#343e4d;border:1px solid #343e4d;border-radius:30px;padding:12px 20px;color:#fff!important;text-decoration:none!important;font-size:14px;font-weight:770}
.cg-gallery-link:hover{background:#1f2937}
.cg-gallery-link[hidden]{display:none!important}
.cg-gallery-close{position:absolute;top:16px;right:16px;z-index:5;display:grid;place-items:center;width:40px;height:40px;border:1px solid #d9dfe8;border-radius:50%;background:rgba(255,255,255,.95);color:#1b2735}
.cg-gallery-close:hover{background:#e8ebf0}
.cg-gallery-close:focus-visible,.cg-gallery-link:focus-visible,
 [data-cg-photo-popup]:focus-visible{outline:3px solid #6f8195;outline-offset:3px}
[data-cg-photo-popup]{cursor:zoom-in}
img[data-cg-photo-popup]{outline-offset:-4px}
.cg-photo-open{display:block;width:100%;border:0;background:transparent;margin:0;padding:0;cursor:zoom-in;text-align:inherit}
.cg-photo-open img{width:100%}
.cg-marquee-tile[data-cg-photo-popup]{cursor:zoom-in;font-family:inherit;text-align:left;padding:0}
@media(max-width:767px){
 .cg-gallery-modal .modal-dialog{margin:0;max-width:none}
 .cg-gallery-modal .modal-content{border:0;border-radius:0;min-height:100svh}
 .cg-gallery-layout{grid-template-columns:1fr;grid-template-rows:minmax(0,47svh) auto;min-height:100svh}
 .cg-gallery-media img{height:47svh;min-height:0;max-height:none;object-fit:contain;background:#121e2b}
 .cg-gallery-details{justify-content:flex-start;padding:27px 25px 42px}
 .cg-gallery-details h2{font-size:clamp(1.8rem,7.5vw,2.5rem)}
}
@media(prefers-reduced-motion:reduce){
 .cg-gallery-modal .modal-dialog{transition:none!important}
}

/* Gallery browsing: controls and clickable thumbnails with focus indication. */
.cg-gallery-media{position:relative}
.cg-gallery-nav{position:absolute;top:50%;transform:translateY(-50%);z-index:2;display:grid;place-items:center;
 width:42px;height:42px;border-radius:50%;border:1px solid rgba(255,255,255,.65);
 background:rgba(17,29,46,.65);color:#fff;box-shadow:0 7px 22px rgba(0,0,0,.19);
 -webkit-backdrop-filter:blur(8px);backdrop-filter:blur(8px)}
.cg-gallery-nav:hover{background:rgba(37,54,72,.95)}
.cg-gallery-nav:focus-visible,.cg-gallery-thumbnails button:focus-visible{outline:3px solid #7e95b0;outline-offset:3px}
.cg-gallery-prev{left:12px}.cg-gallery-next{right:12px}
.cg-gallery-nav[hidden],.cg-gallery-thumbnails[hidden]{display:none!important}
.cg-gallery-count{font-size:12px;font-weight:750;letter-spacing:.07em;color:#68778b!important;margin:22px 0 12px}
.cg-gallery-thumbnails{display:flex;gap:8px;overflow-x:auto;max-width:100%;padding:4px 2px 9px;scrollbar-width:thin}
.cg-gallery-thumbnails button{flex:0 0 72px;overflow:hidden;border-radius:9px;border:2px solid transparent;
 width:72px;height:56px;padding:0;background:#e0e5ed;cursor:pointer}
.cg-gallery-thumbnails button[aria-current="true"]{border-color:#596979;box-shadow:0 0 0 2px #c5ced8}
.cg-gallery-thumbnails img{display:block;width:100%;height:100%;object-fit:cover}
@media(max-width:767px){.cg-gallery-nav{width:40px;height:40px}.cg-gallery-prev{left:9px}.cg-gallery-next{right:9px}
 .cg-gallery-thumbnails button{flex-basis:64px;width:64px;height:52px}}

</style>
<script>
(function(){
 'use strict';
 document.addEventListener('DOMContentLoaded',function(){
  const modal=document.getElementById('cojukaGalleryModal');
  if(!modal||!window.bootstrap||!bootstrap.Modal)return;
  const viewer=bootstrap.Modal.getOrCreateInstance(modal);
  const picture=document.getElementById('cojukaGalleryImage');
  const title=document.getElementById('cojukaGalleryTitle');
  const sector=document.getElementById('cojukaGallerySector');
  const description=document.getElementById('cojukaGalleryDescription');
  const link=document.getElementById('cojukaGalleryLink');
  const count=document.getElementById('cojukaGalleryCount');
  const thumbs=document.getElementById('cojukaGalleryThumbnails');
  const prev=document.getElementById('cojukaGalleryPrev');
  const next=document.getElementById('cojukaGalleryNext');
  const selector='[data-cg-photo-popup]';
  let gallery=[],position=0,lastTrigger=null;
  function source(trigger){
   return trigger.matches('img')?trigger:trigger.querySelector('img');
  }
  function galleryFor(trigger){
   const section=trigger.closest(
    '.cg-mine-grid,.cg-mine-track,.cojuka-atlas-grid,.cg-marquee-track,.entity-photo-grid,.entity-gallery,.cojuka-photo-gallery,.cojuka-profile-main'
   );
   const collection=section||document;
   return Array.from(collection.querySelectorAll(selector)).filter(item=>!!source(item));
  }
  function display(index,focusThumbnail){
   if(!gallery.length)return;
   position=(index+gallery.length)%gallery.length;
   const target=gallery[position],image=source(target);
   if(!image)return;
   const card=target.closest('.service-card,.photo-showcase,.entity-service-photo,.entity-photo-tile,.cojuka-atlas-photo,.cg-marquee-tile');
   const titleText=target.dataset.photoTitle||
    card?.querySelector('.service-title,.model-label h3,.cg-marquee-caption strong,figcaption')?.textContent?.trim()||
    image.alt||'COJUKA Consulting Group';
   const sectorText=target.dataset.photoSector||
    target.closest('.cojuka-atlas-group')?.querySelector('.cojuka-atlas-heading h3')?.textContent?.trim()||
    card?.querySelector('.service-index,.index,.cg-marquee-caption small')?.textContent?.trim()||
    'COJUKA CONSULTING GROUP';
   const descriptionText=target.dataset.photoDescription||
    card?.querySelector('.service-description,.model-label p,.text-secondary')?.textContent?.trim()||
    'Photographie illustrative des domaines d’activité, des compétences et des perspectives de COJUKA Consulting Group.';
   picture.src=image.currentSrc||image.src;
   picture.alt=image.alt||titleText;
   title.textContent=titleText;
   sector.textContent=sectorText;
   description.textContent=descriptionText;
   const href=target.dataset.photoHref||'';
   link.hidden=!href;
   if(href)link.href=href;
   else link.removeAttribute('href');
   prev.hidden=next.hidden=gallery.length<2;
   count.textContent=gallery.length>1?'Photo '+(position+1)+' sur '+gallery.length:'Photo 1 sur 1';
   const buttons=thumbs.querySelectorAll('button');
   buttons.forEach((b,i)=>b.setAttribute('aria-current',i===position?'true':'false'));
   const selected=buttons[position];
   selected?.scrollIntoView({behavior:'auto',inline:'nearest',block:'nearest'});
   if(focusThumbnail)selected?.focus({preventScroll:true});
  }
  function show(target){
   gallery=galleryFor(target);
   if(!gallery.length)return;
   position=Math.max(0,gallery.indexOf(target));
   lastTrigger=target;
   thumbs.replaceChildren();
   thumbs.hidden=gallery.length<2;
   if(gallery.length>1){
    gallery.forEach((item,i)=>{
     const image=source(item);
     const button=document.createElement('button');
     button.type='button';
     button.setAttribute('aria-label','Afficher la photo '+(i+1)+' sur '+gallery.length);
     const thumb=document.createElement('img');
     thumb.alt='';thumb.loading='lazy';thumb.src=image.currentSrc||image.src;
     button.append(thumb);
     button.addEventListener('click',()=>display(i,true));
     thumbs.append(button);
    });
   }
   display(position,false);
   viewer.show();
  }
  prev.addEventListener('click',()=>display(position-1,false));
  next.addEventListener('click',()=>display(position+1,false));
  document.addEventListener('click',function(event){
   const target=event.target.closest(selector);
   if(!target||modal.contains(target))return;
   event.preventDefault();show(target);
  });
  document.addEventListener('keydown',function(event){
   if((event.key==='Enter'||event.key===' ')&&event.target.matches('img[data-cg-photo-popup]')){
    event.preventDefault();show(event.target);return;
   }
   if(!modal.classList.contains('show')||gallery.length<2)return;
   if(event.key==='ArrowLeft'){event.preventDefault();display(position-1,false)}
   if(event.key==='ArrowRight'){event.preventDefault();display(position+1,false)}
  });
  let swipeX=null;
  const media=modal.querySelector('.cg-gallery-media');
  media.addEventListener('touchstart',event=>{swipeX=event.touches[0]?.clientX??null},{passive:true});
  media.addEventListener('touchend',event=>{
   if(swipeX===null)return;
   const dx=(event.changedTouches[0]?.clientX??swipeX)-swipeX;
   if(Math.abs(dx)>55&&gallery.length>1)display(position+(dx<0?1:-1),false);
   swipeX=null;
  },{passive:true});
  media.addEventListener('touchcancel',()=>swipeX=null,{passive:true});
  modal.addEventListener('hidden.bs.modal',function(){
   picture.removeAttribute('src');
   thumbs.replaceChildren();
   lastTrigger?.focus?.({preventScroll:true});
   lastTrigger=null;gallery=[];
  });
 });
})();
</script>