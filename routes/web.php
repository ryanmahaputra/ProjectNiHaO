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


Route::get('/login', function () {
    return view('login');
});

Route::get('/kamera', function () {
    return view('diagnosa_kamera');
});



Route::get('/check-api-connection', [RoboflowController::class, 'checkApiConnection']);


Route::post('/daftar', [AkunController::class, 'store']);

Route::get('/test', [RoboflowController::class, 'index']);
Route::post('/upload', [RoboflowController::class, 'upload']);