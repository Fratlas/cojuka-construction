<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GroupPublicController;
use App\Http\Controllers\GroupAdminController;
use App\Http\Controllers\GroupLoginController;
use App\Http\Controllers\GroupSuiteController;
use App\Http\Controllers\GroupUsersController;
Route::view('/', 'welcome')->name('home');
Route::view('/groupe', 'group')->name('group');
Route::get('/groupe/entites', [GroupPublicController::class, 'index'])->name('group.portal');
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
 Route::get('/utilisateurs', [GroupUsersController::class, 'index'])->name('users.index');
 Route::patch('/utilisateurs/{user}', [GroupUsersController::class, 'update'])->name('users.update');
 Route::get('/modules/{module}', [GroupSuiteController::class, 'index'])->name('suite.index');
 Route::get('/modules/{module}/historique', [GroupSuiteController::class, 'history'])->name('suite.history');
 Route::get('/modules/{module}/export', [GroupSuiteController::class, 'export'])->name('suite.export');
 Route::post('/modules/{module}', [GroupSuiteController::class, 'store'])->name('suite.store');
 Route::put('/modules/{module}/{id}', [GroupSuiteController::class, 'update'])->name('suite.update');
 Route::delete('/modules/{module}/{id}', [GroupSuiteController::class, 'destroy'])->name('suite.destroy');
 Route::get('/{module}', [GroupAdminController::class, 'listing'])->where('module','entites|projets|actifs')->name('group.list');
 Route::post('/{module}', [GroupAdminController::class, 'save'])->where('module','entites|projets|actifs')->name('group.save');
 Route::put('/{module}/{id}', [GroupAdminController::class, 'edit'])->where('module','entites|projets|actifs')->name('group.edit');
 Route::delete('/{module}/{id}', [GroupAdminController::class, 'delete'])->where('module','entites|projets|actifs')->name('group.delete');
});
