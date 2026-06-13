<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'user_name' => 'required',
            'password' => 'required'
        ]);

        // 1. Cari penulis berdasarkan user_name
        $penulis = \App\Models\Penulis::where('user_name', $request->user_name)->first();

        // 2. Jika penulis ditemukan DAN password-nya cocok
        if ($penulis && \Illuminate\Support\Facades\Hash::check($request->password, $penulis->password)) {
        
            // 3. Login manual menggunakan objek $penulis
            Auth::login($penulis);
        
            $request->session()->regenerate();
            return redirect()->route('dashboard');
        }

        return back()->with('error', 'Username atau password salah');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}