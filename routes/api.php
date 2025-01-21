<?php
//
//use Illuminate\Support\Facades\Route;
//use App\Http\Controllers\PlaceController;
//use App\Http\Controllers\UserController;
//
//Route::apiResource('places', PlaceController::class);
//Route::apiResource('users', UserController::class);
//
//Route::post('users/{userId}/favorite-places', [UserController::class, 'addFavoritePlace']);
//Route::get('users/{userId}/favorite-places', [UserController::class, 'getFavoritePlaces']);
use App\Http\Controllers\PlaceController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::apiResource('places', PlaceController::class);
Route::apiResource('users', UserController::class);

Route::post('users/{userId}/favorite-places', [UserController::class, 'addFavoritePlace']);
Route::get('users/{userId}/favorite-places', [UserController::class, 'getFavoritePlaces']);
