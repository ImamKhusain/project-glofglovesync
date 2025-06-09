<?php

namespace App\Filament\Resources\UpdateStockBahanBakuResource\Pages;

use App\Filament\Resources\UpdateStockBahanBakuResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditUpdateStockBahanBaku extends EditRecord
{
    protected static string $resource = UpdateStockBahanBakuResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    public function getHeading(): string
    {
        return 'Edit Stock Bahan Baku';
    }

    public function getBreadcrumb(): string
    {
        return 'Edit';
    }
}
