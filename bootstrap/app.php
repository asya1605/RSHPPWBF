<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

use App\Http\Middleware\IsAdministrator;
use App\Http\Middleware\IsDokter;
use App\Http\Middleware\IsPerawat;
use App\Http\Middleware\IsResepsionis;
use App\Http\Middleware\IsPemilik;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        // 🔹 Registrasi alias middleware per role
        $middleware->alias([
            'isAdmin' => IsAdministrator::class,
            'isDokter' => IsDokter::class,
            'isPerawat' => IsPerawat::class,
            'isResepsionis' => IsResepsionis::class,
            'isPemilik' => IsPemilik::class,
        ]);

        // (Opsional) Tambahkan middleware web global di sini jika dibutuhkan
        $middleware->web(append: [
            // contoh: \App\Http\Middleware\VerifyCsrfToken::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })
    ->create();
