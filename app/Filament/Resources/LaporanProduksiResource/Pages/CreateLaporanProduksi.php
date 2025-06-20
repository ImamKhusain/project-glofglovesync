<?php

namespace App\Filament\Resources\LaporanProduksiResource\Pages;

use App\Filament\Resources\LaporanProduksiResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateLaporanProduksi extends CreateRecord
{
    protected static string $resource = LaporanProduksiResource::class;

    public function getHeading(): string
    {
        return 'Input Laporan Produksi';
    }

    public function getTitle(): string
    {
        return 'Input Laporan Produksi';
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
