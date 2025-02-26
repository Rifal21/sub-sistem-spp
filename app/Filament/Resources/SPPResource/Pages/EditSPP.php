<?php

namespace App\Filament\Resources\SPPResource\Pages;

use App\Filament\Resources\SPPResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSPP extends EditRecord
{
    protected static string $resource = SPPResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
