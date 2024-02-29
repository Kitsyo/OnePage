<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Wikipedia; //hace fata el use del modelo de tareas

class WikipediaController extends Controller
{
    public function index(){
        $pedidos = Wikipedia::with('categorias')->get(); //con esta funcion podemos guardar todas las tareas de la base de datos en un array

        return $pedidos;
    }
    public function store(Request $request){ // con esta funcion podemos insertar datos en la bbdd

        $request->validate([
            'titulo' => 'required',
            'contenido' => 'required'
        ]);

        $task = $request->all();
        $tarea = Wikipedia::create($task);

        return response()->json(['success' => true, 'data'=> $tarea]);

    }
    public function update($id, Request $request){

        $task = Wikipedia::find($id);
        $request->validate([
            'titulo' => 'required',
            'contenido' => 'required'
        ]);

        $dateToUpdate = $request->all();
        $task->update($dateToUpdate);

        return response()->json(['success' => true, 'data'=> $task]);

    }
    public function destroy($id, Request $request){

        $task = Wikipedia::find($id);
        $task->delete();

        return response()->json(['succes' => true, 'data' => "Deleted"]);

    }
    public function edit($id){
        $task = Wikipedia::find($id);

        return response()->json(['success' => true, 'data' => $task]);
    }

}
