<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;
use App\Models\AsistenciaEntrenamiento;
use Illuminate\Support\Facades\DB;
use BezhanSalleh\FilamentShield\Traits\HasWidgetShield;

class AsistenciaPorMes extends ChartWidget
{
    use HasWidgetShield;
    protected ?string $heading = 'Asistencia a entrenamientos';

    protected int | string | array $columnSpan = '2';

   /*  public static function canView(): bool
    {
        return auth()->user()->can('View: AsistenciaPorMes');
    } */

    protected function getData(): array
    {
        $data = AsistenciaEntrenamiento::select(
                DB::raw('MONTH(created_at) as mes'),
                DB::raw('SUM(CASE WHEN presente = 1 THEN 1 ELSE 0 END) as presentes'),
                DB::raw('SUM(CASE WHEN presente = 0 THEN 1 ELSE 0 END) as ausentes')
            )
            ->groupBy('mes')
            ->orderBy('mes')
            ->get();

        return [
            'datasets' => [
                [
                    'label' => 'Presentes',
                    'data' => $data->pluck('presentes'),
                ],
                [
                    'label' => 'Ausentes',
                    'data' => $data->pluck('ausentes'),
                ],
            ],
            'labels' => $data->pluck('mes')->map(fn ($mes) => $this->nombreMes($mes)),
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }

    private function nombreMes(int $mes): string
    {
        return [
            1 => 'Enero', 2 => 'Febrero', 3 => 'Marzo',
            4 => 'Abril', 5 => 'Mayo', 6 => 'Junio',
            7 => 'Julio', 8 => 'Agosto', 9 => 'Septiembre',
            10 => 'Octubre', 11 => 'Noviembre', 12 => 'Diciembre',
        ][$mes] ?? '';
    }
}
