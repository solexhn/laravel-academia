<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfesorController extends Controller
{
    public function crear(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ]);

        // Buscar el rol de profesor
        $rolProfesor = Role::where('name', 'teacher')->first();
        
        if (!$rolProfesor) {
            return response()->json(['mensaje' => 'El rol de profesor no existe'], 404);
        }

        $profesor = User::create([
            'name' => $request->nombre,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_id' => $rolProfesor->id,
        ]);

        return response()->json([
            'mensaje' => 'Profesor creado exitosamente',
            'profesor' => $profesor
        ], 201);
    }
}