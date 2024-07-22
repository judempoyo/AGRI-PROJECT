<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Filament\Resources\ProductResource\RelationManagers;
use App\Models\Product;
use App\Models\Deposit;
use App\Models\Categorie;
use App\Models\SellUnit;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-group';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(50),
                Forms\Components\TextArea::make('description')
                    ->required()
                    ->rows(3)
                    ->maxLength(1000),
                Forms\Components\TextInput::make('price')
                    ->required()
                    ->numeric()
                    ->prefix('CDF'),
                Forms\Components\TextInput::make('Quantity')
                    ->required()
                    ->numeric(),
                Forms\Components\Select::make('deposit_id')
                    ->required()
                    ->relationship('Deposit', 'name'),
                Forms\Components\Select::make('categorie_id')
                    ->required()
                    ->relationship('Categorie', 'name'),
                Forms\Components\Select::make('sell_unit_id')
                    ->required()
                    ->relationship('SellUnit', 'name'),
                /* ->options(SellUnit::all()->pluck('name', 'id')), */
                Forms\Components\Select::make('user_id')
                    ->required()
                    ->relationship('User', 'email'),


            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('description')
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('price')
                    ->money()
                    ->sortable(),
                Tables\Columns\TextColumn::make('Quantity')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('deposit.name')
                    ->sortable(),
                Tables\Columns\TextColumn::make('categorie.name')
                    ->sortable(),
                Tables\Columns\TextColumn::make('sellUnit.name')
                    ->sortable(),
                Tables\Columns\TextColumn::make('user.name')
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
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\ViewAction::make(),
                    Tables\Actions\EditAction::make(),
                    Tables\Actions\DeleteAction::make(),
                ])
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
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }
}
