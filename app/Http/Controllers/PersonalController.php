<?php

namespace App\Http\Controllers;

use App\Models\Personal;
use Illuminate\Http\Request;

class PersonalController extends Controller
{
    public function index()
    {
        $personal = Personal::all();
        return response()->json($personal, 200);
    }
    public function store(Request $request)
    {
        $personal = new Personal();
        $personal->nombre = ucwords($request->input('nombre'));
        // $personal->activo ='1';
        $personal->save();

        return response()->json($personal, 200);

    }
    public function update(Request $request, $id)
    {
        //
        $personal = Personal::find($id);
        $personal->nombre = ucwords($request->input('nombre'));
        // $personal->activo = $request->input('activo');
        $personal->save();

        return response()->json($personal, 200);
    }
    public function destroy($id)
    {
        $personal = Personal::find($id);
        $personal->delete();

        return response()->json($personal, 200);
    }
}
