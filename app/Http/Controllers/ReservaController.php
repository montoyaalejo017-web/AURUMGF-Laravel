<?php

namespace App\Http\Controllers;

use App\Models\Cabana;
use App\Models\Cliente;
use App\Models\Reserva;
use Illuminate\Http\Request;

class ReservaController extends Controller
{
    public function index()
    {
        $reservas = Reserva::with(['cliente', 'cabana'])
            ->latest()
            ->get();

        return view('reservas.index', compact('reservas'));
    }

    public function create()
    {
        $clientes = Cliente::orderBy('nombre')->get();
        $cabanas = Cabana::orderBy('nombre')->get();

        return view('reservas.create', compact('clientes', 'cabanas'));
    }

    public function store(Request $request)
{
    $datos = $request->validate([
        'cliente_id' => 'required|exists:clientes,id',
        'cabana_id' => 'required|exists:cabanas,id',
        'fecha_entrada' => 'required|date',
        'fecha_salida' => 'required|date|after:fecha_entrada',
        'cantidad_huespedes' => 'required|integer|min:1',
        'estado' => 'required|in:pendiente,confirmada,cancelada,finalizada',
        'observaciones' => 'nullable|string',
    ]);

    $cabana = Cabana::findOrFail($datos['cabana_id']);

    // Verificar capacidad de la cabaña
    if ($datos['cantidad_huespedes'] > $cabana->capacidad) {
        return back()
            ->withInput()
            ->withErrors([
                'cantidad_huespedes' => 'La cantidad de huéspedes supera la capacidad de la cabaña seleccionada.',
            ]);
    }

    // Verificar disponibilidad de la cabaña
    $reservaExistente = Reserva::where('cabana_id', $datos['cabana_id'])
        ->whereIn('estado', ['pendiente', 'confirmada'])
        ->where(function ($query) use ($datos) {
            $query->where('fecha_entrada', '<', $datos['fecha_salida'])
                  ->where('fecha_salida', '>', $datos['fecha_entrada']);
        })
        ->exists();

    if ($reservaExistente) {
        return back()
            ->withInput()
            ->withErrors([
                'fecha_entrada' => 'La cabaña seleccionada no está disponible para esas fechas.',
            ]);
    }

    // Calcular cantidad de noches
    $fechaEntrada = \Carbon\Carbon::parse($datos['fecha_entrada']);
    $fechaSalida = \Carbon\Carbon::parse($datos['fecha_salida']);

    $noches = $fechaEntrada->diffInDays($fechaSalida);

    // Calcular precio total desde el servidor
    $datos['precio_total'] = $noches * $cabana->precio_noche;

    // Crear reserva
    Reserva::create($datos);

    return redirect()
        ->route('reservas.index')
        ->with('success', 'Reserva creada correctamente.');
}

    public function show(Reserva $reserva)
    {
        $reserva->load(['cliente', 'cabana']);

        return view('reservas.show', compact('reserva'));
    }

    public function edit(Reserva $reserva)
    {
        $clientes = Cliente::orderBy('nombre')->get();
        $cabanas = Cabana::orderBy('nombre')->get();

        return view('reservas.edit', compact(
            'reserva',
            'clientes',
            'cabanas'
        ));
    }

    public function update(Request $request, Reserva $reserva)
{
    $datos = $request->validate([
        'cliente_id' => 'required|exists:clientes,id',
        'cabana_id' => 'required|exists:cabanas,id',
        'fecha_entrada' => 'required|date',
        'fecha_salida' => 'required|date|after:fecha_entrada',
        'cantidad_huespedes' => 'required|integer|min:1',
        'estado' => 'required|in:pendiente,confirmada,cancelada,finalizada',
        'observaciones' => 'nullable|string',
    ]);

    $cabana = Cabana::findOrFail($datos['cabana_id']);

    // Verificar capacidad de la cabaña
    if ($datos['cantidad_huespedes'] > $cabana->capacidad) {
        return back()
            ->withInput()
            ->withErrors([
                'cantidad_huespedes' =>
                    'La cantidad de huéspedes supera la capacidad de la cabaña seleccionada.',
            ]);
    }

    // Verificar disponibilidad de la cabaña
    // Excluimos la reserva que estamos editando.
    $reservaExistente = Reserva::where('cabana_id', $datos['cabana_id'])
        ->where('id', '!=', $reserva->id)
        ->whereIn('estado', ['pendiente', 'confirmada'])
        ->where(function ($query) use ($datos) {
            $query->where('fecha_entrada', '<', $datos['fecha_salida'])
                  ->where('fecha_salida', '>', $datos['fecha_entrada']);
        })
        ->exists();

    if ($reservaExistente) {
        return back()
            ->withInput()
            ->withErrors([
                'fecha_entrada' =>
                    'La cabaña seleccionada no está disponible para esas fechas.',
            ]);
    }

    // Calcular cantidad de noches
    $fechaEntrada = \Carbon\Carbon::parse($datos['fecha_entrada']);
    $fechaSalida = \Carbon\Carbon::parse($datos['fecha_salida']);

    $noches = $fechaEntrada->diffInDays($fechaSalida);

    // Calcular precio desde el servidor
    $datos['precio_total'] = $noches * $cabana->precio_noche;

    // Actualizar reserva
    $reserva->update($datos);

    return redirect()
        ->route('reservas.index')
        ->with('success', 'Reserva actualizada correctamente.');
}

    public function destroy(Reserva $reserva)
    {
        $reserva->delete();

        return redirect()
            ->route('reservas.index')
            ->with('success', 'Reserva eliminada correctamente.');
    }
}