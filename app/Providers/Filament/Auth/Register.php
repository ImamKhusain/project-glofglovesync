<?php

namespace App\Providers\Filament\Auth;

use App\Models\User;
use Filament\Forms\Form;
use Filament\Pages\Auth\Register as RegisterPage;
use Illuminate\Auth\Events\Registered;

class Register extends RegisterPage
{
    public function form(Form $form): Form
    {
        return $form->schema([
            $this->getNameFormComponent(),
            $this->getEmailFormComponent(),
            $this->getPasswordFormComponent(),
            $this->getPasswordConfirmationFormComponent(),
        ])
            ->statePath('data');
    }

    // protected function handleRegistration(array $data): User
    // {
    //     // Buat user seperti biasa, tanpa data role
    //     $user = static::getUserModel()::create($data);

    //     // Setelah user berhasil dibuat, beri role-nya.
    //     $user->assignRole('guest');

    //     event(new Registered($user));

    //     return $user;
    // }
}
