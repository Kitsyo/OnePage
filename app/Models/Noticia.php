<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Noticia extends Model
{
    use HasFactory;
    protected $fillable = [
        "titular",
        "contenido",
        "idUsuario"
    ];
    public function Users()
    {
        return $this->belongsTo(User::class);
    }
    public function Categorias()
    {
        return $this->belongsToMany(Categoria::class,'noticias_categorias');
    }
}
