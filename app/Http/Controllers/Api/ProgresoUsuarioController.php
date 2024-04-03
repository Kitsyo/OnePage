<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\progreso_usuarios; 

class ProgresoUsuarioController extends Controller
{
    // Obtener el progreso del usuario
    public function index($user_id)
    {
        $progreso_usuarios = progreso_usuarios::where('user_id', $user_id)->get();
        return response()->json($progreso_usuarios);
    }

    // Actualizar el progreso del usuario
    public function update(Request $request, $id)
    {
        $progreso_usuarios = progreso_usuarios::findOrFail($id);
        $progreso_usuarios->visto = $request->input('visto');
        $progreso_usuarios->save();
        return response()->json(['message' => 'Progreso del usuario actualizado correctamente']);
    }

    // Crear un nuevo registro de progreso del usuario
    public function store(Request $request)
    {
        $progreso_usuarios = new progreso_usuarios;
        $progreso_usuarios->user_id = $request->input('user_id');
        $progreso_usuarios->progresable_id = $request->input('progresable_id');
        $progreso_usuarios->progresable_type = $request->input('progresable_type');
        $progreso_usuarios->visto = $request->input('visto');
        $progreso_usuarios->save();
        return response()->json(['message' => 'Progreso del usuario creado correctamente'], 201);
    }
}

