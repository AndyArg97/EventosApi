<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use Illuminate\Http\Request;

class EventoController extends Controller
{
    public function index()
    {
        $evento = Evento::with(['categoria','facultad','carrera','personal'])->get();
        
        return response()->json($evento, 200);
    }
    public function store(Request $request)
    {
        $evento = new Evento();
        $evento->nombre_evento = strtoupper($request->input('nombre_evento'));
        $evento->fecha_inicio = $request->input('fecha_inicio');
        $evento->fecha_fin = $request->input('fecha_fin');
        $evento->foto_ruta = $request->input('foto_ruta');
        $evento->descripcion = $request->input('descripcion');
        $evento->ubicacion = $request->input('ubicacion');
        switch ($request->input('categoria_id')) {
            case 1:
                $evento->facultad_id = $request->input('categoria_id');
                // $evento->carrera_id = '';
                // $evento->personal_id = '';
                break;
            case 2:
                // $evento->facultad_id = '';
                $evento->carrera_id = $request->input('categoria_id');
                // $evento->personal_id = '';
                break;
            case 3:
                // $evento->facultad_id = '';
                // $evento->carrera_id = '';
                $evento->personal_id = $request->input('categoria_id');
                break;
            }
        $evento->categoria_id = $request->input('categoria_id');
        
        $evento->enable = 'true';
        $evento->save();

        return response()->json($evento, 200);

    }
    public function update(Request $request, $id)
    {
        //
        $evento = Evento::find($id);
        $evento->nombre_evento = strtoupper($request->input('nombre_evento'));
        $evento->fecha_inicio = $request->input('fecha_inicio');
        $evento->fecha_fin = $request->input('fecha_fin');
        $evento->foto_ruta = $request->input('foto_ruta');
        $evento->descripcion = $request->input('descripcion');
        $evento->ubicacion = $request->input('ubicacion');
        switch ($request->input('categoria_id')) {
            case 1:
                $evento->facultad_id = $request->input('categoria_id');
                // $evento->carrera_id = '';
                // $evento->personal_id = '';
                break;
            case 2:
                // $evento->facultad_id = '';
                $evento->carrera_id = $request->input('categoria_id');
                // $evento->personal_id = '';
                break;
            case 3:
                // $evento->facultad_id = '';
                // $evento->carrera_id = '';
                $evento->personal_id = $request->input('categoria_id');
                break;
            }
        $evento->categoria_id = $request->input('categoria_id');
        // $evento->enable = $request->input('activo');
        $evento->save();

        return response()->json($evento, 200);
    }
    public function destroy($id)
    {
        $evento = Evento::find($id);
        $evento->delete();

        return response()->json($evento, 200);
    }
}
