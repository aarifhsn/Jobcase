<?php

namespace App\Filament\Resources\CandidateResource\RelationManagers;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\Textarea;
use Illuminate\Database\Eloquent\Model;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Resources\RelationManagers\RelationManager;

class EducationDetailsRelationManager extends RelationManager
{
    protected static string $relationship = 'educationDetails';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('degree_name')
                    ->required()
                    ->maxLength(255),
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
                    ])
                    ->searchable()
                    ->label('Location'),
                Forms\Components\TextInput::make('institution_name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('study_group')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('major')
                    ->maxLength(255),
                Forms\Components\TextInput::make('department')
                    ->maxLength(255),
                Forms\Components\TextInput::make('education_level')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('result')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('cgpa')
                    ->maxLength(255),
                Forms\Components\TextInput::make('percentage')
                    ->maxLength(255),
                Forms\Components\DatePicker::make('start_date')
                    ->required(),
                Forms\Components\DatePicker::make('end_date'),
                Forms\Components\Toggle::make('is_currently_studying'),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('degree_name')
            ->columns([
                Tables\Columns\TextColumn::make('degree_name'),
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
