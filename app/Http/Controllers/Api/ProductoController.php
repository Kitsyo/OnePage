<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Producto;
use App\Models\Task;
use Illuminate\Http\Request;
use App\Http\Resources\ProductoResource;


class ProductoController extends Controller
{
    public function index(){
        $productos = Producto::all(); //con esta funcion podemos guardar todas las tareas de la base de datos en un array

        return $productos;
    }
    public function store(Request $request)
    {

        $request->validate([
           'nombre' => 'required',
            'descripcion' => 'required',
            'precio' => 'required',
            'categoria_id' => 'required'
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
            'categoria_id' => 'required'
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

    public function getCategoriaByProducto($id)
    {
        $productos = Producto::with('categorias')->where('categoria_id', $id)->paginate();

        return ProductoResource::collection($productos);
    }
    public function getProductos()
    {
        //$productos = Producto::all();
        $productos = Producto::with('categorias')->get();

        //$productos = producto::with('categorias')->latest()->paginate();
        return ProductoResource::collection($productos);

    }

    public function getProducto($id)
    {
        return producto::with('categorias')->findOrFail($id);
    }
}

