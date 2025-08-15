<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    $userName = Auth::check() ? Auth::user()->name : null;
    return view('home', compact('userName'));
})->name('home');

Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'loginAttempt'])->name('auth');

Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'registerAttempt'])->name('register');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [AuthController::class, 'listaUsers'])->name('dashboard');
});

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');