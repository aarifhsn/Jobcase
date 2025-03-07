<?php

namespace Database\Factories;

use App\Models\Job;
use App\Models\User;
use App\Models\Company;
use App\Models\Location;
use App\Models\Recruiter;
use Illuminate\Support\Str;
use App\Constant\CompanyConstant;
use Database\Seeders\PaymentSeeder;
use Database\Seeders\SubscriptionSeeder;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Company>
 */
class CompanyFactory extends Factory
{
    protected $model = Company::class;

    public function definition(): array
    {
        $name = $this->faker->company;
        $slug = Str::slug($name . '-' . uniqid());

        $user = User::inRandomOrder()->first();
        $recruiter = Recruiter::inRandomOrder()->first();
        $location = Location::inRandomOrder()->first();

        // Ensure at least one user or recruiter exists
        if (!$user && !$recruiter) {
            $user = User::factory()->withRole("recruiter")->create(); // Create a user if none exist
        }

        return [
            'name' => $name,
            'slug' => $slug,
            'email' => $this->faker->unique()->safeEmail,
            'contact_number' => $this->faker->phoneNumber,
            'industry' => $this->faker->word,
            'website' => $this->faker->url,
            'logo' => $this->faker->imageUrl(),
            'description' => $this->faker->paragraph,
            'status' => CompanyConstant::STATUS_ACTIVE,
            'location_id' => $location ? $location->id : Location::factory()->create()->id, // Ensure location exists
            'user_id' => $user ? $user->id : null,
            'recruiter_id' => $recruiter ? $recruiter->id : null,
        ];
    }

    public function withJobs(int $count = 5): static
    {

        return $this->has(Job::factory()->count($count), 'jobs');
    }
}
