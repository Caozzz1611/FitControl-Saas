<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\HistorialMedico;
use BezhanSalleh\FilamentShield\Traits\HasWidgetShield;

class JugadoresNoAptos extends StatsOverviewWidget
{
    use HasWidgetShield;
    
    protected function getStats(): array
    {
        $noAptos = HistorialMedico::where('apto', false)
            ->distinct('user_id')
            ->count('user_id');

        return [
            Stat::make('Jugadores no aptos', $noAptos)
                ->description('Lesiones o restricciones médicas')
                ->icon('heroicon-o-heart'),
        ];
    }

    protected int | string | array $columnSpan = 2;
}
