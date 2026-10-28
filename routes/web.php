<?php

use Illuminate\Support\Facades\Route;

// --- Ini adalah route bawaan Laravel (biarkan saja, jangan dihapus) ---
Route::get('/', function () {
    return view('welcome');
});

// === TAMBAHKAN KODE INI DI BAGIAN BAWAHNYA ===
use App\Http\Controllers\SurpriseController;

Route::get('/kejutan', [SurpriseController::class, 'index']);