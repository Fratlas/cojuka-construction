<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void {}

    public function boot(): void { \Illuminate\Support\Facades\Gate::define('manage-users', fn(\App\Models\User $user) => (bool)$user->is_group_admin); }
}
