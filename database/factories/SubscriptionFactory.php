<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Category;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Subscription>
 */
class SubscriptionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->word,
            'plan' => $this->faker->word,
            'description' => $this->faker->sentence,
            'status' => $this->faker->randomElement(['active', 'inactive']),
            'start_date' => $this->faker->optional()->dateTime,
            'end_date' => $this->faker->optional()->dateTime,
            'duration' => $this->faker->optional()->word,
            'price' => $this->faker->randomFloat(2, 10, 1000),
        ];
    }
}
