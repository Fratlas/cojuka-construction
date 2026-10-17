@extends('gestion.group-layout')
@section('title','Guide interne')
@section('content')
@php
$modules=[
 ['entites','Sociétés & filiales','bi-buildings','Consulter les entités et leurs informations.',['Ouvrir « Sociétés & filiales » depuis le menu.','Consulter la liste et sélectionner la fiche concernée.','Si votre rôle l’autorise, renseigner le formulaire de création ou de modification.','Enregistrer puis vérifier la fiche dans la liste.']],
 ['projets','Projets','bi-kanban','Organiser les projets du groupe.',['Accéder à « Projets ».','Vérifier les projets existants et l’entité associée.','Si autorisé, saisir les informations demandées dans le formulaire.','Enregistrer et contrôler le résultat dans la liste.']],
 ['actifs','Actifs','bi-box-seam','Suivre les actifs enregistrés.',['Accéder à « Actifs ».','Consulter les actifs visibles pour votre compte.','Si autorisé, compléter les informations de l’actif.','Enregistrer et vérifier la fiche.']],
 ['rh','Ressources humaines','bi-person-vcard','Suivre les informations du personnel.',['Accéder à « Ressources humaines ».','Consulter la liste du personnel de vos entités autorisées.','Si autorisé, renseigner matricule, identité, poste, contrat et dates.','Vérifier les données, enregistrer et contrôler la fiche.']],
 ['finances','Finances','bi-wallet2','Consulter les opérations financières accessibles.',['Accéder à « Finances ».','Choisir l’entité concernée si le formulaire le demande.','Saisir les champs requis uniquement si vous avez le droit de création.','Vérifier les montants et enregistrer.']],
 ['contrats','Contrats','bi-file-earmark-text','Consulter et organiser les contrats.',['Accéder à « Contrats ».','Rechercher le contrat ou ouvrir le formulaire autorisé.','Compléter les informations demandées et vérifier les dates.','Enregistrer et contrôler la liste.']],
 ['achats','Achats','bi-bag-check','Suivre les achats.',['Accéder à « Achats ».','Consulter les enregistrements disponibles.','Si autorisé, remplir le formulaire en vérifiant les références.','Enregistrer puis contrôler le résultat.']],
 ['logistique','Logistique','bi-truck','Suivre les opérations logistiques.',['Accéder à « Logistique ».','Identifier l’opération et l’entité concernées.','Si autorisé, saisir les informations disponibles.','Enregistrer et vérifier la ligne créée.']],
 ['immobilier','Immobilier','bi-houses','Suivre les dossiers immobiliers.',['Accéder à « Immobilier ».','Consulter les dossiers disponibles.','Si autorisé, renseigner les caractéristiques demandées.','Enregistrer et contrôler les informations.']],
 ['mines','Mines','bi-gem','Suivre les dossiers du domaine minier.',['Accéder à « Mines ».','Consulter les éléments de votre périmètre autorisé.','Si autorisé, compléter le formulaire de suivi.','Enregistrer et vérifier les données saisies.']],
 ['consulting','Consulting','bi-briefcase','Suivre les missions de conseil.',['Accéder à « Consulting ».','Consulter les missions enregistrées.','Si autorisé, compléter le formulaire de suivi.','Enregistrer et contrôler le résultat.']],
];
@endphp
<style>
.guide-hero{background:#142235;color:white;padding:clamp(24px,4vw,48px);border-radius:22px;position:relative;overflow:hidden}
.guide-hero:after{content:"";position:absolute;width:280px;height:280px;right:-90px;top:-140px;border:1px solid #ffffff24;border-radius:50%;pointer-events:none}
.guide-hero p{color:#d1dae4;max-width:740px}.guide-kicker{font-size:.77rem;letter-spacing:.14em;text-transform:uppercase;color:#bcd0e1}
.guide-card{background:#fff;border:1px solid #e5eaf0;border-radius:17px;padding:23px;height:100%;box-shadow:0 8px 26px #12243c0b}
.guide-card h3{font-size:1.12rem}.guide-card .bi{font-size:1.4rem;color:#425e79}
.guide-card ol{padding-left:22px;color:#48566a}.guide-card li{margin-bottom:10px}
.guide-card a{display:inline-flex;align-items:center;gap:8px;font-weight:700}
.guide-steps{counter-reset:step;display:grid;grid-template-columns:repeat(3,minmax(0,1fr));gap:15px}
.guide-steps>div{padding:23px;background:#fff;border:1px solid #e5eaf0;border-radius:16px}
.guide-steps>div:before{counter-increment:step;content:counter(step,decimal-leading-zero);display:block;color:#68809a;font-weight:800;margin-bottom:10px}
.guide-search{max-width:510px}
@media(max-width:800px){.guide-steps{grid-template-columns:1fr}}
@media print{.sidebar,.topbar,#cojuka-ai-launch,#cojuka-ai-panel,.guide-search,.guide-print{display:none!important}.workspace{width:100%}.guide-card{break-inside:avoid}.page-content{padding:0}}
</style>
<div class="guide-hero mb-4">
 <div class="guide-kicker mb-2">Centre d’aide · COJUKA Executive Suite</div>
 <h1 class="fw-bold mb-3">Guide interne de gestion</h1>
 <p class="mb-3">Apprenez à utiliser votre espace de travail, module par module, grâce à des instructions simples et progressives. Seules les fonctionnalités autorisées pour votre compte sont proposées ci-dessous.</p>
 <button type="button" class="btn btn-light guide-print" onclick="window.print()"><i class="bi bi-printer me-2"></i>Imprimer le guide</button>
</div>
<h2 class="mb-3">Bien démarrer</h2>
<div class="guide-steps mb-5">
 <div><h3 class="h5 fw-bold">Accéder à la gestion</h3><p class="text-secondary mb-0">Connectez-vous avec votre compte personnel. N’utilisez jamais le mot de passe d’un collègue.</p></div>
 <div><h3 class="h5 fw-bold">Choisir un module</h3><p class="text-secondary mb-0">Utilisez le menu latéral pour ouvrir le domaine dont vous avez besoin. Les modules non autorisés ne sont pas affichés.</p></div>
 <div><h3 class="h5 fw-bold">Vérifier et enregistrer</h3><p class="text-secondary mb-0">Relisez les champs avant validation. Vérifiez ensuite que l’enregistrement apparaît dans la liste correspondante.</p></div>
</div>
<div class="d-flex align-items-center justify-content-between flex-wrap gap-3 mb-3"><div><h2 class="mb-1">Tutoriels par module</h2><p class="text-secondary mb-0">Choisissez le domaine que vous souhaitez apprendre.</p></div><input class="form-control guide-search" type="search" id="guide-filter" placeholder="Rechercher un module…" aria-label="Rechercher un module"></div>
<div class="row g-3" id="guide-modules">
 @foreach($modules as $module)
 @if(\App\Support\GroupAccess::can(auth()->user(),$module[0]))
 @php $moduleUrl=in_array($module[0],['entites','projets','actifs'],true)?route('gestion.group.list',$module[0]):route('gestion.suite.index',$module[0]); @endphp
 <div class="col-lg-6 guide-module" data-name="{{ mb_strtolower($module[1]) }}">
  <article class="guide-card">
   <div class="d-flex gap-3 align-items-center mb-3"><i class="bi {{ $module[2] }}" aria-hidden="true"></i><div><h3 class="fw-bold mb-1">{{ $module[1] }}</h3><p class="text-secondary mb-0">{{ $module[3] }}</p></div></div>
   <ol>@foreach($module[4] as $step)<li>{{ $step }}</li>@endforeach</ol>
   <a href="{{ $moduleUrl }}">Ouvrir le module <i class="bi bi-arrow-up-right"></i></a>
  </article>
 </div>
 @endif
 @endforeach
</div>
@if(auth()->user()?->is_group_admin)
<div class="guide-card mt-4"><h2 class="h5 fw-bold"><i class="bi bi-shield-lock me-2"></i>Administration des accès</h2><p>La direction peut vérifier les utilisateurs, leurs départements et les autorisations de chaque module. Accordez uniquement les droits nécessaires et vérifiez les accès après toute modification.</p><div class="d-flex flex-wrap gap-2"><a class="btn btn-outline-dark" href="{{ route('gestion.users.index') }}">Utilisateurs & accès</a><a class="btn btn-outline-dark" href="{{ route('gestion.departments.index') }}">Permissions départements</a></div></div>
@endif
<div class="guide-card mt-4"><h2 class="h5 fw-bold">Bonnes pratiques</h2><p class="mb-0">Contrôlez toujours l’entité et les données avant l’enregistrement. Évitez les doublons. N’envoyez jamais de mots de passe ou de données confidentielles dans le chat de l’assistant. En cas d’accès refusé, contactez votre administrateur : le guide ne modifie pas vos permissions.</p></div>
<script>
document.addEventListener('DOMContentLoaded',function(){var field=document.getElementById('guide-filter');if(!field)return;field.addEventListener('input',function(){var q=field.value.trim().toLocaleLowerCase('fr');document.querySelectorAll('.guide-module').forEach(function(card){card.hidden=!card.dataset.name.includes(q)})})});
</script>
@endsection