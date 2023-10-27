<?php

namespace App\Http\Controllers;

use App\Models\Actividad;
use App\Http\Requests\StoreActividadRequest;
use App\Http\Requests\UpdateActividadRequest;

class ActividadController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $actividad = Actividad::all();
        return Response()->json($actividad, 200);
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
        $actividad = new Actividad();
        $actividad->fila_actividad = strtoupper($request->input('fila_actividad'));
        $actividad->hora_inicio = $request->input('hora_inicio');
        $actividad->hora_fin = $request->input('hora_fin');
        $actividad->evento_id = $request->input('evento_id');
        $actividad->save();

        return Response()->json($actividad, 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(Actividad $actividad)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Actividad $actividad)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $actividad = Actividad::find($id);
        $actividad->fila_actividad = strtoupper($request->input('fila_actividad'));
        $actividad->hora_inicio = $request->input('hora_inicio');
        $actividad->hora_fin = $request->input('hora_fin');
        $actividad->evento_id = $request->input('evento_id');
        $actividad->save();

        return Response()->json($actividad, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $actividad = Actividad::find($id);
        $actividad->delete();

        return Response()->json($actividad, 200);
    }
}
