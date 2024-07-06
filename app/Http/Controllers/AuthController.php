<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function login(Request $request)
    {
      
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors'=>$validator->errors()]);
        }

        $user = User::where('email', $request->email)->where('status',1)->first();
 
        if (! $user || ! Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'msg' => ['Las credenciales son incorrectas'],
            ]);
        }

        return response()->json([
            'token' => $user->createToken($user->name)->plainTextToken
        ]);

    }

    public function logout(Request $request){
        $request->user()->tokens()->delete();
        return response()->json(["message" => "Token eliminado"]);
    }
  
    public function register(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string'
        ]);
        if ($validator->fails()) {
            return response()->json(['errors'=>$validator->errors()]);
        }
        User::create([
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'empresa' => $request->user()->empresa,
            'usuario'=> $request->user()->usuario,
            'estado' => 1,
        ]);

        return response()->json([
            'message' => 'Usuario creado con exito!'
        ], 201);
    }
    
    public function getUserDetails(Request $request)
    {
        $user = $request->user();
        return response()->json(['user' => $user], 200);
    }

    public function authenticated(Request $request){
        if($request->user()){
            return  User::where('email' , $request->user()->email)->first();
        }
    }
}
