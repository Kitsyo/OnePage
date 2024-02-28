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
        Schema::create('noticias_categorias', function (Blueprint $table) {
            $table->unsignedBigInteger("idWikipedia")->unsigned();
            $table->unsignedBigInteger("idNoticia")->unsigned();
            $table->foreign("idWikipedia")->references("id")->on("wikipedias")->onDelete('cascade');
            $table->foreign("idNoticia")->references("id")->on("noticias")->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('noticias_categorias');
    }
};
