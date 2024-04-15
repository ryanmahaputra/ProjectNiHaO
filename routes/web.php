<?php

use Illuminate\Support\Facades\Route;


Route::get('/home', function () {
    return view('tampilanutama');
    
});

Route::get('/daftar', function () {
    return view('daftar');
});

use App\Http\Controllers\AkunController;

Route::post('/daftar', [AkunController::class, 'store']);
