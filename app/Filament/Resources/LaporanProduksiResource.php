<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LaporanProduksiResource\Pages;
use App\Models\LaporanProduksi;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\Action;
use Filament\Tables\Table;

class LaporanProduksiResource extends Resource
{
    protected static ?string $model = LaporanProduksi::class;
    protected static ?string $navigationLabel = 'Produksi';
    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document-list';
    protected static ?string $slug = 'laporan-produksi';
    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\DateTimePicker::make('tanggal_produksi')
                    ->required()
                    ->label('Tanggal Produksi'),
                Forms\Components\TextInput::make('target_produksi')
                    ->required()
                    ->numeric()
                    ->label('Target Produksi'),
                Forms\Components\TextInput::make('produksi_berhasil')
                    ->required()
                    ->numeric()
                    ->label('Produksi Berhasil'),
                Forms\Components\TextInput::make('produksi_gagal')
                    ->required()
                    ->numeric()
                    ->label('Produksi Gagal'),
                Forms\Components\TextInput::make('jumlah_produksi')
                    ->required()
                    ->numeric()
                    ->label('Jumlah Produksi'),
                Forms\Components\Toggle::make('is_published')
                    ->required()
                    ->label('Status'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->emptyStateHeading('Tidak ada laporan produksi')
            ->emptyStateDescription('Segera input laporan produksi untuk ditampilkan di sini.')
            ->columns([
                Tables\Columns\TextColumn::make('id')
                    ->numeric()
                    ->sortable()
                    ->label('No'),
                Tables\Columns\TextColumn::make('tanggal_produksi')
                    ->dateTime()
                    ->sortable()
                    ->label('Tanggal Produksi')
                    ->formatStateUsing(fn($state) => \Carbon\Carbon::parse($state)->format('d/m/Y')),
                Tables\Columns\TextColumn::make('target_produksi')
                    ->numeric()
                    ->label('Target Produksi')
                    ->searchable()
                    ->formatStateUsing(fn($state) => $state . ' pcs'),
                Tables\Columns\TextColumn::make('produksi_berhasil')
                    ->numeric()
                    ->label('Produksi Berhasil')
                    ->formatStateUsing(fn($state) => $state . ' pcs'),
                Tables\Columns\TextColumn::make('produksi_gagal')
                    ->numeric()
                    ->label('Produksi Gagal')
                    ->formatStateUsing(fn($state) => $state . ' pcs'),
                Tables\Columns\TextColumn::make('jumlah_produksi')
                    ->numeric()
                    ->label('Jumlah Produksi')
                    ->formatStateUsing(fn($state) => $state . ' pcs'),
                Tables\Columns\TextColumn::make('is_published')
                    ->searchable()
                    ->badge()
                    ->color(fn(string $state): string => match ($state) {
                        '0' => 'warning',
                        '1' => 'success',
                    })
                    ->formatStateUsing(fn($state): string => $state === 1 ? 'Terkirim' : 'Belum Terkirim')
                    ->label('Status'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Action::make('toggleStatus')
                    ->icon('heroicon-m-paper-airplane')
                    ->label(fn($record) => $record->is_published ? 'Batal' : 'Kirim')
                    ->action(function ($record) {
                        $record->is_published = !$record->is_published;
                        $record->save();
                    })
                    ->color(fn($record) => $record->is_published === 0 ? 'bg-red-500' : 'bg-green-500'),
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
            'index' => Pages\ListLaporanProduksi::route('/'),
            'create' => Pages\CreateLaporanProduksi::route('/create'),
            'edit' => Pages\EditLaporanProduksi::route('/{record}/edit'),
        ];
    }

    public static function getBreadcrumb(): string
    {
        return 'Laporan Produksi';
    }

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }
}
