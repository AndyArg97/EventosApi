<?php

namespace App\Http\Controllers;

use Validator;
use App\Models\User;
use App\Models\Persona;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {  
        if(Auth::attempt(['name' => $request->email, 'password' => $request->password])){
          $name = Auth::user();
          $success['token'] =  $name->createToken('LaraPassport')->accessToken;
          $success['user'] =  $name;
          $success['user']['roles'] = Auth::user()->rol()->get();
          return response()->json([
            'status' => 'success',
            'data' => $success
          ]);
        } 
        else {
          return response()->json('Usuario o Contraseña incorrectos', 500);
        }
    }

    public function register(Request $request)
    {
      $validator = Validator::make($request->all(), [
        'name' => 'required',
        'role_id' => 'required',
        'email' => 'required|email',
        'password' => 'required',
        'c_password' => 'required|same:password',
      ]);
      if ($validator->fails()) {
        return response()->json(['error'=>$validator->errors()]);
      }
      $postArray = $request->all();
      $postArray['password'] = bcrypt($postArray['password']);
      $user = User::create($postArray);
      $success['token'] =  $user->createToken('LaraPassport')->accessToken;
      $success['name'] =  $user->name;
      return response()->json([
        'status' => 'success',
        'data' => $success,
      ]);
    }

    public function registerWebSite(Request $request)
    {
      $validator = Validator::make($request->all(), [
        'name' => 'required',
        'role_id' => 3,
        'email' => 'required|email',
        'password' => 'required',
        'c_password' => 'required|same:password',
        'primer_nombre' => 'required',
        'segundo_nombre' => 'nullable',
        'apellido_paterno' => 'required',
        'apellido_materno' => 'nullable',
        'ci' => 'required',
        'fecha_nacimiento' => 'required|date',
        // 'personal_id' => 'nullable|numeric',
        'carrera_id' => 'nullable|numeric',
      ]);
      if ($validator->fails()) {
        return response()->json(['error'=>$validator->errors()]);
      }

      $postArray = $request->all();

    //   $persona = new Persona([
    //     'primer_nombre' => $request->input('primer_nombre'),
    //     'segundo_nombre' => $request->input('segundo_nombre'),
    //     'apellido_paterno' => $request->input('apellido_paterno'),
    //     'apellido_materno' => $request->input('apellido_materno'),
    //     'ci' => $request->input('ci'),
    //     'fecha_nacimiento' => $request->input('fecha_nacimiento'),
    //     'personal_id' => $request->input('personal_id'),
    //     'facultad_id' => $request->input('facultad_id'),
    //     'carrera_id' => $request->input('carrera_id'),
    // ]);

    // $user->persona()->save($persona);

      $postArray['password'] = bcrypt($postArray['password']);
      $user = User::create($postArray);
      $success['token'] =  $user->createToken('LaraPassport')->accessToken;
      $success['name'] =  $user->name;
      return response()->json([
        'status' => 'success',
        'data' => $success,
      ]);
    }

    public function logout()
    {
      if (Auth::check()) {
          Auth::user()->AauthAcessToken()->delete();
      }
    }

}
