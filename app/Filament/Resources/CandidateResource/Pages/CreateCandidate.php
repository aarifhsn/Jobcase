<?php

namespace App\Filament\Resources\CandidateResource\Pages;

use App\Models\User;
use Filament\Actions;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Filament\Resources\Pages\CreateRecord;
use App\Filament\Resources\CandidateResource;

class CreateCandidate extends CreateRecord
{
    protected static string $resource = CandidateResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $user = User::create([
            'name' => $data['first_name'] . ' ' . $data['last_name'],
            'email' => $data['email'],
            'password' => Hash::make(Str::random(12)), // Generate a random password
        ]);

        $data['user_id'] = $user->id; // Assign user_id to candidate

        return $data;
    }
}
