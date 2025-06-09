<?php

namespace App\Filament\Widgets;

use App\Models\BahanProdukMasuk;
use App\Models\User;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsDashboardLogistikOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Progress Kerja Anda', BahanProdukMasuk::count() > 0 ? number_format(BahanProdukMasuk::where('keterangan', 1)->count() / BahanProdukMasuk::count() * 100, 0) . '%' : '0%')
                ->description('Progres kerja dalam persen')
                ->color('primary')
                ->icon('heroicon-o-clipboard-document-list'),
            Stat::make('Jumlah Karyawan Aktif', User::whereHas('roles', function ($q) {
                $q->where('name', 'logistik');
            })->count())
                ->description('Jumlah karyawan logistik yang aktif')
                ->color('primary')
                ->icon('heroicon-o-user-group'),
            Stat::make('Total Stock Bahan Baku', BahanProdukMasuk::sum('jumlah') . ' m')
                ->description('Total persediaan bahan baku')
                ->color('primary')
                ->icon('heroicon-o-archive-box'),
            Stat::make('Jam Kerja Anda', '07:30-17:00')
                ->description('Jam kerja yang ditetapkan')
                ->color('primary')
                ->icon('heroicon-o-clock'),
        ];
    }
}
