<?php

namespace App\Filament\Resources\DaftarPOResource\Pages;

use App\Filament\Resources\DaftarPOResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDaftarPO extends EditRecord
{
    protected static string $resource = DaftarPOResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    public function getHeading(): string
    {
        return 'Edit Daftar PO';
    }

    public function getBreadcrumb(): string
    {
        return 'Edit';
    }
}
