<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LaporanStockBahanBakuResource\Pages;
use App\Models\LaporanStockBahanBaku;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\Action;
use Filament\Tables\Table;

class LaporanStockBahanBakuResource extends Resource
{
    protected static ?string $model = LaporanStockBahanBaku::class;
    protected static ?string $navigationLabel = 'Stok Bahan';
    protected static ?string $navigationIcon = 'heroicon-o-cube';
    protected static ?string $slug = 'laporan-stock-bahan-baku';
    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('id_bahan_baku')
                    ->required()
                    ->maxLength(255)
                    ->label('ID Bahan Baku'),
                Forms\Components\TextInput::make('nama_bahan_baku')
                    ->required()
                    ->maxLength(255)
                    ->label('Nama Bahan Baku'),
                Forms\Components\TextInput::make('stok_awal')
                    ->required()
                    ->numeric()
                    ->label('Stok Awal'),
                Forms\Components\TextInput::make('stok_terpakai')
                    ->required()
                    ->numeric()
                    ->label('Stok Terpakai'),
                Forms\Components\TextInput::make('stok_sisa')
                    ->required()
                    ->numeric()
                    ->label('Stok Sisa'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->emptyStateHeading('Tidak ada laporan stock bahan baku')
            ->emptyStateDescription('Segera input laporan stock bahan baku untuk ditampilkan di sini.')
            ->columns([
                Tables\Columns\TextColumn::make('id')
                    ->numeric()
                    ->sortable()
                    ->label('No'),
                Tables\Columns\TextColumn::make('id_bahan_baku')
                    ->searchable()
                    ->label('ID Bahan Baku'),
                Tables\Columns\TextColumn::make('nama_bahan_baku')
                    ->searchable()
                    ->label('Nama Bahan Baku'),
                Tables\Columns\TextColumn::make('stok_awal')
                    ->numeric()
                    ->label('Stok Awal')
                    ->formatStateUsing(fn($state) => $state . ' meter'),
                Tables\Columns\TextColumn::make('stok_terpakai')
                    ->numeric()
                    ->label('Stok Terpakai')
                    ->formatStateUsing(fn($state) => $state . ' meter'),
                Tables\Columns\TextColumn::make('stok_sisa')
                    ->numeric()
                    ->label('Stok Sisa'),
                Tables\Columns\TextColumn::make('status')
                    ->searchable()
                    ->badge()
                    ->color(fn(string $state): string => match ($state) {
                        '0' => 'warning',
                        '1' => 'success',
                    })
                    ->formatStateUsing(fn($state): string => $state === 1 ? 'Diterima' : 'Belum Diterima')
                    ->label('Status'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Action::make('toggleStatus')
                    ->icon('heroicon-m-paper-airplane')
                    ->label(fn($record) => $record->status ? 'Batal' : 'Terima')
                    ->action(function ($record) {
                        $record->status = !$record->status;
                        $record->save();
                    })
                    ->color(fn($record) => $record->status === 0 ? 'bg-red-500' : 'bg-green-500'),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListLaporanStockBahanBaku::route('/'),
            'create' => Pages\CreateLaporanStockBahanBaku::route('/create'),
            'edit' => Pages\EditLaporanStockBahanBaku::route('/{record}/edit'),
        ];
    }

    public static function getBreadcrumb(): string
    {
        return 'Laporan Stock Bahan Baku';
    }

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }
}
