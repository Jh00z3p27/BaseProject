<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora</title>

    <!-- Aquí agregamos Bootstrap para que se vea bonito -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="text-center" style="max-width: 500px; width: 100%;">
            <h1 class="mb-4">Calculadora</h1>

            <!-- Si hay algún error, lo mostramos aquí -->
            @if (isset($error))
                <div class="alert alert-danger">{{ $error }}</div>
            @endif

            <!-- Formulario para ingresar los números -->
            <form method="POST" action="{{ route('calcular') }}">
                @csrf
                <div class="form-group">
                    <label for="numero1">Número 1</label>
                    <input type="number" id="numero1" name="numero1" class="form-control" value="{{ old('numero1') }}" required>
                </div>

                <div class="form-group">
                    <label for="numero2">Número 2</label>
                    <input type="number" id="numero2" name="numero2" class="form-control" value="{{ old('numero2') }}" required>
                </div>

                <!-- Botones para elegir la operación -->
                <div class="form-group d-flex justify-content-center">
                    <button type="submit" name="operacion" value="suma" class="btn btn-primary mr-2">Sumar</button>
                    <button type="submit" name="operacion" value="multiplicacion" class="btn btn-success ml-2">Multiplicar</button>
                </div>
            </form>

            <!-- Aquí mostramos el resultado de la operación -->
            @if (isset($suma))
                <div class="alert alert-success mt-4">
                    <h4>Resultado de la Suma: {{ $suma }}</h4>
                </div>
            @endif

            @if (isset($multiplicacion))
                <div class="alert alert-success mt-4">
                    <h4>Resultado de la Multiplicación: {{ $multiplicacion }}</h4>
                </div>
            @endif
        </div>
    </div>

    <!-- Scripts de Bootstrap para que todo funcione -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
