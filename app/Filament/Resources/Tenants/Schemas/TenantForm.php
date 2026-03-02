<?php

namespace App\Filament\Resources\Tenants\Schemas;

use Filament\Forms;
use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\FileUpload;
use Filament\Schemas\Components\Section as ComponentsSection;

class TenantForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                ComponentsSection::make('Información General')
                    ->columns(3)
                    ->schema([
                        TextInput::make('nombre')
                            ->label('Nombre Oficial')
                            ->required()
                            ->maxLength(255),

                        TextInput::make('nombre_corto')
                            ->label('Nombre Corto')
                            ->maxLength(255),

                        TextInput::make('nit')
                            ->label('NIT')
                            ->required()
                            ->maxLength(50),

                        TextInput::make('anio_fundacion')
                            ->label('Año de Fundación')
                            ->numeric()
                            ->minValue(1900)
                            ->maxValue(now()->year),

                        Select::make('tipo_club')
                            ->label('Tipo de Club')
                            ->options([
                                'formativo' => 'Formativo',
                                'amateur' => 'Amateur',
                                'profesional' => 'Profesional',
                            ])
                            ->required(),

                        TextInput::make('colores_oficiales')
                            ->label('Colores Oficiales')
                            ->helperText('Ejemplo: Rojo y Blanco'),

                        FileUpload::make('escudo_url')
                            ->label('Escudo del Club')
                            ->image()
                            ->directory('escudos'),

                        TextInput::make('direccion')
                            ->label('Dirección'),

                        TextInput::make('ciudad')
                            ->label('Ciudad')
                            ->required(),

                        TextInput::make('pais')
                            ->label('País')
                            ->required(),

                        TextInput::make('email_corporativo')
                            ->label('Email Corporativo')
                            ->email()
                            ->required()
                            ->maxLength(255),

                        TextInput::make('telefono')
                            ->label('Teléfono'),

                        TextInput::make('sitio_web')
                            ->label('Sitio Web')
                            ->url(),

                        TextInput::make('subdominio')
                            ->label('Subdominio')
                            ->required()
                            ->maxLength(255),

                        Select::make('estado')
                            ->label('Estado')
                            ->options([
                                'activo' => 'Activo',
                                'suspendido' => 'Suspendido',
                            ])
                            ->required(),
                    ]),

                ComponentsSection::make('Encargado')
                    ->columns(2)
                    ->schema([
                        TextInput::make('encargado_nombre')
                            ->label('Nombre del Encargado')
                            ->required()
                            ->maxLength(255),

                        TextInput::make('encargado_email')
                            ->label('Email del Encargado')
                            ->email()
                            ->maxLength(255),

                        TextInput::make('encargado_telefono')
                            ->label('Teléfono del Encargado')
                            ->maxLength(50),
                    ]),
            ]);
    }
}