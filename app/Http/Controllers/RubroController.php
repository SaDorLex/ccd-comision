<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rubro;

class RubroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('rubrica');
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
        $request->validate([
            'nombre' => 'required',
            'puntaje' => 'required',
            'tipo' => 'required'
        ]);

        Rubro::create([
            'nombre' => $request->input('nombre'),
            'puntaje' => $request->input('puntaje'),
            'tipo' => $request->input('tipo'),
        ]);

        return redirect()->route('rubrica');
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

    public function listarPorMeritos(){
        $rubros = Rubro::where('tipo','0')->get();

        $html = '';

        foreach($rubros as $rubro){
            $html .= view('components.seccionRubrica', compact('rubro'))->render();
        }

        return response()->json(['html'=>$html]);
    }

    public function listarPorDesempeño(){
        $rubros = Rubro::where('tipo','1')->get();

        $html = '';

        foreach($rubros as $rubro){
            $html .= view('components.seccionRubrica', compact('rubro'))->render();
        }

        return response()->json(['html'=>$html]);
    }
}
