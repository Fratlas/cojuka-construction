<!doctype html>
<html lang="fr">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="COJUKA Construction — Construire l'avenir.">
<title>COJUKA Construction</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<style>
body{font-family:system-ui,-apple-system,"Segoe UI",sans-serif;background:#f5f5f7;color:#1d1d1f}
.navbar{background:rgba(255,255,255,.92);backdrop-filter:blur(18px)}
.hero{min-height:75vh;display:flex;align-items:center;text-align:center}
.hero h1{font-weight:750;letter-spacing:-.055em;font-size:clamp(3rem,8vw,6rem)}
.hero p{font-size:clamp(1.15rem,2.5vw,1.65rem);color:#6e6e73}
</style>
</head>
<body>
<nav class="navbar navbar-expand-lg sticky-top border-bottom"><div class="container">
<a class="navbar-brand fw-bold" href="{{ route('home') }}">COJUKA</a>
<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMain" aria-controls="navMain" aria-expanded="false" aria-label="Afficher le menu"><span class="navbar-toggler-icon"></span></button>
<div class="collapse navbar-collapse" id="navMain"><div class="navbar-nav ms-auto"><a class="nav-link active" href="{{ route('home') }}">Accueil</a></div></div>
</div></nav>
<main class="hero"><div class="container"><p class="text-primary fw-semibold mb-2">COJUKA CONSTRUCTION</p><h1>Construire l'avenir.</h1><p class="mt-4">Une vision moderne de la construction en RDC.</p><span class="small text-secondary">Notre site arrive bientôt.</span></div></main>
<footer class="container border-top py-4 text-center text-secondary small">&copy; {{ date('Y') }} COJUKA Construction</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body></html>
