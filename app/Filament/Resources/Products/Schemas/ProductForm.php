<?php

namespace App\Filament\Resources\Products\Schemas;

use App\Enum\ProductStatusEnum;
use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\ModalTableSelect;
use App\Filament\Tables\CategoriesTable;

class ProductForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required()
                    ->unique(),
                TextInput::make('price')
                    ->required()
                    ->prefix('Rp')
                    ->rule('numeric'),
                TextInput::make('description'),
                Select::make('status')
                    ->options(ProductStatusEnum::class)
                    ->required(),
                Select::make('tags')
                    ->relationship('tags', 'name')
                    ->multiple(),
                ModalTableSelect::make('category_id')
                    ->relationship('category', 'name')
                    ->tableConfiguration(CategoriesTable::class),
            ]);
    }
}
