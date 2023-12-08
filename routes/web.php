<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\InformeController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\CuentasController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//! Login

// Ruta que muestra la vista que contiene el login
Route::get('/', function () {
    return view('artemex.login');
});

// Ruta que recepciona los datos del formulario login
Route::post('/login', function () {

    // Recepción de datos
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Llamada a procedimiento almacenado que busca el administrador
    $user = DB::select('CALL art_LoginAdmin(?, ?)', [$email, $password]);

    // evalua si existe el registro de administrador con las credenciales recibidad
    if (count($user) > 0) {
        $session = session();

        $idAdmin = $user[0]->id;
        $name = $user[0]->name;

        // Envio de variables a la sesión
        $session->put([
            'idAdmin' => $idAdmin,
            'name' => $name,
            'email' => $email,
            'password' => $password,
            'logged_in' => true,
        ]);

        $data = [
            'title' => 'Inicio'
        ];

        return view('artemex.inicio', $data);
    } else {
        return redirect::to('/');
    }
});

// Ruta para cerrar sesión
Route::get('/logout ', function () {
    // método para eliminar los datos de la sesión
    session()->flush();

    // redirecciona a la ruta que muestra el login
    return redirect::to('/');
});

//! Ruta para mostrar el inicio / dashboard
Route::get('/inicio', function () {
    $session = session();

    if ($session->get('logged_in')) {


        $data = [
            'title' => 'Inicio'
        ];

        return view('artemex.inicio', $data);

    } else {
        return redirect::to('/');
    }
});


//! Productos
Route::get('/producto', [ProductoController::class, 'index']);
Route::post('/producto/buscar', [ProductoController::class, 'buscar']);
Route::post('/producto/filtrado', [ProductoController::class, 'filtrado']);
Route::post('/producto/agregar', [ProductoController::class, 'agregar']);
Route::get('/producto/editar/{id}', [ProductoController::class, 'editar']);
Route::post('/producto/actualizar/{id}', [ProductoController::class, 'actualizar']);
Route::get('/producto/eliminar/{id}', [ProductoController::class, 'eliminar']);

//! Informes
Route::get('/informe', [InformeController::class, 'index']);
Route::post('/informe', [InformeController::class, 'index']);


//! Pedidos
Route::get('/pedido', [PedidoController::class, 'index']);
Route::get('/pedido/confirmar/{id}', [PedidoController::class, 'confirmar']);
Route::post('/pedido/enviar/{id}', [PedidoController::class, 'enviar']);
Route::get('/pedido/cancelar/{id}', [PedidoController::class, 'cancelar']);
Route::post('/pedido/buscar', [PedidoController::class, 'buscar']);
Route::post('/pedido/filtrado/', [PedidoController::class, 'filtrado']);

// ! cuentas
Route::get('/cuentas', [CuentasController::class, 'index']);
Route::get('/cuentas/administradores', [CuentasController::class, 'administradores']);
Route::get('/cuentas/clientes', [CuentasController::class, 'clientes']);