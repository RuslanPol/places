<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

use App\Http\Controllers\PlaceController;
use App\Http\Controllers\UserController;


Route::get('/users', [UserController::class, 'index']);
Route::post('/users', [UserController::class, 'store']);
Route::post('/users/{userId}/favorite-places', [UserController::class, 'addFavoritePlace']);
Route::get('/users/{userId}/favorite-places', [UserController::class, 'getFavoritePlaces']);

Route::get('/places', [PlaceController::class, 'index']);
Route::post('/places', [PlaceController::class, 'store']);
