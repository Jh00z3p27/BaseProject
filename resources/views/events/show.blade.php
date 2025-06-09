@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Detalles del Evento</h2>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $evento->nombre_evento }}</h5>
            <p class="card-text"><strong>Fecha:</strong> {{ $evento->fecha }}</p>
            <p class="card-text"><strong>Lugar:</strong> {{ $evento->lugar }}</p>
            <p class="card-text"><strong>Descripción:</strong> {{ $evento->descripcion }}</p>

            <a href="{{ route('events.index') }}" class="btn btn-secondary">Volver</a>
        </div>
    </div>
</div>
@endsection
