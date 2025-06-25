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
      Schema::create('material_unidads', function (Blueprint $table) {
        $table->unsignedBigInteger('codigo');
        $table->unsignedBigInteger('idUnidad');
        $table->integer('cantidadDisponible');

        $table->primary(['codigo', 'idUnidad']); 
        $table->foreign('codigo')->references('codigo')->on('materiales');
        $table->foreign('idUnidad')->references('idUnidad')->on('unidades');
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('material_unidads');
    }
};
