<?php

namespace App\Http\Controllers;

use App\Models\Persona;
use Illuminate\Http\Request;

class PersonaController extends Controller
{
    public function index()
    {
        $persona = Persona::with(['personal','carrera'])->get();
        return response()->json($persona, 200);
    }
    public function show($id)
    {
        $persona = Persona::with(['personal','carrera'])->find($id);

        return response()->json($persona, 200);
    }
    public function store(Request $request)
    {
        $persona = new Persona();
        $persona->nombre = $request->input('nombre');
        $persona->apellido = $request->input('apellido');
        $persona->ci = $request->input('ci');
        $persona->fecha_nacimiento = $request->input('fecha_nacimiento');
        switch ($request->input('objeto_id')) {
            case 1:
                $evento->carrera_id = $request->input('objeto_id');
                // $evento->personal_id = 0;
                break;
            case 2:
                // $evento->carrera_id = 0;
                $evento->personal_id = $request->input('objeto_id');
                break;
        }
        $persona->user_id = $request->input('user_id');
        // $persona->activo ='1';
        $persona->save();

        return response()->json($persona, 200);

    }
    public function update(Request $request, $id)
    {
        //
        $persona = Persona::find($id);
        $persona->nombre = $request->input('nombre');
        $persona->apellido = $request->input('apellido');
        $persona->ci = $request->input('ci');
        $persona->fecha_nacimiento = $request->input('fecha_nacimiento');
        switch ($request->input('objeto_id')) {
            case 1:
                $evento->carrera_id = $request->input('objeto_id');
                // $evento->personal_id = 0;
                break;
            case 2:
                // $evento->carrera_id = 0;
                $evento->personal_id = $request->input('objeto_id');
                break;
        }
        $persona->user_id = $request->input('user_id');
        // $persona->activo = $request->input('activo');
        $persona->save();

        return response()->json($persona, 200);
    }
    public function destroy($id)
    {
        $persona = Persona::find($id);
        $persona->delete();

        return response()->json($persona, 200);
    }
}
