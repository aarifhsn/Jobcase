<?php

namespace Database\Factories;

use App\Constant\JobConstant;
use App\Models\Category;
use App\Models\Location;
use App\Models\Company;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Job>
 */
class JobFactory extends Factory
{
    protected $model = \App\Models\Job::class;

    public function definition(): array
    {
        $ranges = ['0', '1-2', '3-5', '6+'];
        $categories = Category::inRandomOrder()->first() ?? Category::factory()->create();
        $location = Location::inRandomOrder()->first() ?? Location::factory()->create();
        $company = Company::inRandomOrder()->first() ?? Company::factory()->create();

        return [
            'category_id' => $categories->id,
            'location_id' => $location->id,
            'company_id' => $company->id,
            'created_by' => $company->user_id ?? $company->recruiter_id,
            'title' => $title = $this->faker->unique()->jobTitle,
            'description' => $this->faker->paragraph,
            'experience' => $this->faker->randomElement($ranges),
            'type' => $this->faker->randomElement([
                JobConstant::TYPE_FULL_TIME,
                JobConstant::TYPE_PART_TIME,
                JobConstant::TYPE_CONTRACT,
                JobConstant::TYPE_TEMPORARY,
                JobConstant::TYPE_INTERNSHIP,
                JobConstant::TYPE_VOLUNTEER,
                JobConstant::TYPE_FREELANCE,
                JobConstant::TYPE_OTHER
            ]),
            'slug' => Str::slug($title),
            'vacancy' => $this->faker->numberBetween(1, 10),
            'qualification' => $this->faker->randomElement([
                'B.Tech CSE',
                'B.Tech IT',
                'B.Sc CS',
                'BCA',
                'M.Tech CSE',
                'M.Tech IT',
                'M.Sc CS',
                'MCA',
                'Diploma CS',
                'B.Sc IT',
                'B.Tech SE',
                'B.Tech CE',
                'B.Tech CS',
                'M.Sc WebTech',
                'M.Sc DS'
            ]),
            'salary_range' => $this->faker->numberBetween(1000, 9000),
            'application_link' => $this->faker->url,
            'application_email' => $this->faker->safeEmail,
            'application_phone' => $this->faker->phoneNumber,
            'start_date' => $this->faker->dateTimeBetween('now', '+1 month'),
            'expiration_date' => $this->faker->dateTimeBetween('+1 month', '+6 months'),
            'status' => $this->faker->randomElement([
                JobConstant::STATUS_ACTIVE,
                JobConstant::STATUS_BLOCKED,
                JobConstant::STATUS_ON_REVIEW,
                JobConstant::STATUS_INACTIVE,
                JobConstant::STATUS_EXPIRED
            ]),
            'duration' => $this->faker->randomElement([
                '1 month',
                '2 months',
                '3 months',
                '6 months',
                '1 year',
                '2 years',
                '3 years',
                '4 years',
                '5 years'
            ]),
        ];
    }
}
