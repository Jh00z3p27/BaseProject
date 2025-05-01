<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script>
      // Esta es la función para cuando se da click en un botón de la calculadora
      function handleButtonClick(value) {
        let pantalla = document.getElementById('pantalla');
        let respuesta = document.getElementById('resultado');
        
        // Si se presiona "=", hace el cálculo
        if (value === "=") {
          try {
            let result = eval(pantalla.value);
            respuesta.value = result; // Muestra el resultado
          } catch (e) {
            pantalla.value = 'Error';
            respuesta.value = 'Error'; // Si hay error, muestra "Error"
          }
        }
        // Si es "C", limpia todo
        else if (value === "C") {
          pantalla.value = '';
          respuesta.value = ''; // Limpiar el campo de respuesta
        } else {
          pantalla.value += value;
          // La respuesta no cambia hasta presionar "="
        }
      }

      // Para que también funcione al presionar teclas
      document.addEventListener('keydown', function(event) {
        let pantalla = document.getElementById('pantalla');
        let respuesta = document.getElementById('resultado');
        const key = event.key;

        // Si presionas una tecla de operación o "Enter", se hace la operación
        if (/[+\*/=]/.test(key)) {
          if (key === "=" || key === "Enter") {  // También al presionar "Enter" se hace
            try {
              let result = eval(pantalla.value);
              respuesta.value = result; // Muestra el resultado
            } catch (e) {
              pantalla.value = 'Error';
              respuesta.value = 'Error'; // Si hay error, muestra "Error"
            }
          } else {
            pantalla.value += key;
          }
        }

        // Si presionas "Backspace", borra un caracter
        if (key === "Backspace") {
          pantalla.value = pantalla.value.slice(0, -1);
        }

        // Si presionas un número, lo pone en la pantalla
        if (/\d/.test(key)) {
          pantalla.value += key;
        }

        // Si presionas "Enter", también hace el cálculo
        if (key === "Enter") {
          event.preventDefault(); 
          try {
            let result = eval(pantalla.value);
            respuesta.value = result;
          } catch (e) {
            pantalla.value = 'Error';
            respuesta.value = 'Error'; // Si hay error, muestra "Error"
          }
        }
      });
    </script>
    <title>Calculadora</title>
  </head>
  <body class="bg-light">
    <!-- Contenedor para que la calculadora esté centrada -->
    <div class="container-fluid vh-100 d-flex justify-content-center align-items-center">
      <div class="row justify-content-center w-100">
        <div class="col-12 col-md-6 col-lg-4">
          <div class="card p-4 shadow-lg rounded-lg">
            <h5 class="text-center">Calculadora</h5>
            
            <!-- Aquí va la pantalla donde se escriben los números y operaciones -->
            <div class="form-group">
              <input type="text" id="pantalla" class="form-control text-right" readonly>
            </div>

            <!-- Aquí se muestra el resultado -->
            <div class="form-group">
              <label for="resultado">Respuesta</label>
              <input type="text" id="resultado" class="form-control text-right" readonly>
            </div>
            
            <!-- Botones de la calculadora -->
            <div class="d-flex flex-column">
              <!-- Botones de operaciones -->
              <div class="row justify-content-center mb-2">
                <button class="btn btn-light mx-1 w-25" onclick="handleButtonClick('*')">*</button>
                <button class="btn btn-light mx-1 w-25" onclick="handleButtonClick('+')">+</button>
              </div>
              <!-- Botones de punto y "C" para limpiar -->
              <div class="row justify-content-center mb-2">
                <button class="btn btn-light mx-1 w-25" onclick="handleButtonClick('.')">.</button>
                <button class="btn btn-danger mx-1 w-25" onclick="handleButtonClick('C')">C</button>
              </div>
              <!-- Botón de resultado -->
              <div class="row justify-content-center mb-2">
                <button class="btn btn-info mx-1 w-50" onclick="handleButtonClick('=')">=</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
