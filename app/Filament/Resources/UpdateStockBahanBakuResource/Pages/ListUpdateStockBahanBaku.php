<?php

namespace App\Filament\Resources\UpdateStockBahanBakuResource\Pages;

use App\Filament\Resources\UpdateStockBahanBakuResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use pxlrbt\FilamentExcel\Actions\Pages\ExportAction;
use pxlrbt\FilamentExcel\Exports\ExcelExport;

class ListUpdateStockBahanBaku extends ListRecords
{
    protected static string $resource = UpdateStockBahanBakuResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ExportAction::make()
                ->exports([
                    ExcelExport::make('pdf')
                        ->fromTable()
                        ->withFilename('Update Stock Bahan Baku - ' . date('Y-m-d'))
                        ->withWriterType(\Maatwebsite\Excel\Excel::DOMPDF)
                        ->except(['no'])
                        ->label('Download PDF'),
                    ExcelExport::make('xlsx')
                        ->fromTable()
                        ->withFilename('Update Stock Bahan Baku - ' . date('Y-m-d'))
                        ->except(['no'])
                        ->label('Download Excel'),
                ]),
            Actions\CreateAction::make()->label('INPUT'),
        ];
    }

    public function getHeading(): string
    {
        return 'Update Stock Bahan Baku';
    }

    public function getTitle(): string
    {
        return 'Update Stock Bahan Baku';
    }
}
