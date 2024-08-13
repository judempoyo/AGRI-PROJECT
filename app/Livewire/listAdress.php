<?php

namespace App\Livewire;

use App\Models\Adress;
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

class listAdress extends Component implements HasForms, HasTable
{
    use InteractsWithForms;
    use InteractsWithTable;

    public function table(Table $table): Table
    {
        return $table
            ->query(Adress::query()->where('user_id', Auth::user()->id))
            ->headerActions([
                Tables\Actions\CreateAction::make()
                    ->label('Nouvl adresse')
                    ->url(route('adresses.create')),
            ])
            ->columns([
                Tables\Columns\TextColumn::make('#')
                    ->sortable()
                    ->rowIndex(),
                Tables\Columns\TextColumn::make('adress')
                    ->label('Adresse')
                    ->searchable(),
                Tables\Columns\TextColumn::make('city')
                    ->label('Ville')
                    ->searchable(),
                Tables\Columns\TextColumn::make('state')
                    ->label('Province')
                    ->searchable(),
                Tables\Columns\TextColumn::make('user.email')
                    ->label('email')
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
                        ->url(fn ($record): string => route('adresses.show', $record)),
                    Tables\Actions\EditAction::make()
                        ->label('Modifier')
                        ->url(fn ($record): string => route('adresses.edit', $record)),
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
        return view('livewire.list-adress');
    }
}
