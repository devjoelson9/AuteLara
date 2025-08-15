<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;

class DashboardController extends Controller{
   public function index(){
        // Pega a contagem total de usuários
        $totalUsers = User::count();

        // Pega todos os usuários para listar (se você precisar disso no dashboard)
        $users = User::all();

        // Passa ambas as variáveis para a view do dashboard
        return view('dashboard', compact('totalUsers', 'users'));
    }

    // Se você tiver uma rota separada para listar todos os usuários, pode ser assim:
    // public function listAllUsers(){
    //     $users = User::all();
    //     return view('users.list', compact('users')); 
    // }
}