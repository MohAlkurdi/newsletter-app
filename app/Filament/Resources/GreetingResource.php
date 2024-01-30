<?php

namespace App\Filament\Resources;

use App\Filament\Resources\GreetingResource\Pages;
use App\Models\Greeting;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class GreetingResource extends Resource
{
    protected static ?string $model = Greeting::class;

    protected static ?string $navigationIcon = 'heroicon-o-megaphone';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('header'),
                Forms\Components\Textarea::make('description')
                    ->rows(10)
                    ->columns(30),
            ])->columns(1);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('header'),
                Tables\Columns\TextColumn::make('description'),
            ])
            ->filters([])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([]);
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
            'index' => Pages\ListGreetings::route('/'),
        ];
    }

    public static function canCreate(): bool
    {
        return false;
    }
}
