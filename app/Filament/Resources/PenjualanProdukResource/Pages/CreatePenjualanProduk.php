<?php

namespace App\Filament\Resources\PenjualanProdukResource\Pages;

use App\Filament\Resources\PenjualanProdukResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreatePenjualanProduk extends CreateRecord
{
    protected static string $resource = PenjualanProdukResource::class;

    public function getHeading(): string
    {
        return 'Input Penjualan Produk';
    }

    public function getTitle(): string
    {
        return 'Input Penjualan Produk';
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
