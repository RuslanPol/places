<?php

namespace App\Http\Controllers;

use App\Models\Place;
use Illuminate\Http\Request;

class PlaceController extends Controller
{
    public function index()
    {
        return Place::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|unique:places|max:255',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
        ]);

        $place = Place::create($request->all());
        return response()->json($place, 201);
    }
}
