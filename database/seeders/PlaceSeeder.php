<?php

namespace Database\Seeders;

use App\Models\Place;
use Illuminate\Database\Seeder;

class PlaceSeeder extends Seeder
{
    public function run()
    {
        Place::create([
            'name' => 'Place 1',
            'latitude' => 55.7558,
            'longitude' => 37.6173,
        ]);

        Place::create([
            'name' => 'Place 2',
            'latitude' => 40.7128,
            'longitude' => -74.0060,
        ]);
    }
}
