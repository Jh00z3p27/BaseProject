@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Listado de Eventos</h2>

    {{-- Mensajes de sesión --}}
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
        </div>
    @endif

    {{-- Botón crear --}}
    <a href="{{ route('events.create') }}" class="btn btn-primary mb-3">Crear Evento</a>

    {{-- Tabla de eventos --}}
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Fecha</th>
                <th>Lugar</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($eventos as $evento)
                <tr>
                    <td>{{ $evento->nombre_evento }}</td>
                    <td>{{ $evento->fecha }}</td>
                    <td>{{ $evento->lugar }}</td>
                    <td>
                        <a href="{{ route('events.show', $evento->id) }}" class="btn btn-info btn-sm">Ver</a>
                        <a href="{{ route('events.edit', $evento->id) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('events.destroy', $evento->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('¿Eliminar este evento?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">No hay eventos registrados.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
