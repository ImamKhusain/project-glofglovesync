<?php

namespace App\Filament\Resources\DaftarPOResource\Pages;

use App\Filament\Resources\DaftarPOResource;
use App\Models\KonfirmasiPengiriman;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Str;

class CreateDaftarPO extends CreateRecord
{
    protected static string $resource = DaftarPOResource::class;

    protected function afterCreate(): void
    {
        /** @var \App\Models\DaftarPO $po */
        $po = $this->record;

        KonfirmasiPengiriman::create([
            'id_pengiriman'      => Str::replaceFirst('PO', 'PG', $po->id_po),
            'tanggal_pengiriman' => $po->tanggal_permintaan,
            'jumlah_pengiriman'  => $po->jumlah_dikirim,
            'status_pengiriman'  => 0,
            'review_barang'      => $po->review_barang,
        ]);
    }

    public function getHeading(): string
    {
        return 'Input Daftar PO';
    }

    public function getTitle(): string
    {
        return 'Input Daftar PO';
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
