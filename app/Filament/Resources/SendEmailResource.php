<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SendEmailResource\Pages;
use App\Filament\Resources\SendEmailResource\RelationManagers;
use App\Models\SendEmail;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SendEmailResource extends Resource
{
    protected static ?string $model = SendEmail::class;

    protected static ?string $navigationIcon = 'heroicon-o-envelope';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('subject')
                    ->autofocus()
                    ->required(),

                Forms\Components\RichEditor::make('body')
                    ->required(),
            ])->columns(1);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
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
            'index' => Pages\ListSendEmails::route('/'),
            'create' => Pages\CreateSendEmail::route('/create'),
            'edit' => Pages\EditSendEmail::route('/{record}/edit'),
        ];
    }
}
