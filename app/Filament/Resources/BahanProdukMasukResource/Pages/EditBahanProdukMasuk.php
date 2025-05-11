<?php

namespace App\Filament\Resources\BahanProdukMasukResource\Pages;

use App\Filament\Resources\BahanProdukMasukResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditBahanProdukMasuk extends EditRecord
{
    protected static string $resource = BahanProdukMasukResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
