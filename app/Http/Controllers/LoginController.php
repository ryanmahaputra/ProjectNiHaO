<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;    
use Illuminate\Support\Facades\Auth;
use App\Models\Akun;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {
            // Jika autentikasi berhasil, arahkan ke halaman yang sesuai
            return redirect()->intended('/beranda_pembudidaya');
        }

        // Jika autentikasi gagal, kembali ke halaman login dengan pesan error
        return redirect()->back()->withErrors(['msg' => 'Username atau password salah']);
    }
}
