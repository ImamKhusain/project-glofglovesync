<?php

namespace App\Filament\Resources\UpdateStockBahanBakuResource\Pages;

use App\Filament\Resources\UpdateStockBahanBakuResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateUpdateStockBahanBaku extends CreateRecord
{
    protected static string $resource = UpdateStockBahanBakuResource::class;

    public function getHeading(): string
    {
        return 'Input Update Stock Bahan Baku';
    }

    public function getTitle(): string
    {
        return 'Input Update Stock Bahan Baku';
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
