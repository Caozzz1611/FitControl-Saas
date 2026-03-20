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
        $noAptos = HistorialMedico::where('apto', false)
            ->distinct('user_id')
            ->count('user_id');

        $aptos = HistorialMedico::where('apto', true)
            ->distinct('user_id')
            ->count('user_id');

        return [
            'chart' => [
                'type' => 'donut',
            ],
            'colors' => [
                 '#F8A712',
                '#FF3F07',
                '#FECE45',
            ],

            'series' => [$aptos, $noAptos],
            'labels' => ['Aptos', 'No aptos'],
        ];
    }
}