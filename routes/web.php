<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
//Route::post('/api/register', [\App\Http\Controllers\AuthController::class],'register');
