<?php

namespace App\Http\Controllers;

use App\Models\Asignatura;
use Dotenv\Util\Str;
use Illuminate\Http\Request;

class AsignaturaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $asignaturas = Asignatura::all();
        return response()->json($asignaturas);
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
    public function show(Request $request)
    {
        $id = $request->input('id');
        $asignatura = Asignatura::FindorFail($id);

        $html = view('components.rowCursoPlaza',compact('asignatura'))->render();

        return response()->json(['html' => $html]);
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

    public function listarPorDepAcad(Request $request)
    {
        $idDep = $request->input('idDep');
        $query = $request->input('query');

        $asignaturas = Asignatura::where('id_departamento', $idDep)->where('nombre','LIKE',"%{$query}%")->get();

        return response()->json($asignaturas);
    }
}
