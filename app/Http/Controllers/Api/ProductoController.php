<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Producto;
use App\Models\Task;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    public function index(){
        // return "Hola";
        $productos = Producto::with('pedidos')->get(); //con esta funcion podemos guardar todas las tareas de la base de datos en un array

        return $productos;
    }
    public function store(Request $request)
    {

        $request->validate([
           'nombre' => 'required',
            'descripcion' => 'required',
            'precio' => 'required',
            'idCategoria' => 'required'
        ]);
        $producto = $request->all();
        $tarea = Producto::create($producto);

        return response()->json(['success' => true, 'data' => $producto]);
    }
    public function destroy($id, Request $request)
    {

        $producto = Producto::find($id);
        $producto->delete();

        return response()->json(['succes' => true, 'data' => "Deleted"]);

    }
    public function update($id, Request $request)
    {

        $producto = Producto::find($id);
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'precio' => 'required',
            'idCategoria' => 'required'
        ]);

        $dateToUpdate = $request->all();
        $producto->update($dateToUpdate);

        return response()->json(['success' => true, 'data'=> $producto]);
    }
    public function edit($id)
    {
        $producto = Producto::find($id);

        return response()->json(['success' => true, 'data' => $producto]);
    }
}

