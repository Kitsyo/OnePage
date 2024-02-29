<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Pedido extends Model
{
    use HasFactory;
    protected $fillable = [
        "nombre",
        "usuario_id",
        "fecha",
        "producto_id"
    ];
    public function productos()
    {
        return $this->belongsToMany(Producto::class, 'pedido_productos', 'pedido_id', 'producto_id');
    }
}
