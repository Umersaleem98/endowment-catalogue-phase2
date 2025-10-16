<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Illuminate\Session\TokenMismatchException;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        // Register global middleware if needed
    })
    ->withExceptions(function (Exceptions $exceptions) {
        // $exceptions->render(function (Throwable $e, Request $request) {
        //     // Database query errors
        //     if ($e instanceof \Illuminate\Database\QueryException) {
        //         Log::error('Database error: ' . $e->getMessage(), [
        //             'url' => $request->fullUrl(),
        //             'ip' => $request->ip(),
        //         ]);
        //         return response()->view('errors.500', [], 500);
        //     }

        //     // 404 Not Found
        //     if ($e instanceof NotFoundHttpException) {
        //         Log::warning('404 Not Found: ' . $request->fullUrl(), [
        //             'ip' => $request->ip(),
        //             'user_agent' => $request->userAgent(),
        //         ]);
        //         return response()->view('errors.404', [], 404);
        //     }

        //     // 405 Method Not Allowed
        //     if ($e instanceof MethodNotAllowedHttpException) {
        //         Log::warning('405 Method Not Allowed: ' . $request->fullUrl(), [
        //             'ip' => $request->ip(),
        //             'method' => $request->method(),
        //         ]);
        //         return response()->view('errors.405', [], 405);
        //     }

        //     // 419 Page Expired (CSRF token mismatch)
        //     if ($e instanceof TokenMismatchException) {
        //         return redirect()->back()->withErrors([
        //             'message' => 'Your session expired. Please try again.',
        //         ]);
        //     }

        //     // Generic 500 Internal Server Error
        //     if ($e instanceof \ErrorException || $e instanceof \Exception) {
        //         Log::error('500 Error: ' . $e->getMessage(), [
        //             'url' => $request->fullUrl(),
        //             'ip' => $request->ip(),
        //         ]);
        //         return response()->view('errors.500', [], 500);
        //     }

        //     return null; // fallback to Laravel's default handler
        // });
    })
    ->create();
