<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GaleriController;

Route::get('/', function () {
    return view('main.index');
})->name('home');

Route::prefix('galeri')->group(function () {
    Route::get('/galeri', [GaleriController::class, 'index'])->name('galeri.index');
    Route::get('/galeri{id}', [GaleriController::class, 'show'])->name('galeri.show');

});

Route::get('/main', [GaleriController::class, 'index'])->name('main.index');


