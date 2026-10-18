@extends('gestion.group-layout')
@section('title','Newsletter')
@section('content')
<div class="d-flex flex-wrap justify-content-between align-items-center gap-3 mb-4">
 <div><p class="small fw-bold text-secondary text-uppercase mb-1">Communication · COJUKA</p><h1 class="h2 fw-bold">Newsletter</h1><p class="text-secondary mb-0">Suivi des inscriptions avec consentement et validation par e-mail.</p></div>
 <a class="btn btn-dark rounded-pill" href="{{ route('gestion.newsletter.export') }}"><i class="bi bi-download me-2"></i>Exporter les inscrits confirmés</a>
</div>
<div class="row g-3 mb-4">
 <div class="col-md-6"><div class="card p-4 h-100"><div class="small text-secondary">Abonnements confirmés</div><div class="display-5 fw-bold mt-1">{{ $confirmed }}</div><p class="small text-secondary mb-0">Adresses uniquement exportables après confirmation.</p></div></div>
 <div class="col-md-6"><div class="card p-4 h-100"><div class="small text-secondary">En attente de confirmation</div><div class="display-5 fw-bold mt-1">{{ $pending }}</div><p class="small text-secondary mb-0">Ces adresses ne doivent recevoir aucune campagne.</p></div></div>
</div>
<div class="card p-3 p-md-4">
 <h2 class="h5 fw-bold mb-3">Dernières inscriptions</h2>
 <div class="table-responsive"><table class="table table-hover align-middle">
  <thead><tr><th>Adresse e-mail</th><th>Statut</th><th>Demande</th><th>Confirmation</th></tr></thead>
  <tbody>@forelse($subscribers as $subscriber)
   <tr><td>{{ $subscriber->email }}</td><td><span class="badge {{ $subscriber->confirmed_at?'bg-success':'bg-secondary' }}">{{ $subscriber->confirmed_at?'Confirmé':'En attente' }}</span></td><td>{{ $subscriber->consent_at ?? '—' }}</td><td>{{ $subscriber->confirmed_at ?? '—' }}</td></tr>
  @empty<tr><td colspan="4" class="text-center text-secondary py-4">Aucune inscription.</td></tr>@endforelse</tbody>
 </table></div>{{ $subscribers->links() }}
</div>
<div class="alert alert-light border mt-3 small">Les inscriptions confirmées peuvent être exportées pour une plateforme d’envoi autorisée. Aucun envoi de campagne en masse n’est automatisé dans cette version. Conservez la possibilité de désinscription dans chaque campagne.</div>
@endsection