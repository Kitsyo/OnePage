<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;
    protected $fillable = [
        "nombre",
        "descripcion",
        "precio",
        "idCategoria"
    ];
    public function Categorias()
    {
        return $this->belongsTo(Categoria::class);
    }
    public function Pedidos()
    {
        return $this->belongsToMany(PedidoProducto::class);
    }
}
