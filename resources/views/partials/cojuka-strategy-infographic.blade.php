<section class="cg-strategy" aria-labelledby="cg-strategy-title">
 <div class="container">
  <div class="cg-strategy-top">
   <div class="cg-strategy-copy">
    <p class="cg-kicker"><span class="cg-kicker-line"></span> Notre écosystème</p>
    <h2 id="cg-strategy-title" class="cg-section-title">Un groupe.<br><em>Des expertises connectées.</em></h2>
    <p class="cg-section-lead">Les pôles d’activité se complètent pour accompagner les besoins en ressources, infrastructures, investissements et conseil.</p>
    <a href="{{ route('group.portal') }}" class="cg-strategy-link">Découvrir les entités <i class="bi bi-arrow-up-right" aria-hidden="true"></i></a>
   </div>
   <div class="cg-infographic" role="img" aria-label="Infographie illustrative de six domaines : Mining, Construction, Logistique, Immobilier, Consultance et Coopération. Il ne s'agit pas de proportions financières.">
    <div class="cg-wheel"><div class="cg-wheel-center"><small>ÉCOSYSTÈME</small><strong>COJUKA</strong><span>6 pôles illustrés</span></div></div>
    <div class="cg-infographic-legend">
     @foreach([['Mining','#86212e'],['Construction','#b84a5e'],['Logistique','#d3a466'],['Immobilier','#243851'],['Consultance','#637d9c'],['Coopération','#aebfd3']] as [$label,$color])
     <span><i style="background:{{ $color }}" aria-hidden="true"></i>{{ $label }}</span>
     @endforeach
    </div>
    <p class="cg-infographic-note">Répartition thématique illustrative, non statistique.</p>
   </div>
  </div>
  <div class="cg-method-head"><span class="cg-kicker">Méthode & accompagnement</span><span class="cg-method-rule" aria-hidden="true"></span></div>
  <div class="cg-process-grid">
   @foreach([['01','bi-search','Analyser','Comprendre les enjeux, le contexte et les besoins.'],['02','bi-diagram-3','Structurer','Organiser les ressources et coordonner les expertises.'],['03','bi-buildings','Déployer','Accompagner la mise en œuvre des projets.'],['04','bi-arrow-repeat','Suivre','Faire évoluer les solutions dans la durée.']] as [$number,$icon,$title,$text])
    <article class="cg-process-card"><div class="cg-process-card-top"><span>{{ $number }} / 04</span><i class="bi {{ $icon }}" aria-hidden="true"></i></div><h3>{{ $title }}</h3><p>{{ $text }}</p></article>
   @endforeach
  </div>
 </div>
</section>
<section class="cg-charter" aria-labelledby="cg-charter-title">
 <div class="container cg-charter-inner">
  <div><p class="cg-kicker"><span class="cg-kicker-line"></span> Notre signature visuelle</p><h2 id="cg-charter-title" class="cg-section-title">L’exigence jusque <em>dans les détails.</em></h2>
  <p class="cg-section-lead">Une identité fondée sur la force du bordeaux, l’élégance de l’or et la précision du bleu nuit. Le logo officiel conserve toujours ses couleurs et ses proportions.</p></div>
  <div class="cg-palette" aria-label="Couleurs de la charte COJUKA">
   <div class="cg-swatch cg-swatch-wine"><span>Bordeaux</span><code>#86212E</code></div>
   <div class="cg-swatch cg-swatch-gold"><span>Or</span><code>#B88A55</code></div>
   <div class="cg-swatch cg-swatch-navy"><span>Bleu nuit</span><code>#151B28</code></div>
   <div class="cg-swatch cg-swatch-ivory"><span>Ivoire</span><code>#F6F7F9</code></div>
  </div>
 </div>
</section>