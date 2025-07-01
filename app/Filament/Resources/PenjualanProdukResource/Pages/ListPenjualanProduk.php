<?php

namespace App\Filament\Resources\PenjualanProdukResource\Pages;

use App\Filament\Resources\PenjualanProdukResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use pxlrbt\FilamentExcel\Actions\Pages\ExportAction;
use pxlrbt\FilamentExcel\Exports\ExcelExport;

class ListPenjualanProduk extends ListRecords
{
    protected static string $resource = PenjualanProdukResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ExportAction::make()
                ->exports([
                    ExcelExport::make('pdf')
                        ->fromTable()
                        ->withFilename('Laporan Pengiriman - ' . date('Y-m-d'))
                        ->withWriterType(\Maatwebsite\Excel\Excel::DOMPDF)
                        ->except(['no'])
                        ->label('Download PDF'),
                    ExcelExport::make('xlsx')
                        ->fromTable()
                        ->withFilename('Laporan Pengiriman - ' . date('Y-m-d'))
                        ->except(['no'])
                        ->label('Download Excel'),
                ]),
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
