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
            ->query(Product::query()->where('user_id', Auth::user()->id))
            ->headerActions([
                Tables\Actions\CreateAction::make()
                    ->url(route('products.create')),
            ])
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('description')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('price')
                    ->money()
                    ->sortable(),
                Tables\Columns\TextColumn::make('Quantity')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('deposit.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('categorie.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('sell_unit.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('user.name')
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
                        ->url(fn ($record): string => route('products.show', $record)),
                    Tables\Actions\EditAction::make()
                        ->url(fn ($record): string => route('products.edit', $record)),
                    Tables\Actions\DeleteAction::make()
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
