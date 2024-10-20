<?php

use App\Http\Controllers\EventoController;
use App\Http\Controllers\EquipoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

//Rutas Evetos
Route::get('/eventos', [EventoController::class, 'index'])->name('eventos.index');
Route::post('/eventos', [EventoController::class, 'store'])->name('eventos.store');
Route::get('/eventos/create', [EventoController::class, 'create'])->name('eventos.create');
Route::delete('/eventos/{evento}', [EventoController::class, 'destroy'])->name('eventos.destroy');
Route::put('/eventos/{evento}', [EventoController::class, 'update'])->name('eventos.update');
Route::get('/eventos/{evento}/edit', [EventoController::class, 'edit'])->name('eventos.edit');

//Rutas Equipos
Route::get('/equipos', [EquipoController::class, 'index'])->name('equipos.index');
Route::post('/equipos', [EquipoController::class, 'store'])->name('equipos.store');
Route::get('/equipos/create', [EquipoController::class, 'create'])->name('equipos.create');