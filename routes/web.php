<?php

use App\Http\Controllers\SurpriseController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/kejutan');
Route::get('/kejutan', [SurpriseController::class, 'index'])->name('surprise');

Route::get('/debug', function () {
    try {
        return app(SurpriseController::class)->index()->render();
    } catch (\Throwable $e) {
        return response(
            get_class($e) . ': ' . $e->getMessage() . "\n" . $e->getFile() . ':' . $e->getLine(),
            500
        )->header('Content-Type', 'text/plain');
    }
});