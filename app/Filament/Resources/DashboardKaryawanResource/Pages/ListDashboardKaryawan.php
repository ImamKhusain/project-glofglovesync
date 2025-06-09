<?php

namespace App\Filament\Resources\DashboardKaryawanResource\Pages;

use App\Filament\Resources\DashboardKaryawanResource;
use App\Filament\Widgets\StatsDashboardKaryawanOverview;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListDashboardKaryawan extends ListRecords
{
    protected static string $resource = DashboardKaryawanResource::class;

    protected bool $disableTable = true;

    protected function getHeaderWidgets(): array
    {
        return [
            StatsDashboardKaryawanOverview::class,
        ];
    }

    public function getHeading(): string
    {
        return 'Selamat datang, ' . auth()->user()->name;
    }

    public function getTitle(): string
    {
        return 'Dashboard Karyawan';
    }

    public function getBreadcrumb(): string
    {
        return '';
    }
}
