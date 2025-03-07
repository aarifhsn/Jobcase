<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Company;
use App\Models\Subscription;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SubscriptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $company = Company::factory()->hasJobs(4)->create();
        $secondCompany = Company::factory()->hasJobs(4)->create();

        Subscription::create([
            'company_id' => $company->id,
            'name' => 'Free Plan',
            'start_date' => Carbon::now(),
            'end_date' => Carbon::now()->addDays(30),
            'status' => 'active',
            'plan' => 'free',
            'price' => 0.0,
            'description' => 'Allows up to 5 active job posts.',
            'job_limit' => 5,
        ]);

        Subscription::create([
            'company_id' => $secondCompany->id,
            'name' => 'Pro Plan',
            'start_date' => Carbon::now(),
            'end_date' => Carbon::now()->addDays(60),
            'status' => 'active',
            'plan' => 'pro',
            'price' => 99.99,
            'description' => 'Allows up to 10 active job posts.',
            'job_limit' => 10,
        ]);
    }
}
