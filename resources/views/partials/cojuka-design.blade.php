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
</style>