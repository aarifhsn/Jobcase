<?php

namespace Database\Factories;

use App\Models\Role;
use App\Models\User;
use App\Models\Company;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Recruiter>
 */
class RecruiterFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $users = User::whereDoesntHave('roles', function ($query) {
            $query->whereIn('name', ['candidate', 'recruiter']);
        })->inRandomOrder()->get();
        return [
            'user_id' => $users->first()->id,
            'designation' => $this->faker->jobTitle,
            'department' => $this->faker->word,
            'phone' => $this->faker->phoneNumber,
            'email' => $this->faker->unique()->safeEmail,
            'bio' => $this->faker->paragraph,
            'status' => $this->faker->randomElement(['active', 'inactive']),
        ];
    }

    /**
     * Assign roles to the recruiter.
     */
    public function withRole(string $role = "recruiter"): static
    {
        return $this->afterCreating(function ($recruiter) use ($role) {
            $roleIds = Role::where('name', $role)->pluck('id')->toArray();
            $recruiter->user->roles()->attach($roleIds);
        });
    }
}
