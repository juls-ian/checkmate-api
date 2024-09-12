<?php

use App\Http\Controllers\Api\Auth\LoginController;
use App\Http\Controllers\Api\Auth\LogoutController;
use App\Http\Controllers\Api\Auth\RegisterController;
use App\Http\Controllers\Api\V1\CompleteTaskController;
use App\Http\Controllers\Api\V1\TaskController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Contains routes that are used for API calls, returning JSON responses instead of HTML

require __DIR__ . '/api/v1.php';
require __DIR__ . '/api/v2.php';



Route::prefix('auth')->group(function () {

    Route::post('/login', LoginController::class)->middleware('guest');
    //                                               auth sanctum middleware
    Route::post('/logout', LogoutController::class)->middleware('auth:sanctum');
    Route::post('/register', RegisterController::class)->middleware('guest');
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Serve API interactions, returning JSON responses, and are typically used by front-end frameworks or mobile apps.