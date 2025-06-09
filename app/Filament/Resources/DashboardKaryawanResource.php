<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DashboardKaryawanResource\Pages;
use App\Filament\Resources\DashboardKaryawanResource\RelationManagers;
use App\Models\DashboardKaryawan;
use Filament\Resources\Resource;
use Filament\Tables\Table;

class DashboardKaryawanResource extends Resource
{
    protected static ?string $model = DashboardKaryawan::class;
    protected static ?string $navigationLabel = 'Dashboard Karyawan';
    protected static ?string $navigationIcon = 'heroicon-o-home';
    protected static ?string $slug = 'dashboard-karyawan';
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
            'index' => Pages\ListDashboardKaryawan::route('/'),
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
