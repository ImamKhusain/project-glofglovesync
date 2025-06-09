<?php

namespace App\Filament\Widgets;

use App\Models\LaporanProduksi;
use Filament\Widgets\ChartWidget;

class JumlahProduksiChart extends ChartWidget
{
    protected static ?string $heading = 'Data Jumlah Produksi';
    protected static ?string $maxHeight = '1000px';

    protected function getData(): array
    {
        $produksi = LaporanProduksi::selectRaw('SUM(jumlah_produksi) as jumlah_produksi, MONTHNAME(created_at) as bulan')
            ->groupByRaw('MONTH(created_at), MONTHNAME(created_at)') // Include both in GROUP BY
            ->orderByRaw('MONTH(created_at)')
            ->get();

        return [
            'datasets' => [
                [
                    'label' => 'Produksi',
                    'data' => $produksi->pluck('jumlah_produksi')->toArray(),
                ],
            ],
            'labels' => $produksi->pluck('bulan')->toArray(),
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
