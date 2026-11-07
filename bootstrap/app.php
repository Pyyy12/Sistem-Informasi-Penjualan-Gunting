<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Request;
use Closure;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'admin' => function (Request $request, Closure $next) {
                if (!$request->user() || !$request->user()->isAdmin()) {
                    abort(403, 'Anda tidak memiliki akses ke halaman ini.');
                }

                return $next($request);
            },
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();