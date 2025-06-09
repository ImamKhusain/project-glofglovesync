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

    public function getHeading(): string
    {
        return 'Edit Bahan Baku Masuk';
    }

    public function getBreadcrumb(): string
    {
        return 'Edit';
    }
}
