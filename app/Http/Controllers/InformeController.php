<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;

class InformeController extends Controller
{
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * Si la solicitud es un GET, carga la vista 'informes/informe' con los datos preparados. 
     * Si es un POST, redirige a la función generar() para procesar la generación del informe.
     */
    public function index()
    {
        $session = session();

        if ($session->get('logged_in')) {

            if (strtolower($this->request->getMethod()) === 'get') {

                $data = [
                    'title' => 'Generar informe',
                    'informeGenerado' => false,
                ];

                return view('informes/informe', $data);
            } else {
                return $this->generar();
            }

        } else {
            return redirect::to('/');
        }
    }


    /**
     * procesa la generación de informes, verificando la autenticación del usuario y obteniendo datos del formulario POST,
     *  como fechas y tipo de informe. Formatea las fechas, prepara los datos para la vista y realiza consultas a la base de datos
     *  según el tipo de informe seleccionado. Luego, carga la vista 'informes/informe' con los resultados y la información del informe.
     *  Si el usuario no está autenticado, redirige a la página de inicio de sesión.
     */
    private function generar()
    {
        $session = session();


        if ($session->get('logged_in')) {


            //recepción de información de post y formateo de fechas
            $fechaInicio = $_POST['start'];
            $startPOST = \DateTime::createFromFormat('m/d/Y', $fechaInicio);
            $start = $startPOST->format('Y/m/d');

            $fechaFin = $_POST['end'];
            $endPOST = \DateTime::createFromFormat('m/d/Y', $fechaFin);
            $end = $endPOST->format('Y/m/d');

            $rutaBase = 'informes/Highcharts/';

            $data = [
                'title' => 'Informe generado',
                'informeGenerado' => true,
                'fechaInicio' => $fechaInicio,
                'fechaFin' => $fechaFin
            ];

            $tipo = $_POST['tipo'];

            if ($tipo == 0 || $tipo == 1) {

                $tituloInforme = ($tipo == 1) ? 'más vendidos' : 'menos vendidos';

                // conexión y ejecución de procedimiento almacenado que retorna los productos más o menos vendidos según sea el caso
                $products = DB::select("CALL art_ProductosVendidos(?, ?, ?)", [$start, $end, $tipo]);
                $productos = json_decode(json_encode($products), true);


                $data['productos'] = $productos;
                $data['tituloInforme'] = "Productos {$tituloInforme} entre el periodo {$fechaInicio} y {$fechaFin}";
                $data['subtitulo'] = "A continuación, se muestran los 10 productos {$tituloInforme} entre el rango de fechas indicado.";
                $data['grafico'] = "{$rutaBase}EstadoVentasProductos/ventas";

            } else if ($tipo == 'utilidades') {
                // conexión y ejecución de procedimiento almacenado que retorna las utilidades por categoria
                $categories = DB::select("CALL  art_Utilidades(?, ?)", [$start, $end]);
                $categorias = json_decode(json_encode($categories), true);

                $data['categorias'] = $categorias;
                $data['tituloInforme'] = "Utilidades por categorias entre el periodo {$fechaInicio} y {$fechaFin}";
                $data['subtitulo'] = "A continuación, se muestra la utilidad resultante de las ventas por categorias entre el rango de fechas indicado.";
                $data['grafico'] = "{$rutaBase}UtilidadesCategorias/utilidades";
            }

            return view('informes/informe', $data);

        } else {
            return redirect::to('/');
        }
    }
}
