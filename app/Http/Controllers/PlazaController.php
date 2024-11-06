<?php

namespace App\Http\Controllers;

use App\Models\Plaza;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PlazaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $plazas = Plaza::orderBy('id_convocatoria','asc')->get();
        return view('plazas', compact('plazas'));
    }

    public function indexJS(Request $request)
    {
        $plazas = Plaza::where('id_convocatoria','like',$request->id)->get();
        return response()->json($plazas);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('crearPlaza');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'asignaturas' => 'required|array|min:1',
            'asignaturas.*' => 'exists:asignaturas,id',
        ]);

        $plaza = Plaza::create([
            'id_convocatoria' => $request->id_convocatoria,
            'id_clasificacion' => $request->id_clasificacion,
            'horas_lectivas' => $request->horas_lectivas,
            'horas_no_lectivas' => $request->horas_no_lectivas,
            'horas_semanales' => $request->horas_semanales,
            'requisitos_descripcion' => $request->requisitos_descripcion,
        ]);

        $plaza->asignaturas()->attach($request->input('asignaturas'));

        return response()->json(['redirect' => route('plazas')]);
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
        $plaza = Plaza::FindorFail($id);
        return view('editarPlaza',compact('plaza'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        
        $request->validate([
            'asignaturas' => 'required|array|min:1',
            'asignaturas.*' => 'exists:asignaturas,id',
        ]);
        
        $plaza = Plaza::FindorFail($id);
        
        $plaza->id_convocatoria = $request->id_convocatoria;
        $plaza->id_clasificacion = $request->id_clasificacion;
        $plaza->horas_lectivas = $request->horas_lectivas;
        $plaza->horas_no_lectivas = $request->horas_no_lectivas;
        $plaza->horas_semanales = $request->horas_semanales;
        $plaza->requisitos_descripcion = $request->requisitos_descripcion;

        $plaza->save();

        $plaza->asignaturas()->detach();

        $plaza->asignaturas()->attach($request->input('asignaturas'));

        return response()->json(['redirect' => route('plazas')]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $plaza = Plaza::FindorFail($id);
        $plaza->delete();
        return redirect()->route('plazas');
    }

    public function filtrar(Request $request){
        $id_convocatoria = $request->idConv;
        $plazas = Plaza::where('id_convocatoria', $id_convocatoria)->get();
        return view('plazas', compact('plazas'));
    }
}
