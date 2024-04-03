<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\capitulo;

class CapituloController extends Controller
{
    public function index()
    {
        return capitulo::all();
    }

    public function show($id)
    {
        return capitulo::findOrFail($id);
    }
    public function getCategoriaByCapitulo($id)
    {
        $capitulos = capitulo::with('categorias')->where('categoria_id', $id)->paginate();
        return $capitulos;
    }
}
