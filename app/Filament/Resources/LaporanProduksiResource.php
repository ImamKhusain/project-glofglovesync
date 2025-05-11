<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LaporanProduksiResource\Pages;
use App\Filament\Resources\LaporanProduksiResource\RelationManagers;
use App\Models\LaporanProduksi;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class LaporanProduksiResource extends Resource
{
    protected static ?string $model = LaporanProduksi::class;
    protected static ?string $navigationLabel = 'Laporan Produksi';

    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document-list';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\DateTimePicker::make('tanggal_produksi')
                    ->required()
                    ->label('Tanggal Produksi'),
                Forms\Components\Toggle::make('is_published')
                    ->required()
                    ->label('Is Published'),
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
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
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
                Tables\Columns\IconColumn::make('is_published')
                    ->boolean()
                    ->label('Is Published'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->label('Created At'),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->label('Updated At'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
}
