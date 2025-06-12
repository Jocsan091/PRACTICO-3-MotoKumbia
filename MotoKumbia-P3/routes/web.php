<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnimalController;
use App\Http\Controllers\MotorcycleController;
use App\Http\Controllers\RepairsController;
use App\Http\Controllers\CustomerController;


// Rutas GET
Route::view('/', 'welcome')->name('welcome');

Route::get('/modulo1', function () {
    return view('modulo1');
})->name('modulo1');

Route::resource('motorcycles', MotorcycleController::class);


// Ruta POST
Route::post('/animal/store', AnimalController::class . '@store')
    ->name('animal.store');

// Rutas customers
use App\Http\Controllers\CustomerController;

Route::resource('customers', CustomerController::class);




// Módulo 3: Reparaciones 
Route::resource('repairs', RepairsController::class)
     ->only(['index','create','store','edit','update','show','destroy'])
     ->names('repairs');




