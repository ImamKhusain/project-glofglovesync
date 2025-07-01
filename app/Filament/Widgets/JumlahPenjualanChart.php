<?php

namespace App\Filament\Widgets;

use App\Models\PenjualanProduk;
use Filament\Widgets\ChartWidget;

class JumlahPenjualanChart extends ChartWidget
{
    protected static ?string $heading = 'Data Jumlah Penjualan';
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

    // Override metode getOptions untuk mengatur skala sumbu Y
    protected function getOptions(): array
    {
        return [
            'scales' => [
                'y' => [
                    'beginAtZero' => true, // Memastikan skala dimulai dari 0.
                    'ticks' => [
                        // 'stepSize' => 1 akan memaksa interval skala menjadi bilangan bulat.
                        // Ini adalah cara yang lebih andal.
                        'stepSize' => 1,
                    ],
                ],
            ],
        ];
    }
}
