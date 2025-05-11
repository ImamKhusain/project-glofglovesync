<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LaporanStockBahanBakuResource\Pages;
use App\Filament\Resources\LaporanStockBahanBakuResource\RelationManagers;
use App\Models\LaporanStockBahanBaku;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class LaporanStockBahanBakuResource extends Resource
{
    protected static ?string $model = LaporanStockBahanBaku::class;
    protected static ?string $navigationLabel = 'Laporan Stok Bahan Baku';
    protected static ?string $navigationIcon = 'heroicon-o-cube';

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
                    ->label('Stok Sisa')
                    ->formatStateUsing(fn($state) => $state . ' meter'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->toggleable(isToggledHiddenByDefault: true),
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
            'index' => Pages\ListLaporanStockBahanBaku::route('/'),
            'create' => Pages\CreateLaporanStockBahanBaku::route('/create'),
            'edit' => Pages\EditLaporanStockBahanBaku::route('/{record}/edit'),
        ];
    }
}
