<?php

namespace App\Filament\Widgets;

use App\Models\PenjualanProduk;
use Filament\Widgets\ChartWidget;

class JumlahPenjualanChart extends ChartWidget
{
    protected static ?string $heading = 'Data Jumlah Pengiriman';
    protected static ?string $maxHeight = '1000px';

    protected function getData(): array
    {
        $penjualan = PenjualanProduk::selectRaw('COUNT(*) as jumlah_penjualan, MONTHNAME(created_at) as bulan')
            ->groupByRaw('MONTH(created_at), MONTHNAME(created_at)') // Include both in GROUP BY
            ->orderByRaw('MONTH(created_at)')
            ->get();

        return [
            'datasets' => [
                [
                    'label' => 'Penjualan',
                    'data' => $penjualan->pluck('jumlah_penjualan')->toArray(),
                ],
            ],
            'labels' => $penjualan->pluck('bulan')->toArray(),
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
