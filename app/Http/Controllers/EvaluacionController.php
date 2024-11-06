<?php

namespace App\Http\Controllers;

use App\Models\Convocatoria;
use App\Models\Evaluacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class EvaluacionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $evaluaciones = Evaluacion::all();
        return view('evaluaciones', compact('evaluaciones'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $evaluacion = Evaluacion::FindorFail($id);
        return view('evaluar',compact('evaluacion'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function filtrar(Request $request)
    {
        if($request->idPlaza == "")
        {
            $convocatorias = Convocatoria::with('plazas.evaluacion')->find($request->idConv);
            $evaluaciones = $convocatorias->plazas->flatMap->evaluacion;
        }else
        {
            $evaluaciones = Evaluacion::where('id_plaza', $request->idPlaza)->get();
        }
        return view('evaluaciones', compact('evaluaciones'));
    }
}
