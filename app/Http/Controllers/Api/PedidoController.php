<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Producto;
use Illuminate\Http\Request;
use App\Models\Pedido;

class PedidoController extends Controller
{
    public function index(){
        // return "Hola";
        $pedidos = Producto::with('productos')->get(); //con esta funcion podemos guardar todas las tareas de la base de datos en un array

        return $pedidos;
    }
}
