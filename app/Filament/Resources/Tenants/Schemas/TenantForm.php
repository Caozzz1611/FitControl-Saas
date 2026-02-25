<?php

namespace App\Filament\Resources\Tenants\Schemas;

use Filament\Forms;
use Filament\Schemas\Schema;

class TenantForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->schema([
                Forms\Components\TextInput::make('nombre')
                    ->label('Nombre del Tenant')
                    ->required()
                    ->maxLength(255),

                Forms\Components\TextInput::make('subdominio')
                    ->label('Subdominio')
                    ->required()
                    ->maxLength(255),

                Forms\Components\Select::make('estado')
                    ->label('Estado')
                    ->options([
                        'activo' => 'Activo',
                        'inactivo' => 'Inactivo',
                    ])
                    ->required(),
            ]);
    }
}
