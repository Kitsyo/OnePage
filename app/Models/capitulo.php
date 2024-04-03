<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class capitulo extends Model
{
    use HasFactory;
    public function progresos()
    {
        return $this->morphMany(ProgresoUsuario::class, 'progresable');
    }
    public function categorias()
    {
        return $this->belongsTo(Categoria::class);
    }
}

