<?php

namespace App\Http\Controllers;

use App\Models\Actividad;
use App\Models\Convocatoria;
use App\Models\HorarioConvocatoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class ConvocatoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $convocatorias = Convocatoria::all();
        return response()->json($convocatorias);
    }

    public function indexView()
    {
        $convocatorias = Convocatoria::all();
        return view('convocatorias', compact('convocatorias'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $actividades = Actividad::all();
        return view('crearConvocatoria', compact('actividades'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'idActividades' => 'required|array|min:1',
            'fechas_inicio' => 'required|array|min:1',
            'fechas_termino' => 'required|array|min:1',
            'diasAtencion' => 'required|array|min:7',
            'idActividades.*' => 'exists:actividades,id',
            'fechas_inicio.*' => 'date',
            'fechas_termino.*' => 'date',
            'fileBases' => 'required|file|max:10240',
            'idsArchivos' => 'required|array|min:1',
        ]);

        $idsAct = $request->input('idActividades');
        $fechas_inicio = $request->input('fechas_inicio');
        $fechas_termino = $request->input('fechas_termino');

        $diasAtencion = $request->input('diasAtencion');

        $horario = ConvocatoriaController::funcHorario($diasAtencion, $request->horaInicio, $request->horaFin);

        $archivo = $request->file('fileBases');
        $nombreArchivo = $archivo->getClientOriginalExtension();
        $rutaArchivo = Storage::disk('public')->putFile('bases', $archivo);
        $rutaArchivo = 'storage/' . $rutaArchivo;
        

        $convocatoria = Convocatoria::create([
            'id_semestre' => $request->semestre,
            'fecha_inicio' => $request->fechaInicio,
            'fecha_termino' => $request->fechaTermino,
            'base' => $rutaArchivo,
            'estado_pago' => $request->pago,
            'comentarios' => $request->comentarios,
            'id_horario' => $horario->id,
        ]);

        $data = [];
        foreach($idsAct as $index => $id){
            $data[$id] = [
                'fecha_inicio' => $fechas_inicio[$index],
                'fecha_termino' => $fechas_termino[$index]
            ];
        };

        $convocatoria->actividades()->attach($data);

        $convocatoria->itemsArchivos()->attach($request->idsArchivos);

        return response()->json(['redirect' => route('convocatorias')]);
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $convocatoria = Convocatoria::FindorFail($id);
        $convocatoria->itemsArchivos;
        $actividades = Actividad::all();
        return view('editarConvocatoria', compact('convocatoria', 'actividades'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'idActividades' => 'required|array|min:1',
            'fechas_inicio' => 'required|array|min:1',
            'fechas_termino' => 'required|array|min:1',
            'diasAtencion' => 'required|array|min:7',
            'idActividades.*' => 'exists:actividades,id',
            'fechas_inicio.*' => 'date',
            'fechas_termino.*' => 'date',
        ]);

        $idsAct = $request->input('idActividades');
        $fechas_inicio = $request->input('fechas_inicio');
        $fechas_termino = $request->input('fechas_termino');

        $diasAtencion = $request->input('diasAtencion');

        $horario = ConvocatoriaController::funcHorario($diasAtencion, $request->horaInicio, $request->horaFin);

        $archivo = $request->file('fileBases');
        if($archivo){
            $nombreArchivo = $archivo->getClientOriginalExtension();
            $rutaArchivo = Storage::disk('public')->putFile('bases', $archivo);
            $rutaArchivo = 'storage/' . $rutaArchivo;
        }

        $convocatoria = Convocatoria::FindorFail($id);
        $convocatoria->id_semestre = $request->semestre;
        $convocatoria->fecha_inicio = $request->fechaInicio;
        $convocatoria->fecha_termino = $request->fechaTermino;
        
        if($archivo){
            $convocatoria->base = $rutaArchivo;
        }
        
        $convocatoria->estado_pago = $request->pago;
        $convocatoria->comentarios = $request->comentarios;
        $convocatoria->id_horario = $horario->id;

        $convocatoria->save();

        $data = [];
        foreach($idsAct as $index => $id){
            $data[$id] = [
                'fecha_inicio' => $fechas_inicio[$index],
                'fecha_termino' => $fechas_termino[$index]
            ];
        };

        $convocatoria->actividades()->detach();

        $convocatoria->actividades()->attach($data);

        return response()->json(['redirect' => route('convocatorias')]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $convocatoria = Convocatoria::FindorFail($id);
        $convocatoria->delete();
        return redirect()->route('convocatorias');
    }

    public function funcHorario(array $dias, string $horaInicio, string $horaFin)
    {
        $lunes = $dias[0] == "true" ? 1 : 0;
        $martes = $dias[1] == "true" ? 1 : 0;
        $miercoles = $dias[2] == "true" ? 1 : 0;
        $jueves = $dias[3] == "true" ? 1 : 0;
        $viernes = $dias[4] == "true" ? 1 : 0;
        $sabado = $dias[5] == "true" ? 1 : 0;
        $domingo = $dias[6] == "true" ? 1 : 0;
        $horario = HorarioConvocatoria::where('Lunes', 'like', $lunes)
        ->where('Martes', 'like', $martes)
        ->where('Miercoles', 'like', $miercoles)
        ->where('Jueves', 'like', $jueves)
        ->where('Viernes', 'like', $viernes)
        ->where('Sabado', 'like', $sabado)
        ->where('Domingo', 'like', $domingo)
        ->where('hora_inicio', 'like', $horaInicio)
        ->where('hora_termino', 'like', $horaFin)
        ->first();

        if($horario){
            Log::info('Encontrado');
            Log::info($horario);
            return $horario;
        }else{
            $horario = HorarioConvocatoria::create([
                'Lunes' => $lunes,
                'Martes' => $martes,
                'Miercoles' => $miercoles,
                'Jueves' => $jueves,
                'Viernes' => $viernes,
                'Sabado' => $sabado,
                'Domingo' => $domingo,
                'hora_inicio' => $horaInicio,
                'hora_termino' => $horaFin
            ]);
            Log::info('Creado');
            Log::info($horario);
            return $horario;
        }
    }
}
