<?php

use App\Http\Middleware\CheckPembelian;
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
            'admin' => App\Http\Middleware\adminOnly::class,
            'auth' => App\Http\Middleware\authenticate::class,
            'cekpembelian' => App\Http\Middleware\CheckPembelian::class,
            'cekbelipage' => App\Http\Middleware\CheckBeliPage::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
