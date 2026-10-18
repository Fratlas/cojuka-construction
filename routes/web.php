<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GroupPublicController;
use App\Http\Controllers\GroupProfileController;
use App\Http\Controllers\GroupAdminController;
use App\Http\Controllers\GroupLoginController;
use App\Http\Controllers\GroupSuiteController;
use App\Http\Controllers\GroupUsersController;
use App\Http\Controllers\GroupDepartmentController;
use App\Http\Controllers\GroupImportController;
use App\Http\Controllers\GroupDocumentController;
use App\Http\Controllers\CojukaNewsletterController;
use App\Http\Controllers\GroupNewsletterController;
Route::post('/assistant/appel-vocal', [App\Http\Controllers\CojukaRealtimeController::class, 'connect'])->middleware('throttle:5,1')->name('cojuka.assistant.realtime');
Route::post('/assistant/reponse', [App\Http\Controllers\CojukaAssistantController::class, 'reply'])->middleware('throttle:12,1')->name('cojuka.assistant.reply');
Route::view('/', 'welcome')->name('home');
Route::view('/confidentialite','privacy')->name('cojuka.privacy');
Route::post('/newsletter/inscription',[CojukaNewsletterController::class,'subscribe'])->middleware('throttle:5,1')->name('cojuka.newsletter.subscribe');
Route::get('/newsletter/confirmation/{subscriber}',[CojukaNewsletterController::class,'confirm'])->middleware('signed')->whereNumber('subscriber')->name('cojuka.newsletter.confirm');
Route::get('/newsletter/desinscription/{subscriber}',[CojukaNewsletterController::class,'unsubscribe'])->middleware('signed')->whereNumber('subscriber')->name('cojuka.newsletter.unsubscribe');
Route::view('/groupe', 'group')->name('group');
Route::view('/explorer', 'explorer')->name('explorer');
Route::view('/groupe/histoire', 'group-history')->name('group.history');
Route::get('/groupe/entites', [GroupPublicController::class, 'index'])->name('group.portal');
Route::get('/groupe/dossiers/{topic}', function (string $topic) {
 $u=static fn(string $id):string=>'https://images.unsplash.com/'.$id.'?auto=format&fit=crop&w=1400&q=78';
 $topics=[
  'mining-et-carrieres'=>[
   'title'=>'Mining & carrières','description'=>'Ressources naturelles, carrières et développement des projets miniers : le domaine prioritaire du groupe.',
   'heading'=>'Comprendre les enjeux des projets miniers.','intro'=>'De la reconnaissance des besoins au cadrage des moyens techniques, un projet minier demande une coordination rigoureuse des parties prenantes, de la logistique et des exigences environnementales et sociales.',
   'parent'=>'kojuka-mining','parent_label'=>'Mining',
   'steps'=>[['Études préalables','Identifier le périmètre, les autorisations à vérifier, les besoins techniques et les risques du projet.'],['Carrières et matériaux','Préparer l’évaluation des ressources, des usages envisagés et des besoins en équipements.'],['Logistique minière','Organiser les scénarios d’acheminement, d’approvisionnement et de coordination des intervenants.']],
   'photos'=>[['https://images.hellogravel.com/variants/guides/37e44abca47c0db2/bingham-canyon-mine-aerial-scaled-content-900w.webp','Mine à ciel ouvert, vue aérienne illustrative'],[$u('photo-1504307651254-35680f356dfd'),'Terrassement et engins de chantier'],[$u('photo-1581092160607-ee22621dd758'),'Équipements industriels']],
  ],
  'energie-et-infrastructures'=>[
   'title'=>'Énergie & infrastructures','description'=>'Préparation des projets d’énergie et d’infrastructures électriques adaptés aux besoins des territoires et des activités.',
   'heading'=>'Penser l’énergie à l’échelle du projet.','intro'=>'L’évaluation de la demande, les contraintes du site et les conditions de maintenance orientent le choix des solutions. Les projets nécessitent des études et des partenaires techniques qualifiés.',
   'parent'=>'energie','parent_label'=>'Énergie',
   'steps'=>[['Besoins énergétiques','Analyser les usages, la puissance et la continuité de service recherchée.'],['Solutions techniques','Examiner les scénarios solaires, hybrides et conventionnels avec les spécialistes.'],['Exploitation','Préparer les exigences de sécurité, d’entretien et de suivi des équipements.']],
   'photos'=>[[$u('photo-1473341304170-971dccb5ac1e'),'Lignes et réseau électrique'],[$u('photo-1509391366360-2e959784a276'),'Panneaux photovoltaïques'],[$u('photo-1497435334941-8c899ee9e8e9'),'Production d’énergie renouvelable']],
  ],
  'cargo-et-fret'=>[
   'title'=>'Cargo & fret','description'=>'Transport de marchandises, préparation documentaire et coordination des expéditions multimodales.',
   'heading'=>'Organiser chaque étape de l’acheminement.','intro'=>'La nature de la cargaison, son conditionnement, les documents requis et les délais déterminent les solutions de transport à examiner avec les prestataires habilités.',
   'parent'=>'cargo','parent_label'=>'Cargo',
   'steps'=>[['Préparation','Définir poids, volumes, emballages, origines, destinations et délais.'],['Coordination','Comparer les options de transport et préciser les responsabilités des intervenants.'],['Suivi','Documenter les jalons, les formalités à confirmer et la livraison.']],
   'photos'=>[[$u('photo-1494412519320-aa613dfb7738'),'Transport maritime de conteneurs'],[$u('photo-1578575437130-527eed3abbec'),'Conteneurs de fret'],[$u('photo-1586528116311-ad8dd3c8310d'),'Entreposage et logistique']],
  ],
 ];
 abort_unless(isset($topics[$topic]),404);
 return view('group-sector-topic',['topic'=>$topics[$topic]]);
})->name('group.topic');
Route::get('/groupe/structures/{slug}', [GroupProfileController::class, 'show'])->name('group.profile');
Route::get('/groupe/entites/{slug}', [GroupPublicController::class, 'entity'])->name('group.entity');
Route::middleware('guest')->group(function () {
 Route::get('/inscription', [GroupLoginController::class, 'registerForm'])->name('register');
 Route::post('/inscription', [GroupLoginController::class, 'register'])->middleware('throttle:5,1')->name('register.submit');
 Route::get('/connexion', [GroupLoginController::class, 'form'])->name('login');
 Route::post('/connexion', [GroupLoginController::class, 'login'])->middleware('throttle:5,1')->name('login.submit');
});
Route::get('/compte-en-attente', [GroupLoginController::class, 'pending'])->middleware('auth')->name('account.pending');
Route::post('/deconnexion', [GroupLoginController::class, 'logout'])->middleware('auth')->name('logout');
Route::middleware(['auth', 'group.admin'])->prefix('gestion')->name('gestion.')->group(function () {
 Route::get('/', [GroupAdminController::class, 'dashboard'])->name('group.dashboard');
 Route::view('/guide', 'gestion.guide')->name('guide');
 Route::get('/newsletter', [GroupNewsletterController::class, 'index'])->middleware('can:manage-users')->name('newsletter.index');
 Route::get('/newsletter/export-csv', [GroupNewsletterController::class, 'export'])->middleware('can:manage-users')->name('newsletter.export');
 Route::get('/departements', [GroupDepartmentController::class, 'index'])->middleware('can:manage-users')->name('departments.index');
 Route::get('/departements/export-csv', [GroupDepartmentController::class, 'exportCsv'])->middleware('can:manage-users')->name('departments.export');
 Route::post('/departements/import-csv', [GroupDepartmentController::class, 'importCsv'])->middleware(['can:manage-users','throttle:3,1'])->name('departments.import');
 Route::patch('/departements/{department}', [GroupDepartmentController::class, 'update'])->middleware('can:manage-users')->name('departments.update');
 Route::get('/utilisateurs', [GroupUsersController::class, 'index'])->middleware('can:manage-users')->name('users.index');
 Route::get('/utilisateurs/export-csv', [GroupUsersController::class, 'exportCsv'])->middleware('can:manage-users')->name('users.export');
 Route::post('/utilisateurs/import-csv', [GroupUsersController::class, 'importCsv'])->middleware(['can:manage-users','throttle:3,1'])->name('users.import');
 Route::patch('/utilisateurs/{user}', [GroupUsersController::class, 'update'])->middleware('can:manage-users')->name('users.update');
 Route::get('/import/{module}/modele', [GroupImportController::class, 'template'])->middleware('group.module')->name('import.template');
 Route::get('/referentiel/{module}/export', [GroupImportController::class, 'export'])->where('module','entites|projets|actifs')->middleware('group.module')->name('group.export');
 Route::get('/documents/piece/{document}', [GroupDocumentController::class, 'download'])->whereNumber('document')->name('documents.download');
 Route::delete('/documents/piece/{document}', [GroupDocumentController::class, 'destroy'])->whereNumber('document')->name('documents.destroy');
 Route::get('/documents/{scope}/{id}', [GroupDocumentController::class, 'index'])->where('scope','entites|rh')->whereNumber('id')->name('documents.index');
 Route::post('/documents/{scope}/{id}', [GroupDocumentController::class, 'store'])->where('scope','entites|rh')->whereNumber('id')->middleware('throttle:10,1')->name('documents.store');
 Route::post('/import/{module}', [GroupImportController::class, 'import'])->middleware(['group.module','throttle:5,1'])->name('import.store');
 Route::get('/modules/{module}', [GroupSuiteController::class, 'index'])->middleware('group.module')->name('suite.index');
 Route::get('/modules/{module}/historique', [GroupSuiteController::class, 'history'])->middleware('group.module')->name('suite.history');
 Route::get('/modules/{module}/export', [GroupSuiteController::class, 'export'])->middleware('group.module')->name('suite.export');
 Route::post('/modules/{module}', [GroupSuiteController::class, 'store'])->middleware('group.module')->name('suite.store');
 Route::put('/modules/{module}/{id}', [GroupSuiteController::class, 'update'])->middleware('group.module')->name('suite.update');
 Route::delete('/modules/{module}/{id}', [GroupSuiteController::class, 'destroy'])->middleware('group.module')->name('suite.destroy');
 Route::post('/entites/synchroniser-domaines', [GroupAdminController::class, 'syncSectors'])->middleware(['throttle:3,1'])->name('group.entities.sync');
 Route::get('/{module}', [GroupAdminController::class, 'listing'])->where('module','entites|projets|actifs')->middleware('group.module')->name('group.list');
 Route::post('/{module}', [GroupAdminController::class, 'save'])->where('module','entites|projets|actifs')->middleware('group.module')->name('group.save');
 Route::put('/{module}/{id}', [GroupAdminController::class, 'edit'])->where('module','entites|projets|actifs')->middleware('group.module')->name('group.edit');
 Route::delete('/{module}/{id}', [GroupAdminController::class, 'delete'])->where('module','entites|projets|actifs')->middleware('group.module')->name('group.delete');
});
