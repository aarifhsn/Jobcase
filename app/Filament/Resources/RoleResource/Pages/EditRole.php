<?php

namespace App\Filament\Resources\RoleResource\Pages;

use Filament\Forms;
use Filament\Actions;
use Filament\Forms\Form;
use App\Filament\Resources\RoleResource;
use Filament\Pages\Actions\ButtonAction;
use Filament\Resources\Pages\EditRecord;

class EditRole extends EditRecord
{
    protected static string $resource = RoleResource::class;


    protected function getHeaderActions(): array
    {
        return [
            // Actions\ViewAction::make(),
        ];
    }
}
