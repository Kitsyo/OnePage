<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Task; //hace fata el use del modelo de tareas

class TaskController extends Controller
{
    public function index(){
        // return "Hola";
        $tasks = Task::all()->toArray(); //con esta funcion podemos guardar todas las tareas de la base de datos en un array
        return $tasks;
    }
    public function store(Request $request){ // con esta funcion podemos insertar datos en la bbdd
        
        $request->validate([
            'name' => 'required|max:5',
            'description' => 'required'
        ]);
        
        $task = $request->all();
        $tarea = Task::create($task);

        return response()->json(['success' => true, 'data'=> $tarea]);

    }
    public function update($id, Request $request){

        $task = Task::find($id);
        $request->validate([
            'name' => 'required|max:5',
            'description' => 'required'
        ]);

        $dateToUpdate = $request->all();
        $task->update($dateToUpdate);

        return response()->json(['success' => true, 'data'=> $task]);

    }
    public function destroy($id, Request $request){

        $task = Task::find($id);
        $task->delete();

        return response()->json(['succes' => true, 'data' => "Deleted"]);

    }
    public function edit($id){
        $task = Task::find($id);

        return response()->json(['success' => true, 'data' => $task]);
    }

}
