<?php

namespace App\Filament\Resources\CandidateResource\RelationManagers;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Resources\RelationManagers\RelationManager;

class ExperienceDetailsRelationManager extends RelationManager
{
    protected static string $relationship = 'experienceDetails';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('company_id')
                    ->relationship('company', 'name'),
                Forms\Components\Select::make('location_id')
                    ->relationship('location', 'name')
                    ->required()
                    ->createOptionForm([
                        TextInput::make('name')
                            ->required()
                            ->label('Location name'),
                        TextInput::make('slug')
                            ->required()
                            ->label('Slug'),
                        TextInput::make('address')
                            ->required()
                            ->label('Address'),
                        TextInput::make('city')
                            ->required()
                            ->label('City'),
                        TextInput::make('state')
                            ->required()
                            ->label('State'),
                        TextInput::make('country')
                            ->required()
                            ->label('Country'),
                        TextInput::make('zip')
                            ->label('Zip Code'),
                        TextInput::make('latitude')
                            ->label('Latitude'),
                        TextInput::make('longitude')
                            ->label('Longitude'),
                    ]),
                Forms\Components\TextInput::make('company_name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('job_title')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Textarea::make('description')
                    ->required(),
                Forms\Components\DatePicker::make('start_date')
                    ->required(),
                Forms\Components\DatePicker::make('end_date'),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('job_title')
            ->columns([
                Tables\Columns\TextColumn::make('job_title'),
            ])
            ->filters([
                Tables\Filters\TrashedFilter::make(),
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
                Tables\Actions\RestoreAction::make(),
                Tables\Actions\ForceDeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    Tables\Actions\RestoreBulkAction::make(),
                    Tables\Actions\ForceDeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
