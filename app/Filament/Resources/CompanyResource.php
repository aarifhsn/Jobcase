<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Company;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use App\Constant\CompanyConstant;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\SelectColumn;
use App\Filament\Resources\CompanyResource\Pages;
use App\Filament\Resources\CompanyResource\Widgets\CompanyStats;

class CompanyResource extends Resource
{
    protected static ?string $model = Company::class;

    protected static ?string $navigationGroup = 'Business';

    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\FileUpload::make('logo')
                    ->avatar()
                    ->label('Logo')
                    ->disk('public'),
                Forms\Components\Select::make('user_id')
                    ->relationship('user', 'name')
                    ->preload()
                    ->label('Choose a user'),
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('slug')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('email')
                    ->email()
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('contact_number')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('industry')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('website')
                    ->maxLength(255)
                    ->default(null),
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
                Forms\Components\Textarea::make('description')
                    ->columnSpanFull(),
                Forms\Components\Select::make('status')
                    ->options([
                        'active' => CompanyConstant::STATUS_ACTIVE,
                        'inactive' => CompanyConstant::STATUS_INACTIVE,
                        'pending' => CompanyConstant::STATUS_PENDING,
                        'approved' => CompanyConstant::STATUS_APPROVED,
                        'rejected' => CompanyConstant::STATUS_REJECTED,
                    ])
                    ->required()
                    ->preload()
                    ->default('pending'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                SelectColumn::make('status')
                    ->options([
                        'active' => CompanyConstant::STATUS_ACTIVE,
                        'inactive' => CompanyConstant::STATUS_INACTIVE,
                        'pending' => CompanyConstant::STATUS_PENDING,
                        'approved' => CompanyConstant::STATUS_APPROVED,
                        'rejected' => CompanyConstant::STATUS_REJECTED,
                    ])
                    ->label('Status'),
                Tables\Columns\ImageColumn::make('logo')
                    ->size(40),
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('email')
                    ->searchable(),
                Tables\Columns\TextColumn::make('contact_number')
                    ->searchable(),
                Tables\Columns\TextColumn::make('location.address')
                    ->searchable()
                    ->label('Address'),
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
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\ViewAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    Tables\Actions\RestoreBulkAction::make(),
                    Tables\Actions\ForceDeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCompanies::route('/'),
            'create' => Pages\CreateCompany::route('/create'),
            'edit' => Pages\EditCompany::route('/{record}/edit'),
        ];
    }

    public static function getNavigationLabel(): string
    {
        return "Manage Companies";
    }

    public static function getWidgets(): array
    {
        return [
            CompanyStats::class,
        ];
    }
}
