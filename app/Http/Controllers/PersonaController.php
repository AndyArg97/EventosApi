<?php

namespace App\Http\Controllers;

use App\Models\Carrera;
use App\Models\Persona;
use App\Models\Facultad;
use Illuminate\Http\Request;

class PersonaController extends Controller
{
    public function index()
    {
        $persona = Persona::with(['personal','facultad','carrera'])->get();
        return response()->json($persona, 200);
    }
    public function show($id)
    {
        $persona = Persona::with(['personal','facultad','carrera'])->find($id);

        return response()->json($persona, 200);
    }
    public function store(Request $request)
    {
        $persona = new Persona();
        $persona->primer_nombre = $request->input('primer_nombre');
        $persona->segundo_nombre = $request->input('segundo_nombre');
        $persona->apellido_paterno = $request->input('apellido_paterno');
        $persona->apellido_materno = $request->input('apellido_materno');
        $persona->ci = $request->input('ci');
        $persona->fecha_nacimiento = $request->input('fecha_nacimiento');
        switch ($request->input('objeto_id')) {
            case 1:
                $evento->facultad_id = $request->input('objeto_id');
                // $facultad = Facultad::find($request->input('objeto_id'));
                // $carreras = Carrera::where('facultad_id', $facultad->id)->get();
                // $evento->personal_id = 0;
                break;
            case 2:
                // $evento->carrera_id = 0;
                $evento->personal_id = $request->input('objeto_id');
                break;
        }
        $persona->carrera_id = $request->input('carrera_id');
        $persona->user_id = $request->input('user_id');
        // $persona->activo ='1';
        $persona->save();

        return response()->json($persona, 200);

    }
    public function update(Request $request, $id)
    {
        //
        $persona = Persona::find($id);
        $persona->primer_nombre = $request->input('primer_nombre');
        $persona->segundo_nombre = $request->input('segundo_nombre');
        $persona->apellido_paterno = $request->input('apellido_paterno');
        $persona->apellido_materno = $request->input('apellido_materno');
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
