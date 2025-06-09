<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DashboardLogistikResource\Pages;
use App\Filament\Resources\DashboardLogistikResource\RelationManagers;
use App\Models\DashboardLogistik;
use Filament\Resources\Resource;
use Filament\Tables\Table;

class DashboardLogistikResource extends Resource
{
    protected static ?string $model = DashboardLogistik::class;
    protected static ?string $navigationLabel = 'Dashboard Logistik';
    protected static ?string $navigationIcon = 'heroicon-o-home';
    protected static ?string $slug = 'dashboard-logistik';
    protected static ?int $navigationSort = 1;

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListDashboardLogistik::route('/'),
        ];
    }

    public static function getBreadcrumb(): string
    {
        return '';
    }

    public static function getTable(): ?Table
    {
        return null;
    }

    public static function table(Table $table): Table
    {
        return $table
            ->emptyStateHeading('')
            ->emptyStateDescription('')
            ->emptyStateIcon('heroicon-o-user');
    }
}
