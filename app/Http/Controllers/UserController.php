<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserPlace;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return User::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'login' => 'required|string|unique:users|max:255',
            'password' => 'required|string|min:8',
        ]);

        $user = User::create([
            'login' => $request->login,
            'password' => bcrypt($request->password),
        ]);

        return response()->json($user, 201);
    }

    public function addFavoritePlace(Request $request, $userId)
    {
        $user = User::findOrFail($userId);

        $request->validate([
            'place_id' => 'required|exists:places,id',
        ]);

        if ($user->places()->count() >= 3) {
            return response()->json(['message' => 'User can have a maximum of 3 favorite places'], 400);
        }

        if ($user->places()->where('place_id', $request->place_id)->exists()) {
            return response()->json(['message' => 'Place already added to favorites'], 400);
        }

        $user->places()->attach($request->place_id);
        return response()->json(['message' => 'Place added to favorites']);
    }

    public function getFavoritePlaces($userId)
    {
        $user = User::findOrFail($userId);
        return $user->places;
    }
}
