<?php

namespace App\Filament\Resources\NomDeLaRessourceResource\Pages;

use App\Filament\Resources\NomDeLaRessourceResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditNomDeLaRessource extends EditRecord
{
    protected static string $resource = NomDeLaRessourceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
