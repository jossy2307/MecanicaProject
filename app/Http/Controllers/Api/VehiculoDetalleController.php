<?php

namespace App\Http\Controllers\Api;

use App\Models\VehiculoDetalle;
use Illuminate\Http\Request;
use App\Http\Requests\VehiculoDetalleRequest;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Http\Resources\VehiculoDetalleResource;
use App\Models\Vehiculo;

class VehiculoDetalleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $vehiculoDetalles = VehiculoDetalle::paginate();

        return VehiculoDetalleResource::collection($vehiculoDetalles);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(VehiculoDetalleRequest $request): VehiculoDetalle
    {
        $vehiculo = Vehiculo::find($request->vehiculo_id);
        $vehiculo->estado_vehiculo_id = 3;
        $vehiculo->save();
        return VehiculoDetalle::create($request->validated());
    }

    /**
     * Display the specified resource.
     */
    public function show(VehiculoDetalle $vehiculoDetalle): VehiculoDetalle
    {
        return $vehiculoDetalle;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(VehiculoDetalleRequest $request, VehiculoDetalle $vehiculoDetalle): VehiculoDetalle
    {
        $vehiculoDetalle->update($request->validated());

        return $vehiculoDetalle;
    }

    public function destroy(VehiculoDetalle $vehiculoDetalle): Response
    {
        $vehiculoDetalle->delete();

        return response()->noContent();
    }
}
