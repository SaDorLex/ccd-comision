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
        Schema::table('plaza_asignatura', function (Blueprint $table) {
            
            $table->dropForeign(['id_plaza']);
            $table->dropForeign(['id_asignatura']);
    
            
            $table->foreign('id_plaza')
                  ->references('id')->on('plazas')
                  ->onDelete('cascade');
                  
            $table->foreign('id_asignatura')
                  ->references('id')->on('asignaturas')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('plaza_asignatura', function (Blueprint $table) {
            
            $table->dropForeign(['id_plaza']);
            $table->dropForeign(['id_asignatura']);
    
            
            $table->foreign('id_plaza')
                  ->references('id')->on('plazas');
                  
            $table->foreign('id_asignatura')
                  ->references('id')->on('asignaturas');
        });
    }
};
