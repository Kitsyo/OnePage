<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Wikipedia; //hace fata el use del modelo de tareas
use App\Models\Categoria;
class WikipediaController extends Controller
{
    public function index(){
        $wikipedias = Wikipedia::with('categorias')->get(); //con esta funcion podemos guardar todas las tareas de la base de datos en un array

        return $wikipedias;
    }
    public function store(Request $request){ // con esta funcion podemos insertar datos en la bbdd

        $validatedData = $request->validate([
            'titulo' => 'required',
            'contenido' => 'required',
            'usuario_id' => 'required',
            'categoria_id' => 'required'
        ]);
        //$validatedData['usuario_id'] = auth()->id();

        $wikipedia = Wikipedia::create($validatedData);

        $categoria_id = explode(",", $request->categoria_id);
        $categoria = Categoria::findMany($categoria_id);
        $wikipedia->categorias()->attach($categoria);

        return response()->json(['success' => true, 'data'=> $wikipedia]);
        
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
