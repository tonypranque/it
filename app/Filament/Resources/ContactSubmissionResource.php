<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ContactSubmissionResource\Pages;
use App\Filament\Resources\ContactSubmissionResource\RelationManagers;
use App\Models\ContactSubmission; // Убедитесь, что импортирована ваша модель
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ContactSubmissionResource extends Resource
{
    protected static ?string $model = ContactSubmission::class;

    protected static ?string $navigationIcon = 'heroicon-o-envelope'; // Иконка в меню навигации

    protected static ?string $navigationGroup = 'Обратная связь'; // (Опционально) Группа в меню навигации

    protected static ?string $recordTitleAttribute = 'name'; // Атрибут, используемый как заголовок записи

    // Определяем форму для создания/редактирования (в данном случае только просмотр)
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->label('Имя')
                    ->required()
                    ->maxLength(255)
                    ->disabled(), // Делаем поля недоступными для редактирования

                Forms\Components\TextInput::make('email')
                    ->label('Email')
                    ->email()
                    ->required()
                    ->maxLength(255)
                    ->disabled(),

                Forms\Components\TextInput::make('company')
                    ->label('Компания')
                    ->maxLength(255)
                    ->disabled(),

                Forms\Components\TextInput::make('service')
                    ->label('Выбранная услуга')
                    ->required()
                    ->maxLength(255)
                    ->disabled(),

                Forms\Components\Textarea::make('message')
                    ->label('Сообщение')
                    ->required()
                    ->rows(5)
                    ->disabled(),

                Forms\Components\Placeholder::make('created_at')
                    ->label('Дата и время отправки')
                    ->content(fn (?ContactSubmission $record): string => $record ? $record->created_at->format('d.m.Y H:i:s') : '-'),
            ]);
    }

    // Определяем таблицу для отображения списка записей
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Имя')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('email')
                    ->label('Email')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('company')
                    ->label('Компания')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('service')
                    ->label('Услуга')
                    ->searchable()
                    ->sortable()
                    ->formatStateUsing(fn (string $state): string => match($state) {
                        'it-outsourcing' => 'IT-аутсорсинг',
                        'computer-maintenance' => 'Абонентское обслуживание компьютеров',
                        'it-support' => 'IT-поддержка',
                        'software-maintenance' => 'Обслуживание ПО',
                        'network-infrastructure' => 'Создание IT-инфраструктуры',
                        'wireless-network' => 'Проектирование и монтаж беспроводной сети',
                        'local-network' => 'Монтаж локальной сети (ЛВС)',
                        'network-administration' => 'Администрирование сети',
                        'ip-telephony' => 'IP-телефония для бизнеса',
                        'server-administration' => 'Администрирование серверов',
                        'server-maintenance' => 'Обслуживание серверов',
                        'server-setup' => 'Настройка и установка серверов',
                        '1c-server-support' => 'Поддержка серверов 1С',
                        'it-audit' => 'IT-аудит',
                        'it-consulting' => 'IT-консультация',
                        'antivirus-protection' => 'Антивирусная защита',
                        'data-recovery' => 'Восстановление данных',
                        '1c-support' => 'Поддержка и сопровождение 1С',
                        '1c-implementation' => 'Внедрение 1С',
                        '1c-licenses' => 'Лицензии 1С',
                        default => $state,
                    }),
                Tables\Columns\TextColumn::make('message')
                    ->label('Сообщение')
                    ->limit(50) // Ограничиваем длину отображаемого текста
                    ->tooltip(fn (ContactSubmission $record): string => $record->message) // Показываем полный текст в тултипе
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Отправлено')
                    ->dateTime('d.m.Y H:i:s')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true), // Скрываем по умолчанию
                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Обновлено')
                    ->dateTime('d.m.Y H:i:s')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true), // Скрываем по умолчанию
            ])
            ->filters([
                Tables\Filters\Filter::make('created_at')
                    ->form([
                        Forms\Components\DatePicker::make('created_from')
                            ->label('С даты'),
                        Forms\Components\DatePicker::make('created_until')
                            ->label('По дату'),
                    ])
                    ->query(function (Builder $query, array $data): Builder {
                        return $query
                            ->when(
                                $data['created_from'],
                                fn (Builder $query, $date): Builder => $query->whereDate('created_at', '>=', $date),
                            )
                            ->when(
                                $data['created_until'],
                                fn (Builder $query, $date): Builder => $query->whereDate('created_at', '<=', $date),
                            );
                    }),
                // Можно добавить фильтры по другим полям
                Tables\Filters\SelectFilter::make('service')
                    ->label('Услуга')
                    ->options([
                        'it-outsourcing' => 'IT-аутсорсинг',
                        'computer-maintenance' => 'Абонентское обслуживание компьютеров',
                        'it-support' => 'IT-поддержка',
                        'software-maintenance' => 'Обслуживание ПО',
                        'network-infrastructure' => 'Создание IT-инфраструктуры',
                        'wireless-network' => 'Проектирование и монтаж беспроводной сети',
                        'local-network' => 'Монтаж локальной сети (ЛВС)',
                        'network-administration' => 'Администрирование сети',
                        'ip-telephony' => 'IP-телефония для бизнеса',
                        'server-administration' => 'Администрирование серверов',
                        'server-maintenance' => 'Обслуживание серверов',
                        'server-setup' => 'Настройка и установка серверов',
                        '1c-server-support' => 'Поддержка серверов 1С',
                        'it-audit' => 'IT-аудит',
                        'it-consulting' => 'IT-консультация',
                        'antivirus-protection' => 'Антивирусная защита',
                        'data-recovery' => 'Восстановление данных',
                        '1c-support' => 'Поддержка и сопровождение 1С',
                        '1c-implementation' => 'Внедрение 1С',
                        '1c-licenses' => 'Лицензии 1С',
                    ]),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(), // Действие для просмотра деталей
                // Tables\Actions\EditAction::make(), // Можно убрать, если не нужно редактирование
                Tables\Actions\DeleteAction::make(), // Действие для удаления
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(), // Массовое удаление
                ]),
            ])
            ->defaultSort('created_at', 'desc'); // Сортировка по умолчанию - новые сверху
    }

    public static function getRelations(): array
    {
        return [
            // Если у ContactSubmission есть отношения с другими моделями, они указываются здесь
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListContactSubmissions::route('/'),
            // 'create' => Pages\CreateContactSubmission::route('/create'), // Можно убрать, если создание не нужно
           /* 'view' => Pages\ViewContactSubmission::route('/{record}'), // Страница просмотра деталей*/
            // 'edit' => Pages\EditContactSubmission::route('/{record}/edit'), // Можно убрать, если редактирование не нужно
        ];
    }

    public static function getNavigationLabel(): string
    {
        return 'Обращения'; // Название в меню навигации
    }

    public static function getModelLabel(): string
    {
        return 'Обращение'; // Название одной записи
    }

    public static function getPluralModelLabel(): string
    {
        return 'Обращения'; // Название во множественном числе
    }
}
