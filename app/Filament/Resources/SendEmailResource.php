<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SendEmailResource\Pages;
use App\Models\SendEmail;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Infolists\Components\Section;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Infolist;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

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
                TextColumn::make('subject')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('sent_at')
                    ->date('F j, Y'),

            ])->defaultSort('id', 'desc')
            ->filters([])
            ->actions([
                Tables\Actions\ViewAction::make(),
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
            'index' => Pages\ListSendEmails::route('/'),
            'create' => Pages\CreateSendEmail::route('/create'),
            'view' => Pages\ViewSendEmail::route('/{record}'),
        ];
    }

    public static function infolist(Infolist $infolist): Infolist
    {

        return $infolist->schema([
            Section::make('Email Details')
                ->columns(1)
                ->schema([
                    TextEntry::make('subject'),

                    TextEntry::make('body'),

                    TextEntry::make('sent_at')
                        ->date('F j, Y'),
                ]),
        ]);

    }
}
