<?php

use Illuminate\Foundation\Application;
use App\Http\Middleware\UserTypeMiddleware;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        // Register custom middleware alias
        $middleware->alias([
            'role' => UserTypeMiddleware::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        // Exception configuration can go here
        // 404 Page Not Found
    $exceptions->render(function (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
        return response()->view('errors.404', [], 404);
    });

    $exceptions->render(function (\Symfony\Component\HttpKernel\Exception\NotFoundHttpException $e) {
        return response()->view('errors.404', [], 404);
    });

    // 500 Internal Server Error
    $exceptions->render(function (Throwable $e) {
        if (app()->environment('production')) {
            return response()->view('errors.500', [], 500);
        }
    });
    })
    ->create();
