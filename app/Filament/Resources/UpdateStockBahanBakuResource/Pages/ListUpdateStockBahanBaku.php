<?php

namespace App\Filament\Resources\UpdateStockBahanBakuResource\Pages;

use App\Filament\Resources\UpdateStockBahanBakuResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListUpdateStockBahanBaku extends ListRecords
{
    protected static string $resource = UpdateStockBahanBakuResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
