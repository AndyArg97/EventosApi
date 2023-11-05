<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Validator;

class AuthController extends Controller
{
    public function login(Request $request)
    {  
        if(Auth::attempt(['name' => $request->email, 'password' => $request->password])){
          $name = Auth::user();
          $success['token'] =  $name->createToken('LaraPassport')->accessToken;
          $success['user'] =  $name;
          $success['user']['roles'] = Auth::user()->roles()->get();
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

    public function logout()
    {
      if (Auth::check()) {
          Auth::user()->AauthAcessToken()->delete();
      }
    }

}
