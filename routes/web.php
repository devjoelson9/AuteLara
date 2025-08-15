<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
Route::get('/', function () {
    return view('home')->name('home');
});

Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'loginAttempt'])->name('auth');

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'registerAttempt'])->name('register');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [AuthController::class, 'listaUsers'])->name('dashboard');
});