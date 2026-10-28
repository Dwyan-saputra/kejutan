<?php

use App\Http\Controllers\SurpriseController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/kejutan');
Route::get('/kejutan', [SurpriseController::class, 'index'])->name('surprise');