<?php

use Illuminate\Support\Facades\Route;


Route::get('/home', function () {
    return view('tampilanutama');
    
});

Route::get('/input', function () {
    return view('diagnosa_input');
});

use App\Http\Controllers\RoboflowController;
Route::get('/check-api-connection', [RoboflowController::class, 'checkApiConnection']);
Route::post('/process-image', [RoboflowController::class, 'processImage']);

use App\Http\Controllers\AkunController;
Route::post('/daftar', [AkunController::class, 'store']);