<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;
use App\Models\Entrenamiento;
use Illuminate\Support\Facades\DB;
use BezhanSalleh\FilamentShield\Traits\HasWidgetShield;

class EntrenamientosPorMes extends ChartWidget
{
    use HasWidgetShield;

    protected ?string $heading = 'Entrenamientos por mes';

    protected int | string | array $columnSpan = 2;

 
    protected function getData(): array
    {
        $data = Entrenamiento::select(
                DB::raw("DATE_FORMAT(fecha, '%Y-%m') as periodo"),
                DB::raw('COUNT(*) as total')
            )
            ->groupBy('periodo')
            ->orderBy('periodo')
            ->get();

        return [
            'datasets' => [
                [
                    'label' => 'Entrenamientos',
                    'data' => $data->pluck('total'),
                ],
            ],
            'labels' => $data->pluck('periodo')->map(fn ($p) => $this->formatearPeriodo($p)),
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }

    private function formatearPeriodo(string $periodo): string
    {
        [$anio, $mes] = explode('-', $periodo);

        $meses = [
            1 => 'Enero', 2 => 'Febrero', 3 => 'Marzo',
            4 => 'Abril', 5 => 'Mayo', 6 => 'Junio',
            7 => 'Julio', 8 => 'Agosto', 9 => 'Septiembre',
            10 => 'Octubre', 11 => 'Noviembre', 12 => 'Diciembre',
        ];

        return $meses[(int) $mes] . ' ' . $anio;
    }
}
