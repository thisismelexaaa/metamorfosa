<?php

use App\Http\Middleware\RedirectIfAuthenticated;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'web' => [
                // Add other middleware you need here
            ],
            'guest' => RedirectIfAuthenticated::class, // Alias 'guest' middleware correctly
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
