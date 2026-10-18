{{-- Module-specific summary based on the current authorized query and filters. --}}
@php
 $cgStatusEntries=collect($statusStats)->map(fn($n)=>(int)$n)->filter(fn($n)=>$n>0)->sortDesc();
 $cgStatusMax=max(1,(int)($cgStatusEntries->max()??0));
@endphp
<section class="cg-suite-status" aria-labelledby="cg-suite-status-title">
 <div class="cg-chart-panel">
  <div class="cg-chart-panel-head">
   <div>
    <h2 class="cg-chart-title" id="cg-suite-status-title">Suivi graphique des statuts</h2>
    <p class="cg-chart-caption">Répartition des {{ $config['label'] }} selon les filtres appliqués</p>
   </div>
   <span class="cg-chart-type" aria-hidden="true"><i class="bi bi-bar-chart-steps"></i></span>
  </div>
  @if($cgStatusEntries->isNotEmpty())
   <ul class="cg-bar-list">
    @foreach($cgStatusEntries as $status=>$number)
    <li class="cg-bar-item">
     <div class="cg-bar-row"><span class="cg-bar-label">{{ \App\Http\Controllers\GroupSuiteController::STATUSES[$status] ?? ucfirst(str_replace('_',' ',$status ?: 'Non défini')) }}</span><strong class="cg-bar-value">{{ $number }}</strong></div>
     <div class="cg-bar-track" role="img" aria-label="{{ $number }} enregistrements au statut {{ $status }}"><span class="cg-bar-fill" style="width:{{ round($number/$cgStatusMax*100,2) }}%"></span></div>
    </li>
    @endforeach
   </ul>
  @else
   <p class="cg-chart-empty mb-0"><span>Aucun enregistrement à représenter pour les filtres sélectionnés.</span></p>
  @endif
 </div>
</section>
