<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EventoFacultativo;

class EventoFacultativoController extends Controller
{
    public function index()
    {
        $evento = EventoFacultativo::all();
        return Response()->json($evento, 200);
    }
    public function store(Request $request)
    {
        $evento = new EventoFacultativo();
        $evento->nombre_evento = strtoupper($request->input('nombre_evento'));
        $evento->fecha_evento = $request->input('fecha_evento');
        $evento->cronograma = $request->input('cronograma');
        $evento->foto_ruta = $request->input('foto_ruta');
        $evento->descripcion = $request->input('descripcion');
        $evento->categoria_id = $request->input('categoria_id');
        $evento->eventoFacultativo_id = $request->input('eventoFacultativo_id');
        $evento->enable ='1';
        $evento->save();

        return Response()->json($evento, 200);

    }
    public function update(Request $request, $id)
    {
        $evento = EventoFacultativo::find($id);
        $evento->nombre_evento = strtoupper($request->input('nombre_evento'));
        $evento->fecha_evento = $request->input('fecha_evento');
        $evento->cronograma = $request->input('cronograma');
        $evento->foto_ruta = $request->input('foto_ruta');
        $evento->descripcion = $request->input('descripcion');
        $evento->categoria_id = $request->input('categoria_id');
        $evento->eventoFacultativo_id = $request->input('eventoFacultativo_id');
        $evento->enable = $request->input('activo');
        $evento->save();

        return response()->json($evento, 200);
    }
    public function destroy($id)
    {
        $evento = EventoFacultativo::find($id);
        $evento->delete();

        return Response()->json($evento, 200);
    }
}
