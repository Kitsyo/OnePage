<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\manga; 

class MangaController extends Controller
{
    public function index()
    {
        return manga::all();
    }

    public function show($id)
    {
        return manga::findOrFail($id);
    }
}
