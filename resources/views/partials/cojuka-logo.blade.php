<style>
.cojuka-brand-logo{display:inline-block;width:696px;height:192px;object-fit:contain;vertical-align:middle;filter:drop-shadow(0 1px 3px #6d354322)}
.cojuka-brand-logo--small{width:696px;height:192px}.cojuka-brand-logo--large{width:min(300px,78vw);height:auto;max-height:150px}

@media(prefers-reduced-motion:reduce){.cojuka-brand-logo{animation:none!important}}
</style>
@php($logoClass = $logoClass ?? '')
<img class="cojuka-brand-logo {{ $logoClass }}" src="{{ asset('images/cojuka-logo.svg') }}?v=20261015-red{{ '' }}" alt="Logo COJUKA Consulting Group" decoding="async" width="696" height="192">