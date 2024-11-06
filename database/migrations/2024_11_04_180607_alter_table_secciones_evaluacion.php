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
        Schema::rename('secciones_evaluacion', 'seccion_evaluaciones');

        Schema::table('seccion_evaluaciones', function (Blueprint $table) {
            $table->string('tipo_evaluacion');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::rename('secciones_evaluacion', 'secciones_evaluacion');

        Schema::table('seccion_evaluaciones', function (Blueprint $table) {
            $table->dropColumn('tipo_evaluacion');
        });
    }
};
