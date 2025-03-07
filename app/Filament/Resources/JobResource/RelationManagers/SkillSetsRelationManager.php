<?php

namespace App\Filament\Resources\JobResource\RelationManagers;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\JobSkillSet;
use App\Constant\SkillConstant;
use Filament\Resources\RelationManagers\RelationManager;

class SkillSetsRelationManager extends RelationManager
{
    protected static string $relationship = 'skillSets';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->label('Skill Name')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('name')
            ->columns([
                Tables\Columns\TextColumn::make('name')->label('Skill'),
                Tables\Columns\TextColumn::make('Skill level')
                    ->getStateUsing(
                        fn($record) => match ($record->pivot->skill_level) {
                            SkillConstant::SKILL_LEVEL_BEGINNER => 'Beginner',
                            SkillConstant::SKILL_LEVEL_INTERMEDIATE => 'Intermediate',
                            SkillConstant::SKILL_LEVEL_ADVANCED => 'Advanced',
                            SkillConstant::SKILL_LEVEL_EXPERT => 'Expert',
                        }
                    )
                    ->label('Skill Level')->sortable(),
                Tables\Columns\CheckboxColumn::make('pivot.is_current')
                    ->getStateUsing(fn($record) => $record->pivot->is_current)
                    ->updateStateUsing(fn($record, $state) => $record->pivot->update(['is_current' => $state]))
                    ->label('Current Skill'),
            ])
            ->filters([
                Tables\Filters\TrashedFilter::make(),
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),

                Tables\Actions\AttachAction::make()
                    ->visible(fn() => \App\Models\SkillSet::count() > 0),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),

                Tables\Actions\DetachAction::make()
                    ->visible(fn($record) => JobSkillSet::where('job_id', $this->ownerRecord->id)->exists()),

                Tables\Actions\DeleteAction::make(),
                Tables\Actions\RestoreAction::make()->visible(fn($record) => $record->trashed()),
                Tables\Actions\ForceDeleteAction::make()->visible(fn($record) => $record->trashed()),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DetachBulkAction::make(),
                    Tables\Actions\DeleteBulkAction::make(),
                    Tables\Actions\RestoreBulkAction::make(),
                    Tables\Actions\ForceDeleteBulkAction::make(),
                ]),
            ]);
    }
}
