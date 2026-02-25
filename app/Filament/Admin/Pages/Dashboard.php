<?php

namespace App\Filament\Admin\Pages;

use Filament\Pages\Dashboard as BaseDashboard;
use Filament\Widgets\AccountWidget;
use App\Filament\Widgets\TotalUsuarios;
use App\Filament\Widgets\TotalEquipos;
use App\Filament\Widgets\PagosDelMes;
use App\Filament\Widgets\PagosPorMes;
use App\Filament\Widgets\AsistenciaPorMes;
use App\Filament\Widgets\EntrenamientosPorMes;
use App\Filament\Widgets\JugadoresNoAptos;
use App\Filament\Widgets\TorneosActivos;

class Dashboard extends BaseDashboard
{

 public static function canView(): bool
    {
        return auth()->user()->can('View: Dashboard');
    }
    protected static ?string $title = 'Dashboard';

    
    public function getColumns(): int | array
    {
        return [
            'default' => 4,
        ];
    }

    /**
     * Widgets visibles
     */
    public function getWidgets(): array
    {
        return [
            AccountWidget::class,

            TotalUsuarios::class,
            TotalEquipos::class,
            PagosDelMes::class,
            PagosPorMes::class,
            AsistenciaPorMes::class,
            EntrenamientosPorMes::class,
            TorneosActivos::class,
            JugadoresNoAptos::class,

        ];
    }
}
