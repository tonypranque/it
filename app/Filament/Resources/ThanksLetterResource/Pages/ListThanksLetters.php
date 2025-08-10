<?php

namespace App\Filament\Resources\ThanksLetterResource\Pages;

use App\Filament\Resources\ThanksLetterResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListThanksLetters extends ListRecords
{
    protected static string $resource = ThanksLetterResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
