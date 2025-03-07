<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use App\Models\Location;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $countries = config('countries');

        foreach ($countries as $code => $country) {
            Location::create([
                'name' => $country,
                'slug' => Str::slug($country),
                'address' => fake()->address,
                'latitude' => fake()->latitude,
                'longitude' => fake()->longitude,
            ]);
        }
    }
}
