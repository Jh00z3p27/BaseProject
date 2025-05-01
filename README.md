# Proyecto de Integración de Servicios Web

Este proyecto implementa la integración de servicios XML y SOAP en una aplicación Laravel.

## Requisitos Implementados

### 1. Lectura de XML y conversión a JSON
- **✅ Punto 1.a**: Archivo XML creado en storage/xml con registros ficticios de eventos.
- **✅ Punto 1.b**: Ruta implementada para leer el archivo XML y convertir a JSON.
- **✅ Punto 1.c**: Vista con tabla Bootstrap que muestra los datos del XML.

### 2. Implementación de servicio SOAP
- **✅ Punto 2.a**: Integración con servicio SOAP gratuito (dneonline.com).
- **✅ Punto 2.b**: Vista que permite realizar operaciones matemáticas (suma, resta, multiplicación, división).
- **✅ Punto 2.c**: Procesamiento de peticiones en controlador Laravel y visualización de resultados.

## Configuración de la base de datos

1. Crear una base de datos MySQL llamada `laravel_proyecto` 

2. Ejecutar las migraciones y seeders para crear las tablas y usuarios:
   ```
   php artisan migrate --seed
   ```

3. generar la clave de la aplicación:
   ```
   php artisan key:generate
   ```

## Usuarios para iniciar sesión

El sistema incluye dos usuarios predefinidos que se crean al ejecutar los seeders:

1. **Administrador**:
   - Usuario: `admin`
   - Contraseña: `1234`

2. **Usuario estándar**:
   - Usuario: `usuario` 
   - Contraseña: `1234`

## URLs para revisar la implementación

⚠️ **IMPORTANTE**: Para acceder a cualquiera de estas URLs, es **obligatorio iniciar sesión** primero con alguno de los usuarios configurados. Todas las rutas están protegidas y requieren autenticación.

### XML y JSON
- **URL**: `/admin/leer-eventos`
- **Descripción**: Esta página muestra los datos del archivo XML convertidos a JSON en una tabla Bootstrap.
- **Archivo XML**: `storage/xml/eventos.xml`
- **Controlador**: `DashboardController.php` (método `leerEventosXML`)
- **Vista**: `resources/views/backend/admin/dashboard/vistadashboard.blade.php`

### Servicio SOAP (Calculadora)
- **URL**: `/admin/calculadora`
- **Descripción**: Esta página permite realizar operaciones matemáticas utilizando un servicio SOAP.
- **Servicio SOAP**: `http://www.dneonline.com/calculator.asmx?WSDL`
- **Controlador**: `DashboardController.php` (métodos `calculadora` y `calcular`)
- **Vista**: `resources/views/backend/admin/dashboard/calculadora.blade.php`

## Instrucciones de uso

### Acceso al sistema
1. Iniciar el servidor Laravel:
   ```
   php artisan serve
   ```
2. Acceder a `http://localhost:8000` en el navegador
3. Iniciar sesión con alguno de los usuarios proporcionados:
   - Usuario: `admin` o `usuario`
   - Contraseña: `1234`

### Revisar funcionalidad XML
1. Después de iniciar sesión, acceder a `/admin/leer-eventos` o navegar al dashboard principal
2. Verificar la tabla con datos importados del XML
3. Opcional: Revisar el archivo fuente XML en `storage/xml/eventos.xml`

### Probar la calculadora SOAP
1. Después de iniciar sesión, acceder a `/admin/calculadora` o hacer clic en el botón "Ir a Calculadora" en la vista de eventos
2. Ingresar dos números en los campos correspondientes
3. Seleccionar una operación (suma, resta, multiplicación o división)
4. Hacer clic en "Calcular"
5. Verificar el resultado mostrado

## Archivos principales modificados

- **Controlador**: `app/Http/Controllers/Backend/Dashboard/DashboardController.php`
- **Vistas**: 
  - `resources/views/backend/admin/dashboard/vistadashboard.blade.php` (XML)
  - `resources/views/backend/admin/dashboard/calculadora.blade.php` (SOAP)
- **Rutas**: `routes/web.php` (líneas 66-67 para las rutas de la calculadora)
- **Archivo XML**: `storage/xml/eventos.xml`



