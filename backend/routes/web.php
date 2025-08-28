<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AgendaController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\BookmarkController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KomunitasController;
use App\Http\Controllers\LearnMoreController;
use App\Http\Controllers\AdminGaleriController;
use App\Http\Controllers\AdminProyekController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\proyek\ProyekController;

// For Authentication
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');

// For Public

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

Route::get('/komunitas', [KomunitasController::class, 'index'])->name('komunitas');
Route::get('/komunitas/{id}', [KomunitasController::class, 'show'])->name('komunitas.show');


Route::get('/learn-more', [LearnMoreController::class, 'index'])->name('learn_more.index');

Route::get('/agenda', [AgendaController::class, 'index'])->name('agenda');
Route::get('/show', [AgendaController::class, 'ShowAgendaFound'])->name('agenda.showF');
// Route::get('/forum/{id}', [ForumController::class, 'show'])->name('forum.show');

Route::get('/proyek', [ProyekController::class, 'index'])->name('proyek');

Route::get('/settings', [SettingsController::class, 'index'])->name('settings');

Route::get('/bookmark', [BookmarkController::class, 'index'])->name('bookmark');
Route::delete('/bookmark/{id}', [BookmarkController::class, 'destroy'])->name('bookmark.destroy');

Route::get('/galeri', [GaleriController::class, 'index'])->name('galeri');
Route::get('/galeri{id}', [GaleriController::class, 'show'])->name('galeri.show');
Route::get('/blog', fn() => view('public.blog.index'))->name('blog');

Route::get('/test', fn() => view('example_admin'))->name('test');

// For Admin

 Route::get('/admin/galeri', [AdminGaleriController::class , 'index'])->name('admin.galeri.index');
 Route::get('/admin/proyek', [AdminProyekController::class , 'index'])->name('admin.proyek.index');

