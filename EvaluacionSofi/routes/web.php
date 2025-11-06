<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KartingController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
Route::get('/', function () {
    return redirect()->route('kartings.index');
});
Route::resource('kartings','App\Http\Controllers\KartingController');
Route::get('/buscar', [App\Http\Controllers\KartingController::class, 'buscar'])->name('buscar');

Route::view('/login', 'auth.login')->name('login');
Route::post('/login', [LoginController::class, 'store']);
Route::post('/logout', [LoginController::class, 'destroy'])
    ->name('logout');

Route::view('/register', 'auth.register')->name('register');
Route::post('/register', [RegisterController::class, 'store']);