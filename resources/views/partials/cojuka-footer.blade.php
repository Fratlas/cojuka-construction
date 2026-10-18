<footer class="cojuka-site-footer" role="contentinfo">
 <div class="container">
  @include('partials.cojuka-newsletter')
  <div class="cojuka-footer-main">
   <div class="cojuka-footer-brand">
    <p>Construction, logistique, consultance, investissements et développement de secteurs stratégiques.</p>
    <div class="cg-footer-social">
     <h3>Partager COJUKA</h3>
     <div class="cg-social-links" role="group" aria-label="Partager le site COJUKA Consulting Group">
      <a href="https://www.facebook.com/sharer/sharer.php?u={{ rawurlencode(route('home')) }}" target="_blank" rel="noopener noreferrer" aria-label="Partager COJUKA sur Facebook" title="Partager sur Facebook"><i class="bi bi-facebook" aria-hidden="true"></i></a>
      <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ rawurlencode(route('home')) }}" target="_blank" rel="noopener noreferrer" aria-label="Partager COJUKA sur LinkedIn" title="Partager sur LinkedIn"><i class="bi bi-linkedin" aria-hidden="true"></i></a>
      <a href="https://wa.me/?text={{ rawurlencode('Découvrez COJUKA Consulting Group — '.route('home')) }}" target="_blank" rel="noopener noreferrer" aria-label="Partager COJUKA sur WhatsApp" title="Partager sur WhatsApp"><i class="bi bi-whatsapp" aria-hidden="true"></i></a>
      <a href="https://twitter.com/intent/tweet?url={{ rawurlencode(route('home')) }}&amp;text={{ rawurlencode('COJUKA Consulting Group') }}" target="_blank" rel="noopener noreferrer" aria-label="Partager COJUKA sur X" title="Partager sur X"><i class="bi bi-twitter-x" aria-hidden="true"></i></a>
     </div>
    </div>
    @php($officialSocial = array_filter((array) config('cojuka.social',[]),fn($url)=>is_string($url) && filter_var($url,FILTER_VALIDATE_URL) && parse_url($url,PHP_URL_SCHEME)==='https'))
    @if(count($officialSocial))
     <div class="cg-footer-social cg-official-social"><h3>Comptes officiels</h3><div class="cg-social-links" role="group" aria-label="Comptes officiels COJUKA">
      @foreach($officialSocial as $network=>$link)
       <a href="{{ $link }}" target="_blank" rel="noopener noreferrer" title="{{ ucfirst($network) }} officiel COJUKA" aria-label="Suivre COJUKA sur {{ ucfirst($network) }}"><i class="bi bi-{{ $network==='tiktok'?'tiktok':($network==='youtube'?'youtube':($network==='instagram'?'instagram':($network==='facebook'?'facebook':'linkedin'))) }}" aria-hidden="true"></i></a>
      @endforeach
     </div></div>
    @endif
   </div>
   <div class="cojuka-footer-links"><h2>Explorer</h2><a href="{{ route('home') }}">Accueil</a><a href="{{ route('group') }}">Le Groupe</a><a href="{{ route('group.history') }}">Histoire &amp; Belgique</a><a href="{{ route('group.portal') }}">Nos entités</a><a href="{{ route('home') }}#expertises">Nos expertises</a></div>
   <div class="cojuka-footer-links"><h2>Le groupe</h2><a href="{{ route('group.profile','construction') }}">Construction</a><a href="{{ route('group.profile','logistique') }}">Logistique</a><a href="{{ route('group.profile','consultance') }}">Consultance</a><a href="{{ route('group.profile','kojuka-mining') }}">COJUKA Mining</a></div>
   <div class="cojuka-footer-links"><h2>Contact</h2><p>République démocratique du Congo</p><a href="{{ route('home') }}#contact">Nous contacter ↗</a></div>
  </div>
  <div class="cojuka-footer-bottom"><span>© {{ date('Y') }} COJUKA Consulting Group. Tous droits réservés.</span><span class="d-flex align-items-center flex-wrap gap-3"><a href="{{ route('cojuka.privacy') }}">Politique de confidentialité</a><button type="button" class="cg-cookie-footer-link" data-cojuka-open-cookies>Gérer les cookies</button><span>Groupe multisectoriel · RDC</span></span></div>
 </div>
</footer>