<?php

namespace App\Filament\Resources\BahanProdukMasukResource\Pages;

use App\Filament\Resources\BahanProdukMasukResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListBahanProdukMasuk extends ListRecords
{
    protected static string $resource = BahanProdukMasukResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
