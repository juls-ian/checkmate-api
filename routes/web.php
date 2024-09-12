<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route;

// Contains routes that are used for web pages
// These routes generally return views
// They usually deal with frontend routes and utilize features like authentication

Route::get('/', function () {
    return view('welcome');
});


// prefixing auth route
Route::prefix('auth')->group(function () {
    //                                        guest middleware
    Route::post('/login', LoginController::class)->middleware('guest');
    Route::post('/logout', LogoutController::class)->middleware("auth");
    Route::post('/register', RegisterController::class)->middleware('guest');;
});

//  Serve web-based interactions, returning HTML views, handling form submissions, and providing content for web browsers.