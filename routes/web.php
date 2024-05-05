<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoboflowController;
use App\Http\Controllers\AkunController;


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


Route::get('/check-api-connection', [RoboflowController::class, 'checkApiConnection']);
Route::get('/test', [RoboflowController::class, 'index']);
Route::post('/upload', [RoboflowController::class, 'upload']);


// routes/web.php

use App\Http\Controllers\RegistrasiController;
use App\Http\Controllers\LoginController;


Route::post('/daftar', [RegistrasiController::class, 'daftar'])->name('register');
Route::post('/login', [LoginController::class, 'login'])->name('login');
