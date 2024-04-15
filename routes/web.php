<?php

use Illuminate\Support\Facades\Route;


Route::get('/home', function () {
    return view('tampilanutama');
    
});

Route::get('/test', function () {
    return view('header');
});

use App\Http\Controllers\AkunController;

Route::post('/daftar', [AkunController::class, 'store']);
