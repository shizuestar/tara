<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ForumController;
use App\Http\Controllers\AgendaController;
use App\Http\Controllers\ProyekController;
use App\Http\Controllers\BookmarkController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\KomunitasController;
use App\Http\Controllers\LearnMoreController;
use App\Http\Controllers\GaleriController;

// Routes from "main"
Route::get('/', function () {
    return view('main.index');
})->name('home');

Route::get('/komunitas', [KomunitasController::class, 'index'])->name('komunitas');
Route::get('/komunitas/{id}', [KomunitasController::class, 'show'])->name('komunitas.show');


Route::get('/learn-more', [LearnMoreController::class, 'index'])->name('learn_more.index');

Route::get('/agenda', [AgendaController::class, 'index'])->name('agenda');
Route::get('/show', [AgendaController::class, 'ShowAgendaFound'])->name('agenda.showF');

Route::get('/proyek', [ProyekController::class, 'index'])->name('proyek');

Route::get('/settings', [SettingsController::class, 'index'])->name('settings');

Route::get('/bookmark', [BookmarkController::class, 'index'])->name('bookmark');
Route::delete('/bookmark/{id}', [BookmarkController::class, 'destroy'])->name('bookmark.destroy');

Route::get('/galeri', [GaleriController::class, 'index'])->name('galeri');
Route::get('/galeri{id}', [GaleriController::class, 'show'])->name('galeri.show');
Route::get('/blog', fn() => view('blog.index'))->name('blog');

// Commented routes from "panjoel"
// Route::get('/login', fn() => view('auth.login'))->name('login');
// Route::get('/register', fn() => view('auth.register'))->name('register');
