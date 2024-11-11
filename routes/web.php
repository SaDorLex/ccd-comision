<?php

use App\Models\Actividad;
use App\Http\Controllers\ActividadController;
use App\Http\Controllers\AsignaturaController;
use App\Http\Controllers\ClasificacionController;
use App\Http\Controllers\ConvocatoriaController;
use App\Http\Controllers\DepartamentoAcademicoController;
use App\Http\Controllers\EvaluacionController;
use App\Http\Controllers\FacultadController;
use App\Http\Controllers\HorarioConvocatoriaController;
use App\Http\Controllers\ItemsArchivosController;
use App\Http\Controllers\PlazaController;
use App\Http\Controllers\SemestreAcademicoController;
use App\Models\Convocatoria;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard');
})->name('inicio');


//CRUD de las actividades

Route::get('actividades', [ActividadController::class, 'index'])->name('actividades');

Route::post('crearActividad', [ActividadController::class, 'store'])->name('crearActividad');

Route::post('actividades/{id}/eliminar', [ActividadController::class, 'destroy'])->name('eliminarActividad');

Route::get('actividades/{id}', [ActividadController::class, 'edit'])->name('editarActividad');

Route::post('saveActividad', [ActividadController::class, 'update'])->name('saveActividad');

//CRUD de las plazas

Route::get('plazas', [PlazaController::class, 'index'])->name('plazas');

Route::get('plazas/crearPlaza', [PlazaController::class, 'create'])->name('crearPlaza');

Route::post('savePlaza', [PlazaController::class, 'store'])->name('savePlaza');

Route::post('deletePlaza/{id}', [PlazaController::class, 'destroy'])->name('deletePlaza');

Route::get('plazas/Convocatoria', [PlazaController::class, 'filtrar'])->name('filtrarPlazas');

Route::get('plazas/editar/{id}', [PlazaController::class, 'edit'])->name('editarPlaza');

Route::post('updatePlaza/{id}', [PlazaController::class, 'update'])->name('updatePlaza');

Route::get('listarPlazas', [PlazaController::class, 'indexJS'])->name('listarPlazas');

//CRUD de las Clasifaciones

Route::get('listarClasificacion', [ClasificacionController::class, 'index'])->name('listarClasificacion');

//CRUD de los departamentos Academicos

Route::get('listarDepAcad', [DepartamentoAcademicoController::class, 'indexFac'])->name('listarDepAcad');

//CRUD de las Asingaturas

Route::get('buscarAsignatura', [AsignaturaController::class, 'listarPorDepAcad'])->name('buscarAsignatura');

Route::get('getAsignatura',[AsignaturaController::class, 'show'])->name('getAsignatura');

//CRUD de las Convocatorias

Route::get('listarConvocatorias', [ConvocatoriaController::class, 'index'])->name('listarConvocatorias');

Route::get('crearConvocatoria', [ConvocatoriaController::class, 'create'])->name('crearConvocatoria');

Route::get('convocatorias', [ConvocatoriaController::class, 'indexView'])->name('convocatorias');

Route::post('crearConvocatoria', [ConvocatoriaController::class, 'store'])->name('crearConvocatoria');

Route::post('deleteConvocatoria/{id}', [ConvocatoriaController::class, 'destroy'])->name('deleteConvocatoria');

Route::get('convocatorias/editar/{id}', [ConvocatoriaController::class, 'edit'])->name('editarConvocatoria');

Route::post('updateConvocatoria/{id}', [ConvocatoriaController::class, 'update'])->name('updateConvocatoria');

//CRUD de las Facultades

Route::get('listarFacultades', [FacultadController::class, 'index'])->name('listarFacultades');

//CRUD de los Semestres

Route::get('listarSemestres', [SemestreAcademicoController::class, 'index'])->name('listarSemestres');

//CRUD de los horarios de Atención de Convocatoria

Route::get('ultimoHorario', [HorarioConvocatoriaController::class, 'lastHour'])->name('ultimoHorario');

//CRUD de las evaluaciones

Route::get('evaluaciones', [EvaluacionController::class, 'index'])->name('evaluaciones');

Route::get('buscarEvaluacion', [EvaluacionController::class, 'filtrar'])->name('buscarEvaluacion');

Route::get('evaluaciones/{id}', [EvaluacionController::class, 'show'])->name('evaluar');

//CRUD de los items de archivos para subir??? hay que cambiarle el nombre a esto :/

Route::get('listarItemsDisponibles', [ItemsArchivosController::class, 'index'])->name('listarItemsDisponibles');

Route::post('crearArchivoNuevo', [ItemsArchivosController::class, 'store'])->name('crearArchivoNuevo');

Route::get('getBladeArchivo', [ItemsArchivosController::class, 'show'])->name('getBladeArchivo');

Route::post('deleteArchivo', [ItemsArchivosController::class, 'destroy'])->name('deleteArchivo');

Route::get('editArchivo', [ItemsArchivosController::class, 'edit'])->name('editArchivo');

Route::post('updateArchivo', [ItemsArchivosController::class, 'update'])->name('updateArchivo');

//Ruta de prueba

Route::view('prueba', 'prueba');