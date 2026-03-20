<?php

namespace App\Filament\Widgets;

use App\Models\Pago;
use Carbon\Carbon;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use BezhanSalleh\FilamentShield\Traits\HasWidgetShield;

class PagosDelMes extends StatsOverviewWidget
{
    use HasWidgetShield;
    
    protected int | string | array $columnSpan = 2;

    protected function getStats(): array
    {
        $query = Pago::whereMonth('fecha', Carbon::now()->month);

        if (!auth()->user()->hasRole('super_admin')) {
            $query->where('tenant_id', auth()->user()->tenant_id);
        }

        return [
            Stat::make('Pagos este mes', $query->sum('monto'))
                ->description('Total recaudado este mes')
                ->icon('heroicon-o-currency-dollar')
                ->color('success'),
        ];
    }
}
