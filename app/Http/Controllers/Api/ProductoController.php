<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    public function index(){
        // return "Hola";
        $producto = Producto::all()->toArray(); //con esta funcion podemos guardar todas las tareas de la base de datos en un array
        return $producto;
    }
}
