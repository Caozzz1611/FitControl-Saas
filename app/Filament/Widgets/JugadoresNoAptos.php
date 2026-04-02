<?php

namespace App\Filament\Widgets;

use App\Models\HistorialMedico;
use Leandrocfe\FilamentApexCharts\Widgets\ApexChartWidget;

class JugadoresNoAptos extends ApexChartWidget
{
    protected static ?string $heading = 'Estado de jugadores';

    protected int | string | array $columnSpan = 2;

    protected function getOptions(): array
    {
        $noAptos = HistorialMedico::whereRaw('"apto" = false')
            ->selectRaw('COUNT(DISTINCT user_id) as total')
            ->value('total');

        $aptos = HistorialMedico::whereRaw('"apto" = true')
            ->selectRaw('COUNT(DISTINCT user_id) as total')
            ->value('total');

        return [
            'chart' => [
                'type' => 'donut',
            ],
            'colors' => [
                '#F8A712',
                '#FF3F07',
                '#FECE45',
            ],
            'series' => [(int) $aptos, (int) $noAptos],
            'labels' => ['Aptos', 'No aptos'],
        ];
    }
}