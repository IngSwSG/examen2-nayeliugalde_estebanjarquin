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
         Schema::create('presupuestos', function (Blueprint $table) {
        $table->id('idPresupuesto');
        $table->integer('anio');
        $table->decimal('montoDisponible', 12, 2);
        $table->unsignedBigInteger('idUnidad');

        $table->foreign('idUnidad')->references('idUnidad')->on('unidades');
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('presupuestos');
    }
};
