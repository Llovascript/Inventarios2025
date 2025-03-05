<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Role;
use App\Models\Puesto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class CustomRegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('auth.custom-register', [
            'roles' => Role::all(),
            'puestos' => Puesto::all()
        ]);
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'lastname1' => 'required|string|max:255',
            'lastname2' => 'required|string|max:255',
            'codigo' => 'required|string|max:50|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'id_role' => 'required|exists:roles,id',
            'id_puesto' => 'required|exists:puestos,id',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        User::create([
            'name' => $request->name,
            'lastname1' => $request->lastname1,
            'lastname2' => $request->lastname2,
            'codigo' => $request->codigo,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'estatus' => 'activo',
            'id_role' => $request->id_role,
            'id_puesto' => $request->id_puesto,
            'email_verified_at' => now(),
        ]);

        return redirect()->route('dashboard')->with('success', 'Usuario registrado exitosamente');
    }
}