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
            Actions\CreateAction::make(),
        ];
    }
}
