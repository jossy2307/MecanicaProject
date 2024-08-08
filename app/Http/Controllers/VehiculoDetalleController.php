<?php

namespace App\Http\Controllers;

use App\Models\VehiculoDetalle;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\VehiculoDetalleRequest;
use App\Models\Vehiculo;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class VehiculoDetalleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $vehiculoDetalles = VehiculoDetalle::paginate();

        return view('vehiculo-detalle.index', compact('vehiculoDetalles'))
            ->with('i', ($request->input('page', 1) - 1) * $vehiculoDetalles->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $vehiculoDetalle = new VehiculoDetalle();

        return view('vehiculo-detalle.create', compact('vehiculoDetalle'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(VehiculoDetalleRequest $request): RedirectResponse
    {
        VehiculoDetalle::create($request->validated());

        return Redirect::route('vehiculo-detalles.index')
            ->with('success', 'VehiculoDetalle created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $vehiculoDetalle = VehiculoDetalle::find($id);

        return view('vehiculo-detalle.show', compact('vehiculoDetalle'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $vehiculoDetalle = VehiculoDetalle::find($id);

        return view('vehiculo-detalle.edit', compact('vehiculoDetalle'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, VehiculoDetalle $vehiculoDetalle): RedirectResponse
    {
        $vehiculo = Vehiculo::find($vehiculoDetalle->vehiculo_id);
        $vehiculo->estado_vehiculo_id = 4;
        $vehiculo->save();
        if (!$vehiculoDetalle->estado) {
            $vehiculoDetalle->valor = $request->valor;
            $vehiculoDetalle->update();
        }
        return Redirect::route('vehiculos.precio', $vehiculoDetalle->vehiculo_id)
            ->with('success', 'VehiculoDetalle updated successfully');
    }

        public function destroy($id): RedirectResponse
    {
        VehiculoDetalle::find($id)->delete();

        return Redirect::route('vehiculo-detalles.index')
            ->with('success', 'VehiculoDetalle deleted successfully');
    }
}
