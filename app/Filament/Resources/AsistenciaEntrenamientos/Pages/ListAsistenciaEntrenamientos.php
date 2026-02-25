<?php

namespace App\Filament\Resources\AsistenciaEntrenamientos\Pages;

use App\Filament\Resources\AsistenciaEntrenamientos\AsistenciaEntrenamientoResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListAsistenciaEntrenamientos extends ListRecords
{
    protected static string $resource = AsistenciaEntrenamientoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
