<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        $middleware->alias([
            'is_admin' => \App\Http\Middleware\isAdmin::class,
            'is_lpm' => \App\Http\Middleware\isLpm::class,
            'is_pejabat' => \App\Http\Middleware\isPejabat::class,
            'is_pejabat_divisi' => \App\Http\Middleware\isPejabatDivisi::class,
            'is_divisi' => \App\Http\Middleware\isDivisi::class,
            'is_admin_or_lpm' => \App\Http\Middleware\isAdminOrLpm::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
