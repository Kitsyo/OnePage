<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Noticia; //hace fata el use del modelo de tareas

class NoticiaController extends Controller
{
    public function index(){
        $pedidos = Noticia::with('categorias')->get(); //con esta funcion podemos guardar todas las tareas de la base de datos en un array
        return $pedidos;
    }
    public function store(Request $request){ // con esta funcion podemos insertar datos en la bbdd

        $request->validate([
            'titular' => 'required',
            'contenido' => 'required'
        ]);

        $task = $request->all();
        $tarea = Noticia::create($task);

        return response()->json(['success' => true, 'data'=> $tarea]);

    }
    public function update($id, Request $request){

        $task = Noticia::find($id);
        $request->validate([
            'titular' => 'required',
            'contenido' => 'required'
        ]);

        $dateToUpdate = $request->all();
        $task->update($dateToUpdate);

        return response()->json(['success' => true, 'data'=> $task]);

    }
    public function destroy($id, Request $request){

        $task = Noticia::find($id);
        $task->delete();

        return response()->json(['succes' => true, 'data' => "Deleted"]);

    }
    public function edit($id){
        $task = Noticia::find($id);

        return response()->json(['success' => true, 'data' => $task]);
    }

}
