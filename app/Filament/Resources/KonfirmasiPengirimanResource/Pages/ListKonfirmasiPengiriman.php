<?php

namespace App\Filament\Resources\KonfirmasiPengirimanResource\Pages;

use App\Filament\Resources\KonfirmasiPengirimanResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListKonfirmasiPengiriman extends ListRecords
{
    protected static string $resource = KonfirmasiPengirimanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            // Actions\CreateAction::make()->label("INPUT"),
        ];
    }

    public function getHeading(): string
    {
        return 'Konfirmasi Pengiriman';
    }

    public function getTitle(): string
    {
        return 'Konfirmasi Pengiriman';
    }
}
