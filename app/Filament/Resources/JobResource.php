<?php

namespace App\Filament\Resources;

use App\Models\Job;
use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Constant\JobConstant;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\JobResource\Pages;
use App\Filament\Resources\JobResource\Widgets\JobPostsChart;
use App\Filament\Resources\JobResource\RelationManagers\SkillSetsRelationManager;

class JobResource extends Resource
{
    protected static ?string $model = Job::class;

    protected static ?string $navigationGroup = 'Business';

    protected static ?string $navigationIcon = 'heroicon-o-briefcase';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('company_id')
                    ->relationship('company', 'name')
                    ->required()
                    ->label('Company')
                    ->searchable(),

                Forms\Components\Select::make('category_id')
                    ->relationship('category', 'name')
                    ->required()
                    ->label('Category')
                    ->searchable()
                    ->preload()
                    ->createOptionForm([
                        TextInput::make('name')
                            ->required()
                            ->label('New Category Name'),
                    ])
                    ->placeholder('Select or create Category'),

                Forms\Components\TextInput::make('title')
                    ->required()
                    ->maxLength(255)
                    ->label('Job Title'),

                Forms\Components\Textarea::make('description')
                    ->required()
                    ->label('Job Description'),

                Select::make('tag')
                    ->relationship('tag', 'name')
                    ->multiple()
                    ->label('Tags')
                    ->preload()
                    ->createOptionForm([
                        TextInput::make('name')
                            ->required()
                            ->label('New Tag Name'),
                    ])
                    ->placeholder('Select or create tags'),

                Forms\Components\TextInput::make('experience')
                    ->maxLength(255)
                    ->label('Experience'),

                Forms\Components\Select::make('type')
                    ->options([
                        'full-time' => JobConstant::TYPE_FULL_TIME,
                        'part-time' => JobConstant::TYPE_PART_TIME,
                        'contract' => JobConstant::TYPE_CONTRACT,
                        'temporary' => JobConstant::TYPE_TEMPORARY,
                        'internship' => JobConstant::TYPE_INTERNSHIP,
                        'volunteer' => JobConstant::TYPE_VOLUNTEER,
                        'freelance' => JobConstant::TYPE_FREELANCE,
                    ])
                    ->default(JobConstant::TYPE_FULL_TIME)
                    ->required()
                    ->label('Job Type'),

                Forms\Components\TextInput::make('slug')
                    ->required()
                    ->unique(ignoreRecord: true)
                    ->reactive()
                    ->afterStateUpdated(fn($state, callable $set) => $set('slug', str($state)->slug()))
                    ->label('Slug'),

                Forms\Components\TextInput::make('vacancy')
                    ->numeric()
                    ->default(1)
                    ->required()
                    ->label('Number of Vacancies'),

                Forms\Components\TextInput::make('qualification')
                    ->label('Qualification'),

                Forms\Components\TextInput::make('duration')
                    ->label('Duration'),

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

                Forms\Components\TextInput::make('salary_range')
                    ->required()
                    ->label('Salary Range'),

                Forms\Components\TextInput::make('application_link')
                    ->url()
                    ->nullable()
                    ->label('Application Link'),

                Forms\Components\TextInput::make('circular_link')
                    ->url()
                    ->nullable()
                    ->label('Circular Link'),

                Forms\Components\TextInput::make('application_email')
                    ->email()
                    ->required()
                    ->label('Application Email'),

                Forms\Components\TextInput::make('application_phone')
                    ->required()
                    ->label('Application Phone'),

                Forms\Components\DateTimePicker::make('start_date')
                    ->label('Start Date'),

                Forms\Components\DateTimePicker::make('expiration_date')
                    ->label('Expiration Date'),

                Forms\Components\Select::make('status')
                    ->options([
                        'active' => JobConstant::STATUS_ACTIVE,
                        'inactive' => JobConstant::STATUS_INACTIVE,
                        'expired' => JobConstant::STATUS_EXPIRED,
                    ])
                    ->default(JobConstant::STATUS_INACTIVE)
                    ->required()
                    ->label('Status'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([

                Tables\Columns\TextColumn::make('title')
                    ->sortable()
                    ->searchable()
                    ->label('Job Title'),
                Tables\Columns\TextColumn::make('category.name')
                    ->label('Category')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('company.name')
                    ->label('Company')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('type')
                    ->sortable()
                    ->label('Job Type'),

                TextColumn::make('tag')
                    ->label('Tags')
                    ->getStateUsing(
                        function ($record) {
                            return $record->tag->pluck('name')->join(', ');
                        }
                    ),

                Tables\Columns\TextColumn::make('location.name')
                    ->label('Location'),

                Tables\Columns\TextColumn::make('salary_range')
                    ->label('Salary Range'),

                Tables\Columns\TextColumn::make('status')
                    ->label('Status')
                    ->sortable(),
                Tables\Columns\TextColumn::make('expiration_date')
                    ->label('Expiration Date')
                    ->date(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                    ->options([
                        'active' => JobConstant::STATUS_ACTIVE,
                        'inactive' => JobConstant::STATUS_INACTIVE,
                        'expired' => JobConstant::STATUS_EXPIRED,
                    ])
                    ->label('Filter by Status'),

                Tables\Filters\Filter::make('expired')
                    ->query(fn($query) => $query::expired())
                    ->label('Expired Jobs'),
                Tables\Filters\TrashedFilter::make(),
                Tables\Filters\Filter::make('view_count'),
                Tables\Filters\Filter::make('click_count'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
                Tables\Actions\ViewAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
                Tables\Actions\ForceDeleteBulkAction::make(),
                Tables\Actions\RestoreBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            'skillSets' => SkillSetsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListJobs::route('/'),
            'create' => Pages\CreateJob::route('/create'),
            'edit' => Pages\EditJob::route('/{record}/edit'),
        ];
    }

    public static function getNavigationLabel(): string
    {
        return 'Manage Jobs';
    }

    public static function getWidgets(): array
    {
        return [
            JobPostsChart::class
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->with('company', 'category', 'tag', 'location')
            ->latest('id');
    }
}
