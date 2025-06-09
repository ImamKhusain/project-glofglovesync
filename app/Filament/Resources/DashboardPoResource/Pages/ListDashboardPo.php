<?php

namespace App\Filament\Resources\DashboardPoResource\Pages;

use App\Filament\Resources\DashboardPoResource;
use App\Filament\Widgets\StatsDashboardPoOverview;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListDashboardPo extends ListRecords
{
    protected static string $resource = DashboardPoResource::class;

    protected bool $disableTable = true;

    protected function getHeaderWidgets(): array
    {
        return [
            StatsDashboardPoOverview::class,
        ];
    }

    public function getHeading(): string
    {
        return 'Selamat datang, ' . auth()->user()->name;
    }

    public function getTitle(): string
    {
        return 'Dashboard PO';
    }

    public function getBreadcrumb(): string
    {
        return '';
    }
}
