<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wikipedia extends Model
{
    use HasFactory;
    protected $fillable = [
        'titulo',
        'contenido',
        'usuario_id'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function categorias()
    {
        return $this->belongsToMany(Categoria::class,'wikipedias_categorias');
    }
}
