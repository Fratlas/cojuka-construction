@extends('gestion.group-layout')
@section('title','Dossier documentaire')
@section('content')
<div class="d-flex flex-wrap justify-content-between gap-3 align-items-center mb-4">
 <div><p class="small fw-bold text-secondary text-uppercase">COJUKA / Documents privés</p>
  <h1 class="h2 fw-bold">{{ $scope==='rh' ? 'Dossier du personnel' : 'Dossier de la société' }}</h1>
  <p class="text-secondary mb-0">{{ $item->title ?? $item->name }} — les pièces sont facultatives, consultables seulement avec les droits du module et de la filiale.</p>
 </div>
 <a class="btn btn-outline-secondary" href="{{ $scope==='rh'?route('gestion.suite.index','rh'):route('gestion.group.list','entites') }}">← Retour au module</a>
</div>
@if(session('status'))<div class="alert alert-success">{{ session('status') }}</div>@endif
@if($errors->any())<div class="alert alert-danger">{{ $errors->first() }}</div>@endif
@if($canUpload && ($scope==='rh' || auth()->user()?->is_group_admin))
<div class="card p-3 p-md-4 mb-4">
 <h2 class="h5 fw-bold">Ajouter une pièce justificative (facultatif)</h2>
 <p class="small text-secondary">Photographiez ou numérisez un document avec votre appareil, puis importez le PDF ou l’image. Formats PDF, JPG, PNG, WebP ; 10 Mo maximum. Le document ne sera jamais publié automatiquement.</p>
 <form method="post" enctype="multipart/form-data" action="{{ route('gestion.documents.store',[$scope,$item->id]) }}" class="row g-3 align-items-end">
  @csrf
  <div class="col-md-4"><label class="form-label" for="doc-category">Type de pièce</label><select class="form-select" name="category" id="doc-category" required>@foreach($categories as $code=>$label)<option value="{{ $code }}">{{ $label }}</option>@endforeach</select></div>
  <div class="col-md-4"><label class="form-label" for="doc-file">Fichier à joindre</label><input class="form-control" id="doc-file" type="file" name="file" accept=".pdf,.jpg,.jpeg,.png,.webp,application/pdf,image/jpeg,image/png,image/webp" required>
   <div class="mt-2"><label class="btn btn-sm btn-outline-secondary" for="doc-camera"><i class="bi bi-camera me-1"></i>Prendre une photo du document</label><input class="visually-hidden" id="doc-camera" type="file" accept="image/*" capture="environment"><span class="small text-secondary ms-2" id="doc-photo-status" aria-live="polite"></span></div>
  </div>
  <div class="col-md-4"><label class="form-label" for="doc-label">Référence / commentaire</label><input class="form-control" id="doc-label" name="label" maxlength="180" placeholder="Facultatif"></div>
  <div class="col-md-3"><label class="form-label" for="doc-issued">Date de délivrance</label><input class="form-control" id="doc-issued" name="issued_on" type="date"></div>
  <div class="col-md-3"><label class="form-label" for="doc-expires">Date d’expiration</label><input class="form-control" id="doc-expires" name="expires_on" type="date"></div>
  <div class="col-md-6"><button class="btn btn-dark w-100" type="submit"><i class="bi bi-shield-lock me-2"></i>Enregistrer dans le dossier privé</button></div>
 </form>
</div>
@endif
<div class="card p-3 p-md-4">
 <h2 class="h5 fw-bold mb-3">Pièces enregistrées <span class="badge bg-secondary">{{ $documents->count() }}</span></h2>
 <div class="table-responsive"><table class="table table-hover align-middle">
  <thead><tr><th>Catégorie</th><th>Nom du fichier</th><th>Délivrance / échéance</th><th class="text-end">Actions</th></tr></thead>
  <tbody>@forelse($documents as $document)
   <tr>
    <td>{{ $categories[$document->category]??$document->category }} <div class="small text-secondary">{{ $document->label }}</div></td>
    <td>{{ $document->original_name }} <div class="small text-secondary">{{ number_format($document->size_bytes/1024,0,',',' ') }} Ko</div></td>
    <td>{{ $document->issued_on ?: '—' }} / {{ $document->expires_on ?: '—' }}</td>
    <td class="text-end text-nowrap">
     <a class="btn btn-sm btn-outline-dark" href="{{ route('gestion.documents.download',$document->id) }}"><i class="bi bi-download me-1"></i>Télécharger</a>
     @if($canUpload && ($scope==='rh'||auth()->user()?->is_group_admin))
     <form class="d-inline" method="post" action="{{ route('gestion.documents.destroy',$document->id) }}" onsubmit="return confirm('Supprimer définitivement ce document privé ?')">@csrf @method('DELETE')<button class="btn btn-sm btn-outline-danger" type="submit">Supprimer</button></form>
     @endif
    </td>
   </tr>
  @empty<tr><td colspan="4" class="text-secondary py-4 text-center">Aucun justificatif. L’ajout n’est pas obligatoire.</td></tr>@endforelse</tbody>
 </table></div>
</div>
@endsection
@section('page_scripts')
<script>
(function(){
 const camera=document.getElementById('doc-camera'),target=document.getElementById('doc-file'),status=document.getElementById('doc-photo-status');
 if(!camera||!target)return;
 camera.addEventListener('change',function(){
  if(!camera.files||!camera.files.length)return;
  try{
   const transfer=new DataTransfer();
   transfer.items.add(camera.files[0]);
   target.files=transfer.files;
   if(status)status.textContent='Photo sélectionnée : '+camera.files[0].name;
  }catch(e){
   if(status)status.textContent='Sélectionnez la photo dans le champ « Fichier à joindre ».';
  }
 });
})();
</script>
@endsection

