<?php

namespace App\Filament\Resources\CompanyResource\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\StatsOverviewWidget\Card;
use App\Models\Job;
use App\Models\JobClick;
use App\Models\JobView;

class CompanyStats extends BaseWidget
{
    protected function getStats(): array
    {
        $auth_user_companies = auth()->user()->companies;

        if (is_null($auth_user_companies)) {
            return [];
        }

        $companyIds = $auth_user_companies->pluck('id');
        $jobs = Job::whereIn('company_id', $companyIds)->pluck('id');

        return [
            Stat::make('Total jobs posted by you', Job::whereIn('company_id', $companyIds)->count()),
            Stat::make('Total view in your job', JobView::whereIn('job_id', $jobs)->count()),
            Stat::make('Total apply clicks in your job', JobClick::whereIn('job_id', $jobs)->count()),
        ];
    }
}
