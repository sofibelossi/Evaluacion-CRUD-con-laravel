<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KartingController;
Route::get('/', function () {
    return view('welcome');
});
Route::resource('kartings','App\Http\Controllers\KartingController');
Route::get('/buscar', [KartingController::class, 'buscar'])->name('buscar');