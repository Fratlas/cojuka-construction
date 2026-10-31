/* COJUKA Management mobile navigation and table accessibility.
 * Progressive enhancement — desktop navigation and forms remain unchanged.
 */
(function(){
 'use strict';
 function ready(){
  const toggle=document.getElementById('menuToggle');
  const sidebar=document.getElementById('sideNav');
  const overlay=document.getElementById('mobileOverlay');
  const closeButton=document.getElementById('cgSidebarClose');
  if(!toggle||!sidebar||!overlay)return;
  const mobile=window.matchMedia('(max-width:900px)');
  let restoreFocus=false;
  function opened(){return mobile.matches&&sidebar.classList.contains('open')}
  function sync(){
   const isOpen=opened();
   document.body.classList.toggle('cg-admin-nav-open',isOpen);
   overlay.classList.toggle('show',isOpen);
   overlay.setAttribute('aria-hidden',String(!isOpen));
   sidebar.inert=mobile.matches&&!isOpen;
   toggle.setAttribute('aria-expanded',String(isOpen));
   toggle.setAttribute('aria-label',isOpen?'Fermer le menu de gestion':'Ouvrir le menu de gestion');
   if(closeButton)closeButton.hidden=!mobile.matches;
  }
  function close(returnFocus){
   const wasOpen=opened();
   sidebar.classList.remove('open');
   sync();
   if(wasOpen&&returnFocus)toggle.focus({preventScroll:true});
  }
  function open(){
   if(!mobile.matches)return;
   sidebar.classList.add('open');
   sync();
   if(closeButton)closeButton.focus({preventScroll:true});
  }
  toggle.addEventListener('click',()=>opened()?close(true):open());
  closeButton?.addEventListener('click',()=>close(true));
  overlay.addEventListener('click',()=>close(true));
  sidebar.addEventListener('click',event=>{
   const link=event.target.closest('a[href]');
   if(link&&mobile.matches)close(false);
  });
  document.addEventListener('keydown',event=>{
   if(!opened())return;
   if(event.key==='Escape'){
    event.preventDefault();close(true);return;
   }
   if(event.key!=='Tab')return;
   const options=Array.from(sidebar.querySelectorAll(
    'a[href],button:not([disabled]):not([hidden]),select:not([disabled]),input:not([disabled]),[tabindex]:not([tabindex="-1"])'
   )).filter(el=>!el.hidden&&el.getClientRects().length);
   if(!options.length){event.preventDefault();return}
   const first=options[0],last=options[options.length-1];
   if(event.shiftKey&&document.activeElement===first){event.preventDefault();last.focus()}
   else if(!event.shiftKey&&document.activeElement===last){event.preventDefault();first.focus()}
  });
  const onMedia=()=>{if(!mobile.matches)sidebar.classList.remove('open');sync()};
  if(typeof mobile.addEventListener==='function')mobile.addEventListener('change',onMedia);
  else mobile.addListener(onMedia);
  sync();

  // Wide management tables retain ALL columns and action forms. Make the
  // horizontal scrolling discoverable and keyboard accessible on phones.
  const wrappers=Array.from(document.querySelectorAll('.page-content .table-responsive'));
  const hints=[];
  for(let index=0;index<wrappers.length;index++){
   const wrapper=wrappers[index];
   const table=wrapper.querySelector('table');
   if(!table)continue;
   wrapper.setAttribute('tabindex','0');
   wrapper.setAttribute('role','region');
   const headings=Array.from(table.querySelectorAll('thead th')).map(th=>th.textContent.trim()).filter(Boolean);
   wrapper.setAttribute('aria-label',headings.length?'Tableau : '+headings.slice(0,2).join(', '):'Tableau de gestion défilable');
   const note=document.createElement('p');
   note.className='cg-table-scroll-label';
   note.id='cg-table-scroll-'+(index+1);
   const icon=document.createElement('i');
   icon.className='bi bi-arrow-left-right';
   icon.setAttribute('aria-hidden','true');
   note.append(icon,document.createTextNode(' Faites glisser pour afficher toutes les colonnes'));
   note.hidden=true;
   wrapper.parentNode.insertBefore(note,wrapper);
   wrapper.setAttribute('aria-describedby',note.id);
   hints.push({wrapper,note});
  }
  function updateHints(){
   for(const {wrapper,note} of hints){
    note.hidden=!(window.innerWidth<=900&&wrapper.scrollWidth-wrapper.clientWidth>10);
   }
  }
  window.addEventListener('resize',updateHints,{passive:true});
  if(typeof ResizeObserver!=='undefined'){
   const observer=new ResizeObserver(updateHints);
   hints.forEach(({wrapper})=>observer.observe(wrapper));
  }
  updateHints();
 }
 if(document.readyState==='loading')document.addEventListener('DOMContentLoaded',ready,{once:true});
 else ready();
})();
