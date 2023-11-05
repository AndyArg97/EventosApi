<?php

namespace App\Http\Controllers;

use App\Models\Facultad;
use Illuminate\Http\Request;

class FacultadController extends Controller
{
    public function store(Request $request)
    {
        $facultade = new Facultad();
        $facultade->nombre = $request->input('nombre');
        $facultade->save();
        return response()->json($facultade, 200);

    }
    public function index()
    {
        $facultade = Facultad::all();
        return response()->json($facultade);
    }
    public function update(Request $request, $id)
    {
        //
        $facultade = Facultad::find($id);
        $facultade->nombrE = ucwords($request->input('nombre'));
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
