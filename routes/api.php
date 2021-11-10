<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('api')->group(function () {
    Route::get('echo', function(){
        return "Cambasoft Web Services running...";
    });
});