<?php

use Illuminate\Support\Facades\Route;

// Route::get('/login', fn() => view('auth.login'))->name('login');
// Route::get('/register', fn() => view('auth.register'))->name('register');

Route::get('/', fn() => view('main.index'))->name('home');
Route::get('/galeri', fn() => view('galeri.index'))->name('galeri');
Route::get('/komunitas', fn() => view('komunitas.index'))->name('komunitas');
Route::get('/proyek', fn() => view('proyek.index'))->name('proyek');
Route::get('/blog', fn() => view('blog.index'))->name('blog');
Route::get('/agenda', fn() => view('agenda.index'))->name('agenda');


