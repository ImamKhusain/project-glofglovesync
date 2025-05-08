<?php

namespace App\Providers\Filament\Auth;

use Filament\Forms\Components\Select;
use Filament\Forms\Form;
use Filament\Pages\Auth\Register as RegisterPage;

class Register extends RegisterPage
{
    public function form(Form $form): Form
    {
        return $form->schema([
            $this->getNameFormComponent(),
            $this->getEmailFormComponent(),
            $this->getPasswordFormComponent(),
            $this->getPasswordConfirmationFormComponent(),

            Select::make('role')
                ->label('Role')
                ->required()
                ->options([
                    'user' => 'User',
                    'admin' => 'Admin',
                    'superadmin' => 'Super Admin'
                ]),
        ])
        ->statePath('data');
    }
}
                    