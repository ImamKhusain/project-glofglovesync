<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PenjualanProdukResource\Pages;
use App\Models\PenjualanProduk;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\Action;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Table;
use Illuminate\Contracts\Database\Eloquent\Builder;

class PenjualanProdukResource extends Resource
{
    protected static ?string $model = PenjualanProduk::class;
    protected static ?string $navigationLabel = 'Ekspor';
    protected static ?string $navigationIcon = 'heroicon-o-arrow-up-on-square';
    protected static ?string $slug = 'penjualan-produk';
    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('id_pengiriman')
                    ->required()
                    ->maxLength(255)
                    ->label('ID Pengiriman'),
                Forms\Components\DateTimePicker::make('tanggal_pengiriman')
                    ->required()
                    ->label('Tanggal Pengiriman'),
                Forms\Components\TextInput::make('jumlah_pengiriman')
                    ->required()
                    ->numeric()
                    ->label('Jumlah Pengiriman'),
                Forms\Components\TextInput::make('tujuan_pengiriman')
                    ->required()
                    ->maxLength(255)
                    ->label('Tujuan Pengiriman'),
                Forms\Components\Toggle::make('status_pengiriman')
                    ->required()
                    ->label('Status Pengiriman'),
                Forms\Components\TextInput::make('review')
                    ->required()
                    ->maxLength(255)
                    ->label('Review'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->emptyStateHeading('Tidak ada penjualan produk')
            ->emptyStateDescription('Segera input penjualan produk untuk ditampilkan di sini.')
            ->columns([
                Tables\Columns\TextColumn::make('no')
                    ->label('No')
                    ->rowIndex(),
                Tables\Columns\TextColumn::make('id_pengiriman')
                    ->searchable()
                    ->label('ID Pengiriman'),
                Tables\Columns\TextColumn::make('tanggal_pengiriman')
                    ->dateTime()
                    ->sortable()
                    ->label('Tanggal Pengiriman')
                    ->formatStateUsing(fn($state) => \Carbon\Carbon::parse($state)->format('d/m/Y')),
                Tables\Columns\TextColumn::make('jumlah_pengiriman')
                    ->numeric()
                    ->sortable()
                    ->label('Jumlah Pengiriman')
                    ->formatStateUsing(fn($state) => $state . ' pcs'),
                Tables\Columns\TextColumn::make('tujuan_pengiriman')
                    ->searchable()
                    ->label('Tujuan Pengiriman'),
                Tables\Columns\TextColumn::make('status_pengiriman')
                    ->searchable()
                    ->badge()
                    ->color(fn(string $state): string => match ($state) {
                        '0' => 'warning',
                        '1' => 'success',
                    })
                    ->formatStateUsing(fn($state): string => $state === 1 ? 'Berhasil' : 'Gagal')
                    ->label('Status Pengiriman'),
                Tables\Columns\TextColumn::make('review')
                    ->searchable()
                    ->label('Review'),
            ])
            ->filters([
                Filter::make('tanggal_pengiriman')
                    ->form([
                        DatePicker::make('dari tanggal'),
                        DatePicker::make('sampai tanggal'),
                    ])
                    ->query(function (Builder $query, array $data): Builder {
                        return $query
                            ->when(
                                $data['dari tanggal'],
                                fn(Builder $query, $date): Builder => $query->whereDate('tanggal_pengiriman', '>=', $date),
                            )
                            ->when(
                                $data['sampai tanggal'],
                                fn(Builder $query, $date): Builder => $query->whereDate('tanggal_pengiriman', '<=', $date),
                            );
                    })
            ])
            ->actions([
                Action::make('toggleStatus')
                    ->icon('heroicon-m-paper-airplane')
                    ->label(fn($record) => $record->status_pengiriman ? 'Batal' : 'Selesai')
                    ->action(function ($record) {
                        $record->status_pengiriman = !$record->status_pengiriman;
                        $record->save();
                    })
                    ->color(fn($record) => $record->status_pengiriman === 0 ? 'bg-red-500' : 'bg-green-500'),
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
            'index' => Pages\ListPenjualanProduk::route('/'),
            'create' => Pages\CreatePenjualanProduk::route('/create'),
            'edit' => Pages\EditPenjualanProduk::route('/{record}/edit'),
        ];
    }

    public static function getBreadcrumb(): string
    {
        return 'Penjualan Produk';
    }

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }
}
