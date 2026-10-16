<?php
namespace App\Http\Controllers;
use App\Models\GroupEntity;
use App\Support\GroupAccess;
use App\Models\GroupSuiteRecord;
use App\Models\GroupSuiteAudit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Schema;

class GroupSuiteController {
 public const MODULES=[
  'rh'=>['label'=>'Ressources humaines','fields'=>[
   'matricule'=>'Matricule','nom'=>'Nom','prenom'=>'Prénom','poste'=>'Poste / fonction','departement'=>'Département / service',
   'telephone'=>'Téléphone professionnel','email'=>'E-mail professionnel','date_embauche'=>'Date d’embauche',
   'type_contrat'=>'Type de contrat','date_fin_contrat'=>'Fin du contrat','responsable'=>'Responsable hiérarchique',
   'site_affectation'=>'Site d’affectation','statut_employe'=>'Situation du personnel',
   'date_naissance'=>'Date de naissance','contact_urgence'=>'Contact d’urgence',
   'conges_annuels'=>'Jours de congé annuels','conges_pris'=>'Jours de congé pris',
   'prochaine_evaluation'=>'Prochaine évaluation','formation'=>'Formation / habilitation',
  ]],
  'finances'=>['label'=>'Finances et dépenses','fields'=>['beneficiaire'=>'Bénéficiaire','categorie'=>'Catégorie','mode_paiement'=>'Mode de paiement','compte'=>'Compte / caisse','numero_piece'=>'Numéro de pièce','centre_cout'=>'Centre de coût']],
  'contrats'=>['label'=>'Contrats','fields'=>['partenaire'=>'Partenaire','date_signature'=>'Date signature (AAAA-MM-JJ)','date_echeance'=>'Échéance (AAAA-MM-JJ)','type_contrat'=>'Type de contrat','responsable'=>'Responsable','conditions'=>'Conditions essentielles']],
  'achats'=>['label'=>'Achats et fournisseurs','fields'=>['fournisseur'=>'Fournisseur','quantite'=>'Quantité','produit'=>'Produit / service','prix_unitaire'=>'Prix unitaire','numero_commande'=>'Numéro commande','livraison'=>'Livraison prévue']],
  'logistique'=>['label'=>'Logistique et transport','fields'=>['vehicule'=>'Véhicule','immatriculation'=>'Immatriculation','chauffeur'=>'Chauffeur','origine'=>'Origine','destination'=>'Destination','date_livraison'=>'Date livraison (AAAA-MM-JJ)','numero_bon'=>'Numéro bon']],
  'immobilier'=>['label'=>'Immobilier et foncier','fields'=>['parcelle'=>'Référence parcelle','superficie'=>'Superficie','titre_foncier'=>'Titre foncier','proprietaire'=>'Propriétaire','usage'=>'Usage','adresse'=>'Adresse du bien']],
  'mines'=>['label'=>'Mines et concessions','fields'=>['permis'=>'Référence permis','substance'=>'Substance','superficie'=>'Superficie','titulaire'=>'Titulaire','province'=>'Province','date_expiration'=>'Expiration permis (AAAA-MM-JJ)','autorite'=>'Autorité émettrice']],
  'consulting'=>['label'=>'Missions de conseil','fields'=>['client'=>'Client','livrable'=>'Livrable','responsable'=>'Responsable','date_echeance'=>'Échéance (AAAA-MM-JJ)','type_mission'=>'Type de mission','contact'=>'Contact client']],
 ];
 public const STATUSES=['brouillon'=>'Brouillon','en_cours'=>'En cours','en_attente'=>'En attente','valide'=>'Validé','termine'=>'Terminé','archive'=>'Archivé'];
 private function config(string $module):array {abort_unless(isset(self::MODULES[$module]),404);return self::MODULES[$module];}
 public function index(Request $request,string $module){
  $config=$this->config($module);
  if (!Schema::hasTable('group_suite_records') || !Schema::hasTable('group_suite_audit')) return view('gestion.suite-unavailable',['module'=>$module,'config'=>$config]);
  $query=GroupSuiteRecord::with('entity')->where('module',$module);
  $allowed=GroupAccess::entities($request->user());if($allowed!==null)$query->whereIn('group_entity_id',$allowed);
  if($request->filled('entity')){$request->validate(['entity'=>'integer|exists:group_entities,id']);$query->where('group_entity_id',$request->query('entity'));}
  if($request->filled('q')){$request->validate(['q'=>'string|max:100']);$q=$request->query('q');$query->where(fn($builder)=>$builder->where('title','like','%'.$q.'%')->orWhere('reference','like','%'.$q.'%'));}
  if($request->filled('status')){$request->validate(['status'=>Rule::in(array_keys(self::STATUSES))]);$query->where('status',$request->query('status'));}
  $totals=(clone $query)->selectRaw('currency, COUNT(*) AS total, SUM(amount) AS amount_total')->groupBy('currency')->get();
  $hrStats=null;
  if($module==='rh'){
   $hrQuery=clone $query;
   $hrStats=[
    'total'=>(clone $hrQuery)->count(),
    'active'=>(clone $hrQuery)->where('details->statut_employe','actif')->count(),
    'leave'=>(clone $hrQuery)->where('details->statut_employe','en_conge')->count(),
    'contract_ends_soon'=>(clone $hrQuery)->whereNotNull('details->date_fin_contrat')->whereBetween('details->date_fin_contrat',[now()->toDateString(),now()->addDays(30)->toDateString()])->count(),
   ];
  }
  return view('gestion.suite-index',['module'=>$module,'config'=>$config,'rows'=>$query->latest()->paginate(15)->withQueryString(),'entities'=>GroupEntity::when($allowed!==null,fn($q)=>$q->whereIn('id',$allowed))->orderBy('name')->get(),'totals'=>$totals,'hrStats'=>$hrStats]);
 }
 public function history(Request $request,string $module){
  $config=$this->config($module);
  if(!Schema::hasTable('group_suite_audit'))return view('gestion.suite-unavailable',['module'=>$module,'config'=>$config]);
  $events=GroupSuiteAudit::where('module',$module);
  $allowed=GroupAccess::entities($request->user());if($allowed!==null)$events->whereIn('record_id',GroupSuiteRecord::where('module',$module)->whereIn('group_entity_id',$allowed)->select('id'));
  $events=$events->orderByDesc('id')->paginate(30);
  return view('gestion.suite-history',compact('module','config','events'));
 }
 public function export(Request $request,string $module){
  $this->config($module);
  abort_unless(Schema::hasTable('group_suite_records'),503,'Module non installé : exécutez les migrations.');
  $allowed=GroupAccess::entities($request->user());
  $records=GroupSuiteRecord::with('entity')->where('module',$module)->when($allowed!==null,fn($q)=>$q->whereIn('group_entity_id',$allowed))->orderBy('id')->cursor();
  return response()->streamDownload(function()use($records){
   $out=fopen('php://output','w');fwrite($out,"\xEF\xBB\xBF");
   fputcsv($out,['ID','Société','Titre','Référence','Statut','Date','Montant','Devise','Localisation','Description'],';');
   foreach($records as $item){
    $clean=fn($value)=>preg_replace('/^[\x00-\x20]*([=+@\-])/u',"'$1",(string)($value??''));
    fputcsv($out,[$item->id,$clean($item->entity?->name),$clean($item->title),$clean($item->reference),$item->status,$item->record_date?->format('Y-m-d'),$item->amount,$item->currency,$clean($item->location),$clean($item->description)],';');
   }
   fclose($out);
  },'cojuka-'.$module.'-'.now()->format('Ymd').'.csv',['Content-Type'=>'text/csv; charset=UTF-8']);
 }
 public function store(Request $request,string $module){
  $config=$this->config($module);$this->ensureReady();$data=$this->validateData($request,$config);GroupAccess::requireEntity($request->user(),(int)$data['group_entity_id']);
  DB::transaction(function()use($data,$module,$request){
   $item=GroupSuiteRecord::create($data+['module'=>$module,'created_by'=>$request->user()->id,'updated_by'=>$request->user()->id]);
   $this->audit($request,'create',$item,null);
  });
  return redirect()->route('gestion.suite.index',$module)->with('status','Enregistrement créé.');
 }
 public function update(Request $request,string $module,int $id){
  $config=$this->config($module);$this->ensureReady();$data=$this->validateData($request,$config);
  DB::transaction(function()use($data,$module,$id,$request){
   $item=GroupSuiteRecord::where('module',$module)->findOrFail($id);GroupAccess::requireEntity($request->user(),$item->group_entity_id);$before=$item->toArray();
   GroupAccess::requireEntity($request->user(),(int)$data['group_entity_id']);$item->update($data+['updated_by'=>$request->user()->id]);$this->audit($request,'update',$item,$before);
  });
  return back()->with('status','Enregistrement mis à jour.');
 }
 public function destroy(Request $request,string $module,int $id){
  $this->config($module);$this->ensureReady();
  DB::transaction(function()use($module,$id,$request){
   $item=GroupSuiteRecord::where('module',$module)->findOrFail($id);GroupAccess::requireEntity($request->user(),$item->group_entity_id);$this->audit($request,'delete',$item,$item->toArray());$item->delete();
  });
  return back()->with('status','Enregistrement supprimé.');
 }
 private function ensureReady():void {abort_unless(Schema::hasTable('group_suite_records') && Schema::hasTable('group_suite_audit'),503,'Module non installé : exécutez les migrations.');}
 private function validateData(Request $request,array $config):array {
  $rules=['group_entity_id'=>'required|integer|exists:group_entities,id','title'=>'required|string|max:255','reference'=>'nullable|string|max:255','status'=>['required',Rule::in(array_keys(self::STATUSES))],'record_date'=>'nullable|date','amount'=>'nullable|numeric|min:0','currency'=>['required',Rule::in(['USD','CDF','EUR'])],'location'=>'nullable|string|max:255','description'=>'nullable|string|max:5000'];
  foreach($config['fields'] as $field=>$label){$rules['details.'.$field]='nullable|string|max:255';}
  if(($config['label']??'')==='Ressources humaines'){
   $rules['details.matricule']='required|string|max:80';
   $rules['details.nom']='required|string|max:120';
   $rules['details.prenom']='nullable|string|max:120';
   $rules['details.email']='nullable|email|max:255';
   $rules['details.date_embauche']='nullable|date';
   $rules['details.date_fin_contrat']='nullable|date|after_or_equal:details.date_embauche';
   $rules['details.date_naissance']='nullable|date|before:today';
   $rules['details.prochaine_evaluation']='nullable|date';
   $rules['details.conges_annuels']='nullable|integer|min:0|max:365';
   $rules['details.conges_pris']='nullable|integer|min:0|max:365';
   $rules['details.statut_employe']=['nullable',Rule::in(['actif','en_conge','suspendu','sorti'])];
  }
  $data=$request->validate($rules);$data['details']=$data['details']??[];
  return $data;
 }
 private function audit(Request $request,string $action,GroupSuiteRecord $item,?array $before):void {
  GroupSuiteAudit::create(['user_id'=>$request->user()->id,'action'=>$action,'module'=>$item->module,'record_id'=>$item->id,'before'=>$before,'after'=>$action==='delete'?null:$item->toArray()]);
 }
}