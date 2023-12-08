<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class CuentasController extends Controller
{
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    // Muestra un menú a elegir entre ver cuentas de administradores o clientes
    public function index()
    {
        $session = session();

        if ($session->get('logged_in')) {

            $data = [
                'title' => 'Cuentas',

            ];

            return view('cuentas/cuentas', $data);
        } else {
            return redirect::to('/');
        }
    }

    // Muestra las cuentas de administradores
    public function administradores()
    {
        $session = session();

        if ($session->get('logged_in')) {
            $adminss = DB::select('select * from info_admins');
            $admins = json_decode(json_encode($adminss), true);

            $data = [
                'title' => 'Cuentas de administradores',
                'admins' => $admins
            ];

            return view('cuentas/administradores', $data);
        } else {
            return redirect::to('/');
        }
    }

    // Muestra las cuentas de clientes
    public function clientes()
    {
        $session = session();

        if ($session->get('logged_in')) {
            

            $userss = DB::select('select * from info_users');
            $users = json_decode(json_encode($userss), true);

            $data = [
                'title' => 'Cuentas de clientes',
                'users' => $users
            ];

            return view('cuentas/clientes', $data);
        } else {
            return redirect::to('/');
        }
    }
}
