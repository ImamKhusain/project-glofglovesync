<?php

namespace App\Filament\Resources\DashboardManagerResource\Pages;

use App\Filament\Resources\DashboardManagerResource;
use App\Filament\Widgets\JumlahPenjualanChart;
use App\Filament\Widgets\JumlahProduksiChart;
use App\Filament\Widgets\StatsDashboardManagerOverview;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListDashboardManagers extends ListRecords
{
    protected static string $resource = DashboardManagerResource::class;

    protected bool $disableTable = true;

    protected function getHeaderWidgets(): array
    {
        return [
            StatsDashboardManagerOverview::class,
            JumlahProduksiChart::class,
            JumlahPenjualanChart::class,
        ];
    }

    public function getHeading(): string
    {
        return 'Selamat datang, ' . auth()->user()->name;
    }

    public function getTitle(): string
    {
        return 'Dashboard Manager';
    }

    public function getBreadcrumb(): string
    {
        return '';
    }
}
