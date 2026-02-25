<?php

namespace App\Filament\Resources\EquipoUsers\Schemas;

use Filament\Forms;
use Filament\Schemas\Schema;
use App\Models\Equipo;
use App\Models\User;

class EquipoUserForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->schema([
            Forms\Components\Select::make('equipo_id')
                ->label('Equipo')
                ->required()
                ->options(function () {
                    return Equipo::all()->pluck('nombre', 'id');
                })
                ->searchable(),

                Forms\Components\Select::make('user_id')
            ->label('Jugador')
            ->required()
            ->options(function () {
                // Solo usuarios con el rol 'jugador' y del mismo tenant
                return User::role('Jugador')
                    ->where('tenant_id', auth()->user()->tenant_id) // opcional si quieres filtrar por tenant
                    ->pluck('name', 'id');
            })
            ->searchable(),

            Forms\Components\DatePicker::make('fecha_inicio')
                ->label('Fecha de Inicio')
                ->required(),

            Forms\Components\DatePicker::make('fecha_fin')
                ->label('Fecha de Fin')
                ->required(),

            // tenant_id se asigna automáticamente
            Forms\Components\Hidden::make('tenant_id')
                ->default(fn () => auth()->user()->tenant_id)
                ->required(),
        ]);
    }
}
