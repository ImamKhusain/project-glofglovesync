<?php

namespace App\Filament\Resources\BahanProdukMasukResource\Pages;

use App\Filament\Resources\BahanProdukMasukResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateBahanProdukMasuk extends CreateRecord
{
    protected static string $resource = BahanProdukMasukResource::class;

    public function getHeading(): string
    {
        return 'Input Bahan Baku Masuk';
    }

    public function getTitle(): string
    {
        return 'Input Bahan Baku Masuk';
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
