<?php

namespace App\Filament\Resources\Tenants\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\Filter;
use Filament\Forms\Components\DatePicker;
use AlperenErsoy\FilamentExport\Actions\FilamentExportHeaderAction;
use AlperenErsoy\FilamentExport\Actions\FilamentExportBulkAction;

class TenantsTable
{
    public static function configure(Table $table): Table
    {
        return $table
                        ->columns([
                    TextColumn::make('nombre')
                        ->label('Nombre Oficial')
                        ->searchable()
                        ->sortable(),

                    TextColumn::make('nombre_corto')
                        ->label('Nombre Corto')
                        ->searchable()
                        ->toggleable(),

                    TextColumn::make('nit')
                        ->label('NIT')
                        ->searchable()
                        ->sortable(),

                    TextColumn::make('tipo_club')
                        ->label('Tipo')
                        ->badge()
                        ->colors([
                            'primary' => 'formativo',
                            'warning' => 'amateur',
                            'success' => 'profesional',
                        ])
                        ->sortable(),

                    TextColumn::make('ciudad')
                        ->label('Ciudad')
                        ->searchable()
                        ->toggleable(),

                    TextColumn::make('pais')
                        ->label('País')
                        ->toggleable(),

                    TextColumn::make('email_corporativo')
                        ->label('Email')
                        ->searchable()
                        ->toggleable(),

                    TextColumn::make('subdominio')
                        ->label('Subdominio')
                        ->searchable()
                        ->sortable(),

                    TextColumn::make('estado')
                        ->label('Estado')
                        ->badge()
                        ->colors([
                            'success' => 'activo',
                            'danger' => 'suspendido',
                        ])
                        ->sortable(),

                    TextColumn::make('created_at')
                        ->label('Creado')
                        ->dateTime('d/m/Y H:i')
                        ->sortable()
                        ->toggleable(isToggledHiddenByDefault: true),

                    TextColumn::make('updated_at')
                        ->label('Actualizado')
                        ->dateTime('d/m/Y H:i')
                        ->sortable()
                        ->toggleable(isToggledHiddenByDefault: true),
                ])
            ->filters([
                SelectFilter::make('estado')
                    ->label('Estado')
                    ->options([
                        'activo' => 'Activo',
                        'inactivo' => 'Inactivo',
                        'suspendido' => 'Suspendido',
                    ]),

                Filter::make('created_at')
                    ->label('Fecha de creación')
                    ->form([
                        DatePicker::make('desde'),
                        DatePicker::make('hasta'),
                    ])
                    ->query(function ($query, array $data) {
                        return $query
                            ->when($data['desde'], fn($q) => $q->whereDate('created_at', '>=', $data['desde']))
                            ->when($data['hasta'], fn($q) => $q->whereDate('created_at', '<=', $data['hasta']));
                    }),

                Filter::make('updated_at')
                    ->label('Fecha de actualización')
                    ->form([
                        DatePicker::make('desde'),
                        DatePicker::make('hasta'),
                    ])
                    ->query(function ($query, array $data) {
                        return $query
                            ->when($data['desde'], fn($q) => $q->whereDate('updated_at', '>=', $data['desde']))
                            ->when($data['hasta'], fn($q) => $q->whereDate('updated_at', '<=', $data['hasta']));
                    }),
            ])
            ->headerActions([
                FilamentExportHeaderAction::make('export')
                    ->label('Exportar'),
            ])
            ->recordActions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    FilamentExportBulkAction::make('export')
                        ->label('Exportar seleccionados'),
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
