<?php

namespace App\Http\Controllers;

use App\Models\DepartamentoAcademico;
use App\Models\Facultad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class DepartamentoAcademicoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $depsAcad = DepartamentoAcademico::all();
        return response()->json($depsAcad);
    }

    public function indexFac(Request $request)
    {
        $facultad = Facultad::FindOrFail($request->idFa);
        $depsAcad = $facultad->depAcad;
        return response()->json($depsAcad);
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
        //
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
}
