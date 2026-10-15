<style>
.cojuka-brand-logo{display:inline-block;width:52px;height:52px;object-fit:contain;vertical-align:middle;filter:drop-shadow(0 2px 7px #6d354326);animation:cojuka-logo-float 6s ease-in-out infinite;will-change:transform}
.cojuka-brand-logo--small{width:42px;height:42px}.cojuka-brand-logo--large{width:min(290px,75vw);height:auto;max-height:260px}
@keyframes cojuka-logo-float{0%,100%{transform:translateY(0)}50%{transform:translateY(-4px)}}
@media(prefers-reduced-motion:reduce){.cojuka-brand-logo{animation:none!important}}
</style>
@php($logoClass = $logoClass ?? '')
<img class="cojuka-brand-logo {{ $logoClass }}" src="{{ asset('images/cojuka-logo.svg') }}" alt="Logo COJUKA Group" decoding="async" width="52" height="52">