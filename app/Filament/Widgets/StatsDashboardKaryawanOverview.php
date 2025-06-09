<?php

namespace App\Filament\Widgets;

use App\Models\LaporanProduksi;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsDashboardKaryawanOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Progress Kerja Anda', LaporanProduksi::sum('target_produksi') > 0 ? number_format(LaporanProduksi::sum('jumlah_produksi') / LaporanProduksi::sum('target_produksi') * 100, 0) . '%' : '0%')
                ->description('Progres kerja dalam persen')
                ->color('primary')
                ->icon('heroicon-o-clipboard-document-list'),
            Stat::make('Target Produksi', LaporanProduksi::sum('target_produksi'))
                ->description('Target produksi yang harus dicapai')
                ->color('primary')
                ->icon('heroicon-o-arrow-trending-up'),
            Stat::make('Jumlah Produksi', LaporanProduksi::sum('jumlah_produksi'))
                ->description('Jumlah produksi yang dihasilkan')
                ->color('primary')
                ->icon('heroicon-o-chart-pie'),
            Stat::make('Jam Kerja Anda', '07:30-17:00')
                ->description('Jam kerja yang ditetapkan')
                ->color('primary')
                ->icon('heroicon-o-clock'),
        ];
    }
}
