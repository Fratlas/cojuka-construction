@extends('layouts.cojuka-public')
@section('page_head')
<title>Politique de confidentialité et cookies — COJUKA Consulting Group</title>
<meta name="description" content="Politique de confidentialité de COJUKA Consulting Group : données personnelles, newsletter, formulaires, espace de gestion, cookies et choix de confidentialité.">
@endsection
@section('content')
<main class="cg-privacy-page" style="padding:clamp(65px,8vw,125px) 0;background:#FFFFFF;min-height:75svh">
 <div class="container" style="max-width:980px">
  <p class="cg-kicker">COJUKA CONSULTING GROUP · VIE PRIVÉE</p>
  <h1 class="cg-section-title">Confidentialité <em>& cookies.</em></h1>
  <p class="cg-section-lead mb-3">Cette page explique quelles informations sont traitées lors de votre utilisation de ce site et comment gérer vos préférences.</p>
  <p class="small text-secondary mb-5">Dernière mise à jour : 18 octobre 2026. Cette information décrit les fonctions actuellement intégrées au projet ; elle doit être revue si les prestataires ou les usages évoluent.</p>
  <div class="card p-4 p-lg-5" style="border-radius:24px">
   <h2 class="h4 fw-bold">1. Responsable du site et contact</h2>
   <p>Le site est présenté sous le nom <strong>COJUKA Consulting Group</strong>, en République démocratique du Congo. Pour une question relative à vos données, une demande de rectification ou de suppression, utilisez la <a href="{{ route('home') }}#contact">rubrique Contact</a>. Les coordonnées juridiques complètes du responsable et des prestataires devront être complétées et validées par l’organisation.</p>

   <h2 class="h4 fw-bold mt-4">2. Quelles informations sont recueillies ?</h2>
   <p>Selon les fonctionnalités utilisées, le site peut traiter : votre adresse e-mail lors d’une inscription volontaire à la newsletter, vos messages lorsque vous utilisez un formulaire de contact, et les données de compte nécessaires à l’accès à la gestion. L’espace réservé aux collaborateurs peut également contenir des informations professionnelles, des coordonnées et des documents d’entreprise ou de personnel, uniquement pour les utilisateurs habilités.</p>
   <p>Les journaux techniques du serveur peuvent enregistrer des informations nécessaires à la sécurité et au fonctionnement, comme la date d’accès, les pages demandées, le navigateur et l’adresse IP.</p>

   <h2 class="h4 fw-bold mt-4">3. Pourquoi les informations sont-elles utilisées ?</h2>
   <p>Les informations servent à répondre aux demandes, sécuriser les accès, gérer les dossiers et opérations autorisés et, si vous avez donné votre accord, gérer votre abonnement aux actualités de COJUKA. Les données des dossiers privés ne sont pas publiées automatiquement sur la vitrine du groupe.</p>

   <h2 class="h4 fw-bold mt-4">4. Newsletter</h2>
   <p>L’abonnement est facultatif et exige votre accord explicite. Le formulaire enregistre l’adresse e-mail, la date de demande et la date de confirmation. Un lien envoyé par e-mail permet de confirmer l’inscription. Tant que ce lien n’a pas été validé, l’adresse n’est pas considérée comme abonnée. Une désinscription supprime l’inscription du registre. Aucune campagne de masse n’est automatisée dans la version actuelle du projet.</p>

   <h2 class="h4 fw-bold mt-4" id="cookies">5. Politique des cookies</h2>
   <p>Un cookie est une petite donnée enregistrée par votre navigateur. Le site utilise des mécanismes nécessaires pour sécuriser les formulaires et maintenir les sessions, et un cookie de préférence pour mémoriser vos choix. Les noms exacts des cookies de session peuvent dépendre de la configuration Laravel déployée.</p>
   <div class="table-responsive">
    <table class="table align-middle">
     <thead><tr><th scope="col">Catégorie</th><th scope="col">Fonction</th><th scope="col">Choix</th></tr></thead>
     <tbody>
      <tr><td><strong>Session et sécurité</strong></td><td>Exemples : cookie de session Laravel et protection CSRF / XSRF-TOKEN, si configurés par l’hébergement.</td><td>Nécessaires aux fonctions demandées</td></tr>
      <tr><td><strong>Préférence COJUKA</strong></td><td><code>cojuka_cookie_preferences</code> conserve vos choix pendant 180 jours.</td><td>Nécessaire pour retenir la décision</td></tr>
      <tr><td><strong>Mesure d’audience</strong></td><td>Catégorie facultative, non utilisée par un outil de mesure installé dans la version actuelle.</td><td>Consentement préalable si ajoutée</td></tr>
      <tr><td><strong>Marketing</strong></td><td>Aucun outil de publicité facultatif n’est intégré dans la version actuelle.</td><td>Consentement préalable si ajouté</td></tr>
     </tbody>
    </table>
   </div>
   <p>Les cookies facultatifs restent refusés tant que vous ne les avez pas acceptés. Vous pouvez enregistrer vos choix, les refuser ou rouvrir les paramètres à tout moment :</p>
   <button type="button" class="btn btn-outline-dark rounded-pill px-4" data-cojuka-open-cookies><i class="bi bi-sliders me-2" aria-hidden="true"></i>Gérer mes cookies</button>

   <h2 class="h4 fw-bold mt-4">6. Photographies, vidéos et ressources externes</h2>
   <p>Le site utilise notamment des images d’illustration provenant d’Unsplash, des bibliothèques chargées depuis un CDN et, selon le média, des vidéos externes. Lorsque le navigateur télécharge ces ressources, le prestataire concerné peut recevoir des informations techniques telles que l’adresse IP. Ce chargement de ressources visuelles est distinct du consentement aux éventuels cookies analytiques ou publicitaires. Les visuels d’illustration ne sont pas présentés comme des réalisations propres à COJUKA.</p>

   <h2 class="h4 fw-bold mt-4">7. Accès, protection et conservation</h2>
   <p>Les données de gestion et les pièces jointes du personnel ou des entreprises sont destinées aux utilisateurs disposant des permissions appropriées. Les documents chargés par le module prévu à cet effet sont stockés dans un espace Laravel privé et nécessitent une autorisation pour être téléchargés. La conservation des données doit être limitée à ce qui est nécessaire aux finalités concernées et aux obligations applicables ; des durées de conservation détaillées doivent être fixées par le responsable du site.</p>

   <h2 class="h4 fw-bold mt-4">8. Vos demandes</h2>
   <p>Vous pouvez contacter l’organisation pour demander des informations concernant vos données, leur rectification ou leur suppression, sous réserve des obligations applicables. Pour la newsletter, utilisez également le lien de désinscription transmis par e-mail. Pour les cookies facultatifs, modifiez directement vos préférences avec le bouton ci-dessus.</p>
   <p class="mb-0 mt-4"><a href="{{ route('home') }}">← Retour à l’accueil COJUKA</a></p>
  </div>
 </div>
</main>
@endsection