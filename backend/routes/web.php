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
use App\Http\Controllers\AdminSettingsController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AdminKomunitasController;

// Routes from "main"
Route::get('/', function () {
    return view('public.main.index');
})->name('home');

Route::get('/', [DashboardController::class, 'index'])->name('home');

Route::get('/komunitas', [KomunitasController::class, 'index'])->name('komunitas.index');
Route::get('/komunitas/{id}', [KomunitasController::class, 'show'])->name('komunitas.show');

Route::get('/proyek', [ProyekController::class, 'index'])->name('proyek');

Route::get('/blog', [BlogController::class, 'index'])->name('blog');

Route::get('/learn-more', [LearnMoreController::class, 'index'])->name('learn_more.index');

Route::get('/agenda', [AgendaController::class, 'index'])->name('agenda');
Route::get('/show', [AgendaController::class, 'ShowAgendaFound'])->name('agenda.showF');
// Route::get('/forum/{id}', [ForumController::class, 'show'])->name('forum.show');

Route::get('/settings', [SettingsController::class, 'index'])->name('settings');

Route::get('/bookmark', [BookmarkController::class, 'index'])->name('bookmark');
Route::delete('/bookmark/{id}', [BookmarkController::class, 'destroy'])->name('bookmark.destroy');

// Unique routes from "panjoel" not present in "main"
Route::prefix('galeri')->group(function () {
    Route::get('/galeri', [GaleriController::class, 'index'])->name('galeri');
    Route::get('/galeri{id}', [GaleriController::class, 'show'])->name('galeri.show');
});

Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard.index');

Route::get('/login', fn() => view('auth.login'))->name('login');
Route::get('/register', fn() => view('auth.register'))->name('register');

/*
Route::get('/main', [GaleriController::class, 'index'])->name('main.index');
*/

Route::get('/admin/proyek', [AdminProyekController::class, 'index'])->name('admin.proyek.index');
Route::get('/admin/proyek/1', [AdminProyekController::class, 'show'])->name('admin.proyek.show');

Route::get('/admin/komunitas', [AdminKomunitasController::class, 'index'])->name('admin.komunitas.index');
Route::get('/admin/komunitas/1', [AdminKomunitasController::class, 'show'])->name('admin.komunitas.show');

Route::get('/admin/blog', [AdminBlogController::class, 'index'])->name('admin.blog.index');
Route::get('/admin/blog/1', [AdminBlogController::class, 'show'])->name('admin.blog.show');

Route::get('/admin/user', [AdminUserController::class, 'index'])->name('admin.user.index');

Route::get('/admin/settings', [AdminSettingsController::class, 'index'])->name('admin.settings.index');
