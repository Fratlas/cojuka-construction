{{-- Server-rendered, accessible charts. No fake numbers, third-party scripts or exposed raw records. --}}
@php
 $cgCanSuite=collect(array_keys(\App\Http\Controllers\GroupSuiteController::MODULES))->contains(fn($module)=>\App\Support\GroupAccess::can(auth()->user(),$module));
 $cgPalette=['#26364B','#56697F','#8394A8','#AEBCCB','#D1D9E2','#6C8197','#94A3B6'];
 $cgProjectCounts=collect($projectStatuses)->map(fn($value)=>(int)$value)->filter(fn($value)=>$value>0)->sortDesc();
 $cgProjectTotal=$cgProjectCounts->sum();
 $cgDonutSteps=[];
 $cgCursor=0;
 foreach($cgProjectCounts as $status=>$number){
  $stop=$cgCursor+($number/max(1,$cgProjectTotal))*100;
  $color=$cgPalette[(count($cgDonutSteps))%count($cgPalette)];
  $cgDonutSteps[]=$color.' '.round($cgCursor,3).'% '.round($stop,3).'%';
  $cgCursor=$stop;
 }
 $cgDonutBackground=$cgProjectTotal>0?'conic-gradient('.implode(',',$cgDonutSteps).')':'#e6ebf1';
 $cgModules=collect($moduleCounts)->map(fn($value)=>(int)$value)
  ->filter(fn($value,$key)=>isset(\App\Http\Controllers\GroupSuiteController::MODULES[$key]) && $value>0)
  ->sortDesc();
 $cgAssetTypes=collect($assetKinds)->map(fn($value)=>(int)$value)->filter(fn($value)=>$value>0)->sortDesc();
 $cgTimelineValues=array_map(fn($p)=>(int)$p['value'],$operationTimeline);
 $cgMaxTimeline=max(1,max($cgTimelineValues?:[0]));
 $cgLinePoints=[];
 foreach($cgTimelineValues as $index=>$value){
  $cgLinePoints[]=(35+116*$index).','.round(154-(119*$value/$cgMaxTimeline),2);
 }
 $cgHasOperations=array_sum($cgTimelineValues)>0;
