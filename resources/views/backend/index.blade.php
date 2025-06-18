@extends('layouts.app')

@section('content')
<h2>Lista de Eventos</h2>

<a href="{{ route('events.create') }}" class="btn btn-primary mb-3">Nuevo Evento</a>

<table class="table table-bordered table-hover">
    <thead class="table-dark">
        <tr>
            <th>Nombre</th>
            <th>Fecha</th>
            <th>Lugar</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($eventos as $evento)
            <tr>
                <td>{{ $evento->nombre_evento }}</td>
                <td>{{ $evento->fecha->format('d/m/Y') }}</td>
                <td>{{ $evento->lugar }}</td>
                <td>
                    <a href="{{ route('events.show', $evento->id) }}" class="btn btn-info btn-sm">Ver</a>
                    <a href="{{ route('events.edit', $evento->id) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form action="{{ route('events.destroy', $evento->id) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Estás seguro de eliminar este evento?');">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm">Eliminar</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

{{ $eventos->links() }}
@endsection
@foreach($events as $evento)
    <!-- resto del código -->
    @can('update', $evento)
        <a href="{{ route('events.edit', $evento) }}" class="btn btn-primary">Editar</a>
    @endcan

    @can('delete', $evento)
        <form action="{{ route('events.destroy', $evento) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger">Eliminar</button>
        </form>
    @endcan
@endforeach


<!-- para iniciar con el menu cerrado colocar
 <body class="sidebar-mini sidebar-closed sidebar-collapse" style="height: auto;">
 -->

<body class="hold-transition sidebar-mini">
<div class="wrapper">
    @include("backend.menus.navbar")
    @include("backend.menus.sidebar")

    <div class="content-wrapper" style=" background-color: #fff;">
        <!-- redireccionamiento de vista -->

        <iframe style="width: 100%; resize: initial; overflow: hidden; min-height: 96vh" frameborder="0"  scrolling="" id="frameprincipal" src="{{ route($ruta) }}" name="frameprincipal">
        </iframe>

    </div>

    @include("backend.menus.footer")

</div>


<script src="{{ asset('js/jquery.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/bootstrap.bundle.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/adminlte.min.js') }}" type="text/javascript"></script>


@yield('content-admin-js')

</body>
</html>
