<?php

namespace App\Filament\Resources\ThanksLetterResource\Pages;

use App\Filament\Resources\ThanksLetterResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditThanksLetter extends EditRecord
{
    protected static string $resource = ThanksLetterResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
