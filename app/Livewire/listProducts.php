<?php

namespace App\Livewire;

use App\Models\Product;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Tables;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Livewire\Component;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;


class listProducts extends Component implements HasForms, HasTable
{
    use InteractsWithForms;
    use InteractsWithTable;

    public function table(Table $table): Table
    {
        return $table
            ->query(Product::query())
            ->headerActions([
                Tables\Actions\CreateAction::make()
                    ->label('Nouveau produit    ')
                    ->url(route('products.create')),
            ])
            ->columns([
                Tables\Columns\TextColumn::make('#')
                    ->sortable()
                    ->rowIndex(),
                Tables\Columns\TextColumn::make('name')
                    ->label('Nom')
                    ->searchable(),
                Tables\Columns\TextColumn::make('description')
                    ->label('Description')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('price')
                    ->label('Prix')
                    ->money()
                    ->sortable(),
                Tables\Columns\TextColumn::make('Quantity')
                    ->label('Quantité')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('deposit.name')
                    ->label('Dépot')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('categorie.name')
                    ->label('catégorie')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('sellUnit.name')
                    ->label('Unité de vente')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('user.name')
                    ->label('Utilisateur')
                    ->numeric()
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
                    Tables\Actions\ViewAction::make()
                        ->label('Voir')
                        ->url(fn ($record): string => route('products.show', $record)),
                    Tables\Actions\EditAction::make()
                        ->label('Modifier')
                        ->url(fn ($record): string => route('products.edit', $record)),
                    Tables\Actions\DeleteAction::make()
                        ->label('Supprimer')
                        ->requiresConfirmation()
                        ->url(fn ($record): string => route('products.edit', $record)),
                ])
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    //
                ]),
            ]);
    }

    public function render(): View
    {
        return view('livewire.list-products');
    }
}
