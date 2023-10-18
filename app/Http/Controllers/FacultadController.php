<?php

namespace App\Http\Controllers;

use App\Models\Facultad;
use Illuminate\Http\Request;

class FacultadController extends Controller
{
    public function store(Request $request)
    {
        $facultade = new Facultad();
        $facultade->nombre_facultad = $request->input('nombre_facultad');
        $facultade->save();
        return Response()->json($facultade, 200);

    }
    public function index()
    {
        $facultade = Facultad::all();
        return Response()->json($facultade);
    }
    public function update(Request $request, $id)
    {
        //
        $facultade = Facultad::find($id);
        $facultade->nombre_facultad = ucwords($request->input('nombre_facultad'));
        // $facultade->activo = $request->input('activo');
        $facultade->save();

        return response()->json($facultade, 200);
    }
    public function destroy($id)
    {
        $facultade = Facultad::find($id);
        $facultade->delete();

        return response()->json($facultade, 200);

    }
}
