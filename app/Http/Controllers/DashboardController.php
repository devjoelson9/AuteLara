<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;

class DashboardController extends Controller{
   public function index(){
        $totalUsers = User::count();
        $users = User::all();
        return view('dashboard', compact('totalUsers', 'users'));
    }
}