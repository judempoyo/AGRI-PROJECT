<?php

namespace App\Livewire;

use App\Models\Order;
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

class listOrders extends Component implements HasForms, HasTable
{
    use InteractsWithForms;
    use InteractsWithTable;

    public function table(Table $table): Table
    {
        return $table
            ->query(Order::query()->where('customer_id', Auth::user()->id))
            ->headerActions([
                Tables\Actions\CreateAction::make()
                    ->label('Passez une commande')
                    ->url(route('orders.create')),
            ])
            ->columns([
                Tables\Columns\TextColumn::make('#')
                    ->sortable()
                    ->rowIndex(),
                Tables\Columns\TextColumn::make('date')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('total')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('name')
                    ->label('Client')
                    ->searchable(),
                Tables\Columns\TextColumn::make('email')
                    ->searchable(),
                Tables\Columns\TextColumn::make('phone')
                    ->label('Telephone')
                    ->searchable(),
                Tables\Columns\TextColumn::make('payment_method')
                    ->label('Mode de paiement')
                    ->searchable(),
                Tables\Columns\TextColumn::make('delivery_method')
                    ->label('mode de Livraison')
                    ->searchable(),
                Tables\Columns\TextColumn::make('delivery_adress')
                    ->label('Adresse de livraison')
                    ->searchable(),
                Tables\Columns\TextColumn::make('state')
                    ->badge()
                    ->color(
                        fn (string $state): string => match ($state) {
                            'en attente' => 'gray',
                            'en cours' => 'warning',
                            'annule' => 'danger',
                            'livre' => 'success'
                        }

                    )
                    ->searchable()
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
                        ->url(fn ($record): string => route('orders.show', $record)),
                    Tables\Actions\EditAction::make()
                        ->label('Modifier')
                        ->url(fn ($record): string => route('orders.edit', $record)),
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
        return view('livewire.list-orders');
    }
}
