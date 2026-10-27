<?php

namespace App\Filament\Resources\Products\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\DeleteAction;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;

class ProductsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->label('Nama Produk')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('price')->label('Harga')
                    ->sortable()
                    ->money('IDR', locale: 'id_ID'),
                TextColumn::make('description')->label('Deskripsi')
                    ->searchable(),
                TextColumn::make('status'),
                TextColumn::make('category.name'),
                TextColumn::make('tags.name'),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                DeleteAction::make(),
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
