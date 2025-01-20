<?php

namespace App\Http\Controllers;

use App\Models\Place;
use App\Models\UserPlace;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class PlaceController extends Controller
{
    public function index()
    {
        if (Auth::user()->is_admin) {
            return Place::all();
        }

        return Place::whereHas('userPlaces', function ($query) {
            $query->where('user_id', Auth::id());
        })->get();
    }

    public function store(Request $request)
    {
        if (!Auth::user()->is_admin) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $place = Place::create($request->all());

        return response()->json($place, 201);
    }

    public function addToWishlist(Request $request, $id)
    {
        $place = Place::findOrFail($id);

        UserPlace::create([
            'user_id' => Auth::id(),
            'place_id' => $place->id,
        ]);

        return response()->json(['message' => 'Place added to wishlist']);
    }
}
