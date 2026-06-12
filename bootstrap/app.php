<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

$app = Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        //
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();

// Vercel Serverless environment has a read-only filesystem except for /tmp.
if (isset($_SERVER['VERCEL']) || isset($_ENV['VERCEL'])) {
    $app->useStoragePath($_ENV['APP_STORAGE'] ?? '/tmp');
}

return $app;
