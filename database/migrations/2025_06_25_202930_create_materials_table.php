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
        Schema::create('materiales', function (Blueprint $table) {
            $table->integer('codigo')->primary();
            $table->string('unidadMedida', 50);
            $table->text('descripcion');
            $table->string('ubicacion', 100);
            $table->unsignedBigInteger('idCategoria');

            $table->foreign('idCategoria')->references('idCategoria')->on('categorias');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('materiales');
    }
};
