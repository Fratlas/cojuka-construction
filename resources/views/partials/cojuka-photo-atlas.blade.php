@php
$cojukaIllustrations = [["Mining et carrières","kojuka-mining",["photo-1504307651254-35680f356dfd","photo-1581092160607-ee22621dd758","photo-1519003722824-194d4455a60c"],["Engins et terrassement","Équipements industriels","Transport sur site industriel"]],["Construction et génie civil","construction",["photo-1487958449943-2429e8be8625","photo-1504307651254-35680f356dfd","photo-1600585154340-be6161a56a0c"],["Architecture et bâtiments","Chantier de construction","Projet immobilier construit"]],["Logistique et cargo","logistique",["photo-1586528116311-ad8dd3c8310d","photo-1578575437130-527eed3abbec","photo-1494412519320-aa613dfb7738"],["Entrepôt logistique","Conteneurs et transport","Fret maritime"]],["Immobilier et investissement","eden-park-investments",["photo-1600607687920-4e2a09cf159d","photo-1600596542815-ffad4c1539a9","photo-1600566753190-17f0baa2a6c3"],["Projet immobilier","Architecture résidentielle","Aménagement intérieur"]],["Énergie et matériel","energie",["photo-1509391366360-2e959784a276","photo-1473341304170-971dccb5ac1e","photo-1581092160607-ee22621dd758"],["Panneaux photovoltaïques","Infrastructure électrique","Équipements techniques"]],["Éducation, santé et services","education",["photo-1503676260728-1c00da094a0b","photo-1519494026892-80bbd2d6fd0d","photo-1497366811353-6870744d04b2"],["Environnement éducatif","Infrastructure hospitalière","Espaces de travail et conseil"]]];
@endphp
<section class="cojuka-photo-atlas" aria-labelledby="cojuka-atlas-title">
 <div class="container">
  <p class="cojuka-atlas-eyebrow">Notre univers en images</p>
  <h2 id="cojuka-atlas-title">Des secteurs. Des perspectives concrètes.</h2>
  <p class="cojuka-atlas-intro">Découvrez les domaines d’intervention du groupe à travers une sélection de photographies d’illustration. Ces visuels ne constituent pas des références de projets réalisés par COJUKA.</p>
  @foreach($cojukaIllustrations as $group)
  <div class="cojuka-atlas-group">
   <div class="cojuka-atlas-heading"><h3>{{ $group[0] }}</h3><a href="{{ route('group.profile',$group[1]) }}">Découvrir le secteur ↗</a></div>
   <div class="cojuka-atlas-grid">
    @foreach($group[2] as $i=>$photo)
    <figure class="cojuka-atlas-photo">
     <img src="https://images.unsplash.com/{{ $photo }}?auto=format&amp;fit=crop&amp;w=900&amp;q=76" alt="{{ $group[3][$i] }}" width="900" height="650" loading="lazy" decoding="async">
     <figcaption>{{ $group[3][$i] }}</figcaption>
    </figure>
    @endforeach
   </div>
  </div>
  @endforeach
 </div>
</section>
<style>
.cojuka-photo-atlas{background:#f5f6f7;color:#20252c;padding:clamp(60px,8vw,115px) 0}
.cojuka-atlas-eyebrow{font-size:.82rem;letter-spacing:.14em;text-transform:uppercase;color:#68717c;font-weight:400}
.cojuka-photo-atlas h2{font-size:clamp(2.2rem,4.6vw,4.8rem);letter-spacing:-.055em;font-weight:780;max-width:800px}
.cojuka-atlas-intro{max-width:850px;color:#59636e;font-size:1.08rem;line-height:1.7;margin:18px 0 50px}
.cojuka-atlas-group{margin:0 0 50px}
.cojuka-atlas-heading{display:flex;align-items:center;justify-content:space-between;flex-wrap:wrap;gap:14px;margin-bottom:18px}
.cojuka-atlas-heading h3{font-size:clamp(1.3rem,2vw,1.9rem);font-weight:700;margin:0}
.cojuka-atlas-heading a{color:#4e5965;text-decoration:none}
.cojuka-atlas-grid{display:grid;grid-template-columns:repeat(3,minmax(0,1fr));gap:16px}
.cojuka-atlas-photo{margin:0;overflow:hidden;border-radius:18px;background:#e3e6e9}
.cojuka-atlas-photo img{display:block;width:100%;height:auto;aspect-ratio:4/3;object-fit:cover;transition:transform .7s cubic-bezier(.2,.8,.2,1)}
.cojuka-atlas-photo:hover img{transform:scale(1.055)}
.cojuka-atlas-photo figcaption{padding:13px 16px;font-size:.89rem;color:#3f4a55;background:#fff}
@media(max-width:700px){.cojuka-atlas-grid{grid-template-columns:repeat(2,minmax(0,1fr));gap:10px}.cojuka-atlas-photo figcaption{font-size:.8rem;padding:10px}.cojuka-atlas-grid .cojuka-atlas-photo:last-child{grid-column:1/-1}.cojuka-atlas-grid .cojuka-atlas-photo:last-child img{aspect-ratio:16/8}}
@media(prefers-reduced-motion:reduce){.cojuka-atlas-photo img{transition:none!important}.cojuka-atlas-photo:hover img{transform:none}}
</style>