<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateUser extends CreateRecord
{
    protected static string $resource = UserResource::class;

    public function getHeading(): string
    {
        return 'Input User';
    }

    public function getTitle(): string
    {
        return 'Input User';
    }

    public function getBreadcrumb(): string
    {
        return 'Input';
    }
}
