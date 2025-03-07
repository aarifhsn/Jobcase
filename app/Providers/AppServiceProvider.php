<?php

namespace App\Providers;

use App\Models\Job;
use App\Models\User;
use App\Models\Company;
use App\Observers\JobObserver;
use App\Observers\UserObserver;
use App\Observers\CompanyObserver;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useTailwind();
        Job::observe(JobObserver::class);
        Company::observe(CompanyObserver::class);
        User::observe(UserObserver::class);
    }
}
