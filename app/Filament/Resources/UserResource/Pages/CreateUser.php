<?php

namespace App\Filament\Resources\UserResource\Pages;

use Filament\Actions;
use Filament\Forms\Form;
use App\Filament\Resources\UserResource;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Pages\CreateRecord;
use Filament\Forms\Components\Select;

class CreateUser extends CreateRecord
{
    protected static string $resource = UserResource::class;
    protected static ?string $navTitle = 'Create User';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                TextInput::make('email')
                    ->email()
                    ->required()
                    ->maxLength(255),
                TextInput::make('password')
                    ->password()
                    ->required()
                    ->maxLength(255),
                Select::make('role')
                    ->relationship('roles', 'name')
                    ->required()
            ]);
    }
}
