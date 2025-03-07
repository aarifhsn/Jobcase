<?php

namespace Database\Factories;

use App\Models\Role;
use App\Models\User;
use App\Models\Category;
use App\Models\Location;
use App\Constant\CandidateConstant;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Candidate>
 */
class CandidateFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $users = User::whereDoesntHave('roles', function ($query) {
            $query->whereIn('name', ['admin', 'recruiter']);
        })->inRandomOrder()->get();
        $locations = Location::inRandomOrder()->get();
        $categories = Category::inRandomOrder()->get();

        return [
            'user_id' => $users->first()->id,
            'location_id' => $locations->first()->id,
            'category_id' => $this->faker->boolean ? $categories->first()->id : null,
            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'phone_number' => $this->faker->phoneNumber,
            'email' => $this->faker->unique()->safeEmail,
            'profile_picture' => $this->faker->boolean(50) ? $this->faker->imageUrl : null,
            'bio' => $this->faker->boolean(50) ? $this->faker->paragraph : null,
            'status' => $this->faker->randomElement([CandidateConstant::STATUS_ACTIVE, CandidateConstant::STATUS_INACTIVE]),
            'current_salary' => $this->faker->numberBetween(5000, 100000),
            'is_paid_annually_monthly' => $this->faker->randomElement([CandidateConstant::PAID_ANNUALLY, CandidateConstant::PAID_MONTHLY]),
            'currency' => $this->faker->boolean(50) ? $this->faker->currencyCode : null,
        ];
    }

    /**
     * Assign roles to the candidate.
     */
    public function withRole(string $role = "candidate"): static
    {
        return $this->afterCreating(function ($candidate) use ($role) {
            $roleIds = Role::where('name', $role)->pluck('id')->toArray();
            $candidate->user->roles()->attach($roleIds);
        });
    }
}
