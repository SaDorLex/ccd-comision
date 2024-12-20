<?php

namespace App\Http\Controllers;

use App\Models\ItemsArchivos;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Log;

class ItemsArchivosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = ItemsArchivos::where('estado', '1')->get();
        return response()->json($items);
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
        
        try{
            $item = ItemsArchivos::create([
                'nombre' => $request->nombreRequisito,
                'tipo_carpeta' => $request->tipoCarpeta,
            ]);
            return response()->json(['mensaje' => 'true']);
        }catch(Exception $e){
            return response()->json(['mensaje' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        $id = $request->id;
        $item = ItemsArchivos::FindorFail($id);

        $html = view('components.rowCargaDeArchivos',compact('item'))->render();
        
        return response()->json(['html'=>$html]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {
        $id = $request->id;

        $item = ItemsArchivos::FindorFail($id);

        return response()->json(['item'=>$item]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $id = $request->idReq;

        $item = ItemsArchivos::FindorFail($id);

        $item->nombre = $request->nombreReq;
        $item->tipo_carpeta = $request->tipoCarpeta;

        $item->save();

        return response()->json(['mensaje'=>'Requisito de Archivo Modificado Correctamente']);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $item = ItemsArchivos::FindorFail($request->id);
        
        $item->estado = 0;

        $item->save();

        return response()->json(['mensaje'=>'Requisito de Archivo Eliminado Correctamente']);
    }
}
