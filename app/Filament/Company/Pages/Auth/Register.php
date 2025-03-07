<?php

namespace App\Filament\Company\Pages\Auth;

use Filament\Pages\Auth\Register as BaseRegister;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class Register extends BaseRegister
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    // protected static string $view = 'filament.pages.auth-register';

    protected function getForms(): array
    {
        return [
            'form' => $this->form(
                $this->makeForm()
                    ->schema([
                        $this->getNameFormComponent(),
                        $this->getEmailFormComponent(),
                        $this->getPasswordFormComponent(),
                        $this->getPasswordConfirmationFormComponent(),
                    ])
                    ->statePath('data'),
            ),
        ];
    }

    protected function handleRegistration(array $data): User
    {
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
        $role = Role::where('name', 'recruiter')->first();
        $user->roles()->attach($role->id);
        return $user;
    }
}
