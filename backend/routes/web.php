<?php

use Illuminate\Support\Facades\Route;

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
use App\Http\Controllers\BlogController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

// Routes from "main"
Route::get('/', function () {
    return view( 'public.main.index');
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

// For Admin

Route::get('/admin/', [AdminDashboardController::class, 'index'])->name('admin.dashboard.index');

Route::get('/admin/galeri', [AdminGaleriController::class , 'index'])->name('admin.galeri.index');
Route::get('/admin/galeri/1', [AdminGaleriController::class , 'show'])->name('admin.galeri.show');

Route::get('/admin/proyek', [AdminProyekController::class , 'index'])->name('admin.proyek.index');
Route::get('/admin/proyek/1', [AdminProyekController::class , 'show'])->name('admin.proyek.index');

Route::get('/admin/komunitas', [AdminKomunitasController::class , 'index'])->name('admin.komunitas.index');
Route::get('/admin/komunitas/1', [AdminKomunitasController::class , 'show'])->name('admin.komunitas.detail');

Route::get('/admin/blog', [AdminBlogController::class , 'index'])->name('admin.blog.index');
Route::get('/admin/blog/1', [AdminBlogController::class, 'show'])->name('admin.blog.show');
