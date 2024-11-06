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
        Schema::create('archivos', function(Blueprint $table){
            $table->id();
            $table->unsignedBigInteger('id_postulacion');
            $table->unsignedBigInteger('id_responsable');
            $table->unsignedBigInteger('id_requisito');
            $table->string('nombre');
            $table->string('tipo_carpeta');
            $table->date('fecha_subido');
            $table->date('fecha_revisado');
            $table->timestamps();
            $table->string('estado', 1 )->default('1');
            $table->foreign('id_postulacion')->references('id')->on('postulaciones');
            $table->foreign('id_responsable')->references('id')->on('comisiones');
            $table->foreign('id_requisito')->references('id')->on('requisitos');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('archivos');
    }
};
