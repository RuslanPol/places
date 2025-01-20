<?php
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PlaceController;
use Illuminate\Support\Facades\Route;



Route::post('register', [AuthController::class, 'register']);

// Вход пользователя
Route::post('login', [AuthController::class, 'login']);

// Выход пользователя (требуется аутентификация)
Route::post('logout', [AuthController::class, 'logout'])->middleware('auth:api');

// Получение списка мест (не требует аутентификации)
Route::get('places', [PlaceController::class, 'index']);

// Добавление нового места (требуется аутентификация)
Route::post('places', [PlaceController::class, 'store'])->middleware('auth:api');

// Добавление места в список желаемого (требуется аутентификация)
Route::post('places/{id}/wishlist', [PlaceController::class, 'addToWishlist'])->middleware('auth:api');

