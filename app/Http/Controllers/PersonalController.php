<?php

namespace App\Http\Controllers;

use App\Models\Personal;
use Illuminate\Http\Request;

class PersonalController extends Controller
{
    public function index()
    {
        $personal = Personal::all();
        return Response()->json($personal, 200);
    }
    public function store(Request $request)
    {
        $personal = new Carrera();
        $personal->area = ucwords($request->input('area'));
        // $personal->activo ='1';
        $personal->save();

        return Response()->json($personal, 200);

    }
    public function update(Request $request, $id)
    {
        //
        $personal = Personal::find($id);
        $personal->area = ucwords($request->input('area'));
        // $personal->activo = $request->input('activo');
        $personal->save();

        return response()->json($personal, 200);
    }
    public function destroy($id)
    {
        $eliminar = Personal::find($id);
        $eliminar->delete();

        return Response()->json($personal, 200);
    }
}
