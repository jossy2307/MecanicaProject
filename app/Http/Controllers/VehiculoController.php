<?php

namespace App\Http\Controllers;

use App\Models\Vehiculo;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\VehiculoRequest;
use App\Models\Cliente;
use App\Models\VehiculoDetalle;
use App\Models\VehiculoPrecio;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class VehiculoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $vehiculos = Vehiculo::paginate();

        return view('vehiculo.index', compact('vehiculos'))
            ->with('i', ($request->input('page', 1) - 1) * $vehiculos->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $vehiculo = new Vehiculo();
        $clientes = Cliente::all();
        return view('vehiculo.create', compact('vehiculo', 'clientes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(VehiculoRequest $request): RedirectResponse
    {
        $request->validated();
        $request->merge([
            'estado_vehiculo_id' => 1,
            'user_id' => Auth::user()->id,
        ]);

        Vehiculo::create($request->all());

        return Redirect::route('vehiculos.index')
            ->with('success', 'Vehiculo created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $vehiculo = Vehiculo::find($id);

        return view('vehiculo.show', compact('vehiculo'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $vehiculo = Vehiculo::find($id);

        return view('vehiculo.edit', compact('vehiculo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(VehiculoRequest $request, Vehiculo $vehiculo): RedirectResponse
    {
        $vehiculo->update($request->validated());

        return Redirect::route('vehiculos.index')
            ->with('success', 'Vehiculo updated successfully');
    }
    public function updateEstado($id): RedirectResponse
    {
        $vehiculo = Vehiculo::with('vehiculoDetalles')->find($id);

        if ($vehiculo->estado_vehiculo_id == 1) {
            $vehiculo->estado_vehiculo_id = 2;
            $vehiculo->save();
            return Redirect::route('vehiculos.index')
                ->with('success', 'Vehiculo updated successfully');
        }
        if ($vehiculo->estado_vehiculo_id == 2) {
            return Redirect::route('vehiculos.index')
                ->with('success', 'Revise la aplicación movil');
        }
        if ($vehiculo->estado_vehiculo_id == 3) {
            return redirect::route('vehiculos.precio', compact('vehiculo'));
        }
        if ($vehiculo->estado_vehiculo_id == 4) {
            $vehiculoDetalles = VehiculoDetalle::where('vehiculo_id', $vehiculo->id)->get();
            $vehiculo->estado_vehiculo_id = 5;
            $vehiculo->valores_mecanicos = $vehiculoDetalles->sum('valor');
            $vehiculo->save();
            return Redirect::route('vehiculos.index');
        }
        if ($vehiculo->estado_vehiculo_id == 5) {
            return redirect::route('vehiculos.avaluo', compact('vehiculo'));
        }
    }
    public function precio(Vehiculo $vehiculo): View
    {
        $detalles = VehiculoDetalle::where('vehiculo_id', $vehiculo->id)->get();
        return view('vehiculo.precios', compact('vehiculo', 'detalles'));
    }
    public function avaluo(Vehiculo $vehiculo): View
    {
        $vehiculoPrecio = new VehiculoPrecio();
        return view('vehiculo.avaluo', compact('vehiculo', 'vehiculoPrecio'));
    }
    public function destroy($id): RedirectResponse
    {
        Vehiculo::find($id)->delete();

        return Redirect::route('vehiculos.index')
            ->with('success', 'Vehiculo deleted successfully');
    }
}
