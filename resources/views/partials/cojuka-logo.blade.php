<style>
/* COJUKA official approved artwork — shared across all site sections. */
.cojuka-brand-logo{display:block;width:clamp(78px,9vw,112px);height:auto;aspect-ratio:1;object-fit:contain;vertical-align:middle;border-radius:10px;filter:none}
.cojuka-brand-logo--small{width:100px}
.cojuka-brand-logo--large{width:min(280px,75vw)}
.cojuka-global-nav .navbar-brand{display:inline-flex;align-items:center}
.cojuka-global-nav .cojuka-brand-logo{width:72px;height:72px;max-height:72px}
@media(max-width:991.98px){.cojuka-global-nav .cojuka-brand-logo{width:54px!important;height:54px!important;max-height:54px!important}}
@media(max-width:375px){.cojuka-global-nav .cojuka-brand-logo{width:46px!important;height:46px!important}}
.cojuka-brand-lockup{display:inline-flex;align-items:center;gap:10px;max-width:100%;vertical-align:middle;min-width:0}
.cojuka-brand-lockup .cojuka-brand-logo{flex:none}
.cojuka-brand-wordmark{display:block;color:#842739;font:800 clamp(10px,1.05vw,15px)/1.3 Arial,sans-serif;letter-spacing:.035em;text-align:left;white-space:nowrap}
html[data-cojuka-theme="dark"] .cojuka-brand-wordmark{color:#fff}
.cojuka-footer-brand .cojuka-brand-wordmark{color:#fff}
@media(max-width:991.98px){.cojuka-global-nav .cojuka-brand-lockup{gap:5px}.cojuka-global-nav .cojuka-brand-wordmark{font-size:9px;letter-spacing:0}}
@media(max-width:375px){.cojuka-global-nav .cojuka-brand-wordmark{font-size:8px}}
/* The approved AVIF already contains its own lettering. Hide only that baked-in
   lettering in compact lockups, keeping the globe and all four red elements.
   The full untouched artwork remains visible in the animated welcome screen. */
.cojuka-brand-logo{
 -webkit-mask-image:linear-gradient(to bottom,#000 0%,#000 72.5%,transparent 72.6%,transparent 83%,#000 83.1%,#000 100%);
 mask-image:linear-gradient(to bottom,#000 0%,#000 72.5%,transparent 72.6%,transparent 83%,#000 83.1%,#000 100%);
}
.cojuka-brand-lockup{gap:7px}
.cojuka-brand-wordmark{margin-left:0;line-height:1.2;flex:none}
</style>
@php($logoClass = $logoClass ?? '')
<span class="cojuka-brand-lockup"><img class="cojuka-brand-logo {{ $logoClass }}" src="{{ asset('images/cojuka-welcome-final.avif') }}?v=20261018-final" alt="COJUKA Consulting Group — emblème officiel avec globe rouge et Afrique" decoding="async" width="1254" height="1254"><span class="cojuka-brand-wordmark">COJUKA<br>CONSULTING<br>GROUP</span></span>