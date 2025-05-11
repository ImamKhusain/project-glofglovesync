<?php

namespace App\Filament\Resources\DaftarPOResource\Pages;

use App\Filament\Resources\DaftarPOResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListDaftarPO extends ListRecords
{
    protected static string $resource = DaftarPOResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
