<?php

use App\Http\Controllers\PengujianController;
use Illuminate\Support\Facades\Route;

// Landing Page
Route::get('/', function () {
    return view('home');
})->name('home');

// Layanan
Route::prefix('layanan')->name('layanan.')->group(function () {
    Route::get('/pengujian', [PengujianController::class, 'index'])->name('pengujian');
});