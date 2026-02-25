<?php

namespace App\Filament\Resources\Notificacions\Pages;

use App\Filament\Resources\Notificacions\NotificacionResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListNotificacions extends ListRecords
{
    protected static string $resource = NotificacionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
