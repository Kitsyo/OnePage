<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;
    protected $fillable = [
        "nombre",
    ];

    public function wikipedias()
    {
        return $this->belongsToMany(Wikipedia::class,'wikipedias_categorias');
    }

    public function noticias()
    {
        return $this->belongsToMany(Noticia::class,'noticias_categorias');
    }
}
