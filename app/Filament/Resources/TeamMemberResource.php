<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TeamMemberResource\Pages;
use App\Models\TeamMember;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

class TeamMemberResource extends Resource
{
    protected static ?string $model = TeamMember::class;

    protected static ?string $pluralModelLabel = 'Команда';

    protected static ?string $navigationIcon = 'heroicon-o-users';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),

                Forms\Components\TextInput::make('role')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('order')
                    ->label('Порядок отображения')
                    ->numeric()
                    ->default(0)
                    ->minValue(0),

                Forms\Components\FileUpload::make('photo_path')
                    ->label('Фотография')
                    ->image()
                    ->directory('team')
                    ->disk('public')
                    ->visibility('public')
                    ->required()
                    ->imagePreviewHeight('250')
                    ->loadingIndicatorPosition('left')
                    ->removeUploadedFileButtonPosition('right')
                    ->uploadButtonPosition('left')
                    ->panelLayout('compact')
                    ->preserveFilenames()
                    ->storeFileNamesIn('original_photo_name'),

                Forms\Components\Repeater::make('social_links')
                    ->schema([
                        Forms\Components\TextInput::make('type')
                            ->label('Тип (например: telegram, email)')
                            ->required(),
                        Forms\Components\TextInput::make('url')
                            ->label('Ссылка или email')
                            ->required(),
                    ])
                    ->columns(2)
                    ->defaultItems(1),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('role'),
                Tables\Columns\ImageColumn::make('photo_path'),
                Tables\Columns\TextColumn::make('order')
                    ->sortable()
                    ->alignCenter(),
            ])
            ->filters([])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTeamMembers::route('/'),
            'create' => Pages\CreateTeamMember::route('/create'),
            'edit' => Pages\EditTeamMember::route('/{record}/edit'),
        ];
    }
}
