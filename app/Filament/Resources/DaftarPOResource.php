<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DaftarPOResource\Pages;
use App\Filament\Resources\DaftarPOResource\RelationManagers;
use App\Models\DaftarPO;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class DaftarPOResource extends Resource
{
    protected static ?string $model = DaftarPO::class;
    protected static ?string $navigationLabel = 'Daftar PO';
    protected static ?string $navigationIcon = 'heroicon-o-pencil-square';

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
            'index' => Pages\ListDaftarPO::route('/'),
            'create' => Pages\CreateDaftarPO::route('/create'),
            'edit' => Pages\EditDaftarPO::route('/{record}/edit'),
        ];
    }
}
