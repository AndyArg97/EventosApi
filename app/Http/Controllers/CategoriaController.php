<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    public function index()
    {
        $categoria = Categoria::all();
        return Response()->json($categoria, 200);
    }
    public function store(Request $request)
    {
        $categoria = new Categoria();
        $categoria->tipo_categoria = ucwords($request->input('tipo_categoria'));
        // $categoria->activo ='1';
        $categoria->save();

        return Response()->json($categoria, 200);

    }
    public function update(Request $request, $id)
    {
        //
        $categoria = Categoria::find($id);
        $categoria->tipo_categoria = ucwords($request->input('tipo_categoria'));
        // $categoria->activo = $request->input('activo');
        $categoria->save();

        return response()->json($categoria, 200);
    }
    public function destroy($id)
    {
        $categoria = Categoria::find($id);
        $categoria->delete();

        return Response()->json($categoria, 200);
    }
}
