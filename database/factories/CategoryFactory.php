<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $name = $this->faker->unique()->randomElement(['Technology', 'Health', 'Finance', 'Education', 'Entertainment', 'Travel', 'Sports', 'Fashion', 'Food', 'Automobile', 'Web Development']),
            'slug' => Str::slug($name),
            'description' => $this->faker->optional()->sentence,
            'status' => $this->faker->randomElement(['active', 'inactive']),
            'icon' => $this->faker->optional()->imageUrl(),
        ];
    }
}
