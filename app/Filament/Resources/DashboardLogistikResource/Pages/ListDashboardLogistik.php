<?php

namespace App\Filament\Resources\DashboardLogistikResource\Pages;

use App\Filament\Resources\DashboardLogistikResource;
use App\Filament\Widgets\StatsDashboardLogistikOverview;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListDashboardLogistik extends ListRecords
{
    protected static string $resource = DashboardLogistikResource::class;

    protected bool $disableTable = true;

    protected function getHeaderWidgets(): array
    {
        return [
            StatsDashboardLogistikOverview::class,
        ];
    }

    public function getHeading(): string
    {
        return 'Selamat datang, ' . auth()->user()->name;
    }

    public function getTitle(): string
    {
        return 'Dashboard Logistik';
    }

    public function getBreadcrumb(): string
    {
        return '';
    }
}
