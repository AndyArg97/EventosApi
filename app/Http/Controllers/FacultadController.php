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
    }
    public function index()
    {
        $facultade = Facultad::all();
        return Response()->json($facultade);
    }
    public function destroy($facultade)
    {
        $eliminar = Facultad::find($facultade);
        $eliminar->delete();

    }
}
