<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ServiceResource\Pages;
use App\Filament\Resources\ServiceResource\RelationManagers;
use App\Models\Service;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\HtmlString;

class ServiceResource extends Resource
{
    protected static ?string $model = Service::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $pluralLabel = 'Услуги';

    // Массив иконок с названиями
    public static function getIconOptions(): array
    {
        return [
            'heroicon-o-computer-desktop' => 'Компьютер',
            'heroicon-o-server' => 'Сервер',
            'heroicon-o-wifi' => 'Wi-Fi',
            'heroicon-o-shield-check' => 'Безопасность',
            'heroicon-o-cog' => 'Настройки',
            'heroicon-o-cloud' => 'Облако',
            'heroicon-o-arrow-path' => 'Синхронизация',
            'heroicon-o-user-group' => 'Команда',
            'heroicon-o-chart-bar' => 'Аналитика',
            'heroicon-o-device-phone-mobile' => 'Мобильное устройство',
            'heroicon-o-globe-alt' => 'Глобус',
            'heroicon-o-lock-closed' => 'Замок',
            'heroicon-o-building-office' => 'Офис',
            'heroicon-o-phone' => 'Телефон',
            'heroicon-o-envelope' => 'Почта',
            'heroicon-o-chat-bubble-left-right' => 'Чат',
            'heroicon-o-document-text' => 'Документ',
            'heroicon-o-credit-card' => 'Кредитная карта',
            'heroicon-o-shopping-cart' => 'Корзина',
            'heroicon-o-truck' => 'Доставка',
            'heroicon-o-calendar' => 'Календарь',
        ];
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->required()
                    ->maxLength(255),

                Forms\Components\TextInput::make('slug')
                    ->unique(ignoreRecord: true)
                    ->maxLength(255)
                    ->helperText('Будет сгенерирован автоматически если не заполнить'),

                Forms\Components\Textarea::make('excerpt')
                    ->label('Краткое описание')
                    ->maxLength(500)
                    ->rows(3),

                Forms\Components\RichEditor::make('content')
                    ->columnSpanFull(),

                Forms\Components\Select::make('icon')
                    ->label('Иконка')
                    ->options(self::getIconOptions())
                    ->searchable()
                    ->preload()
                    ->live()
                    ->suffix(fn ($get) => $get('icon') ? new HtmlString(
                        \Blade::render('<x-filament::icon icon="' . $get('icon') . '" class="w-5 h-5" />')
                    ) : null)
                    ->suffix(fn ($get) => $get('icon') ? new HtmlString(
                        '<div class="flex items-center justify-center w-8 h-8 bg-primary/10 rounded ml-2">' .
                        \Blade::render('<x-filament::icon icon="' . $get('icon') . '" class="w-4 h-4 text-primary" />') .
                        '</div>'
                    ) : null),

                Forms\Components\Select::make('parent_id')
                    ->label('Родительская услуга')
                    ->options(Service::whereNull('parent_id')->pluck('title', 'id'))
                    ->searchable()
                    ->nullable(),

                Forms\Components\Toggle::make('is_published')
                    ->default(true)
                    ->label('Опубликовано'),

                Forms\Components\TextInput::make('order')
                    ->numeric()
                    ->default(0)
                    ->minValue(0),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('slug')
                    ->sortable()
                    ->color('gray')
                    ->size('sm'),

                Tables\Columns\TextColumn::make('excerpt')
                    ->limit(50)
                    ->color('gray'),

                Tables\Columns\ViewColumn::make('icon')
                    ->label('Иконка')
                    ->view('filament.tables.columns.icon-preview'),

                Tables\Columns\ToggleColumn::make('is_published')
                    ->label('Опубликовано')
                    ->sortable(),

                Tables\Columns\TextColumn::make('order')
                    ->sortable()
                    ->alignCenter(),

                Tables\Columns\TextColumn::make('parent.title')
                    ->label('Родительская услуга')
                    ->sortable()
                    ->searchable()
                    ->placeholder('—'),
            ])
            ->filters([
                Tables\Filters\TernaryFilter::make('is_published')
                    ->label('Статус публикации'),

                Tables\Filters\SelectFilter::make('parent_id')
                    ->label('Родительская услуга')
                    ->options(Service::whereNull('parent_id')->pluck('title', 'id')),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListServices::route('/'),
            'create' => Pages\CreateService::route('/create'),
            'edit' => Pages\EditService::route('/{record}/edit'),
        ];
    }
}
