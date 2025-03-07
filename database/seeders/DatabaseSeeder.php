<?php

namespace Database\Seeders;

use App\Models\Candidate;
use App\Models\Category;
use App\Models\Company;
use App\Models\Job;
use App\Models\Payment;
use App\Models\Recruiter;
use App\Models\Subscription;
use App\Models\Tag;
use App\Models\User;
use Database\Factories\UserFactory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Category::factory(10)->create();

        Tag::factory(10)->create();

        $this->call([
            UserRolePermissionSeeder::class,
            LocationSeeder::class,
        ]);

        User::factory()
            ->withRole("admin")
            ->create([
                'name' => 'admin',
                'email' => 'admin@gmail.com'
            ]);

        User::factory(20)->withRole("custom-role")->create();
        Recruiter::factory(10)->withRole("recruiter")->create();
        Candidate::factory(12)->withRole("candidate")->create();

        Company::factory(10)
            ->hasJobs(5)->create();
        $tags = Tag::all();
        $jobs = Job::all();
        $jobs->each(function ($job) use ($tags) {
            $job->tag()->attach(
                $tags->random(rand(1, 3))->pluck('id')->toArray()
            );
        });
    }
}
