<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ThanksLetterResource\Pages;
use App\Filament\Resources\ThanksLetterResource\RelationManagers;
use App\Models\ThanksLetter;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ThanksLetterResource extends Resource
{
    protected static ?string $model = ThanksLetter::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->required()
                    ->maxLength(255),
                Forms\Components\FileUpload::make('image')
                    ->image()
                    ->required()
                    ->imageEditor()
                    ->directory('thanks-letters'), // сохраняем в отдельной папке
            ]);
    }

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->searchable(),
                Tables\Columns\ImageColumn::make('thumbnail')
                    ->label('Миниатюра'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListThanksLetters::route('/'),
            'create' => Pages\CreateThanksLetter::route('/create'),
            'edit' => Pages\EditThanksLetter::route('/{record}/edit'),
        ];
    }
}
