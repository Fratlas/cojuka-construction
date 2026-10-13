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
.cojuka-global-nav{background:rgba(255,255,255,.94)!important;backdrop-filter:blur(20px);border-bottom:1px solid rgba(0,0,0,.07);min-height:68px;z-index:1040}.cojuka-global-nav .navbar-brand{margin-right:clamp(12px,2vw,36px)}.cojuka-global-nav .navbar-nav{gap:clamp(2px,.8vw,14px)}.cojuka-global-nav .nav-link{color:#414145;font-size:clamp(.73rem,.86vw,.88rem);font-weight:550;margin-left:0!important;padding:.6rem .35rem!important}.cojuka-global-nav .nav-link:hover{color:#86212e}.cojuka-global-nav .nav-contact{border:1px solid #dedee2;border-radius:50px;padding:.58rem 1rem!important}.cojuka-global-nav .navbar-brand img{width:42px;height:42px;object-fit:contain}.cojuka-global-nav .dropdown-menu{z-index:1060}.cojuka-global-nav .navbar-nav form{flex-shrink:0}@media(max-width:1199.98px){.cojuka-global-nav .navbar-nav{gap:0}.cojuka-global-nav .nav-link{font-size:.76rem;padding:.5rem .25rem!important}}@media(max-width:991.98px){.cojuka-global-nav .navbar-collapse{max-height:calc(100vh - 80px);overflow-y:auto}.cojuka-global-nav .nav-link{font-size:.94rem;padding:.65rem .3rem!important}.cojuka-global-nav .nav-contact{display:inline-flex}.cojuka-global-nav .navbar-nav form{margin:10px 0}} 
</style>