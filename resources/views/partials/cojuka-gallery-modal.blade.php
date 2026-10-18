{{-- Shared gallery lightbox for photographic illustrations across COJUKA pages. --}}
<div class="modal fade cg-gallery-modal" id="cojukaGalleryModal" tabindex="-1" aria-hidden="true"
 aria-labelledby="cojukaGalleryTitle" aria-describedby="cojukaGalleryDescription">
 <div class="modal-dialog modal-dialog-centered modal-xl modal-fullscreen-sm-down">
  <div class="modal-content">
   <button type="button" class="cg-gallery-close" data-bs-dismiss="modal" aria-label="Fermer la photo"><i class="bi bi-x-lg" aria-hidden="true"></i></button>
   <div class="cg-gallery-layout">
    <div class="cg-gallery-media"><img id="cojukaGalleryImage" src="" alt="" loading="eager" decoding="async"></div>
    <div class="cg-gallery-details">
     <p class="cg-gallery-eyebrow" id="cojukaGallerySector">COJUKA CONSULTING GROUP</p>
     <h2 id="cojukaGalleryTitle">Découvrir une image</h2>
     <div class="cg-gallery-rule" aria-hidden="true"></div>
     <p id="cojukaGalleryDescription">Découvrez les métiers et domaines d’intervention du groupe.</p>
     <p class="cg-gallery-disclaimer"><i class="bi bi-info-circle" aria-hidden="true"></i> Photographie d’illustration : elle ne représente pas nécessairement une réalisation de COJUKA.</p>
     <a id="cojukaGalleryLink" class="cg-gallery-link" href="#" hidden>Explorer ce secteur <i class="bi bi-arrow-up-right" aria-hidden="true"></i></a>
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
  const selector='[data-cg-photo-popup]';
  function openPhoto(target){
   const image=target.matches('img')?target:target.querySelector('img');
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
   viewer.show();
  }
  document.addEventListener('click',function(event){
   const trigger=event.target.closest(selector);
   if(!trigger)return;
   event.preventDefault();
   openPhoto(trigger);
  });
  document.addEventListener('keydown',function(event){
   if((event.key==='Enter'||event.key===' ')&&
     event.target.matches('img[data-cg-photo-popup]')){
    event.preventDefault();openPhoto(event.target);
   }
  });
  modal.addEventListener('hidden.bs.modal',function(){picture.removeAttribute('src');});
 });
})();
</script>