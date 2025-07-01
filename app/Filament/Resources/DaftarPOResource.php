<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DaftarPOResource\Pages;
use App\Models\DaftarPO;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\Action;
use Filament\Tables\Table;

class DaftarPOResource extends Resource
{
    protected static ?string $model = DaftarPO::class;
    protected static ?string $navigationLabel = 'Daftar PO';
    protected static ?string $navigationIcon = 'heroicon-o-pencil-square';
    protected static ?string $slug = 'daftar-po';
    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('id_po')
                    ->required()
                    ->maxLength(255)
                    ->label('ID PO'),
                Forms\Components\DateTimePicker::make('tanggal_permintaan')
                    ->required()
                    ->label('Tanggal Permintaan'),
                Forms\Components\TextInput::make('jumlah_dikirim')
                    ->required()
                    ->numeric()
                    ->label('Jumlah Dikirim'),
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
            ->emptyStateHeading('Tidak ada daftar PO')
            ->emptyStateDescription('Segera input daftar PO untuk ditampilkan di sini.')
            ->columns([
                Tables\Columns\TextColumn::make('no')
                    ->label('No')
                    ->rowIndex(),
                Tables\Columns\TextColumn::make('id_po')
                    ->searchable()
                    ->label('ID PO'),
                Tables\Columns\TextColumn::make('tanggal_permintaan')
                    ->dateTime()
                    ->sortable()
                    ->label('Tanggal Permintaan')
                    ->formatStateUsing(fn($state) => \Carbon\Carbon::parse($state)->format('d/m/Y')),
                Tables\Columns\TextColumn::make('jumlah_dikirim')
                    ->numeric()
                    ->sortable()
                    ->label('Jumlah Dikirim')
                    ->formatStateUsing(fn($state) => $state . ' pcs'),
                Tables\Columns\TextColumn::make('status_pengiriman')
                    ->searchable()
                    ->badge()
                    ->color(fn(string $state): string => match ($state) {
                        '0' => 'warning',
                        '1' => 'success',
                    })
                    ->formatStateUsing(fn($state): string => $state === 1 ? 'Selesai' : 'Belum Selesai')
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
            'index' => Pages\ListDaftarPO::route('/'),
            'create' => Pages\CreateDaftarPO::route('/create'),
            'edit' => Pages\EditDaftarPO::route('/{record}/edit'),
        ];
    }

    public static function getBreadcrumb(): string
    {
        return 'Daftar PO';
    }

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }
}
