<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    // mostrar todos los eventos registradoa
    public function index()
    {
        $eventos = Event::orderBy('fecha', 'asc')->paginate(10);
        return view('events.index', compact('eventos'));
    }

    // mostrar formulario de creación de evento
    public function create()
    {
        return view('events.create');
    }

    // Almacenar un nuevo evento
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre_evento' => 'required|string|max:100|unique:events',
            'fecha' => 'required|date|after_or_equal:today',
            'lugar' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
        ], [
            'nombre_evento.required' => 'El nombre del evento es obligatorio.',
            'nombre_evento.unique' => 'Este nombre de evento ya existe.',
            'fecha.required' => 'La fecha es obligatoria.',
            'fecha.date' => 'Debe ingresar una fecha válida.',
            'fecha.after_or_equal' => 'La fecha debe ser hoy o en el futuro.',
            'lugar.required' => 'El lugar es obligatorio.',
        ]);

        Event::create($validated);

        return redirect()->route('events.index')->with('success', 'Evento creado correctamente.');
    }

    // Mostrar un evento específico
    public function show($id)
    {
        $evento = Event::findOrFail($id);
        return view('events.show', compact('evento'));
    }

    // Mostrar formulario para editar evento
    public function edit($id)
    {
        $evento = Event::findOrFail($id);
        return view('events.edit', compact('evento'));
    }

    // Actualizar evento
    public function update(Request $request, $id)
    {
        $evento = Event::findOrFail($id);

        $validated = $request->validate([
            'nombre_evento' => 'required|string|max:100|unique:events,nombre_evento,' . $evento->id,
            'fecha' => 'required|date|after_or_equal:today',
            'lugar' => 'required|string|max:255',
            'descripción' => 'nullable|string',
        ], [
            'nombre_evento.required' => 'El nombre del evento es obligatorio.',
            'nombre_evento.unique' => 'Este nombre de evento ya existe.',
            'fecha.required' => 'La fecha es obligatoria.',
            'fecha.date' => 'Debe ingresar una fecha válida.',
            'fecha.after_or_equal' => 'La fecha debe ser hoy o en el futuro.',
            'lugar.required' => 'El lugar es obligatorio.',
        ]);

        $evento->update($validated);

        return redirect()->route('events.index')->with('success', 'Evento actualizado correctamente.');
    }

    // Eliminar evento
    public function destroy($id)
    {
        $evento = Event::findOrFail($id);
        $evento->delete();

        return redirect()->route('events.index')->with('success', 'Evento eliminado correctamente.');
    }
}
