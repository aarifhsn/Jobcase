<?php

namespace App\Filament\Resources\JobResource\Pages;

use App\Models\Job;
use Filament\Actions;
use App\Filament\Resources\JobResource;
use Filament\Resources\Pages\ListRecords;

class ListJobs extends ListRecords
{
    protected static string $resource = JobResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
