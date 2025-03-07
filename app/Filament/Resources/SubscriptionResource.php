<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SubscriptionResource\Pages;
use App\Models\Subscription;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SubscriptionResource extends Resource
{
    protected static ?string $model = Subscription::class;
    protected static ?string $navigationGroup = 'Subscription';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('company_id')
                    ->relationship('company', 'name')
                    ->required(),

                Forms\Components\TextInput::make('name')
                    ->maxLength(255),

                Forms\Components\Select::make('plan')
                    ->options([
                        'free' => 'Free',
                        'basic' => 'Basic',
                        'pro' => 'Pro',
                    ])
                    ->required(),

                Forms\Components\Select::make('status')
                    ->options([
                        'active' => 'Active',
                        'inactive' => 'Inactive'
                    ])
                    ->required(),

                Forms\Components\DateTimePicker::make('start_date')->required(),
                Forms\Components\DateTimePicker::make('end_date'),

                Forms\Components\TextInput::make('price')
                    ->numeric()
                    ->prefix('$'),

                Forms\Components\TextInput::make('job_limit')
                    ->required()
                    ->numeric()
                    ->default(3),

                Forms\Components\Textarea::make('description')
                    ->columnSpanFull(),

                // Payments Section
                Forms\Components\Repeater::make('payments')
                    ->relationship('payments')
                    ->schema([
                        Forms\Components\TextInput::make('method')->required(),
                        Forms\Components\TextInput::make('gateway'),
                        Forms\Components\TextInput::make('reference'),
                        Forms\Components\TextInput::make('transaction_code'),
                        Forms\Components\TextInput::make('amount')->required(),
                        Forms\Components\Select::make('status')->required()->options([
                            'pending' => 'Pending',
                            'paid' => 'Paid',
                            'failed' => 'Failed',
                            'cancelled' => 'Cancelled',
                        ]),
                        Forms\Components\DateTimePicker::make('paid_at')->required(),
                    ])
                    ->collapsible()
                    ->grid(0),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('company.name')
                    ->sortable(),

                Tables\Columns\TextColumn::make('name')->searchable(),
                Tables\Columns\TextColumn::make('plan'),
                Tables\Columns\TextColumn::make('status'),

                Tables\Columns\TextColumn::make('start_date')->dateTime()->sortable(),
                Tables\Columns\TextColumn::make('end_date')->dateTime()->sortable(),

                Tables\Columns\TextColumn::make('price')->money()->sortable(),
                Tables\Columns\TextColumn::make('job_limit')->numeric()->sortable(),

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
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSubscriptions::route('/'),
            'create' => Pages\CreateSubscription::route('/create'),
            'edit' => Pages\EditSubscription::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->withoutGlobalScopes([SoftDeletingScope::class]);
    }
}
