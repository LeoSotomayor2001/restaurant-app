<?php

use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\RedirectAdmin;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'admin' => AdminMiddleware::class,
            'redirect.admin' => RedirectAdmin::class
        ]);
        
    })
    ->withExceptions(function (Exceptions $exceptions) {
        if ($exceptions instanceof AuthorizationException) {
            return response()->view('errors.403', [], 403);
        }
        if ($exceptions instanceof AuthorizationException) {
            return response()->view('errors.404', [], 404);
        }
    })->create();
