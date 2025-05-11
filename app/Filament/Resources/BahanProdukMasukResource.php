<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BahanProdukMasukResource\Pages;
use App\Filament\Resources\BahanProdukMasukResource\RelationManagers;
use App\Models\BahanProdukMasuk;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class BahanProdukMasukResource extends Resource
{
    protected static ?string $model = BahanProdukMasuk::class;
    protected static ?string $navigationLabel = 'Impor';
    protected static ?string $navigationIcon = 'heroicon-o-arrow-down-on-square';

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
                Forms\Components\TextInput::make('keterangan')
                    ->required()
                    ->maxLength(255)
                    ->label('Keterangan'),
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
                    ->label('Keterangan'),
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
            'index' => Pages\ListBahanProdukMasuk::route('/'),
            'create' => Pages\CreateBahanProdukMasuk::route('/create'),
            'edit' => Pages\EditBahanProdukMasuk::route('/{record}/edit'),
        ];
    }
}
