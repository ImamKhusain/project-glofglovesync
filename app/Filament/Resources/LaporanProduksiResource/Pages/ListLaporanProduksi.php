<?php

namespace App\Filament\Resources\LaporanProduksiResource\Pages;

use App\Filament\Exports\LaporanProduksiExporter;
use App\Filament\Resources\LaporanProduksiResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use pxlrbt\FilamentExcel\Actions\Pages\ExportAction;
use pxlrbt\FilamentExcel\Exports\ExcelExport;

class ListLaporanProduksi extends ListRecords
{
    protected static string $resource = LaporanProduksiResource::class;


    protected function getHeaderActions(): array
    {
        return [
            ExportAction::make()
                ->exports([
                    ExcelExport::make('pdf')
                        ->fromTable()
                        ->withFilename('Laporan Produksi - ' . date('Y-m-d'))
                        ->withWriterType(\Maatwebsite\Excel\Excel::DOMPDF)
                        ->except(['no'])
                        ->label('Download PDF'),
                    ExcelExport::make('xlsx')
                        ->fromTable()
                        ->withFilename('Laporan Produksi - ' . date('Y-m-d'))
                        ->except(['no'])
                        ->label('Download Excel'),
                ]),
            Actions\CreateAction::make()->label('INPUT'),
        ];
    }

    public function getHeading(): string
    {
        return 'Laporan Produksi';
    }

    public function getTitle(): string
    {
        return 'Laporan Produksi';
    }
}
