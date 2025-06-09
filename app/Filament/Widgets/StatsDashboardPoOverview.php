<?php

namespace App\Filament\Widgets;

use App\Models\DaftarPO;
use App\Models\KonfirmasiPengiriman;
use App\Models\LaporanProduksi;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsDashboardPoOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Progress Kerja Anda', DaftarPO::count() > 0 ? number_format(DaftarPO::where('status_pengiriman', 1)->count() / DaftarPO::count() * 100, 0) . '%' : '0%')
                ->description('Progres kerja dalam persen')
                ->color('primary')
                ->icon('heroicon-o-clipboard-document-list'),
            Stat::make('Jumlah Produk PO', DaftarPO::sum('jumlah_dikirim') . ' pcs')
                ->description('Jumlah produk yang dipesan')
                ->color('primary')
                ->icon('heroicon-o-archive-box'),
            Stat::make('Total Konfirmasi Pengiriman', KonfirmasiPengiriman::where('status_pengiriman', 1)->count())
                ->description('Jumlah konfirmasi pengiriman yang selesai')
                ->color('primary')
                ->icon('heroicon-o-shopping-cart'),
            // Stat::make('Jam Kerja Anda', '07:30-17:00')
            //     ->description('Jam kerja yang ditetapkan')
            //     ->color('primary')
            //     ->icon('heroicon-o-clock'),
        ];
    }
}
