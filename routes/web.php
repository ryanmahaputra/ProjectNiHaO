<?php

use Illuminate\Support\Facades\Route;


Route::get('/home', function () {
    return view('tampilanutama');
    
});

Route::get('/input', function () {
    return view('diagnosa_input');
});




use App\Http\Controllers\AkunController;
Route::post('/daftar', [AkunController::class, 'store']);
