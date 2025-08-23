<?php

use App\Http\Controllers\AgendaController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('main.index');
});


Route::get('/agenda', [AgendaController::class, 'index'])->name('agenda.index');
Route::get('/show-NF', [AgendaController::class, 'ShowAgendaNotFound'])->name('agenda.showNF');
Route::get('/show-F', [AgendaController::class, 'ShowAgendaFound'])->name('agenda.showF');