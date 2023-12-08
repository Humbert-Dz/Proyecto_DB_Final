<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use App\Models\PedidoModel;

class PedidoController extends Controller
{
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * La función index en CodeIgniter muestra la lista de pedidos si el usuario está autenticado,
     *  obteniendo los detalles de la base de datos y cargando la vista 'pedidos/pedido'. 
     * Si no está autenticado, redirige a la página de inicio de sesión.
     */
    public function index()
    {

        $session = session();
        if ($session->get('logged_in')) {

            $pedids = DB::select('select * from detalles_orders;');
            $pedidos = json_decode(json_encode($pedids), true);

            $data = [
                'title' => 'Pedidos',
                'pedidos' => $pedidos,
            ];

            return view("pedidos/pedido", $data);
        } else {
            return redirect::to('/');
        }
    }


    /**
     * La función confirmar en CodeIgniter confirma un pedido cambiando su estado a confirmado. 
     * Si el usuario está autenticado, actualiza el estado del pedido y redirige a la página de pedidos. 
     * Si no está autenticado, redirige a la página de inicio de sesión.
     */
    public function confirmar($id)
    {

        $session = session();

        if ($session->get('logged_in')) {

            $data = ['confirmed' => 1];

            $pedido = PedidoModel::find($id);

            if ($pedido) {
                $pedido->update($data);
            }

            return redirect::to('/pedido');

        } else {
            return redirect::to('/');
        }
    }


    /**
     * La función cancelar en CodeIgniter cancela un pedido específico registrando la marca de tiempo de cancelación. 
     * Si el usuario está autenticado, actualiza el pedido con la nueva información y redirige a la página de pedidos. 
     * Si no está autenticado, redirige a la página de inicio de sesión.
     */
    public function cancelar($id)
    {
        $session = session();

        if ($session->get('logged_in')) {

            $data = ['canceled_at' => date('Y-m-d H:i:s')];

            $pedido = PedidoModel::find($id);

            if ($pedido) {
                $pedido->update($data);
            }

            return redirect()->to('/pedido');

        } else {
            return redirect()->to('/');
        }
    }

    /**
     * La función enviar en CodeIgniter marca como enviado un pedido específico mediante la actualización del campo 'delivery'. 
     * Si el usuario está autenticado, actualiza el pedido con la nueva información y redirige a la página de pedidos. 
     * Si no está autenticado, redirige a la página de inicio de sesión.
     */
    public function enviar($id)
    {
        $session = session();

        if ($session->get('logged_in')) {

            $data = ['delivery' => 1];

            $pedido = PedidoModel::find($id);

            if ($pedido) {
                $pedido->update($data);
            }

            return redirect::to('/pedido');
        } else {
            return redirect::to('/');
        }
    }

    // Busca un pedido de acuerdo a su id
    public function buscar()
    {
        $session = session();
        if ($session->get('logged_in')) {


            $idPedido = $_POST['idPedido'];

            $pedids = DB::select('select * from detalles_orders where id = ?', [$idPedido]);
            $pedidos = json_decode(json_encode($pedids), true);

            $data = [
                'title' => 'Administrar productos',
                'pedidos' => $pedidos,
            ];

            return view('pedidos/pedido', $data);
        } else {
            return redirect::to('/');
        }
    }


    /**
     * obtiene el filtro de la solicitud POST. Dependiendo del filtro, 
     * realiza consultas a la base de datos utilizando procedimientos 
     * almacenados específicos. 
     */
    public function filtrado()
    {
        $session = session();


        if ($session->get('logged_in')) {
            $filtro = $_POST['filtro'];

            $pedids = DB::select('CALL art_filterOrders(?)', array($filtro));
            $pedidos = json_decode(json_encode($pedids), true);
            $data = [
                'title' => 'Pedidos',
                'pedidos' => $pedidos,
            ];

            return view('pedidos/pedido', $data);
        } else {
            redirect()->to('/');
        }
    }


}
