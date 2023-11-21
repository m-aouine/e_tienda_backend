<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


class UserController extends Controller
{

    public function register(Request $request)
    { 
        
        
        $request->validate(
        [   "name" => "required|min:4|max:45",
            "email" => "required|email|unique:users,email",
            "password" => "required|min:8|max:45"
        ],
        [
            "name.required" => "Nombre requerido",
            "name.min" => "El nombre   debe tener al menos 8 caracteres",
            "name.max" => "El nombre debe tener como máximo 45 caracteres",
            "email.required" => "El correo electrónico es obligatorio",
            "email.email" => "El formato del correo electrónico no es válido",
            "email.unique" => "La dirección de correo electrónico ya está registrada",
            "password.required" => "Contraseña requerida",
            "password.min" => "La contraseña debe tener al menos 8 caracteres",
            "password.max" => "La contraseña debe tener como máximo 45 caracteres"
        ]
    );

    $user = User::create([

        'name' => $request->name,
        'email' => $request->email,
        'password' => bcrypt($request->password),
    ]);

   
    $token = $user->createToken('token-' . $user->name)->plainTextToken;

    return response()->json([
        'user' => $user,
        'token' => $token,
        'message' => 'Registration successful',
    ]);
}
    


    public function login(Request $request)
    {
        $request->validate(
            [
                "email" => "required|email|exists:users,email",
                "password" => "required|min:8|max:45"
            ],
            [
                "email.required" => "El correo electrónico es obligatorio",
                "email.email" => "El formato del correo electrónico no es válido",
                "email.exists" => "La dirección de correo electrónico no existe",
                "password.required" => "Contraseña requerida",
                "password.min" => "La contraseña debe tener al menos 8 caracteres",
                "password.max" => "La contraseña debe tener como máximo 45 caracteres"
            ]
        );
    
        $credentials = $request->only('email', 'password');
    
        if (Auth::attempt($credentials)) {
            $token = $request->user()->createToken('token-name')->plainTextToken;
            $user = Auth::user();
            return response()->json([
                'user' => $user,
                'token' => $token,
                'message' => 'Login successful',
            ]);
        }    
        return response()->json([
            'message' => 'Invalid credentials',
        ], 401);
    }
      


    public function mostrar(Request $request){

        return response()->json([
            'message' => 'passed sanctum',
        ], 401);

    }

    

public function logout(Request $request)
{
    $user = $request->user();
     $user->tokens()->delete();

     return response()->json([
        'message' => 'Logout successful',
    ]);
}


}



















