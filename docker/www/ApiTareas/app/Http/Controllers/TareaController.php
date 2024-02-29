<?php

namespace App\Http\Controllers;

use App\Http\Resources\TareaResource;
use App\Models\Tarea;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TareaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index():JsonResource
    {
        $tareas = Tarea::all();
        return TareaResource::collection($tareas);

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
        $tarea = new Tarea();
        $tarea->titulo = $request->titulo;
        $tarea->descripcion = $request->descripcion;
        $tarea->save();

        $tarea->etiqueta()->attach($request->etiqueta);

        return new TareaResource($tarea);
    }

    /**
     * Display the specified resource.
     */
    public function show($id):JsonResource
    {
        $tarea = Tarea::find($id);
        return new TareaResource($tarea);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tarea $tarea)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id):JsonResource
    {
        $tarea = Tarea::find($id);
        $tarea->titulo = $request->titulo;
        $tarea->descripcion = $request->descripcion;
        $tarea->etiqueta()->detach(); 
        $tarea->etiqueta()->attach($request->etiqueta);
        $tarea->save();

        return new TareaResource($tarea);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $tarea = Tarea::find($id);
        $tarea->delete();
        return response()->json(["success"=> true], 200);
    }
}
