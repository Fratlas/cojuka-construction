<style>
/* COJUKA official approved artwork — shared across all site sections. */
.cojuka-brand-logo{display:block;width:clamp(78px,9vw,112px);height:auto;aspect-ratio:1;object-fit:contain;vertical-align:middle;border-radius:10px;filter:none}
.cojuka-brand-logo--small{width:100px}
.cojuka-brand-logo--large{width:min(280px,75vw)}
.cojuka-global-nav .navbar-brand{display:inline-flex;align-items:center}
.cojuka-global-nav .cojuka-brand-logo{width:72px;height:72px;max-height:72px}
@media(max-width:991.98px){.cojuka-global-nav .cojuka-brand-logo{width:54px!important;height:54px!important;max-height:54px!important}}
@media(max-width:375px){.cojuka-global-nav .cojuka-brand-logo{width:46px!important;height:46px!important}}
</style>
@php($logoClass = $logoClass ?? '')
<img class="cojuka-brand-logo {{ $logoClass }}" src="{{ asset('images/cojuka-welcome-final.avif') }}?v=20261018-final" alt="COJUKA Consulting Group — emblème officiel avec globe rouge et Afrique" decoding="async" width="1254" height="1254">