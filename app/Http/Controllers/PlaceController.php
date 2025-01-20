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
            'name' => 'required|unique:places,name',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
        ]);

        return Place::create($request->all());
    }
}
