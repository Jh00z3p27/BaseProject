<?php

namespace App\Http\Controllers\Backend\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use SoapClient;

class DashboardController extends Controller
{
   public function vistaDashboard()
   { 
       return view('backend.admin.dashboard.vistadashboard');
   }   

   public function leerEventosXML()
   {
       // Ruta al archivo XML
       $xmlPath = storage_path('xml/eventos.xml');
       
       // Verificar si el archivo existe
       if (!file_exists($xmlPath)) {
           return response()->json(['error' => 'Archivo XML no encontrado'], 404);
       }

       // Leer y parsear el XML
       $xmlString = file_get_contents($xmlPath);
       $xml = simplexml_load_string($xmlString);
       
       // Convertir a array
       $eventos = json_decode(json_encode($xml), true);

       return view('backend.admin.dashboard.vistadashboard', ['eventos' => $eventos]);
   }

   public function calculadora()
   {
       return view('backend.admin.dashboard.calculadora');
   }

   public function calcular(Request $request)
   {
       try {
           $wsdl = "http://www.dneonline.com/calculator.asmx?WSDL";
           $client = new SoapClient($wsdl);
           
           $num1 = $request->input('num1');
           $num2 = $request->input('num2');
           $operacion = $request->input('operacion');
           
           $resultado = 0;
           $error = null;
           
           switch($operacion) {
               case 'suma':
                   $params = array('intA' => $num1, 'intB' => $num2);
                   $resultado = $client->Add($params)->AddResult;
                   break;
               case 'resta':
                   $params = array('intA' => $num1, 'intB' => $num2);
                   $resultado = $client->Subtract($params)->SubtractResult;
                   break;
               case 'multiplicacion':
                   $params = array('intA' => $num1, 'intB' => $num2);
                   $resultado = $client->Multiply($params)->MultiplyResult;
                   break;
               case 'division':
                   if($num2 != 0) {
                       $params = array('intA' => $num1, 'intB' => $num2);
                       $resultado = $client->Divide($params)->DivideResult;
                   } else {
                       $error = "No se puede dividir por cero";
                   }
                   break;
           }
           
           return view('backend.admin.dashboard.calculadora', [
               'resultado' => $error ? null : $resultado,
               'error' => $error,
               'num1' => $num1,
               'num2' => $num2,
               'operacion' => $operacion
           ]);
           
       } catch (\Exception $e) {
           return view('backend.admin.dashboard.calculadora', [
               'error' => 'Error al realizar la operación: ' . $e->getMessage()
           ]);
       }
   }
}
