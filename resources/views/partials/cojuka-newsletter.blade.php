<div class="cg-newsletter-wrap" id="newsletter">
 <div class="cg-newsletter-panel">
  <div class="cg-newsletter-copy">
   <p class="cg-newsletter-overline"><i class="bi bi-envelope-paper-heart" aria-hidden="true"></i> La newsletter COJUKA</p>
   <h2>Restez connectés <em>à notre vision.</em></h2>
   <p>Actualités du groupe, perspectives sectorielles, initiatives et projets : recevez nos informations directement par e-mail, après confirmation de votre inscription.</p>
  </div>
  <div class="cg-newsletter-formbox">
   @if(session('newsletter_success'))<div class="cg-newsletter-message" role="status">{{ session('newsletter_success') }}</div>@endif
   @if(session('newsletter_notice'))<div class="cg-newsletter-message" role="alert">{{ session('newsletter_notice') }}</div>@endif
   @if($errors->has('email') || $errors->has('consent'))<div class="cg-newsletter-message" role="alert">{{ $errors->first('email') ?: $errors->first('consent') }}</div>@endif
   <form method="post" action="{{ route('cojuka.newsletter.subscribe') }}" class="cg-newsletter-form">
    @csrf
    <div class="cg-newsletter-trap" aria-hidden="true"><label for="cojuka-web-field">Site web</label><input id="cojuka-web-field" type="text" name="website" tabindex="-1" autocomplete="off"></div>
    <label class="cg-newsletter-label" for="cojuka-newsletter-email">Votre adresse e-mail</label>
    <div class="cg-newsletter-input-row"><input type="email" name="email" id="cojuka-newsletter-email" placeholder="exemple@entreprise.com" maxlength="255" autocomplete="email" required value="{{ old('email') }}" aria-describedby="cojuka-newsletter-privacy"><button type="submit" aria-label="S'inscrire à la newsletter COJUKA"><span>S'inscrire</span><i class="bi bi-arrow-up-right" aria-hidden="true"></i></button></div>
    <label class="cg-newsletter-consent"><input type="checkbox" name="consent" value="1" required {{ old('consent')?'checked':'' }}><span>J’accepte de recevoir les actualités de COJUKA Consulting Group par e-mail. Je peux me désinscrire à tout moment.</span></label>
    <p id="cojuka-newsletter-privacy" class="cg-newsletter-privacy"><i class="bi bi-shield-check" aria-hidden="true"></i> Aucun abonnement sans confirmation par e-mail. Données utilisées uniquement pour la newsletter.</p>
   </form>
  </div>
 </div>
</div>