<?php

namespace App\Filament\Resources\Torneos\Pages;

use App\Filament\Resources\Torneos\TorneoResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListTorneos extends ListRecords
{
    protected static string $resource = TorneoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
