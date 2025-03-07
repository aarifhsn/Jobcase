<?php

namespace App\Filament\Resources\CandidateResource\Pages;

use App\Models\User;
use Filament\Actions;
use App\Models\Candidate;
use Illuminate\Support\Facades\Hash;
use Filament\Resources\Pages\EditRecord;
use App\Filament\Resources\CandidateResource;

class EditCandidate extends EditRecord
{
    protected static string $resource = CandidateResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
            Actions\ForceDeleteAction::make(),
            Actions\RestoreAction::make(),
        ];
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        $candidate = Candidate::findOrFail($this->record->id);
        $user = User::find($candidate->user_id);

        if ($user) {
            $user->update([
                'name' => $data['first_name'] . ' ' . $data['last_name'],
                'email' => $data['email'],
                'password' => !empty($data['password']) ? Hash::make($data['password']) : $user->password,
            ]);
        }

        return $data;
    }
}
