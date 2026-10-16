<style>
/* COJUKA design system — shared across public and management pages */
:root{--cojuka-wine:#86212e;--cojuka-gold:#b88a55;--cojuka-ink:#151b28;--cojuka-soft:#f6f7f9}
html{scroll-behavior:smooth}body{-webkit-font-smoothing:antialiased}
a,button,.btn{transition:color .22s ease,background-color .22s ease,border-color .22s ease,box-shadow .22s ease,transform .22s ease}
a:focus-visible,button:focus-visible,input:focus-visible,select:focus-visible,textarea:focus-visible{outline:3px solid var(--cojuka-gold);outline-offset:3px}
.navbar .navbar-brand{display:inline-flex;align-items:center;gap:10px;white-space:nowrap}
.navbar .cojuka-brand-logo{flex-shrink:0}
.navbar .container,.navbar .container-fluid{column-gap:12px}
.navbar .navbar-nav{align-items:center}
.navbar .nav-link{white-space:nowrap}
.navbar .btn{white-space:nowrap}
@media(min-width:992px){.navbar .navbar-nav{flex-wrap:nowrap!important}.navbar .container,.navbar .container-fluid{max-width:100%;padding-left:clamp(20px,3vw,60px);padding-right:clamp(20px,3vw,60px)}}
@media(max-width:991.98px){.navbar .navbar-nav{align-items:flex-start}.navbar .nav-link{padding:.6rem 0}.navbar .navbar-collapse{padding:12px 0}}
@media(prefers-reduced-motion:reduce){html{scroll-behavior:auto!important}*,*::before,*::after{animation-duration:.01ms!important;transition-duration:.01ms!important}}
.cojuka-global-nav{background:rgba(255,255,255,.94)!important;backdrop-filter:blur(20px);border-bottom:1px solid rgba(0,0,0,.07);min-height:68px;z-index:1040}.cojuka-global-nav .navbar-brand{margin-right:clamp(12px,2vw,36px)}.cojuka-global-nav .navbar-nav{gap:clamp(2px,.8vw,14px)}.cojuka-global-nav .nav-link{color:#414145;font-size:clamp(.73rem,.86vw,.88rem);font-weight:550;margin-left:0!important;padding:.6rem .35rem!important}.cojuka-global-nav .nav-link:hover{color:#86212e}.cojuka-global-nav .nav-contact{border:1px solid #dedee2;border-radius:50px;padding:.58rem 1rem!important}.cojuka-global-nav .navbar-brand .cojuka-brand-logo{width:clamp(190px,17vw,248px)!important;height:auto!important;max-height:70px;object-fit:contain;display:block}
@media(max-width:991.98px){.cojuka-global-nav .navbar-brand .cojuka-brand-logo{width:205px!important;max-height:60px}}
@media(max-width:420px){.cojuka-global-nav .navbar-brand .cojuka-brand-logo{width:178px!important}}.cojuka-global-nav .dropdown-menu{z-index:1060}.cojuka-global-nav .navbar-nav form{flex-shrink:0}@media(max-width:1199.98px){.cojuka-global-nav .navbar-nav{gap:0}.cojuka-global-nav .nav-link{font-size:.76rem;padding:.5rem .25rem!important}}@media(max-width:991.98px){.cojuka-global-nav .navbar-collapse{max-height:calc(100vh - 80px);overflow-y:auto}.cojuka-global-nav .nav-link{font-size:.94rem;padding:.65rem .3rem!important}.cojuka-global-nav .nav-contact{display:inline-flex}.cojuka-global-nav .navbar-nav form{margin:10px 0}} 

/* Premium editorial system: consistent scale, surfaces, spacing and focus states */
:root{--cojuka-wine:#86212e;--cojuka-ink:#17191d;--cojuka-muted:#667085;--cojuka-border:#e9e9ec;--cojuka-radius:22px}
html{scroll-padding-top:100px}
body{letter-spacing:-.008em}
::selection{background:#86212e;color:white}
.cojuka-global-nav{box-shadow:0 1px 0 #00000008}
.cojuka-global-nav .navbar-nav{gap:clamp(2px,.45vw,8px)}
.cojuka-global-nav .nav-link{font-size:clamp(.76rem,.83vw,.87rem);font-weight:600;letter-spacing:-.012em}
.cojuka-global-nav .nav-contact{background:#86212e;color:#fff!important;border-color:#86212e;transition:background .2s,transform .2s}
.cojuka-global-nav .nav-contact:hover{background:#641622;transform:translateY(-1px)}
.cojuka-global-nav .dropdown-menu{border:1px solid var(--cojuka-border)!important;border-radius:16px;padding:9px;box-shadow:0 24px 70px #11182718!important}
.cojuka-global-nav .dropdown-item{border-radius:9px;font-size:.9rem;white-space:normal;line-height:1.4}
.cojuka-global-nav .dropdown-item:hover,.cojuka-global-nav .dropdown-item:focus{background:#f8eff1;color:#86212e}
@media(min-width:992px) and (max-width:1350px){.cojuka-global-nav .navbar-brand .cojuka-brand-logo{width:190px!important}.cojuka-global-nav .nav-link{font-size:.75rem;padding:.5rem .22rem!important}}
@media(max-width:991.98px){.cojuka-global-nav .navbar-toggler{padding:10px;border-radius:12px}.cojuka-global-nav .navbar-collapse{padding:18px 4px}.cojuka-global-nav .navbar-nav{align-items:stretch}.cojuka-global-nav .nav-link{font-size:1rem;padding:.75rem .5rem!important}.cojuka-global-nav .nav-contact{justify-content:center;margin-top:8px}.cojuka-global-nav .dropdown-menu{box-shadow:none!important}}

/* COJUKA unified responsive type and spacing tokens — 2026 design review */
:root{
 --cojuka-space-1:.5rem;--cojuka-space-2:1rem;--cojuka-space-3:1.5rem;--cojuka-space-4:2rem;
 --cojuka-section-space:clamp(3.5rem,7vw,6.5rem);
 --cojuka-content-width:1320px;
 --cojuka-type-body:clamp(.95rem,.18vw + .92rem,1.06rem);
 --cojuka-type-h1:clamp(2.65rem,5.5vw,5.7rem);
 --cojuka-type-h2:clamp(2rem,3.8vw,3.9rem);
 --cojuka-type-h3:clamp(1.25rem,1.6vw,1.75rem);
}
body{font-size:var(--cojuka-type-body);line-height:1.6}
img,video,svg{max-width:100%}
img{height:auto}
.container{--bs-gutter-x:clamp(1.5rem,3vw,3rem)}
main,section,article{min-width:0}
h1,h2,h3,h4,h5,h6{overflow-wrap:break-word}
p{overflow-wrap:break-word}
.btn{min-height:42px;display:inline-flex;align-items:center;justify-content:center;gap:.4rem}
.btn:focus-visible,.form-control:focus-visible,.form-select:focus-visible{outline:3px solid #b88a55;outline-offset:2px}
.form-control,.form-select{font-size:max(16px,1rem)}
@media(max-width:575.98px){.container{--bs-gutter-x:1.5rem}.btn{max-width:100%}h1{hyphens:auto}}

/* COJUKA cinematic micro-interactions: restrained, accessible, GPU-friendly */
@keyframes cojuka-soft-enter{from{opacity:0;transform:translateY(26px)}to{opacity:1;transform:translateY(0)}}
@keyframes cojuka-mining-sheen{from{transform:translateX(-140%) rotate(12deg)}to{transform:translateX(270%) rotate(12deg)}}
@keyframes cojuka-pulse-line{0%,100%{opacity:.35;transform:scaleX(.6)}50%{opacity:1;transform:scaleX(1)}}
body:not(.cojuka-reduced-motion) main .service-card,body:not(.cojuka-reduced-motion) main article.service{transition:transform .5s cubic-bezier(.22,1,.36,1),box-shadow .5s ease,border-color .3s ease}
@media(hover:hover){main .service-card:hover,main article.service:hover{transform:translateY(-9px);box-shadow:0 22px 50px rgba(14,26,42,.13)}main .service-card:hover img{transform:scale(1.065)}}
main .service-card img{transition:transform 1s cubic-bezier(.22,1,.36,1)}
main .btn-brand,main .btn-pill,main a.btn{position:relative;transition:transform .3s ease,box-shadow .3s ease,background .3s ease}
@media(hover:hover){main .btn-brand:hover,main .btn-pill:hover,main a.btn:hover{transform:translateY(-3px);box-shadow:0 14px 30px rgba(25,27,38,.15)}}
.cojuka-global-nav .navbar-brand img{transition:transform .5s ease}
.cojuka-global-nav .navbar-brand:hover img{transform:scale(1.035)}
@media(prefers-reduced-motion:reduce){main .service-card,main article.service,main .service-card img,main .btn-brand,main .btn-pill,main a.btn,.cojuka-global-nav .navbar-brand img{animation:none!important;transition:none!important;transform:none!important}}

/* Typographie des petits libellés : fine, légère et cohérente sur toutes les pages publiques. */
body :is(.section-kicker,.eyebrow,.tag,.cma-kicker,.ci-caption,.service-index,.photo-showcase-tag,.cojuka-slide-index,.scroll-indicator,.index,.entity-photo-tile figcaption small){
 font-weight:400!important;
 letter-spacing:.065em;
}
body :is(.section-kicker,.eyebrow,.tag,.cma-kicker,.ci-caption,.service-index,.photo-showcase-tag,.cojuka-slide-index,.scroll-indicator){text-transform:uppercase}
body .section-kicker{font-size:.85rem}
body .eyebrow{font-size:.8rem}
body .info-card .index{font-weight:400!important}
body :is(.cma-kicker,.ci-caption){font-weight:400!important}

/* Harmonisation : tous les micro-titres bordeaux des sections en graisse light. */
body :is(.history-label,.history-kicker,.cojuka-entities-kicker,.cojuka-entity-label,.cojuka-entity-slide .tag,.section-kicker,.eyebrow,.service-index,.service-card .service-index,.photo-showcase-tag,.cma-kicker,.tag,.info-card .index,.feature-label,.section-label,.mini-label,.overline,.small-title){
 font-weight:300!important;
 font-synthesis:weight;
 letter-spacing:.065em;
}
body :is(.history-label,.history-kicker,.cojuka-entities-kicker,.cojuka-entity-label,.section-kicker,.eyebrow,.service-index,.photo-showcase-tag,.cma-kicker,.tag,.feature-label,.section-label,.mini-label,.overline,.small-title){text-transform:uppercase}

/* Public UI polish: smoother navigation, clearer image presentation, stronger keyboard focus. */
main img[loading="lazy"]{background-color:#e9edf2}
main :is(.service-card,.info-card,.entity-photo-tile){will-change:auto}
main :is(.service-card,.info-card,.entity-photo-tile):focus-within{outline:2px solid #a22a40;outline-offset:3px}
.cojuka-global-nav .dropdown-menu{border-radius:16px!important;padding:10px!important;box-shadow:0 18px 46px rgba(19,27,41,.14)!important}
.cojuka-global-nav .dropdown-item{border-radius:9px;transition:background .18s ease,color .18s ease}
.cojuka-global-nav .dropdown-item:focus-visible{outline:2px solid #a22a40;outline-offset:2px}
@media(hover:hover){.cojuka-global-nav .dropdown-item:hover{background:rgba(134,33,46,.075)}}
@media(prefers-reduced-motion:reduce){.cojuka-global-nav .dropdown-item{transition:none!important}}
</style>