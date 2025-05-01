@extends('backend.menus.superior')

@section('content-admin-css')
    <link href="{{ asset('css/adminlte.min.css') }}" type="text/css" rel="stylesheet" />
    <link href="{{ asset('css/dataTables.bootstrap4.css') }}" type="text/css" rel="stylesheet" />
    <link href="{{ asset('css/toastr.min.css') }}" type="text/css" rel="stylesheet" />
    <link href="{{ asset('css/buttons_estilo.css') }}" rel="stylesheet">
    <style>
        .eventos-card {
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            border: none;
            transition: all 0.3s ease;
            overflow: hidden;
        }
        
        .eventos-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.15);
        }
        
        .eventos-header {
            background: linear-gradient(135deg, #43cea2 0%, #185a9d 100%);
            color: white;
            padding: 20px;
            text-align: center;
        }
        
        .eventos-body {
            padding: 25px;
        }
        
        .custom-table {
            border-collapse: separate;
            border-spacing: 0;
            width: 100%;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
        }
        
        .custom-table thead th {
            background-color: #3498db;
            color: white;
            font-weight: 600;
            text-transform: uppercase;
            font-size: 0.85rem;
            letter-spacing: 0.5px;
            padding: 15px;
            border: none;
        }
        
        .custom-table tbody tr {
            transition: all 0.3s ease;
        }
        
        .custom-table tbody tr:hover {
            background-color: #f8f9fa;
            transform: scale(1.01);
        }
        
        .custom-table tbody td {
            padding: 15px;
            border-bottom: 1px solid #e9ecef;
            vertical-align: middle;
        }
        
        .custom-table tbody tr:last-child td {
            border-bottom: none;
        }
        
        .badge-fecha {
            background: linear-gradient(135deg, #43cea2 0%, #185a9d 100%);
            color: white;
            font-weight: 500;
            padding: 8px 12px;
            border-radius: 20px;
            font-size: 0.75rem;
            display: inline-block;
        }
        
        .evento-titulo {
            font-weight: 600;
            color: #333;
            margin-bottom: 5px;
            font-size: 1.1rem;
        }
        
        .evento-lugar {
            display: flex;
            align-items: center;
            color: #555;
        }
        
        .evento-lugar i {
            margin-right: 5px;
            color: #3498db;
        }
        
        .evento-desc {
            color: #666;
            line-height: 1.5;
        }
        
        .empty-state {
            text-align: center;
            padding: 50px 20px;
        }
        
        .empty-state-icon {
            font-size: 4rem;
            color: #e0e0e0;
            margin-bottom: 20px;
        }
        
        .empty-state-text {
            color: #888;
            font-size: 1.1rem;
        }
        
        .page-title {
            position: relative;
            margin-bottom: 10px;
        }
        
        .page-title::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 0;
            width: 50px;
            height: 3px;
            background: linear-gradient(135deg, #43cea2 0%, #185a9d 100%);
        }
        
        .animation-fade-in {
            animation: fadeIn 0.8s ease-in-out;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        .action-btn {
            background: linear-gradient(135deg, #43cea2 0%, #185a9d 100%);
            border: none;
            border-radius: 50px;
            padding: 10px 25px;
            color: white;
            font-weight: 600;
            margin-top: 20px;
            transition: all 0.3s ease;
            box-shadow: 0 5px 15px rgba(67, 206, 162, 0.3);
        }
        
        .action-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 7px 25px rgba(67, 206, 162, 0.5);
        }
        
        .table th.fecha-column {
            width: 120px;
            min-width: 120px;
        }
        .table th.nombre-column {
            width: 25%;
        }
        .table th.lugar-column {
            width: 20%;
        }
        .table th.descripcion-column {
            width: 35%;
        }
    </style>
@stop

<div class="container animation-fade-in" style="margin-top: 40px; margin-bottom: 40px;">
    @if(isset($eventos))
        <div class="card eventos-card">
            <div class="eventos-header">
                <h3 class="m-0"><i class="fas fa-calendar-alt mr-2"></i> Lista de Eventos</h3>
                <p class="mt-2 mb-0">Datos importados desde XML</p>
            </div>
            <div class="card-body eventos-body">
                <div class="table-responsive">
                    <table class="table custom-table">
                        <thead>
                            <tr>
                                <th class="nombre-column"><i class="fas fa-bookmark mr-2"></i>Nombre del Evento</th>
                                <th class="fecha-column"><i class="fas fa-clock mr-2"></i>Fecha</th>
                                <th class="lugar-column"><i class="fas fa-map-marker-alt mr-2"></i>Lugar</th>
                                <th class="descripcion-column"><i class="fas fa-info-circle mr-2"></i>Descripción</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($eventos['evento'] as $evento)
                                <tr>
                                    <td>
                                        <div class="evento-titulo">{{ $evento['nombre'] }}</div>
                                    </td>
                                    <td>
                                        <span class="badge-fecha">
                                            <i class="far fa-calendar mr-1"></i> {{ $evento['fecha'] }}
                                        </span>
                                    </td>
                                    <td>
                                        <div class="evento-lugar">
                                            <i class="fas fa-map-pin"></i> {{ $evento['lugar'] }}
                                        </div>
                                    </td>
                                    <td>
                                        <div class="evento-desc">{{ $evento['descripcion'] }}</div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="text-center">
                    <a href="{{ route('admin.calculadora') }}" class="btn action-btn">
                        <i class="fas fa-calculator mr-2"></i> Ir a Calculadora
                    </a>
                </div>
            </div>
        </div>
    @else
        <div class="card eventos-card">
            <div class="card-body">
                <div class="empty-state">
                    <div class="empty-state-icon">
                        <i class="fas fa-calendar-times"></i>
                    </div>
                    <h4>No hay eventos disponibles</h4>
                    <p class="empty-state-text">No se encontraron datos de eventos en el archivo XML.</p>
                    <a href="{{ route('admin.leer.eventos') }}" class="btn action-btn">
                        <i class="fas fa-sync mr-2"></i> Cargar Eventos
                    </a>
                </div>
            </div>
        </div>
    @endif
</div>

@section('archivos-js')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Añadir animación a las filas de la tabla
        const rows = document.querySelectorAll('tbody tr');
        rows.forEach((row, index) => {
            row.style.animation = `fadeIn 0.5s ease forwards ${index * 0.1}s`;
            row.style.opacity = '0';
        });
    });
</script>
@stop
