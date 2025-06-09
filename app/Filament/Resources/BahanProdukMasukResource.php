<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BahanProdukMasukResource\Pages;
use App\Models\BahanProdukMasuk;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\Action;
use Filament\Tables\Table;

class BahanProdukMasukResource extends Resource
{
    protected static ?string $model = BahanProdukMasuk::class;
    protected static ?string $navigationLabel = 'Impor';
    protected static ?string $navigationIcon = 'heroicon-o-arrow-down-on-square';
    protected static ?string $slug = 'bahan-produk-masuk';
    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\DateTimePicker::make('tanggal')
                    ->required()
                    ->label('Tanggal'),
                Forms\Components\TextInput::make('nama_bahan')
                    ->required()
                    ->maxLength(255)
                    ->label('Nama Bahan'),
                Forms\Components\TextInput::make('jumlah')
                    ->required()
                    ->numeric()
                    ->label('Jumlah'),
                Forms\Components\TextInput::make('supplier')
                    ->required()
                    ->maxLength(255)
                    ->label('Supplier'),
                Forms\Components\Toggle::make('keterangan')
                    ->required()
                    ->label('Keterangan'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->emptyStateHeading('Tidak ada bahan produk masuk')
            ->emptyStateDescription('Segera input bahan produk masuk untuk ditampilkan di sini.')
            ->columns([
                Tables\Columns\TextColumn::make('id')
                    ->numeric()
                    ->sortable()
                    ->label('No'),
                Tables\Columns\TextColumn::make('tanggal')
                    ->dateTime()
                    ->sortable()
                    ->label('Tanggal')
                    ->formatStateUsing(fn($state) => \Carbon\Carbon::parse($state)->format('d/m/Y')),
                Tables\Columns\TextColumn::make('nama_bahan')
                    ->searchable()
                    ->label('Nama Bahan'),
                Tables\Columns\TextColumn::make('jumlah')
                    ->numeric()
                    ->label('Jumlah')
                    ->formatStateUsing(fn($state) => $state . ' meter'),
                Tables\Columns\TextColumn::make('supplier')
                    ->searchable()
                    ->label('Supplier'),
                Tables\Columns\TextColumn::make('keterangan')
                    ->searchable()
                    ->badge()
                    ->color(fn(string $state): string => match ($state) {
                        '0' => 'warning',
                        '1' => 'success',
                    })
                    ->formatStateUsing(fn($state): string => $state === 1 ? 'Diterima' : 'Belum Diterima')
                    ->label('Keterangan'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Action::make('toggleStatus')
                    ->icon('heroicon-m-paper-airplane')
                    ->label(fn($record) => $record->keterangan ? 'Batal' : 'Terima')
                    ->action(function ($record) {
                        $record->keterangan = !$record->keterangan;
                        $record->save();
                    })
                    ->color(fn($record) => $record->keterangan === 0 ? 'bg-red-500' : 'bg-green-500'),
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
            'index' => Pages\ListBahanProdukMasuk::route('/'),
            'create' => Pages\CreateBahanProdukMasuk::route('/create'),
            'edit' => Pages\EditBahanProdukMasuk::route('/{record}/edit'),
        ];
    }

    public static function getBreadcrumb(): string
    {
        return 'Bahan Baku Masuk';
    }

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }
}
