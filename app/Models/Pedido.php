<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;
    protected $fillable = [
        "nombre",
        "idUsuario",
        "fecha",
        "idProducto"
    ];
    public function productos()
    {
        return $this->belongsToMany(Producto::class,'pedido_productos');
    }
}
