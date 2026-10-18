<!doctype html>
<html lang="fr">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="theme-color" content="#ffffff">
<link rel="shortcut icon" href="{{ asset('favicon.svg') }}?v=3" type="image/svg+xml">
<link rel="icon" type="image/svg+xml" sizes="any" href="{{ asset('favicon.svg') }}?v=3">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
@yield('page_head')
@include('partials.cojuka-design')
@include('partials.cojuka-theme')
<style>
.cojuka-site-footer{background:#f5f5f7!important;color:#17191d!important;padding:70px 0 22px!important;font-family:-apple-system,BlinkMacSystemFont,"Segoe UI",Arial,sans-serif}
.cojuka-footer-main{display:grid;grid-template-columns:2.2fr repeat(3,1fr);gap:clamp(24px,4vw,65px);padding-bottom:55px}
.cojuka-footer-brand img{width:220px!important;height:auto!important;max-height:70px}
.cojuka-footer-brand p{max-width:340px;margin:0;color:#686a70;font-size:.95rem;line-height:1.8}
.cojuka-footer-links{display:flex;flex-direction:column;align-items:flex-start;gap:12px}
.cojuka-footer-links h2{font-size:.85rem;font-weight:800;color:#17191d;margin:0 0 9px}
.cojuka-footer-links a,.cojuka-footer-links p{font-size:.89rem;color:#64666b!important;text-decoration:none;margin:0;line-height:1.65}
.cojuka-footer-links a:hover{color:#86212e!important}
.cojuka-footer-bottom{border-top:1px solid #e0e1e4;padding-top:24px;display:flex;flex-wrap:wrap;justify-content:space-between;gap:12px;font-size:.8rem;color:#797b81}
.cojuka-footer-bottom a,.cojuka-footer-bottom .cg-cookie-footer-link{
 display:inline-flex;align-items:center;color:inherit;text-decoration:underline;text-underline-offset:3px;
 border:0;background:none;padding:0;font-size:inherit;line-height:inherit;cursor:pointer
}
.cojuka-footer-bottom a:hover,.cojuka-footer-bottom .cg-cookie-footer-link:hover{color:#253244!important}
.cojuka-footer-bottom a:focus-visible,.cojuka-footer-bottom .cg-cookie-footer-link:focus-visible{outline:3px solid #9aa7b5;outline-offset:3px}

@media(max-width:991.98px){.cojuka-footer-main{grid-template-columns:repeat(2,minmax(0,1fr))}}
@media(max-width:575.98px){.cojuka-site-footer{padding-top:48px!important}.cojuka-footer-main{grid-template-columns:repeat(2,minmax(0,1fr));gap:32px 18px;padding-bottom:36px}.cojuka-footer-brand{grid-column:1/-1}.cojuka-footer-bottom{flex-direction:column}}
</style>
<link rel="stylesheet" href="{{ asset('css/cojuka-glass.css') }}?v=20261018-aurora-05">
<link rel="stylesheet" href="{{ asset('css/cojuka-contrast.css') }}?v=20261018-contrast-02">
<link rel="stylesheet" href="{{ asset('css/cojuka-editorial.css') }}?v=20261018-truewhite-fade-04">
<link rel="stylesheet" href="{{ asset('css/cojuka-neutral.css') }}?v=20261018-graphite-darkwhite-03">
</head>
<body class="cojuka-glass cojuka-glass-public">
@include('partials.cojuka-header')
@yield('content')
@include('partials.cojuka-footer')
@include('partials.cojuka-gallery-modal')
@include('partials.cojuka-cookies')
@include('partials.cojuka-back-to-top')
@include('partials.cojuka-ai-assistant')
@include('partials.cojuka-mining-announcement')
<script defer src="https://cdn.jsdelivr.net/npm/gsap@3.12.7/dist/gsap.min.js"></script>
<script defer src="https://cdn.jsdelivr.net/npm/gsap@3.12.7/dist/ScrollTrigger.min.js"></script>
@include('partials.cojuka-motion')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
@yield('page_scripts')
<script defer src="{{ asset('js/cojuka-glow.js') }}?v=20261018-aurora-01"></script>
</body>
</html>