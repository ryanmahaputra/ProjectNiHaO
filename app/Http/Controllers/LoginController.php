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

        $remember = $request->has('remember');

        if (Auth::attempt($credentials)) {
            // Jika autentikasi berhasil, arahkan ke halaman yang sesuai
            return redirect()->intended('/beranda_pembudidaya');
        }

        $user = Akun::where('username', $request->username)->first();

        if (!$user) {
            // Jika username tidak ditemukan, tampilkan pesan error khusus
            return redirect()->back()->withErrors(['msg' => 'Username tidak ditemukan']);
        }

        // Jika autentikasi gagal, cek apakah kesalahan terjadi pada username atau password
        if (Auth::attempt(['username' => $request->username, 'password' => $request->password], $remember)) {
            // Jika autentikasi berhasil, arahkan ke halaman yang sesuai
            return redirect()->intended('/beranda_pembudidaya');
        }

        // Jika autentikasi gagal karena password salah, tampilkan pesan error khusus
        return redirect()->back()->withErrors(['msg' => 'Password salah']);
    }
}

