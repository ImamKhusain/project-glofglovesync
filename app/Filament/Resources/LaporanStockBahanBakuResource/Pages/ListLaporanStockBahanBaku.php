<?php

namespace App\Filament\Resources\LaporanStockBahanBakuResource\Pages;

use App\Filament\Resources\LaporanStockBahanBakuResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use pxlrbt\FilamentExcel\Actions\Pages\ExportAction;
use pxlrbt\FilamentExcel\Exports\ExcelExport;

class ListLaporanStockBahanBaku extends ListRecords
{
    protected static string $resource = LaporanStockBahanBakuResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ExportAction::make()
                ->exports([
                    ExcelExport::make('pdf')
                        ->fromTable()
                        ->withFilename('Laporan Stok Bahan Baku - ' . date('Y-m-d'))
                        ->withWriterType(\Maatwebsite\Excel\Excel::DOMPDF)
                        ->except(['no'])
                        ->label('Download PDF'),
                    ExcelExport::make('xlsx')
                        ->fromTable()
                        ->withFilename('Laporan Stok Bahan Baku - ' . date('Y-m-d'))
                        ->except(['no'])
                        ->label('Download Excel'),
                ]),
            Actions\CreateAction::make()->label('INPUT'),
        ];
    }

    public function getHeading(): string
    {
        return 'Laporan Stock Bahan Baku';
    }

    public function getTitle(): string
    {
        return 'Laporan Stock Bahan Baku';
    }
}
