<?php

namespace App\Filament\Resources\LaporanStockBahanBakuResource\Pages;

use App\Filament\Resources\LaporanStockBahanBakuResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListLaporanStockBahanBaku extends ListRecords
{
    protected static string $resource = LaporanStockBahanBakuResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()->label('INPUT'),
        ];
    }

    public function getHeading(): string
    {
        return 'Laporan Stock Bahan Baku';
    }

    public function getTitle(): string
    {
        return 'Laporan Stock Bahan Baku';
    }
}
