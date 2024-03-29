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
        "categoria_id"
    ];

    public function pedidos()
    {
        return $this->belongsToMany(Pedido::class, 'pedido_productos', 'producto_id', 'pedido_id');
    }

    public function categorias()
    {
        return $this->belongsTo(Categoria::class);
    }
}
