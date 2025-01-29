<?php

namespace App\Http\Controllers;

use App\Models\Place;

class PlaceController extends Controller
{
    public function index()
    {
        $places = Place::all();
        return view('place.index',compact('places'));
    }

    public function create()
    {
        return view('place.create');
    }


    public function store()
    {
        $place = request()->validate([
            'name' => 'required|string|unique:places|max:255',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
        ]);

             Place::create($place);
            //dd($place);
        return redirect()->route('place.index');

    }
    public function createTest(){
        $place = Place::create([
            'name' => fake()->name(),
            'latitude' => rand(1,5),
            'longitude' =>  rand(1,5),

        ]);
        dd($place);

    }
}
