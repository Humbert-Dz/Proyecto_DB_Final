<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class RespaldoController extends Controller
{
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function index(){
        $session = session();

        if ($session->get('logged_in')) {

            $data = [
                'title' => 'Respaldo DB'
            ];

            return view('respaldo/respaldo', $data);
        }else{
            return redirect::to('/');
        }
    }
}
