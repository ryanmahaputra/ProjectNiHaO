<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoboflowController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->group(function () {
    // Route::post('/process-image', [RoboflowController::class, 'processImage']);
    // Route::get('/check-api-connection', [RoboflowController::class, 'checkApiConnection']);
    Route::get('/', [RoboflowController::class, 'index']);
Route::post('/upload', [RoboflowController::class, 'upload']);
});

Route::middleware('jwt.auth')->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
        Route::get('/', [RoboflowController::class, 'index']);
Route::post('/upload', [RoboflowController::class, 'upload']);
    });
});

Route::get('/check-api-connection', [RoboflowController::class, 'checkApiConnection']);
Route::get('/', [RoboflowController::class, 'index']);
Route::post('/upload', [RoboflowController::class, 'upload']);