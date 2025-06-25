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
    Schema::create('requisiciones', function (Blueprint $table) {
        $table->id('idRequisicion');
        $table->date('fecha');
        $table->string('estado', 50);

        $table->unsignedBigInteger('idUsuario');
        $table->unsignedBigInteger('idUnidad');
        $table->unsignedBigInteger('idPresupuesto');

        $table->foreign('idUsuario')->references('idUsuario')->on('usuarios');
        $table->foreign('idUnidad')->references('idUnidad')->on('unidades');
        $table->foreign('idPresupuesto')->references('idPresupuesto')->on('presupuestos');
    });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('requisicions');
    }
};
