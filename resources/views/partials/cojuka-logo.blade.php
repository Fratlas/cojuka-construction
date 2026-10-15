<style>
.cojuka-brand-logo{display:inline-block;width:130px;height:42px;object-fit:contain;vertical-align:middle;filter:drop-shadow(0 2px 7px #6d354326);animation:cojuka-logo-float 6s ease-in-out infinite;will-change:transform}
.cojuka-brand-logo--small{width:112px;height:36px}.cojuka-brand-logo--large{width:min(420px,85vw);height:auto;max-height:180px}
@keyframes cojuka-logo-float{0%,100%{transform:translateY(0)}50%{transform:translateY(-4px)}}
@media(prefers-reduced-motion:reduce){.cojuka-brand-logo{animation:none!important}}
</style>
@php($logoClass = $logoClass ?? '')
<img class="cojuka-brand-logo {{ $logoClass }}" src="{{ asset('images/cojuka-logo.svg') }}" alt="Logo COJUKA Group" decoding="async" width="130" height="42">