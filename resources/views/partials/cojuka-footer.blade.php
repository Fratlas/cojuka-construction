<footer class="cojuka-site-footer" role="contentinfo">
 <div class="container">
  <div class="cojuka-footer-main">
   <div class="cojuka-footer-brand"><a href="{{ route('home') }}" aria-label="COJUKA Consulting Group — Accueil">@include('partials.cojuka-logo', ['logoClass'=>'cojuka-brand-logo--small'])</a><p>Construction, logistique, consultance, investissements et développement de secteurs stratégiques.</p></div>
   <div class="cojuka-footer-links"><h2>Explorer</h2><a href="{{ route('home') }}">Accueil</a><a href="{{ route('group') }}">Le Groupe</a><a href="{{ route('group.history') }}">Histoire &amp; Belgique</a><a href="{{ route('group.portal') }}">Nos entités</a><a href="{{ route('home') }}#expertises">Nos expertises</a></div>
   <div class="cojuka-footer-links"><h2>Le groupe</h2><a href="{{ route('group.profile','construction') }}">Construction</a><a href="{{ route('group.profile','logistique') }}">Logistique</a><a href="{{ route('group.profile','consultance') }}">Consultance</a><a href="{{ route('group.profile','kojuka-mining') }}">COJUKA Mining</a></div>
   <div class="cojuka-footer-links"><h2>Contact</h2><p>République démocratique du Congo</p><a href="{{ route('home') }}#contact">Nous contacter ↗</a></div>
  </div>
  <div class="cojuka-footer-bottom"><span>© {{ date('Y') }} COJUKA Consulting Group. Tous droits réservés.</span><span>Groupe multisectoriel · RDC</span></div>
 </div>
</footer>