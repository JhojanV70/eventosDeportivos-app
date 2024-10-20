<?php

use App\Http\Controllers\EventoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

//Rutas Evetos
Route::get('/eventos', [EventoController::class, 'index'])->name('eventos.index');
