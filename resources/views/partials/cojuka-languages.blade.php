<style>
.cojuka-language-switch{display:inline-flex;align-items:center;gap:5px;white-space:nowrap;padding:5px 8px;border:1px solid #e8e1e3;border-radius:99px;background:#fff}
.cojuka-language-switch button{border:0;background:transparent;color:#777;font-size:.72rem;font-weight:750;letter-spacing:.03em;padding:5px 3px;border-radius:6px}
.cojuka-language-switch button[aria-pressed="true"]{color:#86212e;background:#f8e9ed}
.cojuka-language-switch span{color:#c5bfc2;font-size:.7rem}
@media(max-width:991.98px){.cojuka-language-switch{margin-top:14px;margin-bottom:8px}}
.cojuka-language-switch{gap:3px;padding:5px 7px;border:1px solid #e7dadd;box-shadow:0 2px 12px #0000000a}
.cojuka-language-switch button{display:inline-flex;align-items:center;justify-content:center;gap:4px;font-size:.79rem;font-weight:800;color:#505057;padding:7px 6px;min-height:34px}
.cojuka-language-switch button span{font-size:1.15rem;line-height:1;filter:saturate(1.1)}
.cojuka-language-switch button[aria-pressed="true"]{color:#86212e;background:#f5e4e8}
.cojuka-mobile-nav-actions{gap:10px;flex-shrink:0}
.cojuka-mobile-nav-actions .cojuka-language-switch{margin:0!important}
.cojuka-mobile-nav-actions .navbar-toggler{margin:0;padding:7px}
@media(max-width:480px){.cojuka-mobile-nav-actions{gap:3px}.cojuka-language-switch{gap:0;padding:3px}.cojuka-language-switch button{font-size:.7rem;padding:5px 3px}.cojuka-language-switch button span{font-size:1rem}.cojuka-mobile-nav-actions .navbar-toggler{padding:5px}}
@media(max-width:360px){.cojuka-language-switch button{font-size:0;gap:0}.cojuka-language-switch button span{font-size:1.1rem}}

/* Compact flag language dropdown */
.cojuka-language-switch{position:relative;display:inline-block!important;padding:0!important;border:0!important;background:transparent!important;box-shadow:none!important;margin:0!important}
.cojuka-language-trigger{display:inline-flex;align-items:center;justify-content:center;gap:6px;min-width:78px;height:38px;border:1px solid #e7dadd;border-radius:22px;background:#fff;color:#26262b;font-size:.79rem;font-weight:800;padding:5px 12px;box-shadow:0 2px 12px #0000000a;cursor:pointer}
.cojuka-language-trigger:hover,.cojuka-language-trigger:focus-visible{background:#faf3f4;border-color:#cdb1b7}
.cojuka-current-flag{font-size:1.17rem;line-height:1}
.cojuka-language-trigger.dropdown-toggle::after{margin-left:1px;font-size:.65rem}
.cojuka-language-menu{min-width:168px!important;padding:7px!important;margin-top:9px!important;border:1px solid #eee4e6!important;border-radius:14px!important;box-shadow:0 14px 38px #11182720!important;z-index:1080!important}
.cojuka-language-menu .dropdown-item{display:flex;align-items:center;gap:11px;padding:10px 12px;border-radius:9px;font-size:.86rem;font-weight:650;color:#26262b}
.cojuka-language-menu .dropdown-item span{font-size:1.18rem;line-height:1}
.cojuka-language-menu .dropdown-item[aria-pressed="true"]{background:#f8ecee;color:#86212e}
.cojuka-mobile-nav-actions .cojuka-language-switch{margin:0!important}
@media(max-width:480px){.cojuka-language-trigger{height:36px;min-width:66px;padding:5px 9px;font-size:.73rem}.cojuka-current-flag{font-size:1.07rem}}
</style>
<script>
(function(){
'use strict';
const dictionary={"Accueil":{"en":"Home","es":"Inicio"},"Le Groupe":{"en":"The Group","es":"El Grupo"},"Nos entités":{"en":"Our entities","es":"Nuestras entidades"},"Nos expertises":{"en":"Our expertise","es":"Nuestras especialidades"},"Nous contacter ↗":{"en":"Contact us ↗","es":"Contáctenos ↗"},"Connexion":{"en":"Sign in","es":"Iniciar sesión"},"Tableau de bord":{"en":"Dashboard","es":"Panel de control"},"Déconnexion":{"en":"Sign out","es":"Cerrar sesión"},"Découvrir toutes les entités →":{"en":"Explore all entities →","es":"Descubrir todas las entidades →"},"GROUPE MULTISECTORIEL · RÉPUBLIQUE DÉMOCRATIQUE DU CONGO":{"en":"MULTISECTOR GROUP · DEMOCRATIC REPUBLIC OF THE CONGO","es":"GRUPO MULTISECTORIAL · REPÚBLICA DEMOCRÁTICA DEL CONGO"},"Construction, logistique, consultance étatique et privée, investissements et développement des secteurs stratégiques.":{"en":"Construction, logistics, public and private consulting, investment and strategic sector development.","es":"Construcción, logística, consultoría pública y privada, inversiones y desarrollo de sectores estratégicos."},"Découvrir Consulting Group":{"en":"Discover the Group","es":"Descubrir el Grupo"},"Défiler":{"en":"Scroll","es":"Desplazar"},"La construction":{"en":"Construction","es":"La construcción"},"prend vie en 3D.":{"en":"comes to life.","es":"cobra vida."},"L'excellence se révèle":{"en":"Excellence is revealed","es":"La excelencia se revela"},"dans chaque détail.":{"en":"in every detail.","es":"en cada detalle."},"Découvrez deux univers visuels : la puissance des chantiers et l'élégance de l'architecture contemporaine.":{"en":"Explore two visual worlds: the power of construction sites and the elegance of contemporary architecture.","es":"Descubra dos universos visuales: la fuerza de las obras y la elegancia de la arquitectura contemporánea."},"Engins et travaux de chantier":{"en":"Construction machinery and works","es":"Maquinaria y obras de construcción"},"Architecture contemporaine":{"en":"Contemporary architecture","es":"Arquitectura contemporánea"},"Puissance, coordination et précision au service des projets.":{"en":"Power, coordination and precision for every project.","es":"Potencia, coordinación y precisión al servicio de los proyectos."},"Volumes raffinés, lumière naturelle et matériaux élégants.":{"en":"Refined volumes, natural light and elegant materials.","es":"Volúmenes refinados, luz natural y materiales elegantes."},"Photographies d'illustration, non présentées comme des réalisations de COJUKA.":{"en":"Illustrative photographs; these are not presented as COJUKA projects.","es":"Fotografías ilustrativas; no se presentan como proyectos realizados por COJUKA."},"Le futur prend forme aujourd'hui.":{"en":"The future takes shape today.","es":"El futuro toma forma hoy."},"Chaque détail compte.":{"en":"Every detail matters.","es":"Cada detalle importa."},"Votre prochain projet":{"en":"Your next project","es":"Su próximo proyecto"},"commence ici.":{"en":"starts here.","es":"comienza aquí."},"Nous écrire":{"en":"Write to us","es":"Escríbanos"},"Présentation institutionnelle":{"en":"Institutional overview","es":"Presentación institucional"},"Découvrir l'entité ↗":{"en":"Explore this entity ↗","es":"Descubrir esta entidad ↗"},"Découvrir cette entité ↗":{"en":"Explore this entity ↗","es":"Descubrir esta entidad ↗"},"Toutes les entités":{"en":"All entities","es":"Todas las entidades"},"Notre mission":{"en":"Our mission","es":"Nuestra misión"},"Notre vision":{"en":"Our vision","es":"Nuestra visión"},"À qui nous nous adressons":{"en":"Who we work with","es":"A quién nos dirigimos"},"Des interlocuteurs, des besoins spécifiques.":{"en":"Different partners, specific needs.","es":"Diferentes interlocutores, necesidades específicas."},"Exemples de livrables":{"en":"Example deliverables","es":"Ejemplos de entregables"},"Des résultats documentés.":{"en":"Documented outcomes.","es":"Resultados documentados."},"Questions fréquentes":{"en":"Frequently asked questions","es":"Preguntas frecuentes"},"L'essentiel à savoir.":{"en":"What you need to know.","es":"Lo esencial que debe saber."},"Entrons en contact":{"en":"Get in touch","es":"Hablemos"},"Parlons de votre projet.":{"en":"Let's discuss your project.","es":"Hablemos de su proyecto."},"Contacter le groupe ↗":{"en":"Contact the Group ↗","es":"Contactar al Grupo ↗"},"Les entités du groupe":{"en":"The Group's entities","es":"Las entidades del grupo"},"Notre organisation":{"en":"Our organisation","es":"Nuestra organización"},"Projets et initiatives":{"en":"Projects and initiatives","es":"Proyectos e iniciativas"}};
const keys=Object.keys(dictionary).sort((a,b)=>b.length-a.length);
const originals=new WeakMap();
function apply(lang){
 if(!['fr','en','es'].includes(lang))lang='fr';
 document.documentElement.lang=lang;
 document.querySelectorAll('[data-cojuka-lang]').forEach(b=>b.setAttribute('aria-pressed',String(b.dataset.cojukaLang===lang)));
 const flags={fr:'🇫🇷',en:'🇬🇧',es:'🇪🇸'};
 document.querySelectorAll('.cojuka-language-switch').forEach(s=>{
  const flag=s.querySelector('.cojuka-current-flag');
  const code=s.querySelector('.cojuka-current-code');
  if(flag)flag.textContent=flags[lang];
  if(code)code.textContent=lang.toUpperCase();
 });
 const root=document.querySelector('main')||document.body;
 const walker=document.createTreeWalker(document.body,NodeFilter.SHOW_TEXT,{acceptNode(node){
  const parent=node.parentElement;
  if(!parent||parent.closest('script,style,textarea,code,pre,.cojuka-language-switch,[contenteditable]'))return NodeFilter.FILTER_REJECT;
  return NodeFilter.FILTER_ACCEPT;
 }});
 let node;
 while(node=walker.nextNode()){
  if(!originals.has(node))originals.set(node,node.nodeValue);
  const original=originals.get(node);
  if(lang==='fr'){if(node.nodeValue!==original)node.nodeValue=original;continue;}
  let translated=original;
  for(const key of keys){
   if(translated.includes(key))translated=translated.split(key).join(dictionary[key][lang]);
  }
  if(node.nodeValue!==translated)node.nodeValue=translated;
 }
}
function current(){try{return localStorage.getItem('cojuka-language')||'fr'}catch(e){return 'fr'}}
document.addEventListener('DOMContentLoaded',()=>{
 document.querySelectorAll('[data-cojuka-lang]').forEach(button=>button.addEventListener('click',()=>{
  const lang=button.dataset.cojukaLang;
  try{localStorage.setItem('cojuka-language',lang)}catch(e){}
  apply(lang);
 }));
 apply(current());
});
})();
</script>