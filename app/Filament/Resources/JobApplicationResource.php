<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\JobApplication;
use Filament\Resources\Resource;
use App\Constant\JobApplicationConstant;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\JobApplicationResource\Pages;

use function PHPUnit\Framework\fileExists;

class JobApplicationResource extends Resource
{
    protected static ?string $model = JobApplication::class;

    protected static ?string $navigationGroup = 'Business';

    protected static ?int $navigationSort = 3;


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('job_id')
                    ->relationship('job', 'title')
                    ->required(),
                Forms\Components\Select::make('candidate_id')
                    ->relationship('candidate', 'first_name')
                    ->required(),
                Forms\Components\Select::make('status')
                    ->options([
                        JobApplicationConstant::STATUS_APPLIED => 'Applied',
                        JobApplicationConstant::STATUS_SHORTLISTED => 'Shortlisted',
                        JobApplicationConstant::STATUS_REJECTED => 'Rejected',
                        JobApplicationConstant::STATUS_HIRED => 'Hired'
                    ])
                    ->required(),
                Forms\Components\FileUpload::make('cover_letter')
                    ->label('Cover Letter')
                    ->disk('public')
                    ->directory('files')
                    ->acceptedFileTypes(['application/pdf', 'application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document']),
                Forms\Components\FileUpload::make('resume')
                    ->label('Resume')
                    ->disk('public')
                    ->directory('files')
                    ->acceptedFileTypes(['application/pdf', 'application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document']),
                Forms\Components\FileUpload::make('attachment')
                    ->label('Attachment')
                    ->disk('public')
                    ->directory('files')
                    ->acceptedFileTypes(['application/pdf', 'application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document']),
                Forms\Components\DateTimePicker::make('shortlisted_at'),
                Forms\Components\DateTimePicker::make('rejected_at'),
                Forms\Components\DateTimePicker::make('hired_at'),
                Forms\Components\DateTimePicker::make('applied_at')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('job.title')
                    ->label('Job Title')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('candidate.first_name')
                    ->label('Candidate Name')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\IconColumn::make('cover_letter')
                    ->label('Cover Letter')
                    ->icon('heroicon-o-document')
                    ->action(
                        function (JobApplication $record) {
                            return $record->cover_letter
                                ? response()->download(storage_path('app/public/' . $record->cover_letter), 'cover_letter.pdf')
                                : null;
                        }
                    ),

                Tables\Columns\IconColumn::make('resume')
                    ->label('Resume')
                    ->icon('heroicon-o-document')
                    ->action(
                        function (JobApplication $record) {
                            return $record->resume
                                ? response()->download(storage_path('app/public/' . $record->resume), 'resume.pdf')
                                : null;
                        }
                    ),

                Tables\Columns\IconColumn::make('attachment')
                    ->label('Attachment')
                    ->icon('heroicon-o-document')
                    ->action(
                        function (JobApplication $record) {
                            return $record->attachment
                                ? response()->download(storage_path('app/public/' . $record->attachment), 'attachment.pdf')
                                : null;
                        }
                    ),

                Tables\Columns\TextColumn::make('status'),
                Tables\Columns\TextColumn::make('shortlisted_at')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('rejected_at')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('hired_at')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('applied_at')
                    ->dateTime()
                    ->sortable(),
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
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListJobApplications::route('/'),
            'create' => Pages\CreateJobApplication::route('/create'),
            'edit' => Pages\EditJobApplication::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
