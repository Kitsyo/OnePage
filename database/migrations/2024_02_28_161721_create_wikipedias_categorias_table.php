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
        Schema::create('wikipedias_categorias', function (Blueprint $table) {  
            $table->id();          
            $table->unsignedBigInteger("wikipedia_id")->unsigned();
            $table->unsignedBigInteger("categoria_id")->unsigned();            
            $table->foreign("wikipedia_id")->references("id")->on("wikipedias")->onDelete('cascade');
            $table->foreign("categoria_id")->references("id")->on("categorias")->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wikipedias_categorias');
    }
};
