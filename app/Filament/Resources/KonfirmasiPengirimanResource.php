<?php

namespace App\Filament\Resources;

use App\Filament\Resources\KonfirmasiPengirimanResource\Pages;
use App\Models\KonfirmasiPengiriman;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\Action;
use Filament\Tables\Table;

class KonfirmasiPengirimanResource extends Resource
{
    protected static ?string $model = KonfirmasiPengiriman::class;
    protected static ?string $navigationLabel = 'Konfirmasi Pengiriman';
    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document-check';
    protected static ?string $slug = 'konfirmasi-pengiriman';
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
                Forms\Components\Toggle::make('status_pengiriman')
                    ->required()
                    ->label('Status Pengiriman'),
                Forms\Components\TextInput::make('review_barang')
                    ->required()
                    ->maxLength(255)
                    ->label('Review Barang'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->emptyStateHeading('Tidak ada konfirmasi pengiriman')
            ->emptyStateDescription('Segera input konfirmasi pengiriman untuk ditampilkan di sini.')
            ->columns([
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
                Tables\Columns\TextColumn::make('status_pengiriman')
                    ->searchable()
                    ->badge()
                    ->color(fn(string $state): string => match ($state) {
                        '0' => 'warning',
                        '1' => 'success',
                    })
                    ->formatStateUsing(fn($state): string => $state === 1 ? 'Dikirim' : 'Belum Dikirim')
                    ->label('Status Pengiriman'),
                Tables\Columns\TextColumn::make('review_barang')
                    ->searchable()
                    ->label('Review Barang'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Action::make('toggleStatus')
                    ->icon('heroicon-m-paper-airplane')
                    ->label(fn($record) => $record->status_pengiriman ? 'Batal' : 'Kirim')
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
            'index' => Pages\ListKonfirmasiPengiriman::route('/'),
            // 'create' => Pages\CreateKonfirmasiPengiriman::route('/create'),
            'edit' => Pages\EditKonfirmasiPengiriman::route('/{record}/edit'),
        ];
    }

    public static function getBreadcrumb(): string
    {
        return 'Konfirmasi Pengiriman';
    }

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }
}
