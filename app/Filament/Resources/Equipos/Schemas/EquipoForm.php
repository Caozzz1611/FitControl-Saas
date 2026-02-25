<?php

namespace App\Filament\Resources\Equipos\Schemas;

use Filament\Forms;
use Filament\Schemas\Schema;

class EquipoForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->schema([
                Forms\Components\TextInput::make('nombre')
                    ->label('Nombre del Equipo')
                    ->required(),

                Forms\Components\Select::make('categoria')
                    ->label('Categoría')
                    ->options([
                        'profesional' => 'Profesional',
                        'amateur' => 'Amateur',
                        'formativo' => 'Formativo',
                    ])
                    ->required(),

                Forms\Components\FileUpload::make('logo_equipo')
                    ->label('Logo del Equipo')
                    ->disk('public')
                    ->image(),

                Forms\Components\TextInput::make('ubi_equipo')
                    ->label('Ubicación'),

                Forms\Components\TextInput::make('contacto_equipo')
                    ->label('Contacto'),

                Forms\Components\TextInput::make('categoria_equipo')
                    ->label('Subcategoría'),

                // Asignar tenant_id automáticamente
                Forms\Components\Hidden::make('tenant_id')
                    ->default(fn () => auth()->user()->tenant_id),
            ]);
    }
}
