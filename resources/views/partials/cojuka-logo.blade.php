<style>
.cojuka-brand-logo{display:inline-block;width:280px;height:76px;object-fit:contain;vertical-align:middle;filter:drop-shadow(0 1px 3px #6d354322)}
.cojuka-brand-logo--small{width:280px;height:76px}
html[data-cojuka-theme="dark"] .cojuka-brand-logo{content:url('{{ asset('images/cojuka-logo-dark.svg') }}?v=20261016-white');filter:drop-shadow(0 2px 6px rgba(0,0,0,.15))}
.cojuka-brand-logo--large{width:min(420px,85vw);height:auto;max-height:180px}

@media(prefers-reduced-motion:reduce){.cojuka-brand-logo{animation:none!important}}
@media(max-width:991.98px){
.cojuka-global-nav .navbar-brand{flex:0 1 auto;min-width:0;max-width:calc(100% - 200px);margin-right:6px!important}
.cojuka-global-nav .navbar-brand .cojuka-brand-logo{display:block;width:clamp(108px,28vw,166px)!important;height:auto!important;max-height:48px;object-fit:contain;object-position:left center}
.cojuka-global-nav .cojuka-mobile-nav-actions{flex:0 0 auto;gap:3px}
.cojuka-global-nav .cojuka-mobile-nav-actions .cojuka-theme-toggle{width:35px;height:35px;margin-right:2px!important}
.cojuka-global-nav .cojuka-mobile-nav-actions .cojuka-language-trigger{padding:6px 3px!important;font-size:.82rem}
.cojuka-global-nav .cojuka-mobile-nav-actions .navbar-toggler{padding:5px!important}
.cojuka-brand-logo,.cojuka-brand-logo--small{width:205px;height:56px}
}
@media(max-width:375px){
.cojuka-global-nav .navbar-brand .cojuka-brand-logo{width:108px!important}
.cojuka-global-nav .cojuka-mobile-nav-actions .cojuka-current-flag{display:none}
}
</style>
@php($logoClass = $logoClass ?? '')
<img class="cojuka-brand-logo {{ $logoClass }}" src="{{ asset('images/cojuka-logo.svg') }}?v=20261015-red{{ '' }}" alt="Logo COJUKA Consulting Group" decoding="async" width="280" height="76">