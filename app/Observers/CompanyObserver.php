<?php

namespace App\Observers;

use App\Models\User;
use App\Models\company;
use App\Models\Recruiter;
use App\Constant\CompanyConstant;
use App\Models\Subscription;
use App\Notifications\CompanyCreatedNotification;

class CompanyObserver
{

    /**
     * Handle the Company "creating" event.
     */
    public function creating(Company $company)
    {
        if (!$company->recruiter_id && !$company->user_id) {
            throw new \Exception('A company must have either a recruiter or a user.');
        }

        $auth_user_is_admin = auth()->user()?->hasRole('admin') ?? false;
        if (!$auth_user_is_admin) {
            $company->status = CompanyConstant::STATUS_PENDING;
        }
    }

    /**
     * Handle the company "created" event.
     */
    public function created(company $company): void
    {
        $admin = User::whereHas('roles', function ($query) {
            $query->where('name', 'admin');
        })->first();
        $auth_user_is_admin = auth()->user()?->hasRole('admin') ?? false;
        Subscription::create(
            [
                'company_id' => $company->id,
                'name' => 'Free plan',
                'start_date' => now(),
                'end_date' => now()->addDays(30),
                'status' => 'active',
                'plan' => 'free',
                'price' => 0,
                'description' => 'Allows up to 3 active job posts.',
                'job_limit' => 3,
            ]
        );
        if ($admin && !$auth_user_is_admin) {
            // $admin->notify(new CompanyCreatedNotification($company));
        }
    }
}
