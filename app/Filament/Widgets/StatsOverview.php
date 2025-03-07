<?php

namespace App\Filament\Widgets;

use App\Models\Job;
use App\Models\User;
use App\Models\Company;
use Filament\Support\Enums\IconPosition;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        $this->authorize('view-widgets');

        return [
            Stat::make('Companies', Company::count())
                ->description('Total registered companies'),

            Stat::make('Jobs', Job::count())
                ->description('Total job listings available'),

            Stat::make('Users', User::count())
                ->description('Total platform users'),

            Stat::make('Candidates Joined', Job::where('status', 'applied')->count())
                ->description('Total applications received')
                ->descriptionIcon('heroicon-o-user-group'),
        ];
    }
}
