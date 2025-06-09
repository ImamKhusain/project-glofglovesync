<?php

namespace App\Filament\Resources\LaporanStockBahanBakuResource\Pages;

use App\Filament\Resources\LaporanStockBahanBakuResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateLaporanStockBahanBaku extends CreateRecord
{
    protected static string $resource = LaporanStockBahanBakuResource::class;

    public function getHeading(): string
    {
        return 'Input Laporan Stock Bahan Baku';
    }

    public function getTitle(): string
    {
        return 'Input Laporan Stock Bahan Baku';
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
