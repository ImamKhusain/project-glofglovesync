<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UpdateStockBahanBakuResource\Pages;
use App\Models\UpdateStockBahanBaku;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\Action;
use Filament\Tables\Table;

class UpdateStockBahanBakuResource extends Resource
{
    protected static ?string $model = UpdateStockBahanBaku::class;
    protected static ?string $navigationLabel = 'Update Stock';
    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document-list';
    protected static ?string $slug = 'update-stock-bahan-baku';
    protected static ?int $navigationSort = 4;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama_bahan')
                    ->required()
                    ->maxLength(255)
                    ->label('Nama Bahan'),
                Forms\Components\TextInput::make('stok_lama')
                    ->required()
                    ->numeric()
                    ->label('Stok Lama'),
                Forms\Components\TextInput::make('stok_terbaru')
                    ->required()
                    ->numeric()
                    ->label('Stok Terbaru'),
                Forms\Components\Toggle::make('status')
                    ->required()
                    ->label('Status'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->emptyStateHeading('Tidak ada update stock bahan baku')
            ->emptyStateDescription('Segera input update stock bahan baku untuk ditampilkan di sini.')
            ->columns([
                Tables\Columns\TextColumn::make('id')
                    ->numeric()
                    ->sortable()
                    ->label('No'),
                Tables\Columns\TextColumn::make('nama_bahan')
                    ->searchable()
                    ->label('Nama Bahan'),
                Tables\Columns\TextColumn::make('stok_lama')
                    ->numeric()
                    ->label('Stok Lama')
                    ->formatStateUsing(fn($state) => $state . ' meter'),
                Tables\Columns\TextColumn::make('stok_terbaru')
                    ->numeric()
                    ->label('Stok Terbaru')
                    ->formatStateUsing(fn($state) => $state . ' meter'),
                Tables\Columns\TextColumn::make('status')
                    ->searchable()
                    ->badge()
                    ->color(fn(string $state): string => match ($state) {
                        '0' => 'warning',
                        '1' => 'success',
                    })
                    ->formatStateUsing(fn($state): string => $state === 1 ? 'Selesai' : 'Belum Selesai')
                    ->label('Status'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Action::make('toggleStatus')
                    ->icon('heroicon-m-paper-airplane')
                    ->label(fn($record) => $record->status ? 'Batal' : 'Selesai')
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
            'index' => Pages\ListUpdateStockBahanBaku::route('/'),
            'create' => Pages\CreateUpdateStockBahanBaku::route('/create'),
            'edit' => Pages\EditUpdateStockBahanBaku::route('/{record}/edit'),
        ];
    }

    public static function getBreadcrumb(): string
    {
        return 'Update Stock Bahan Baku';
    }

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }
}
