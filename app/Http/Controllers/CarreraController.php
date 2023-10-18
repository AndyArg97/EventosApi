<?php

namespace App\Http\Controllers;

use App\Models\Carrera;
use Illuminate\Http\Request;

class CarreraController extends Controller
{
    public function index()
    {
        $carrera = Carrera::all();
        return Response()->json($carrera, 200);
    }
    public function store(Request $request)
    {
        $carrera = new Carrera();
        $carrera->nombre_carrera = ucwords($request->input('nombre_carrera'));
        $carrera->facultad_id = $request->input('facultad_id');
        $carrera->save();
        // $carrera->activo ='1';

        return Response()->json($carrera, 200);

    }
    public function update(Request $request, $id)
    {
        //
        $carrera = Carrera::find($id);
        $carrera->nombre = ucwords($request->input('nombre_carrera'));
        // $carrera->activo = $request->input('activo');
        $carrera->save();

        return response()->json($carrera, 200);
    }
    public function destroy($id)
    {
        $eliminar = Carrera::find($id);
        $eliminar->delete();

        return Response()->json($eliminar, 200);
    }
}
