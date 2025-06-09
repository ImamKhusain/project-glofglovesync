<?php

namespace App\Filament\Widgets;

use App\Models\LaporanProduksi;
use App\Models\LaporanStockBahanBaku;
use App\Models\PenjualanProduk;
use App\Models\User;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsDashboardManagerOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Produksi', number_format(LaporanProduksi::whereDate('created_at', today())->sum('jumlah_produksi')))
                ->description('Total Produksi hari ini')
                ->color('primary')
                ->icon('heroicon-o-clipboard-document-list'),
            Stat::make('Bahan Baku', LaporanStockBahanBaku::sum('stok_terpakai') . ' meter')
                ->description('Bahan Baku yang terpakai')
                ->color('primary')
                ->icon('heroicon-o-chart-pie'),
            Stat::make('Jumlah Karyawan', User::whereDoesntHave('roles', function ($query) {
                $query->whereIn('name', ['manager', 'super_admin']);
            })->count())
                ->description('Jumlah karyawan yang aktif')
                ->color('primary')
                ->icon('heroicon-o-user'),
            Stat::make('Total Pengiriman', PenjualanProduk::count())
                ->description('Total pengiriman yang ada')
                ->color('primary')
                ->icon('heroicon-o-truck'),
        ];
    }
}
