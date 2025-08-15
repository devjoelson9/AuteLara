<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController; // Importe o DashboardController
use Illuminate\Support\Facades\Auth; // Importe o Auth para usar em Closures

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Aqui é onde você pode registrar rotas web para sua aplicação. Essas
| rotas são carregadas pelo RouteServiceProvider e todas elas serão
| atribuídas ao grupo de middleware "web". Faça algo incrível!
|
*/

/* --- Rotas Públicas (acessíveis a todos) --- */

Route::get('/', function () {
    $userName = Auth::check() ? Auth::user()->name : null;
    return view('home', compact('userName'));
})->name('home');

// Rotas de Autenticação (Login e Registro)
Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'loginAttempt'])->name('login.attempt'); // Nome mais específico

Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'registerAttempt'])->name('register.attempt'); // Nome mais específico

// Logout: A rota de logout precisa estar dentro do middleware 'auth'
// porque só se pode fazer logout se estiver logado.
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


/* --- Rotas Protegidas (requer autenticação) --- */

Route::middleware('auth')->group(function () {
    // Dashboard: Aponta para o DashboardController.index()
    // Este método irá carregar todos os dados necessários para o painel principal.
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Se você tiver uma página separada para a lista de usuários,
    // o ideal é que ela chame um método diferente, por exemplo, 'listAllUsers'.
    // A rota a seguir é um exemplo de como seria, mas não é necessária se
    // a lista já está no próprio dashboard.
    // Route::get('/users/list', [DashboardController::class, 'listAllUsers'])->name('users.list');
});