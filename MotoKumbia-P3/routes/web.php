<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnimalController;
use App\Http\Controllers\MotorcycleController;
use App\Http\Controllers\RepairsController;
use App\Http\Controllers\CustomerController;

// Rutas GET
Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/modulo1', function () {
    return view('modulo1');
})->name('modulo1');

Route::resource('modulo2', MotorcycleController::class);


// Ruta POST
Route::post('/animal/store', AnimalController::class . '@store')
    ->name('animal.store');

// Rutas resource
Route::resource('customers', CustomerController::class)
    ->only(['index', 'create', 'store', 'destroy']);



