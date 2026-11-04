<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(web: __DIR__.'/../routes/web.php', commands: __DIR__.'/../routes/console.php', health: '/up')
    ->withMiddleware(function (Middleware $middleware): void {
        $middleware->alias(['group.admin' => \App\Http\Middleware\GroupAdmin::class, 'group.module' => \App\Http\Middleware\GroupModuleAccess::class]);
        $middleware->append(\App\Http\Middleware\SecurityHeaders::class);
        // Déjà connecté : /connexion et /inscription mènent directement à l'espace de gestion.
        $middleware->redirectUsersTo(fn () => route('gestion.group.dashboard'));
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        // Trop de tentatives sur les formulaires : message clair en français au lieu d'une page d'erreur.
        $exceptions->render(function (\Illuminate\Http\Exceptions\ThrottleRequestsException $e, \Illuminate\Http\Request $request) {
            if ($request->routeIs('login.submit', 'register.submit')) {
                $wait = (int) ($e->getHeaders()['Retry-After'] ?? 60);
                return back()->withErrors(['email' => "Trop de tentatives. Patientez {$wait} secondes avant de réessayer."])->onlyInput('email', 'name');
            }
        });
    })
    ->create();
