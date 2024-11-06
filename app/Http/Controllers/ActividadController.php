<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Actividad;
use Illuminate\Support\Facades\Log;
use Illuminate\Notifications\Action;

class ActividadController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $actividades = Actividad::all();
        return view('actividades', compact('actividades'));
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
            'descripcion' => 'required',
        ]);
        
        Actividad::create($request->all());

        return redirect()->route('actividades');
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
        $actividad = Actividad::FindOrFail($id);

        return response()->json($actividad);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $id =  $request->input('id');

        $request->validate([
            'descripcion' => 'required',
        ]);

        $actividad = Actividad::FindOrFail($id);

        $actividad->descripcion = $request->input('descripcion');

        $actividad->save();

        return redirect()->route('actividades');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $actividad = Actividad::FindOrFail($id);

        $actividad->delete();

        return redirect()->route('actividades');
    }
}
