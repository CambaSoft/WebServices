<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::middleware('api')->group(function () {
    Route::get('echo', function () {return "Cambasoft Web Services running...";});
    Route::post('users', [UserController::class, 'store']);
    Route::post('users/login', [UserController::class, 'login']);

    Route::middleware('auth')->group(function () {
    });
});
