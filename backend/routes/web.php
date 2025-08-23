<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ForumController;
use App\Http\Controllers\AgendaController;
use App\Http\Controllers\ProyekController;
use App\Http\Controllers\BookmarkController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\KomunitasController;
use App\Http\Controllers\LearnMoreController;

// Routes from "main"
Route::get('/', function () {
    return view('main.index');
})->name('home');

Route::get('/komunitas', [KomunitasController::class, 'index'])->name('komunitas.index');
Route::get('/komunitas/{id}', [KomunitasController::class, 'show'])->name('komunitas.show');

Route::get('/show', [AgendaController::class, 'ShowAgendaFound'])->name('agenda.showF');

Route::get('/proyek', [ProyekController::class, 'index'])->name('proyek.index');

Route::get('/settings', [SettingsController::class, 'index'])->name('settings.index');

Route::get('/bookmark', [BookmarkController::class, 'index'])->name('bookmark.index');
Route::delete('/bookmark/{id}', [BookmarkController::class, 'destroy'])->name('bookmark.destroy');

// Unique routes from "panjoel" not present in "main"
Route::get('/galeri', fn() => view('galeri.index'))->name('galeri');
Route::get('/blog', fn() => view('blog.index'))->name('blog');

// Commented routes from "panjoel"
// Route::get('/login', fn() => view('auth.login'))->name('login');
// Route::get('/register', fn() => view('auth.register'))->name('register');
?>