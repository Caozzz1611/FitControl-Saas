<?php

namespace App\Filament\Resources\Entrenamientos\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\BadgeColumn;
use AlperenErsoy\FilamentExport\Actions\FilamentExportHeaderAction;
use AlperenErsoy\FilamentExport\Actions\FilamentExportBulkAction;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\SelectFilter;
use Filament\Forms\Components\DatePicker;
use Illuminate\Database\Eloquent\Builder;
use App\Models\Equipo;


class EntrenamientosTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
            TextColumn::make('nombre')
                    ->label('Nombre')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('fecha')
                    ->label('Fecha')
                    ->date()
                    ->sortable()
                    ->searchable(),

                TextColumn::make('hora')
                    ->label('Hora')
                    ->sortable(),

                TextColumn::make('ubicacion')
                    ->label('Ubicación')
                    ->searchable(),

                TextColumn::make('equipo.nombre')
                    ->label('Equipo')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('created_at')
                    ->label('Creado')
                    ->dateTime()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
                    ->filters([
            Filter::make('fecha')
                ->label('Rango de fechas')
                ->form([
                    DatePicker::make('desde'),
                    DatePicker::make('hasta'),
                ])
                ->query(fn (Builder $query, array $data) =>
                    $query
                        ->when($data['desde'], fn ($q) =>
                            $q->whereDate('fecha', '>=', $data['desde'])
                        )
                        ->when($data['hasta'], fn ($q) =>
                            $q->whereDate('fecha', '<=', $data['hasta'])
                        )
                ),

            SelectFilter::make('equipo_id')
                ->label('Equipo')
                ->relationship('equipo', 'nombre')
                ->searchable(),

            SelectFilter::make('ubicacion')
                ->label('Ubicación')
                ->options(fn () =>
                    \App\Models\Entrenamiento::pluck('ubicacion', 'ubicacion')
                        ->unique()
                        ->toArray()
                ),

            SelectFilter::make('mes')
                ->label('Mes')
                ->options([
                    '01' => 'Enero',
                    '02' => 'Febrero',
                    '03' => 'Marzo',
                    '04' => 'Abril',
                    '05' => 'Mayo',
                    '06' => 'Junio',
                    '07' => 'Julio',
                    '08' => 'Agosto',
                    '09' => 'Septiembre',
                    '10' => 'Octubre',
                    '11' => 'Noviembre',
                    '12' => 'Diciembre',
                ])
                ->query(fn ($query, $value) =>
                    $query->whereMonth('fecha', $value)
                ),
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

