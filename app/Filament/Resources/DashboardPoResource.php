<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DashboardPoResource\Pages;
use App\Filament\Resources\DashboardPoResource\RelationManagers;
use App\Models\DashboardPo;
use Filament\Resources\Resource;
use Filament\Tables\Table;

class DashboardPoResource extends Resource
{
    protected static ?string $model = DashboardPo::class;
    protected static ?string $navigationLabel = 'Dashboard PO';
    protected static ?string $navigationIcon = 'heroicon-o-home';
    protected static ?string $slug = 'dashboard-po';
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
            'index' => Pages\ListDashboardPo::route('/'),
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
