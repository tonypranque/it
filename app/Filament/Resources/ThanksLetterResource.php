<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ThanksLetterResource\Pages;
use App\Models\ThanksLetter;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class ThanksLetterResource extends Resource
{
    protected static ?string $model = ThanksLetter::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $pluralModelLabel = 'Рекомендации';
    protected static ?string $modelLabel = 'Рекомендательное письмо';
    protected static ?string $navigationGroup = 'Контент';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->label('Заголовок')
                    ->required()
                    ->maxLength(255)
                    ->autofocus(),

                Forms\Components\FileUpload::make('image')
                    ->label('Изображение')
                    ->image()
                    ->imageEditor()
                    ->required()
                    ->disk('public') // ← обязательно!
                    ->directory('thanks-letters') // папка
                    ->visibility('public')
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->label('Заголовок')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\ImageColumn::make('thumbnail')
                    ->label('Миниатюра')
                    ->circular() // или ->square()
                    ->size(80), // размер в пикселях

                // Опционально: отображение оригинала (но он может быть большим)
                // Tables\Columns\ImageColumn::make('image')
                //     ->label('Оригинал')
                //     ->size(60),
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
