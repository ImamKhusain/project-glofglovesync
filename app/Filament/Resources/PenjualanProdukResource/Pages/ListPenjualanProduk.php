<?php

namespace App\Filament\Resources\PenjualanProdukResource\Pages;

use App\Filament\Resources\PenjualanProdukResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPenjualanProduk extends ListRecords
{
    protected static string $resource = PenjualanProdukResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()->label('INPUT'),
        ];
    }

    public function getHeading(): string
    {
        return 'Penjualan Produk';
    }

    public function getTitle(): string
    {
        return 'Penjualan Produk';
    }
}
