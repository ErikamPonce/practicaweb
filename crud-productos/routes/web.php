<?php

use App\Http\Controllers\EscuelaController;
use App\Http\Controllers\AlumnoController;
use App\Http\Controllers\PersonalController;
use App\Http\Controllers\CarreraController;
use App\Http\Controllers\AsignaturaController;
use App\Http\Controllers\HorarioController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth', 'role:Administrador'])->group(function () {
    Route::resource('escuelas', EscuelaController::class);
    Route::resource('alumnos', AlumnoController::class);
    Route::resource('personal', PersonalController::class);
    Route::resource('carreras', CarreraController::class);
    Route::resource('asignaturas', AsignaturaController::class);
    Route::resource('horarios', HorarioController::class);
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/admin', function () {
    return view('admin');
})->middleware(['auth', 'role:Administrador']);
