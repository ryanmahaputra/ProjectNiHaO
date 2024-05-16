<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Akun;
use App\Models\Otp;
use Carbon\Carbon;
use Illuminate\Support\Facades\Http;

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

    public function requestOtp(Request $request)
    {
        $request->validate([
            'nomor' => 'required|string|max:20',
        ]);

        $nomor = $request->input('nomor');

        // Hapus OTP sebelumnya untuk nomor yang sama
        Otp::where('nomor', $nomor)->delete();

        // Generate OTP dan simpan ke database
        $otp = rand(100000, 999999);
        $waktu = time();
        Otp::create([
            'nomor' => $nomor,
            'otp' => $otp,
            'waktu' => $waktu,
        ]);

        // Simpan nomor di session
        $request->session()->put('nomor', $nomor);

        // Kirim OTP melalui API Fonnte
        $response = Http::withHeaders([
            'Authorization' => '6VsLWJ2Fxey@W3RZ+Koz',
        ])->post('https://api.fonnte.com/send', [
            'target' => $nomor,
            'message' => "Your OTP: " . $otp,
        ]);

        // Arahkan pengguna ke halaman verifikasi OTP
        return redirect()->route('showVerifyForm');
    }


    public function showVerifyForm()
    {
        return view('verifikasi_otp');
    }

    public function verifyOtp(Request $request)
    {
        $request->validate([
            'otp' => 'required|integer',
        ]);

        $nomor = $request->session()->get('nomor');
        $otp = $request->input('otp');

        $otpRecord = Otp::where('nomor', $nomor)->where('otp', $otp)->first();

        if ($otpRecord && (time() - $otpRecord->waktu <= 300)) {
            $request->session()->forget('nomor');  //kalo mau buat reset pasword bagian ini dicommand aja
            // aku liat di tabel akun gaada nomor hp mungkin ntar tambahin inputan buat no hpnya
            // terus kalo udah ada no hp nya bisa dibikin buat reset password by nomor hp

            return redirect()->route('reset');
        } elseif ($otpRecord) {
            // kalo mau kasih massage bagian ini
            return "OTP expired";
        } else {
            // kalo mau kasih massage bagian ini

            return "OTP salah";
        }
    }

    public function reset()
    {
        return view('reset_password');
    }
}
