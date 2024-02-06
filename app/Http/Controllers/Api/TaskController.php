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
    public function store(Request $request){ //
        $task = $request->all();
        $tarea = Task::create($task);

        return response()->json(['success' => true, 'data'=> $tarea]);

    }
}
