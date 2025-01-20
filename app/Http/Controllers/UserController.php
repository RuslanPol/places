<?php

namespace App\Http\Controllers;

use App\Models\User;
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
            'login' => 'required|unique:users,login',
            'password' => 'required',
        ]);

        return User::create([
            'login' => $request->login,
            'password' => bcrypt($request->password),
            'is_admin' => false,
        ]);
    }
    public function addFavoritePlace(Request $request, $userId)
    {
        $user = User::findOrFail($userId);

        $request->validate([
            'place_id' => 'required|exists:places,id',
        ]);

        if ($user->places()->count() >= 3) {
            return response()->json(['error' => 'User can have a maximum of 3 favorite places'], 400);
        }

        if ($user->places()->where('place_id', $request->place_id)->exists()) {
            return response()->json(['error' => 'Place already added to favorites'], 400);
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
