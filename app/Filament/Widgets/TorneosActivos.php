<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\Torneo;
use BezhanSalleh\FilamentShield\Traits\HasWidgetShield;

class TorneosActivos extends StatsOverviewWidget
{
    use HasWidgetShield;
    
    protected function getStats(): array
    {
        $activos = Torneo::where('estado', 'activo')->count();

        return [
            Stat::make('Torneos activos', $activos)
                ->description('En curso actualmente')
                ->icon('heroicon-o-trophy'),
        ];
    }

    protected int | string | array $columnSpan = 2;
}
