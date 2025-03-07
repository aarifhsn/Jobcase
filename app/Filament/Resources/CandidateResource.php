<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\User;
use Filament\Tables;
use Filament\Forms\Form;
use App\Models\Candidate;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use App\Constant\CandidateConstant;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\SelectColumn;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\CandidateResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\CandidateResource\RelationManagers\SkillSetsRelationManager;
use App\Filament\Resources\CandidateResource\RelationManagers\EducationDetailsRelationManager;
use App\Filament\Resources\CandidateResource\RelationManagers\ExperienceDetailsRelationManager;

class CandidateResource extends Resource
{
    protected static ?string $model = Candidate::class;

    protected static ?string $navigationGroup = 'Business';

    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('first_name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('last_name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('phone_number')
                    ->tel()
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('email')
                    ->email()
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('password')
                    ->password()
                    ->required(fn($livewire) => $livewire instanceof \App\Filament\Resources\CandidateResource\Pages\CreateCandidate)
                    ->nullable(fn($livewire) => $livewire instanceof \App\Filament\Resources\CandidateResource\Pages\EditCandidate)
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
                Forms\Components\FileUpload::make('profile_picture')
                    ->image(),
                Forms\Components\Textarea::make('bio')
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('current_salary')
                    ->numeric(),
                Forms\Components\Select::make('is_paid_annually_monthly')
                    ->options([
                        'annually' => CandidateConstant::PAID_ANNUALLY,
                        'monthly' => CandidateConstant::PAID_MONTHLY,
                    ]),
                Forms\Components\TextInput::make('currency')
                    ->maxLength(255),
                Forms\Components\Select::make('status')
                    ->options([
                        'pending' => CandidateConstant::STATUS_PENDING,
                        'approved' => CandidateConstant::STATUS_APPROVED,
                        'rejected' => CandidateConstant::STATUS_REJECTED,
                        'active' => CandidateConstant::STATUS_ACTIVE,
                        'inactive' => CandidateConstant::STATUS_INACTIVE,
                    ])
                    ->default(CandidateConstant::STATUS_ACTIVE),
                Forms\Components\TextInput::make('user_id')
                    ->hidden(),
                Forms\Components\Select::make('category_id')
                    ->relationship('category', 'name')
                    ->label('Subscribe to Category'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('first_name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('last_name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('phone_number')
                    ->searchable(),
                Tables\Columns\TextColumn::make('email')
                    ->searchable(),
                Tables\Columns\TextColumn::make('location.address')
                    ->numeric()
                    ->sortable()
                    ->label('Location'),
                Tables\Columns\TextColumn::make('category.name')
                    ->numeric()
                    ->sortable()
                    ->label('Subscribed Category'),
                Tables\Columns\TextColumn::make('current_salary')
                    ->numeric()
                    ->sortable(),
                SelectColumn::make('status')
                    ->options([
                        'active' => CandidateConstant::STATUS_ACTIVE,
                        'inactive' => CandidateConstant::STATUS_INACTIVE,
                        'pending' => CandidateConstant::STATUS_PENDING,
                        'approved' => CandidateConstant::STATUS_APPROVED,
                        'rejected' => CandidateConstant::STATUS_REJECTED,
                    ])
                    ->label('Status'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('deleted_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\TrashedFilter::make(),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    Tables\Actions\ForceDeleteBulkAction::make(),
                    Tables\Actions\RestoreBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            'educationDetails' => EducationDetailsRelationManager::class,
            'experienceDetails' => ExperienceDetailsRelationManager::class,
            'skillSets' => SkillSetsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCandidates::route('/'),
            'create' => Pages\CreateCandidate::route('/create'),
            'view' => Pages\ViewCandidate::route('/{record}'),
            'edit' => Pages\EditCandidate::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }

    public static function getNavigationLabel(): string
    {
        return "Manage Candidates";
    }
}
