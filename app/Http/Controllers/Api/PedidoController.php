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
        $pedidos = Pedido::with('productos')->get(); //con esta funcion podemos guardar todas las tareas de la base de datos en un array

        return $pedidos;
    }
    public function store(Request $request)
    {

        $request->validate([
            'idUsuario' => 'required',
            'precioFinal' => 'required'
        ]);
        $producto = $request->all();
        $tarea = Pedido::create($producto);

        return response()->json(['success' => true, 'data' => $producto]);
    }
    public function destroy($id, Request $request)
    {

        $producto = Pedido::find($id);
        $producto->delete();

        return response()->json(['succes' => true, 'data' => "Deleted"]);

    }
    public function update($id, Request $request)
    {

        $producto = Pedido::find($id);
        $request->validate([
            'idUsuario' => 'required',
            'precioFinal' => 'required'
        ]);

        $dateToUpdate = $request->all();
        $producto->update($dateToUpdate);

        return response()->json(['success' => true, 'data'=> $producto]);
    }
    public function edit($id)
    {
        $producto = Pedido::find($id);

        return response()->json(['success' => true, 'data' => $producto]);
    }
}


