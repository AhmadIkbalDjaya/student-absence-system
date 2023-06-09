<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login() {
        return view("login", [
            "title" => "Login",
        ]);
    }

    public function authenticate(Request $request) {
        $credentials = $request->validate([
            "username" => "required",
            "password" => "required",
        ]);
        
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            // return redirect()->intended('home');
            return redirect()->route('home');
        }
        return back()->with('loginError', 'Login Gagal! Username atau Password Salah');
    }

    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('home');
    }
}
