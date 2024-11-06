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
        Schema::create('requisitos', function(Blueprint $table){
            $table->id();
            $table->unsignedBigInteger('id_convocatoria');
            $table->unsignedBigInteger('id_item');
            $table->string('nombre');
            $table->timestamps();
            $table->string('estado',1)->default('1');
            $table->foreign('id_convocatoria')->references('id')->on('convocatorias');
            $table->foreign('id_item')->references('id')->on('items_archivos');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('requisitos');
    }
};
