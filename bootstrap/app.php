<?php

use App\Http\Middleware\RedirectIfAuthenticated;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use RealRashid\SweetAlert\ToSweetAlert;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'web' => [
                ToSweetAlert::class,
            ],
            'guest' => RedirectIfAuthenticated::class, // Alias 'guest' middleware correctly
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
