<?php

namespace App\Filament\Resources;

use App\Filament\Resources\KonfirmasiPengirimanResource\Pages;
use App\Filament\Resources\KonfirmasiPengirimanResource\RelationManagers;
use App\Models\KonfirmasiPengiriman;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class KonfirmasiPengirimanResource extends Resource
{
    protected static ?string $model = KonfirmasiPengiriman::class;
    protected static ?string $navigationLabel = 'Konfirmasi Pengiriman';
    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document-check';

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
                Forms\Components\TextInput::make('status_pengiriman')
                    ->required()
                    ->maxLength(255)
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
                    ->label('Status Pengiriman'),
                Tables\Columns\TextColumn::make('review_barang')
                    ->searchable()
                    ->label('Review Barang'),
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
            'index' => Pages\ListKonfirmasiPengiriman::route('/'),
            'create' => Pages\CreateKonfirmasiPengiriman::route('/create'),
            'edit' => Pages\EditKonfirmasiPengiriman::route('/{record}/edit'),
        ];
    }
}
