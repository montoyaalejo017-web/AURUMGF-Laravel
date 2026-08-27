<?php

namespace App\Http\Controllers;

use App\Models\Cabana;
use Illuminate\Http\Request;

class CabanaController extends Controller
{
    public function index()
    {
        $cabanas = Cabana::all();

        return view('cabanas.index', compact('cabanas'));
    }

    public function create()
    {
        return view('cabanas.create');
    }

    public function store(Request $request)
    {
        $datos = $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'capacidad' => 'required|integer|min:1',
            'precio_noche' => 'required|numeric|min:0',
            'estado' => 'required|string|max:50',
        ]);

        Cabana::create($datos);

        return redirect()
            ->route('cabanas.index')
            ->with('success', 'Cabaña creada correctamente.');
    }

    public function show(Cabana $cabana)
    {
        return view('cabanas.show', compact('cabana'));
    }

    public function edit(Cabana $cabana)
    {
        return view('cabanas.edit', compact('cabana'));
    }

    public function update(Request $request, Cabana $cabana)
    {
        $datos = $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'capacidad' => 'required|integer|min:1',
            'precio_noche' => 'required|numeric|min:0',
            'estado' => 'required|string|max:50',
        ]);

        $cabana->update($datos);

        return redirect()
            ->route('cabanas.index')
            ->with('success', 'Cabaña actualizada correctamente.');
    }

    public function destroy(Cabana $cabana)
    {
        $cabana->delete();

        return redirect()
            ->route('cabanas.index')
            ->with('success', 'Cabaña eliminada correctamente.');
    }
}