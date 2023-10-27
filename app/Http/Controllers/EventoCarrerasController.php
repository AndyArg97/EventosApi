<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EventoCarreras;

class EventoCarrerasController extends Controller
{
    public function index()
    {
        $evento = EventoCarreras::all();
        return Response()->json($evento, 200);
    }
    public function store(Request $request)
    {
        $evento = new EventoCarreras();
        $evento->nombre_evento = strtoupper($request->input('nombre_evento'));
        $evento->fecha_evento = $request->input('fecha_evento');
        $evento->cronograma = $request->input('cronograma');
        $evento->foto_ruta = $request->input('foto_ruta');
        $evento->descripcion = $request->input('descripcion');
        $evento->categoria_id = $request->input('categoria_id');
        $evento->eventoCarreras_id = $request->input('eventoCarreras_id');
        $evento->enable ='1';
        $evento->save();

        return Response()->json($evento, 200);

    }
    public function update(Request $request, $id)
    {
        //
        $evento = EventoCarreras::find($id);
        $evento->nombre_evento = strtoupper($request->input('nombre_evento'));
        $evento->fecha_evento = $request->input('fecha_evento');
        $evento->cronograma = $request->input('cronograma');
        $evento->foto_ruta = $request->input('foto_ruta');
        $evento->descripcion = $request->input('descripcion');
        $evento->categoria_id = $request->input('categoria_id');
        $evento->eventoCarreras_id = $request->input('eventoCarreras_id');
        $evento->enable = $request->input('activo');
        $evento->save();

        return response()->json($evento, 200);
    }
    public function destroy($id)
    {
        $evento = EventoCarreras::find($id);
        $evento->delete();

        return Response()->json($evento, 200);
    }
}
