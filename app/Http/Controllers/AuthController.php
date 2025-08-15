<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class AuthController extends Controller{
    public function index(){
        return view('login');
    }

    public function listaUsers(){
        $totalUsers = User::count();
        return view('dashboard', compact('totalUsers'));
    }

    public function loginAttempt(Request $request){
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('dashboard');
        }

        return back()->withInput()->with('status', 'login invalido');
    }

    public function register(){
        return view('register');
    }

    public function registerAttempt(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users', 
            'password' => 'required|string|min:8|confirmed', 
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password), 
        ]);

        return redirect('/login')->with('success', 'Cadastro realizado com sucesso!');
    }

    public function logout(Request $request){
        Auth::logout(); 

        $request->session()->invalidate(); 
        $request->session()->regenerateToken(); 
        return redirect('/')->with('status', 'Você foi desconectado com sucesso!'); 
    }
}
