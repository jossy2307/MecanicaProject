<?php

use App\Models\VehiculoDetalle;

function getEstadoVehiculoType(int $estadoVehiculoTypeId): string
{
    $estadoVehiculoTypes = [
        1 => 'Enviar al siguiente Estado',
        2 => 'Revise la aplicación móvil',
        3 => 'Calcular Precios',
        4 => 'Actualizar Precios',
        5 => 'Calcular Avaluo'
    ];

    return $estadoVehiculoTypes[$estadoVehiculoTypeId] ?? 'N/A';
}
function getTotalPrice($vehiculoDetalles): float
{
    $total = 0;

    foreach ($vehiculoDetalles as $item) {
        $total += $item->valor; // Asegúrate de que 'precio' es el nombre del campo que contiene el precio en tu modelo VehiculoDetalle
    }

    return $total;
}

function formatearNumero($numero, $decimales = 2, $separadorMiles = ',', $separadorDecimal = '.')
{
    return number_format($numero, $decimales, $separadorDecimal, $separadorMiles);
}
