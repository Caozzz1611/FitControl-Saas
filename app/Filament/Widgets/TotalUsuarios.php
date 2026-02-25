<?php

namespace App\Filament\Widgets;

use App\Models\User;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use BezhanSalleh\FilamentShield\Traits\HasWidgetShield;

class TotalUsuarios extends StatsOverviewWidget
{
    use HasWidgetShield;
    
    protected int | string | array $columnSpan = 1;

    protected function getStats(): array
    {
        $query = User::query();

        if (
            auth()->check() &&
            auth()->user()->hasRole('super_admin')
        ) {
            $total = $query->count();
        } 
        else {
            $total = $query
                ->where('tenant_id', auth()->user()->tenant_id)
                ->count();
        }

        return [
            Stat::make('Usuarios', $total)
                ->description('Total de usuarios registrados')
                ->icon('heroicon-o-users')
                ->color('success'),
        ];
    }
}
