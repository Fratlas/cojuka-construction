<style>
/* Theme tokens apply to all public-facing Blade pages, including page-local CSS. */
html[data-cojuka-theme="dark"]{color-scheme:dark;--cojuka-wine:#e48a99;--cojuka-ink:#f0f2f7;--cojuka-soft:#151b27}
html[data-cojuka-theme="dark"] body{background:#0d121c!important;color:#f0f2f7!important}
html[data-cojuka-theme="dark"] :is(.soft-section,.soft,.bg-light,section[style*="background:#f5"],section[style*="background: #f5"]){background:#151b27!important;color:#eef0f5!important}
html[data-cojuka-theme="dark"] :is(.info-card,.service-card,.card,.feature-line,.entity-photo-tile,.accordion-item,.list-group-item,.dropdown-menu,.form-control,.form-select){background-color:#202838!important;color:#f0f2f7!important;border-color:#3a4658!important}
html[data-cojuka-theme="dark"] :is(.text-secondary,.muted,.service-description,.feature-description,.intro-copy,.lead.text-secondary,.entity-photo-tile figcaption){color:#b7c0d0!important}
html[data-cojuka-theme="dark"] :is(.display-heading,.display-title,.service-title,.feature-title,.info-card h2,.info-card h3,.card h3){color:#f4f5f8}
html[data-cojuka-theme="dark"] :is(.cojuka-global-nav,.site-nav){background:rgba(18,24,35,.97)!important;border-color:#364052!important}
html[data-cojuka-theme="dark"] .cojuka-global-nav .nav-link{color:#edf0f5!important}
html[data-cojuka-theme="dark"] .cojuka-global-nav .nav-link:hover{color:#ffb4c1!important}
html[data-cojuka-theme="dark"] :is(.cojuka-site-footer,.footer){background:#111723!important;color:#e4e8ef!important;border-color:#394357!important}
html[data-cojuka-theme="dark"] .cojuka-site-footer :is(h2,a,p,.cojuka-footer-bottom){color:#c6cfdd!important}
html[data-cojuka-theme="dark"] :is(.btn-light,.btn-white){background:#e7ebf3!important;color:#161b26!important}
html[data-cojuka-theme="dark"] :is(.btn-dark,.btn-dark-custom){background:#344158!important;color:#fff!important}
html[data-cojuka-theme="dark"] :is(.badge.text-bg-light,.badge.bg-light){background:#2a3547!important;color:#eaf0fa!important;border-color:#46536a!important}
html[data-cojuka-theme="dark"] .accordion-button{background:#202838!important;color:#f0f2f7!important}
html[data-cojuka-theme="dark"] .accordion-button::after{filter:invert(1)}
html[data-cojuka-theme="dark"] .dropdown-item{color:#eaf0f8}
html[data-cojuka-theme="dark"] .dropdown-item:hover{background:#364158;color:#fff}
html[data-cojuka-theme="dark"] .cojuka-language-trigger{color:#f2f4f7!important}
html[data-cojuka-theme="dark"] .cojuka-theme-toggle{color:#f4f5fa;background:#293246;border-color:#56627a}
.cojuka-theme-toggle{display:inline-flex;align-items:center;justify-content:center;gap:7px;width:43px;height:40px;border-radius:30px;background:#f3f3f5;border:1px solid #dedee3;color:#222631;cursor:pointer;flex-shrink:0;transition:background .2s,color .2s,border-color .2s}
.cojuka-theme-toggle:hover{border-color:#a55b68}
.cojuka-theme-toggle:focus-visible{outline:3px solid #b88a55;outline-offset:2px}
.cojuka-theme-toggle svg{width:19px;height:19px;stroke:currentColor;stroke-width:1.8;fill:none;stroke-linecap:round;stroke-linejoin:round}
.cojuka-theme-toggle .theme-sun{display:none}
html[data-cojuka-theme="dark"] .cojuka-theme-toggle .theme-sun{display:block}
html[data-cojuka-theme="dark"] .cojuka-theme-toggle .theme-moon{display:none}
@media(max-width:575px){.cojuka-theme-toggle{width:36px;height:36px}}
</style>
<script>
(function(){
 function apply(theme){
  var value=theme==='dark'?'dark':'light';
  document.documentElement.setAttribute('data-cojuka-theme',value);
  document.querySelectorAll('.cojuka-theme-toggle').forEach(function(b){
   b.setAttribute('aria-label',value==='dark'?'Activer le mode clair':'Activer le mode sombre');
   b.setAttribute('title',value==='dark'?'Mode clair':'Mode sombre');
   b.setAttribute('aria-pressed',String(value==='dark'));
  });
  var meta=document.querySelector('meta[name="theme-color"]');
  if(meta)meta.setAttribute('content',value==='dark'?'#0d121c':'#ffffff');
 }
 function init(){
  var saved=null;
  try{saved=localStorage.getItem('cojuka-theme')}catch(e){}
  apply(saved==='dark'||saved==='light'?saved:(window.matchMedia&&window.matchMedia('(prefers-color-scheme: dark)').matches?'dark':'light'));
  document.querySelectorAll('.cojuka-theme-toggle').forEach(function(b){
   b.addEventListener('click',function(){
    var next=document.documentElement.getAttribute('data-cojuka-theme')==='dark'?'light':'dark';
    try{localStorage.setItem('cojuka-theme',next)}catch(e){}
    apply(next);
   });
  });
 }
 if(document.readyState==='loading')document.addEventListener('DOMContentLoaded',init,{once:true});else init();
})();
</script>