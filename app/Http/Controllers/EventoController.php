<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use Illuminate\Http\Request;

class EventoController extends Controller
{
    public function index()
    {
        $evento = Evento::all();
        return Response()->json($evento, 200);
    }
    public function store(Request $request)
    {
        $evento = new Evento();
        $evento->nombre_evento = strtoupper($request->input('nombre_evento'));
        $evento->fecha_evento = $request->input('fecha_evento');
        $evento->cronograma = $request->input('cronograma');
        $evento->foto_ruta = $request->input('foto_ruta');
        $evento->descripcion = $request->input('descripcion');
        $evento->categoria_id = $request->input('categoria_id');
        // $evento->activo ='1';
        $evento->save();

        return Response()->json($evento, 200);

    }
    public function update(Request $request, $id)
    {
        //
        $evento = Evento::find($id);
        $evento->nombre_evento = strtoupper($request->input('nombre_evento'));
        $evento->fecha_evento = $request->input('fecha_evento');
        $evento->cronograma = $request->input('cronograma');
        $evento->foto_ruta = $request->input('foto_ruta');
        $evento->descripcion = $request->input('descripcion');
        $evento->categoria_id = $request->input('categoria_id');
        // $evento->activo = $request->input('activo');
        $evento->save();

        return response()->json($evento, 200);
    }
    public function destroy($id)
    {
        $evento = Evento::find($id);
        $evento->delete();

        return Response()->json($evento, 200);
    }
}
