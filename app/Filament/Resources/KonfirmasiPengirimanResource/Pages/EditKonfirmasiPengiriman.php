<?php

namespace App\Filament\Resources\KonfirmasiPengirimanResource\Pages;

use App\Filament\Resources\KonfirmasiPengirimanResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditKonfirmasiPengiriman extends EditRecord
{
    protected static string $resource = KonfirmasiPengirimanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    public function getHeading(): string
    {
        return 'Edit Konfirmasi Pengiriman';
    }

    public function getBreadcrumb(): string
    {
        return 'Edit';
    }
}
