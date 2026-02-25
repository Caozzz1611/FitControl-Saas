<?php

namespace App\Filament\Resources\EquipoUsers\Pages;

use App\Filament\Resources\EquipoUsers\EquipoUserResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditEquipoUser extends EditRecord
{
    protected static string $resource = EquipoUserResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
