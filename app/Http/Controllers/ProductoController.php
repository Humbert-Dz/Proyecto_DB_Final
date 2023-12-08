<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\Product;
use App\Models\Categories;
use Illuminate\Support\Facades\DB;

class ProductoController extends Controller
{
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    // Método que muestra la vista de administrar productos
    public function index()
    {
        $session = session();

        if ($session->get('logged_in')) {

            $products = DB::select('SELECT * FROM info_product');
            $productos = json_decode(json_encode($products), true);

            $categories = Categories::all();

            $data = [
                'title' => 'Administrar productos',
                'productos' => $productos,
                'categories' => $categories
            ];

            return view('productos/productos', $data);
        } else {
            return redirect::to('/');
        }
    }


    // método que se encarga de agregar un nuevo registro a la base de datos
    public function agregar()
    {
        $session = session();

        if ($session->get('logged_in')) {
            // El campo 'imagen' existe y no está vacío.
            $imagenFile = $this->request->file('imagen');

            if ($imagenFile && $imagenFile->getSize() > 0) {
                // Genera un nombre aleatorio para la imagen
                $nombre_img = $imagenFile->hashName();
                // En la carpeta tal, ponemos la imagen
                $imagenFile->move('../public/uploads/', $nombre_img);
                $rutaIMG = 'uploads/' . $nombre_img;
            } else {
                $rutaIMG = null;
            }


            //recepción de datos del formulario
            $data = [
                'name' => $_POST['name'],
                'weight' => $_POST['peso'],
                'expiration_date' => $_POST['caducidad'],
                'cost' => $_POST['cost'],
                'price_sale' => $_POST['precio'],
                'stock' => $_POST['stock'],
                'status' => $_POST['status'],
                'category' => $_POST['category'],
                'image' => $rutaIMG,
                'added_by' => 19,
                'description' => $_POST['description']
            ];

            // Insersión del nuevo regristro en la base de datos
            $product = Product::create($data);

            return Redirect::to('/producto');
        } else {
            return redirect::to('/');
        }
    }

    // método que se encarga de mostrar una vista con los datos de un producto seleccionado
    public function editar($id)
    {
        $session = session();

        if ($session->get('logged_in')) {
            $categories = Categories::all();

            $products = DB::select('SELECT * FROM info_product');
            $productos = json_decode(json_encode($products), true);

            $producto = DB::select("SELECT * FROM info_product where id = {$id}");
            $product = json_decode(json_encode($producto), true);

            $data = [
                'title' => 'Administrar productos',
                'categories' => $categories,
                'productos' => $productos,
                'product' => $product
            ];

            return view('productos/editar', $data);
        } else {
            return redirect::to('/');
        }
    }

    // método que se encarga de actualizar un producto seleccionado
    public function actualizar($id)
    {
        $session = session();

        if ($session->get('logged_in')) {
            // El campo 'imagen' existe y no está vacío.
            $imagenFile = $this->request->file('imagen');
            if ($imagenFile && $imagenFile->getSize() > 0) {
                //si la imagen tiene el mismo nombre de otra ya existente
                if ($img = $this->request->file('imagen')) {
                    // se crea un nuevo nombre
                    $nombre_img = $img->hashName();
                    //en la carpeta tal, ponemos la imagen
                    $img->move('../public/uploads/', $nombre_img);
                    $rutaIMG = 'uploads/' . $nombre_img;
                }
            } else {
                $rutaIMG = $_POST['copia_img'];
            }

            //recepción de datos del formulario
            $data = [
                'name' => $_POST['name'],
                'weight' => $_POST['peso'],
                'expiration_date' => $_POST['caducidad'],
                'cost' => $_POST['cost'],
                'price_sale' => $_POST['precio'],
                'stock' => $_POST['stock'],
                'status' => $_POST['status'],
                'category' => $_POST['category'],
                'image' => $rutaIMG,
                'description' => $_POST['description']
            ];

            $product = Product::find($id);

            if ($product) {
                $product->update($data);
            }

            return Redirect::to('/producto');
        } else {
            return redirect::to('/');
        }
    }

    // Método que se encarga de eliminar un producto seleccionado
    public function eliminar($id)
    {

        $session = session();

        if ($session->get('logged_in')) {
            $product = Product::find($id);

            if ($product) {
                $product->delete($id);
            }

            return Redirect::to('/producto');
        } else {
            return redirect::to('/');
        }
    }

    //  Busca un producto determinado usando un procedimiento almacenado de la base de datos
    public function buscar()
    {
        $session = session();

        if ($session->get('logged_in')) {

            $nombre = $_POST['name'];

            $products = DB::select("CALL art_SearchProduct(?)", [$nombre]);
            $productos = json_decode(json_encode($products), true);

            $categories = Categories::all();

            $data = [
                'title' => 'Administrar productos',
                'categories' => $categories,
                'productos' => $productos,
            ];

            return view('productos/productos', $data);
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

            $categories = Categories::all();

            $filtro = $_POST['filtro'];


            if ($filtro == '1' || $filtro == '0') {
                $products = DB::select("CALL art_SearchProductStatus('{$filtro}')");
            } else {
                $products = DB::select("CALL art_CategoryFilter('{$filtro}') ");
            }

            $productos = json_decode(json_encode($products), true);

            $data = [
                'title' => 'Administrar productos',
                'categories' => $categories,
                'productos' => $productos,
            ];

            return view('productos/productos', $data);
        } else {
            redirect()->to('/login');
        }
    }
}
