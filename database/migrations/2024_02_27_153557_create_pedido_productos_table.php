<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pedido_productos', function (Blueprint $table) {
            $table->unsignedBigInteger("idPedido")->unsigned();
            $table->unsignedBigInteger("idProducto")->unsigned();
            $table->foreign("idPedido")->references("id")->on("pedidos")->onDelete('cascade');
            $table->foreign("idProducto")->references("id")->on("productos")->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pedido_productos');
    }
};
