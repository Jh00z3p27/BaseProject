@extends('backend.menus.superior')

@section('content-admin-css')
    <link href="{{ asset('css/adminlte.min.css') }}" type="text/css" rel="stylesheet" />
    <link href="{{ asset('css/toastr.min.css') }}" type="text/css" rel="stylesheet" />
    <style>
        .calc-card {
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            border: none;
            transition: all 0.3s ease;
        }
        
        .calc-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.15);
        }
        
        .calc-header {
            background: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%);
            color: white;
            padding: 20px;
            border-radius: 15px 15px 0 0;
            text-align: center;
        }
        
        .calc-body {
            padding: 30px;
        }
        
        .form-control {
            border-radius: 10px;
            padding: 12px;
            border: 1px solid #e0e0e0;
            transition: all 0.3s ease;
            height: auto;
        }
        
        .form-control:focus {
            box-shadow: 0 0 0 3px rgba(37, 117, 252, 0.2);
            border-color: #2575fc;
        }
        
        .form-select {
            min-width: 100%;
            padding-right: 30px;
            font-size: 16px;
            text-overflow: ellipsis;
            white-space: normal;
            height: auto;
            min-height: 50px;
        }
        
        .input-number {
            height: 50px;
            font-size: 16px;
        }
        
        .btn-calculate {
            background: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%);
            border: none;
            border-radius: 10px;
            padding: 12px 25px;
            font-weight: bold;
            letter-spacing: 1px;
            box-shadow: 0 5px 15px rgba(37, 117, 252, 0.3);
            transition: all 0.3s ease;
        }
        
        .btn-calculate:hover {
            transform: translateY(-2px);
            box-shadow: 0 7px 20px rgba(37, 117, 252, 0.4);
        }
        
        .result-card {
            border-radius: 10px;
            padding: 20px;
            margin-top: 25px;
            animation: fadeIn 0.5s ease;
        }
        
        .result-success {
            background-color: #d4edda;
            border: 1px solid #c3e6cb;
            color: #155724;
        }
        
        .result-error {
            background-color: #f8d7da;
            border: 1px solid #f5c6cb;
            color: #721c24;
        }
        
        .result-title {
            margin: 0 0 10px 0;
            font-weight: 600;
        }
        
        .result-value {
            font-size: 24px;
            font-weight: bold;
            margin: 10px 0;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        .form-group label {
            font-weight: 600;
            margin-bottom: 8px;
            color: #555;
        }
    </style>
@stop

<div class="container" style="margin-top: 40px; margin-bottom: 40px;">
    <div class="card calc-card">
        <div class="calc-header">
            <h3 class="m-0"><i class="fas fa-calculator mr-2"></i> Calculadora SOAP</h3>
            <p class="mt-2 mb-0">Realiza operaciones matemáticas utilizando servicios SOAP</p>
        </div>
        <div class="card-body calc-body">
            <form action="{{ route('admin.calcular') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-lg-8">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label><i class="fas fa-hashtag mr-1"></i> Primer Número</label>
                                    <input type="number" class="form-control input-number" name="num1" value="{{ isset($num1) ? $num1 : old('num1') }}" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label><i class="fas fa-hashtag mr-1"></i> Segundo Número</label>
                                    <input type="number" class="form-control input-number" name="num2" value="{{ isset($num2) ? $num2 : old('num2') }}" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label><i class="fas fa-cogs mr-1"></i> Operación</label>
                            <select class="form-control form-select" name="operacion" required style="width: 100%; padding-right: 30px; height: 50px;">
                                <option value="suma" {{ isset($operacion) && $operacion == 'suma' ? 'selected' : '' }}>Suma (+)</option>
                                <option value="resta" {{ isset($operacion) && $operacion == 'resta' ? 'selected' : '' }}>Resta (-)</option>
                                <option value="multiplicacion" {{ isset($operacion) && $operacion == 'multiplicacion' ? 'selected' : '' }}>Multiplicación (×)</option>
                                <option value="division" {{ isset($operacion) && $operacion == 'division' ? 'selected' : '' }}>División (÷)</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-md-12 text-center">
                        <button type="submit" class="btn btn-primary btn-calculate">
                            <i class="fas fa-equals mr-2"></i> Calcular
                        </button>
                    </div>
                </div>
            </form>
            
            @if(isset($resultado))
            <div class="result-card result-success">
                @php
                    $operacionTexto = '';
                    switch($operacion) {
                        case 'suma':
                            $operacionTexto = 'suma';
                            $simbolo = '+';
                            break;
                        case 'resta':
                            $operacionTexto = 'resta';
                            $simbolo = '-';
                            break;
                        case 'multiplicacion':
                            $operacionTexto = 'multiplicación';
                            $simbolo = 'x';
                            break;
                        case 'division':
                            $operacionTexto = 'división';
                            $simbolo = '÷';
                            break;
                    }
                @endphp
                <h5 class="result-title"><i class="fas fa-check-circle mr-2"></i>Resultado de la {{ $operacionTexto }}:</h5>
                <div class="result-value">
                    {{ $num1 }} {{ $simbolo }} {{ $num2 }} = {{ $resultado }}
                </div>
            </div>
            @endif
            
            @if(isset($error))
            <div class="result-card result-error">
                <h5 class="result-title"><i class="fas fa-exclamation-circle mr-2"></i>Error:</h5>
                <p>{{ $error }}</p>
            </div>
            @endif
        </div>
    </div>
</div>

@section('archivos-js')
<script src="{{ asset('js/jquery.min.js') }}" type="text/javascript"></script>
@stop 