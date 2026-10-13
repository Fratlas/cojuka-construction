<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GroupPublicController;
use App\Http\Controllers\GroupAdminController;
use App\Http\Controllers\GroupLoginController;
Route::view('/', 'welcome')->name('home');
Route::view('/groupe', 'group')->name('group');
Route::get('/groupe/entites', [GroupPublicController::class, 'index'])->name('group.portal');
Route::get('/groupe/entites/{slug}', [GroupPublicController::class, 'entity'])->name('group.entity');
Route::middleware('guest')->group(function () {
 Route::get('/connexion', [GroupLoginController::class, 'form'])->name('login');
 Route::post('/connexion', [GroupLoginController::class, 'login'])->middleware('throttle:5,1')->name('login.submit');
});
Route::post('/deconnexion', [GroupLoginController::class, 'logout'])->middleware('auth')->name('logout');
Route::middleware(['auth', 'group.admin'])->prefix('gestion')->name('gestion.')->group(function () {
 Route::get('/', [GroupAdminController::class, 'dashboard'])->name('group.dashboard');
 Route::get('/{module}', [GroupAdminController::class, 'listing'])->where('module','entites|projets|actifs')->name('group.list');
 Route::post('/{module}', [GroupAdminController::class, 'save'])->where('module','entites|projets|actifs')->name('group.save');
 Route::put('/{module}/{id}', [GroupAdminController::class, 'edit'])->where('module','entites|projets|actifs')->name('group.edit');
 Route::delete('/{module}/{id}', [GroupAdminController::class, 'delete'])->where('module','entites|projets|actifs')->name('group.delete');
});
