<?php

namespace App\Filament\Widgets;

use App\Models\Equipo;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use BezhanSalleh\FilamentShield\Traits\HasWidgetShield;

class TotalEquipos extends StatsOverviewWidget
{
    use HasWidgetShield;
    
    protected int | string | array $columnSpan = 1;
    protected function getStats(): array
    {
        
        $query = Equipo::query();

        if (!auth()->user()->hasRole('super_admin')) {
            $query->where('tenant_id', auth()->user()->tenant_id);
        }

        return [
            Stat::make('Equipos', $query->count())
                ->description('Total de equipos activos')
                ->icon('heroicon-o-flag')
                ->color('primary'),
        ];
    }
}
