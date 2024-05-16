<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoboflowController;
use App\Http\Controllers\AkunController;
use App\Http\Controllers\LoginController;



Route::get('/', function () {
    return view('tampilanutama');

});

Route::get('/input', function () {
    return view('diagnosa_input');
});

Route::get('/output', function () {
    return view('diagnosa_output');
});

Route::get('/beranda_pembudidaya', function () {
    return view('beranda_pembudidaya');
});

Route::get('/beranda_admin', function () {
    return view('beranda_admin');
});


Route::get('/daftar', function () {
    return view('daftar');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/komu', function () {
    return view('komunitas');
});

Route::get('/postingan', function () {
    return view('postkonten');
});

// Lupa pW

Route::get('/lupa', function () {
    return view('tampilanawal_lupapassword');
});

Route::post('/request-otp', [LoginController::class, 'requestOtp'])->name('requestOtp');

Route::get('/verify-otp', [LoginController::class, 'showVerifyForm'])->name('showVerifyForm');

Route::post('/verify-otp', [LoginController::class, 'verifyOtp'])->name('verifyOtp');

Route::get('/reset', [LoginController::class, 'reset'])->name('reset');
// end

Route::get('/verif', function () {
    return view('verifikasi_otp');
});

Route::get('/otp', function () {
    return view('OTP_Fonnte');
});

// Route::get('/reset', function () {
//     return view('reset_password');
// });



Route::get('/check-api-connection', [RoboflowController::class, 'checkApiConnection']);
Route::get('/test', [RoboflowController::class, 'index']);
Route::post('/upload', [RoboflowController::class, 'upload']);


// routes/web.php

use App\Http\Controllers\RegistrasiController;


Route::post('/daftar', [RegistrasiController::class, 'daftar'])->name('register');
Route::post('/login', [LoginController::class, 'login'])->name('login');