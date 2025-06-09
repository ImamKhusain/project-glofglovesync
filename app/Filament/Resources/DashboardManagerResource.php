<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DashboardManagerResource\Pages;
use App\Filament\Resources\DashboardManagerResource\RelationManagers;
use App\Models\DashboardManager;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class DashboardManagerResource extends Resource
{
    protected static ?string $model = DashboardManager::class;
    protected static ?string $navigationLabel = 'Dashboard Manager';
    protected static ?string $navigationIcon = 'heroicon-o-home';
    protected static ?string $slug = 'dashboard-manager';
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
            'index' => Pages\ListDashboardManagers::route('/'),
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
