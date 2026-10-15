<style>
.cojuka-brand-logo{display:inline-block;width:280px;height:76px;object-fit:contain;vertical-align:middle;filter:drop-shadow(0 1px 3px #6d354322)}
.cojuka-brand-logo--small{width:280px;height:76px}.cojuka-brand-logo--large{width:min(420px,85vw);height:auto;max-height:180px}

@media(prefers-reduced-motion:reduce){.cojuka-brand-logo{animation:none!important}}
@media(max-width:991.98px){.cojuka-brand-logo,.cojuka-brand-logo--small{width:205px;height:56px}}
</style>
@php($logoClass = $logoClass ?? '')
<img class="cojuka-brand-logo {{ $logoClass }}" src="{{ asset('images/cojuka-logo.svg') }}?v=20261015-red{{ '' }}" alt="Logo COJUKA Consulting Group" decoding="async" width="280" height="76">