<?php

namespace App\Http\Controllers;

use App\Models\Persona;
use Illuminate\Http\Request;

class PersonaController extends Controller
{
    public function index()
    {
        $persona = Persona::all();
        return Response()->json($persona, 200);
    }
    public function store(Request $request)
    {
        $persona = new Persona();
        $persona->nombre = $request->input('nombre');
        $persona->apellido = $request->input('apellido');
        $persona->ci = $request->input('ci');
        $persona->fecha_nacimiento = $request->input('fecha_nacimiento');
        $persona->user_id = $request->input('user_id');
        $persona->personal_id = $request->input('personal_id');
        $persona->carrera_id = $request->input('carrera_id');
        // $persona->activo ='1';
        $persona->save();

        return Response()->json($persona, 200);

    }
    public function update(Request $request, $id)
    {
        //
        $persona = Persona::find($id);
        $persona->nombre = $request->input('nombre');
        $persona->apellido = $request->input('apellido');
        $persona->ci = $request->input('ci');
        $persona->fecha_nacimiento = $request->input('fecha_nacimiento');
        $persona->user_id = $request->input('user_id');
        $persona->personal_id = $request->input('personal_id');
        $persona->carrera_id = $request->input('carrera_id');
        // $persona->activo = $request->input('activo');
        $persona->save();

        return response()->json($persona, 200);
    }
    public function destroy($id)
    {
        $persona = Persona::find($id);
        $persona->delete();

        return Response()->json($persona, 200);
    }
}
