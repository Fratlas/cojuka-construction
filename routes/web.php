<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome')->name('home');

// Protected employee area: Laravel authentication must be configured before use.
Route::middleware(['auth'])->prefix('gestion')->name('gestion.')->group(function () {
    Route::view('/', 'gestion.dashboard')->name('dashboard');
});
