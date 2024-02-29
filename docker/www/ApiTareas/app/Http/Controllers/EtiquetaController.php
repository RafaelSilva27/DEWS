<?php

namespace App\Http\Controllers;

use App\Models\Etiqueta;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\EtiquetaResource;



class EtiquetaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index():JsonResource
    {
        $etiquetas = Etiqueta::all();
        return JsonResource::collection($etiquetas);
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
    public function store(Request $request):JsonResource
    {
        $etiqueta = new Etiqueta();
        $etiqueta->nombre = $request->nombre;
        $etiqueta->save();

        return new EtiquetaResource($etiqueta);
    }

    /**
     * Display the specified resource.
     */
    public function show($id):JsonResource
    {
        $etiqueta = Etiqueta::find($id);
        return new EtiquetaResource($etiqueta);
    }
  
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Etiqueta $etiqueta)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id):JsonResource
    {
        $etiqueta = Etiqueta::find($id);
        $etiqueta->nombre = $request->nombre;
        $etiqueta->save();

        return new EtiquetaResource($etiqueta);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $tarea = Etiqueta::find($id);
        $tarea->delete();
        return response()->json(["success"=> true], 200);
    }
}
