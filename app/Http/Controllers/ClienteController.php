<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\ClienteRequest;
use App\Models\Empresa;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        if (Auth::user()->rol->name == 'SuperAdmin') {
            $clientes = Cliente::paginate();

            return view('cliente.index', compact('clientes'))
                ->with('i', ($request->input('page', 1) - 1) * $clientes->perPage());
        } else {
            $empresa = Empresa::where('id', Auth::user()->empresa_id)->first();
            $clientes = Cliente::where('id', $empresa->id)->paginate();
            return view('cliente.index', compact('clientes'))
                ->with('i', ($request->input('page', 1) - 1) * $clientes->perPage());
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $cliente = new Cliente();
        if (Auth::user()->rol->name == 'SuperAdmin') {
            $empresas = Empresa::all();
        } else {
            $empresas = Empresa::where('id', Auth::user()->empresa_id)->get();
        }
        return view('cliente.create', compact('cliente', 'empresas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ClienteRequest $request): RedirectResponse
    {

        Cliente::create($request->validated());

        return Redirect::route('clientes.index')
            ->with('success', 'Cliente created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $cliente = Cliente::find($id);

        return view('cliente.show', compact('cliente'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $cliente = Cliente::find($id);

        return view('cliente.edit', compact('cliente'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ClienteRequest $request, Cliente $cliente): RedirectResponse
    {
        $cliente->update($request->validated());

        return Redirect::route('clientes.index')
            ->with('success', 'Cliente updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        Cliente::find($id)->delete();

        return Redirect::route('clientes.index')
            ->with('success', 'Cliente deleted successfully');
    }
}
