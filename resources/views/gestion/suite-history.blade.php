@extends('gestion.group-layout')
@section('title','Historique — '.$config['label'])
@section('content')
<div class="d-flex justify-content-between align-items-center flex-wrap gap-3 mb-4">
 <div><p class="small text-uppercase text-secondary fw-bold">Journal de traçabilité</p><h1 class="h2 fw-bold">Historique — {{ $config['label'] }}</h1></div>
 <a href="{{ route('gestion.suite.index',$module) }}" class="btn btn-outline-dark">← Retour au module</a>
</div>
<div class="card border-0 shadow-sm p-3">
 <div class="table-responsive"><table class="table table-hover align-middle">
 <thead><tr><th>Date</th><th>Action</th><th>Identifiant</th><th>Utilisateur ID</th><th>Enregistrement</th></tr></thead>
 <tbody>
 @forelse($events as $event)
 <tr><td>{{ $event->created_at }}</td><td><span class="badge bg-secondary">{{ $event->action }}</span></td><td>#{{ $event->id }}</td><td>{{ $event->user_id ?? '—' }}</td><td>#{{ $event->record_id }} — {{ data_get($event->after,'title',data_get($event->before,'title','—')) }}</td></tr>
 @empty<tr><td colspan="5" class="text-center text-secondary py-4">Aucun événement enregistré.</td></tr>@endforelse
 </tbody></table></div>{{ $events->links() }}
</div>
@endsection