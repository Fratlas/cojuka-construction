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
</style>