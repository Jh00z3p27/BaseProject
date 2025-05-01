# Proyecto de Integración de Servicios Web

Este proyecto implementa la integración de servicios XML y SOAP en una aplicación Laravel.

## 👨‍💻 Integrantes del Grupo #8

| Nombre Completo                            | Código    |
|-------------------------------------------|-----------|
| Albert Uziel Hernández Mendoza            | HM20019   |
| Miguel Alejandro Linares Mendoza          | LM22040   |
| Franklin Giovanny Ávila González          | AG22076   |
| José Manuel Cerritos Estrada              | EE22004   |
| Dora Elizabeth Hernández Chachagua        | HC22030   |
| José Antonio Mena Ávila                   | MA99048   |

## 🛠️ Tecnologías Utilizadas

| Tecnología | Versión | Descripción                                  |
|------------|---------|----------------------------------------------|
| Laravel    | 12      | Framework PHP para desarrollo web moderno    |
| PHP        | 8       | Lenguaje de programación del lado del servidor |
| GitHub     | -       | Control de versiones y colaboración en equipo |
| HTML5      | -       | Lenguaje de marcado para estructurar contenido |
| CSS3       | -       | Estilos visuales modernos y responsivos       |
| XML        | -       | Intercambio de datos estructurados            |


## Requisitos Implementados

### 1. Lectura de XML y conversión a JSON
- **✅ Punto 1.a**: Archivo XML creado en storage/xml con registros ficticios de eventos.
- **✅ Punto 1.b**: Ruta implementada para leer el archivo XML y convertir a JSON.
- **✅ Punto 1.c**: Vista con tabla Bootstrap que muestra los datos del XML.

### 2. Implementación de servicio SOAP
- **✅ Punto 2.a**: Integración con servicio SOAP gratuito (dneonline.com).
- **✅ Punto 2.b**: Vista que permite realizar operaciones matemáticas (suma, resta, multiplicación, división).
- **✅ Punto 2.c**: Procesamiento de peticiones en controlador Laravel y visualización de resultados.

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




