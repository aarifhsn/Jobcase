<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\User;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use BladeUI\Icons\Components\Icon;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Auth\Events\Registered;
use Illuminate\Database\Eloquent\Model;
use Filament\Notifications\Notification;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\UserResource\Pages;
use App\Notifications\SendEmailOtpNotification;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\UserResource\RelationManagers\RolesRelationManager;

class UserResource extends Resource
{
    protected static ?string $model = User::class;
    protected static ?string $navigationGroup = 'Administration';
    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('email')
                    ->email()
                    ->required()
                    ->unique('users', 'email', ignoreRecord: true)
                    ->maxLength(255),
                Forms\Components\DateTimePicker::make('email_verified_at'),
                Forms\Components\TextInput::make('password')
                    ->password()
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('email')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\IconColumn::make('email_verified_at')
                    ->label('Email Verified')
                    ->getStateUsing(fn(Model $record): string => $record->email_verified_at ? 'Verified' : 'Not Verified')
                    ->color(fn(Model $record): string => $record->email_verified_at ? 'success' : 'danger')
                    ->icon(fn(Model $record): ?string => $record->email_verified_at ? 'heroicon-o-check-badge' : 'heroicon-o-x-mark'),
                Tables\Columns\TextColumn::make('role')
                    ->getStateUsing(fn(Model $record) => $record->roles()->pluck('name')->join(', '))
                    ->searchable(true, function (Builder $query, $search) {
                        $query->whereHas('roles', function (Builder $query) use ($search) {
                            $query->where('name', 'like', "%{$search}%");
                        });
                    }),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\TrashedFilter::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\ForceDeleteAction::make(),
                Tables\Actions\RestoreAction::make(),
                Tables\Actions\Action::make('resend_verification')
                    ->label('Resend Mail')
                    ->icon('heroicon-m-paper-airplane')
                    ->action(function (Model $record) {
                        if (!$record->email_verified_at) {
                            $otp = rand(100000, 999999);

                            if (Cache::has('otp_' . $record->email)) {
                                Cache::forget('otp_' . $record->email);
                            }

                            Cache::put('otp_' . $record->email, $otp, now()->addMinutes(10));
                            $record->notify(new SendEmailOtpNotification($otp));
                            Notification::make()
                                ->title('Verification email sent')
                                ->success()
                                ->send();
                        } else {
                            Notification::make()
                                ->title('User already verified')
                                ->warning()
                                ->send();
                        }
                    })
                    ->requiresConfirmation()
                    ->visible(fn(Model $record) => !$record->email_verified_at),
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
            RolesRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListUsers::route("/users"),
            'create' => Pages\CreateUser::route("/users/create"),
            'edit' => Pages\EditUser::route("/users/{record}/edit"),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->where('id', '!=', Auth::id())
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }

    public static function getNavigationLabel(): string
    {
        return 'Manage Users';
    }
}
