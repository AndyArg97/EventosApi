<?php

namespace App\Http\Controllers;

use App\Models\Carrera;
use Illuminate\Http\Request;

class CarreraController extends Controller
{
    public function index()
    {
        $carrera = Carrera::all();
        return response()->json($carrera, 200);
    }
    public function store(Request $request)
    {
        $carrera = new Carrera();
        $carrera->nombre = ucwords($request->input('nombre'));
        $carrera->facultad_id = $request->input('facultad_id');
        $carrera->save();
        // $carrera->activo ='1';

        return response()->json($carrera, 200);

    }
    public function update(Request $request, $id)
    {
        //
        $carrera = Carrera::find($id);
        $carrera->nombre = ucwords($request->input('nombre'));
        $carrera->facultad_id = $request->input('facultad_id');
        // $carrera->activo = $request->input('activo');
        $carrera->save();

        return response()->json($carrera, 200);
    }
    public function destroy($id)
    {
        $eliminar = Carrera::find($id);
        $eliminar->delete();

        return response()->json($eliminar, 200);
    }
}
