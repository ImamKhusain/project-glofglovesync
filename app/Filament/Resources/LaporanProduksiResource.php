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

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\DateTimePicker::make('tanggal_produksi')
                    ->required(),
                Forms\Components\TextInput::make('target_produksi')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('produksi_berhasil')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('produksi_gagal')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('jumlah_produksi')
                    ->required()
                    ->numeric(),
                Forms\Components\Toggle::make('is_published')
                    ->required(),
                Forms\Components\DateTimePicker::make('published_at'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('tanggal_produksi')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('target_produksi')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('produksi_berhasil')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('produksi_gagal')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('jumlah_produksi')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\IconColumn::make('is_published')
                    ->boolean(),
                Tables\Columns\TextColumn::make('published_at')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
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
            'index' => Pages\ListLaporanProduksis::route('/'),
            'create' => Pages\CreateLaporanProduksi::route('/create'),
            'edit' => Pages\EditLaporanProduksi::route('/{record}/edit'),
        ];
    }
}
