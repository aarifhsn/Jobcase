<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\Payment;
use App\Models\Subscription;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $secondSubscription = Subscription::find(2);

        Payment::create([
            'subscription_id' => $secondSubscription->id,
            'company_id' => $secondSubscription->company_id,
            'amount' => 99.99,
            'method' => 'credit_card',
            'paid_at' => now(),
            'status' => 'paid',
        ]);
    }
}
