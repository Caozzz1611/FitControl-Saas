<?php

namespace App\Filament\Resources\Tenants\Pages;

use App\Filament\Resources\Tenants\TenantResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListTenants extends ListRecords
{
    protected static string $resource = TenantResource::class;

      public function getTitle(): string
    {
        return 'Tenant';
    }

    public function getBreadcrumbs(): array
    {
        return [
            TenantResource::getUrl('index') => 'Tenants',
            'Listado',
        ];
    }

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
