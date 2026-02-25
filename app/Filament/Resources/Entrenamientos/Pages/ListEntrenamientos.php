<?php

namespace App\Filament\Resources\Entrenamientos\Pages;

use App\Filament\Resources\Entrenamientos\EntrenamientoResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListEntrenamientos extends ListRecords
{
    protected static string $resource = EntrenamientoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
