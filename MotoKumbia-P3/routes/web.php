<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnimalController;
use App\Http\Controllers\MotorcycleController;
use App\Http\Controllers\RepairsController;
use App\Http\Controllers\CustomerController;


Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/modulo1', function () {
    return view('modulo1');
})->name('modulo1');

/**probando el modo resource
Route::get('/modulo2', function () {
    return view('modulo2');
})->name('motorcycles');
**/
Route::resource('modulo2', MotorcycleController::class);



Route::post('/animal/store', AnimalController::class . '@store')->name('animal.store');




Route::resource('customers', CustomerController::class)->only(['index', 'create', 'store', 'destroy']);