@endphp
@if($canProjects || $canAssets || ($suiteReady && $cgCanSuite))
<section class="cg-analytics" id="gestion-graphiques" aria-labelledby="cg-analytics-heading">
 <div class="cg-analytics-head">
  <div>
   <p class="cg-analytics-overline">Analyse et pilotage</p>
   <h2 id="cg-analytics-heading">Tableaux graphiques du groupe</h2>
   <p class="cg-analytics-sub">Chiffres issus des enregistrements autorisés{{ $selectedEntity ? ' · Filiale sélectionnée' : ' · Périmètre accessible' }}.</p>
  </div>
  <span class="badge bg-light text-dark border rounded-pill px-3 py-2"><i class="bi bi-database-check me-2" aria-hidden="true"></i>Données de gestion</span>
 </div>
 <div class="cg-analytics-grid">
  @if($canProjects)
  <article class="cg-chart-panel" aria-labelledby="cg-project-heading">
   <div class="cg-chart-panel-head">
    <div><h3 class="cg-chart-title" id="cg-project-heading">Statut des projets</h3><p class="cg-chart-caption">Répartition des projets enregistrés</p></div>
    <span class="cg-chart-type" aria-hidden="true"><i class="bi bi-pie-chart"></i></span>
   </div>
   @if($cgProjectTotal>0)
   <div class="cg-donut-wrap">
    <div class="cg-donut" role="img" aria-label="Répartition de {{ $cgProjectTotal }} projets par statut" style="background:{{ $cgDonutBackground }}">
     <div class="cg-donut-inner"><strong>{{ $cgProjectTotal }}</strong><small>projets</small></div>
    </div>
    <ul class="cg-chart-legend">
     @foreach($cgProjectCounts as $status=>$number)
      <li><span class="cg-chart-dot" style="background:{{ $cgPalette[$loop->index % count($cgPalette)] }}" aria-hidden="true"></span><span>{{ ucfirst(str_replace('_',' ',$status ?: 'Non défini')) }}</span><strong>{{ $number }}</strong></li>
     @endforeach
    </ul>
   </div>
   @else
    <div class="cg-chart-empty"><div><i class="bi bi-kanban" aria-hidden="true"></i>Aucun projet enregistré dans ce périmètre.</div></div>
   @endif
   <div class="cg-chart-note">Statuts réels des projets, sans estimation.</div>
  </article>
  @endif
  @if($suiteReady && $cgCanSuite)
  <article class="cg-chart-panel" aria-labelledby="cg-module-heading">
   <div class="cg-chart-panel-head">
    <div><h3 class="cg-chart-title" id="cg-module-heading">Répartition par département</h3><p class="cg-chart-caption">Enregistrements par module autorisé</p></div>
    <span class="cg-chart-type" aria-hidden="true"><i class="bi bi-bar-chart"></i></span>
   </div>
   @if($cgModules->isNotEmpty())
    <ul class="cg-bar-list">
     @foreach($cgModules as $key=>$number)
     <li class="cg-bar-item"><div class="cg-bar-row"><span class="cg-bar-label">{{ \App\Http\Controllers\GroupSuiteController::MODULES[$key]['label'] }}</span><strong class="cg-bar-value">{{ $number }}</strong></div>
      <div class="cg-bar-track" role="img" aria-label="{{ $number }} enregistrements"><span class="cg-bar-fill" style="width:{{ round($number/max(1,$cgModules->max())*100,2) }}%"></span></div>
     </li>
     @endforeach
    </ul>
   @else
    <div class="cg-chart-empty"><div><i class="bi bi-collection" aria-hidden="true"></i>Aucune activité enregistrée dans les départements accessibles.</div></div>
   @endif
   <div class="cg-chart-note">Seuls les départements auxquels vous avez accès sont affichés.</div>
  </article>
  <article class="cg-chart-panel" aria-labelledby="cg-timeline-heading">
   <div class="cg-chart-panel-head">
    <div><h3 class="cg-chart-title" id="cg-timeline-heading">Évolution des enregistrements</h3><p class="cg-chart-caption">Dossiers créés au cours des six derniers mois</p></div>
    <span class="cg-chart-type" aria-hidden="true"><i class="bi bi-graph-up-arrow"></i></span>
   </div>
   @if($cgHasOperations)
    <svg class="cg-timeline" viewBox="0 0 660 203" role="img" aria-labelledby="cg-timeline-svg-title cg-timeline-svg-desc">
     <title id="cg-timeline-svg-title">Évolution des dossiers des six derniers mois</title>
     <desc id="cg-timeline-svg-desc">@foreach($operationTimeline as $month){{ $month['label'] }} : {{ $month['value'] }} dossiers. @endforeach</desc>
     <line class="cg-gridline" x1="35" y1="35" x2="615" y2="35"/>
     <line class="cg-gridline" x1="35" y1="94" x2="615" y2="94"/>
     <line class="cg-gridline" x1="35" y1="154" x2="615" y2="154"/>
     <polyline class="cg-area" points="35,154 {{ implode(' ',$cgLinePoints) }} 615,154"/>
     <polyline class="cg-line" points="{{ implode(' ',$cgLinePoints) }}"/>
     @foreach($operationTimeline as $month)
      @php($cgY=round(154-(119*(int)$month['value']/$cgMaxTimeline),2))
      <circle class="cg-point" cx="{{ 35+$loop->index*116 }}" cy="{{ $cgY }}" r="5"><title>{{ $month['label'] }} : {{ $month['value'] }}</title></circle>
      <text class="cg-point-value" x="{{ 35+$loop->index*116 }}" y="{{ max(15,$cgY-13) }}" text-anchor="middle">{{ $month['value'] }}</text>
      <text x="{{ 35+$loop->index*116 }}" y="185" text-anchor="middle">{{ $month['label'] }}</text>
     @endforeach
    </svg>
   @else
    <div class="cg-chart-empty"><div><i class="bi bi-graph-up" aria-hidden="true"></i>Aucun dossier créé ces six derniers mois.</div></div>
   @endif
   <div class="cg-chart-note">Les mois sans enregistrement comptent pour zéro ; données du périmètre filtré.</div>
  </article>
  @endif
  @if($canAssets)
  <article class="cg-chart-panel" aria-labelledby="cg-asset-heading">
   <div class="cg-chart-panel-head">
    <div><h3 class="cg-chart-title" id="cg-asset-heading">Actifs par catégorie</h3><p class="cg-chart-caption">Principales catégories d’actifs suivis</p></div>
    <span class="cg-chart-type" aria-hidden="true"><i class="bi bi-boxes"></i></span>
   </div>
   @if($cgAssetTypes->isNotEmpty())
    <ul class="cg-bar-list">
     @foreach($cgAssetTypes as $kind=>$number)
      <li class="cg-bar-item">
       <div class="cg-bar-row"><span class="cg-bar-label">{{ $kind ?: 'Non classé' }}</span><strong class="cg-bar-value">{{ $number }}</strong></div>
       <div class="cg-bar-track" role="img" aria-label="{{ $number }} actifs"><span class="cg-bar-fill cg-bar-fill--light" style="width:{{ round($number/max(1,$cgAssetTypes->max())*100,2) }}%"></span></div>
      </li>
     @endforeach
    </ul>
   @else
    <div class="cg-chart-empty"><div><i class="bi bi-box-seam" aria-hidden="true"></i>Aucun actif enregistré dans ce périmètre.</div></div>
   @endif
   <div class="cg-chart-note">Six catégories maximum, classées par nombre d’actifs.</div>
  </article>
  @endif
 </div>
</section>
@endif
