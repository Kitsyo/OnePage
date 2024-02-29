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
            $table->unsignedBigInteger("usuario_id");
            $table->foreign("usuario_id")->references("id")->on("users")->onDelete('cascade');
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
