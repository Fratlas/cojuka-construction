@extends('layouts.cojuka-public')
@section('page_head')
<title>Confidentialité et newsletter — COJUKA Consulting Group</title>
<meta name="description" content="Informations sur le traitement des inscriptions à la newsletter de COJUKA Consulting Group.">
@endsection
@section('content')
<main class="cg-privacy-page" style="padding:clamp(70px,9vw,135px) 0;background:#f6f7f9;min-height:70svh">
 <div class="container" style="max-width:900px">
  <p class="cg-kicker">COJUKA · Transparence</p>
  <h1 class="cg-section-title">Confidentialité <em>& newsletter.</em></h1>
  <p class="cg-section-lead mb-5">Voici comment fonctionne l’inscription aux actualités du groupe sur ce site.</p>
  <div class="card p-4 p-lg-5" style="border-radius:24px">
   <h2 class="h4 fw-bold">Informations collectées</h2>
   <p>L’inscription à la newsletter enregistre l’adresse e-mail renseignée, la date de consentement et, le cas échéant, la date de confirmation. Aucune inscription n’est activée sans vérification de l’adresse par e-mail.</p>
   <h2 class="h4 fw-bold mt-4">Finalité et envoi</h2>
   <p>Ces informations servent à gérer les abonnements et à envoyer les communications relatives aux activités et actualités de COJUKA Consulting Group. La délivrance des messages de confirmation passe par le prestataire de messagerie configuré sur le site. Aucun envoi de campagne en masse n’est automatisé actuellement.</p>
   <h2 class="h4 fw-bold mt-4">Choix et désinscription</h2>
   <p>L’inscription est facultative. Vous pouvez ne pas confirmer la demande. Chaque e-mail de confirmation contient un lien de désinscription signé, qui permet de supprimer l’adresse du registre des abonnements. Les campagnes futures devront également proposer ce mécanisme.</p>
   <h2 class="h4 fw-bold mt-4">Accès aux données</h2>
   <p>La liste des abonnés est accessible uniquement à l’administration autorisée du groupe. Les exports portent sur les adresses confirmées.</p>
   <h2 class="h4 fw-bold mt-4">Nous contacter</h2>
   <p class="mb-0">Pour toute question ou demande concernant votre abonnement, utilisez la <a href="{{ route('home') }}#contact">rubrique Contact du site</a>.</p>
  </div>
 </div>
</main>
@endsection