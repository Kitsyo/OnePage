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
        Schema::create('wikipedias', function (Blueprint $table) {
            $table->id();
            $table->string("titulo");
            $table->longText("contenido");
            $table->unsignedBigInteger("idUsuario");
            $table->unsignedBigInteger("idCategoria");
            $table->foreign("idUsuario")->references("id")->on("users")->onDelete('cascade');
            //$table->foreign("idCategoria")->references("id")->on("categorias")->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wikipedias');
    }
};
