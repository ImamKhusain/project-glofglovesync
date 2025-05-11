<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UpdateStockBahanBakuResource\Pages;
use App\Filament\Resources\UpdateStockBahanBakuResource\RelationManagers;
use App\Models\UpdateStockBahanBaku;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class UpdateStockBahanBakuResource extends Resource
{
    protected static ?string $model = UpdateStockBahanBaku::class;
    protected static ?string $navigationLabel = 'Update Stock';
    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document-list';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama_bahan')
                    ->required()
                    ->maxLength(255)
                    ->label('Nama Bahan'),
                Forms\Components\TextInput::make('stok_lama')
                    ->required()
                    ->numeric()
                    ->label('Stok Lama'),
                Forms\Components\TextInput::make('stok_terbaru')
                    ->required()
                    ->numeric()
                    ->label('Stok Terbaru'),
                Forms\Components\TextInput::make('status')
                    ->required()
                    ->maxLength(255)
                    ->label('Status'),
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
                Tables\Columns\TextColumn::make('nama_bahan')
                    ->searchable()
                    ->label('Nama Bahan'),
                Tables\Columns\TextColumn::make('stok_lama')
                    ->numeric()
                    ->label('Stok Lama')
                    ->formatStateUsing(fn($state) => $state . ' meter'),
                Tables\Columns\TextColumn::make('stok_terbaru')
                    ->numeric()
                    ->label('Stok Terbaru')
                    ->formatStateUsing(fn($state) => $state . ' meter'),
                Tables\Columns\TextColumn::make('status')
                    ->searchable()
                    ->label('Status'),
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
            'index' => Pages\ListUpdateStockBahanBaku::route('/'),
            'create' => Pages\CreateUpdateStockBahanBaku::route('/create'),
            'edit' => Pages\EditUpdateStockBahanBaku::route('/{record}/edit'),
        ];
    }
}
