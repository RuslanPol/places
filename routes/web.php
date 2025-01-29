<?php

use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

use App\Http\Controllers\PlaceController;
use App\Http\Controllers\UserController;

Route::get('/', [MainController::class, 'index'])->name('main.index');

Route::get('/users', [UserController::class, 'index'])->name('user.index');
Route::get('/users/create', [UserController::class, 'create'])->name('user.create');
Route::post('/users', [UserController::class, 'store'])->name('user.store');
Route::post('/users/{user}/add-favorite-place', [UserController::class, 'addFavoritePlace'])->name('user.add_favorite_place');
Route::get('/users/{user}/favorite-places', [UserController::class, 'viewFavoritePlaces'])->name('user.view_favorite_places');
Route::get('/users/{user}', [UserController::class, 'show'])->name('user.show');

Route::get('/places', [PlaceController::class, 'index'])->name('place.index');
Route::get('/places/create', [PlaceController::class, 'create'])->name('place.create');
Route::post('/places', [PlaceController::class, 'store'])->name('place.store');


Route::get('/places/fake', [PlaceController::class, 'createTest']);
