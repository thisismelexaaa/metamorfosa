<?php

use App\Http\Middleware\ModifiedUrl;
use App\Http\Middleware\RedirectIfAuthenticated;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Support\Facades\Request;
use Mockery\Exception\InvalidOrderException;
use RealRashid\SweetAlert\ToSweetAlert;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

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
            'guest' => RedirectIfAuthenticated::class,
            'ModifiedUrl' => ModifiedUrl::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        $exceptions->render(function (NotFoundHttpException $e) {
            return response()->view('errors.404');
        });
    })->create();
