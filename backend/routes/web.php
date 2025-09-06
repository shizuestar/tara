<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\BlogController;
use App\Http\Controllers\ForumController;
use App\Http\Controllers\AgendaController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\ProyekController;
use App\Http\Controllers\BookmarkController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\AdminBlogController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KomunitasController;
use App\Http\Controllers\LearnMoreController;
use App\Http\Controllers\AdminGaleriController;
use App\Http\Controllers\AdminProyekController;
use App\Http\Controllers\AdminKomunitasController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AdminAgendaController;
use App\Http\Controllers\AdminSettingsController;

// Routes Public
Route::get('/', [DashboardController::class, 'index'])->name('home');

Route::get('/komunitas', [KomunitasController::class, 'index'])->name('komunitas.index');
Route::get('/komunitas/{id}', [KomunitasController::class, 'show'])->name('komunitas.show');

Route::get('/proyek', [ProyekController::class, 'index'])->name('proyek');

Route::get('/blog', [BlogController::class, 'index'])->name('blog');

Route::get('/learn-more', [LearnMoreController::class, 'index'])->name('learn_more.index');

Route::get('/agenda', [AgendaController::class, 'index'])->name('agenda');
Route::get('/show', [AgendaController::class, 'ShowAgendaFound'])->name('agenda.showF');

Route::get('/settings', [SettingsController::class, 'index'])->name('settings');

Route::get('/bookmark', [BookmarkController::class, 'index'])->name('bookmark');
Route::delete('/bookmark/{id}', [BookmarkController::class, 'destroy'])->name('bookmark.destroy');

Route::get('/galeri', [GaleriController::class, 'index'])->name('galeri');
Route::get('/galeri/{id}', [GaleriController::class, 'show'])->name('galeri.show');

// Auth
Route::get('login', function () {
    return view('auth.login');
})->name('login');

Route::get('/register', function () {
    return view('auth.register');
})->name('register');

// Routes Admin
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard.index');

    Route::get('/galeri', [AdminGaleriController::class, 'index'])->name('admin.galeri.index');
    Route::get('/galeri/{id}', [AdminGaleriController::class, 'show'])->name('admin.galeri.show');

    Route::get('/proyek', [AdminProyekController::class, 'index'])->name('admin.proyek.index');
    Route::get('/proyek/{id}', [AdminProyekController::class, 'show'])->name('admin.proyek.show');

    Route::get('/komunitas', [AdminKomunitasController::class, 'index'])->name('admin.komunitas.index');
    Route::get('/komunitas/{id}', [AdminKomunitasController::class, 'show'])->name('admin.komunitas.show');

    Route::get('/blog', [AdminBlogController::class, 'index'])->name('admin.blog.index');
    Route::get('/blog/{id}', [AdminBlogController::class, 'show'])->name('admin.blog.show');

    Route::get('/user', [AdminUserController::class, 'index'])->name('admin.user.index');

    Route::get('/settings', [AdminSettingsController::class, 'index'])->name('admin.settings.index');

    Route::resource('agenda', AdminAgendaController::class);
});
