<?php

namespace App\Filament\Resources\KonfirmasiPengirimanResource\Pages;

use App\Filament\Resources\KonfirmasiPengirimanResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateKonfirmasiPengiriman extends CreateRecord
{
    protected static string $resource = KonfirmasiPengirimanResource::class;

    public function getHeading(): string
    {
        return 'Input Konfirmasi Pengiriman';
    }

    public function getTitle(): string
    {
        return 'Input Konfirmasi Pengiriman';
    }

    public function getBreadcrumb(): string
    {
        return 'Input';
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
