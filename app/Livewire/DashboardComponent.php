<?php

namespace App\Livewire;

use App\Models\Vehiculo;
use Asantibanez\LivewireCharts\Models\ColumnChartModel;
use Asantibanez\LivewireCharts\Models\LineChartModel;
use Carbon\Carbon;
use Livewire\Component;

class DashboardComponent extends Component
{
    public $types = ['food', 'shopping', 'entertainment', 'travel', 'other'];

    public $colors = [
        'food' => '#f6ad55',
        'shopping' => '#fc8181',
        'entertainment' => '#90cdf4',
        'travel' => '#66DA26',
        'other' => '#cbd5e0',
    ];

    public $firstRun = true;

    public $showDataLabels = false;

    protected $listeners = [
        'onPointClick' => 'handleOnPointClick',
        'onSliceClick' => 'handleOnSliceClick',
        'onColumnClick' => 'handleOnColumnClick',
        'onBlockClick' => 'handleOnBlockClick',
    ];

    public function handleOnPointClick($point)
    {
        dd($point);
    }

    public function handleOnSliceClick($slice)
    {
        dd($slice);
    }

    public function handleOnColumnClick($column)
    {
        dd($column);
    }

    public function handleOnBlockClick($block)
    {
        dd($block);
    }

    public function render()
    {
        $vehiculosPorMes = Vehiculo::selectRaw('MONTH(created_at) as mes, COUNT(*) as total')
            ->groupBy('mes')
            ->orderBy('mes', 'asc')
            ->get();

        $columnChartModelVehiculos = (new ColumnChartModel())
            ->setTitle('Vehículos X Mes');

        foreach ($vehiculosPorMes as $dato) {
            $columnChartModelVehiculos->addColumn(
                'Mes ' . Carbon::create()->locale('es')->month($dato->mes)->translatedFormat('F'),
                $dato->total,
                '#90cdf4' // Color de la barra
            );
        }
        $modelosMasIngresados = Vehiculo::selectRaw('modelo, COUNT(*) as total')
            ->groupBy('modelo')
            ->orderBy('total', 'desc')
            ->limit(5)
            ->get();

        $columnChartModelModelos = (new ColumnChartModel())
            ->setTitle('Modelos Más Ingresados');

        foreach ($modelosMasIngresados as $modelo) {
            $columnChartModelModelos->addColumn(
                $modelo->modelo,
                $modelo->total,
                '#fc8181' // Color de la barra
            );
        }
        $lineChartModelTotales = (new LineChartModel())
            ->setTitle('Total de Vehículos por Mes')
            ->setSmoothCurve(); // Opción para suavizar la curva de la línea
        $totalesPorMes = Vehiculo::selectRaw('MONTH(created_at) as mes, COUNT(*) as total')
            ->groupBy('mes')
            ->orderBy('mes', 'asc')
            ->get();

        foreach ($totalesPorMes as $total) {
            $lineChartModelTotales->addPoint(
                'Mes ' . Carbon::create()->locale('es')->month($dato->mes)->translatedFormat('F'),
                $total->total
            );
        }
        return view('livewire.dashboard-component')
            ->with([
                'columnChartModelVehiculos' => $columnChartModelVehiculos,
                'columnChartModelModelos' => $columnChartModelModelos,
                'lineChartModelTotales' => $lineChartModelTotales,
            ]);
    }
}
