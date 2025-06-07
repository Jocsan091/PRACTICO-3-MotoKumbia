<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnimalController;

Route::get('/modulo1', function () {
    return view('modulo1');
})->name('modulo1');


Route::get('/modulo2', function () {
    return view('modulo2');
})->name('modulo2');

//crea una ruta post que mande a Animal:store
Route::post('/animal/store', AnimalController::class . '@store')->name('animal.store');


Route::resource('motorcycles', MotorcycleController::class);
