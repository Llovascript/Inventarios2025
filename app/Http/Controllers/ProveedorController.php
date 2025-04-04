<?php

namespace App\Http\Controllers;

use App\Models\Proveedor;
use Illuminate\Http\Request;

class ProveedorController extends Controller
{
    public function index()
    {
        $proveedores = Proveedor::orderBy('created_at', 'desc')->paginate(10);
        return view('proveedores', compact('proveedores'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:50',
            'apellido_pat' => 'required|string|max:50',
            'apellido_mat' => 'nullable|string|max:50',
            'correo' => 'required|email|unique:proveedor,correo',
            'RFC' => 'required|string|size:13|unique:proveedor,RFC',
            'razon_social' => 'required|string|max:255',
            'tel_oficina' => 'required|string|max:15|unique:proveedor,tel_oficina',
            'tel_personal' => 'required|string|max:15|unique:proveedor,tel_personal',
            'estatus' => 'required|in:activo,inactivo'
        ],
        [
            // Mensajes personalizados de error
            'required' => 'Este campo es obligatorio',
            'unique' => 'Este valor ya está registrado',
            'email' => 'Debe ser un correo válido',
            'RFC.size' => 'El RFC debe tener 13 caracteres'
        ]);

        Proveedor::create($request->all());

        return redirect()->route('proveedores')
            ->with('success', 'Proveedor creado exitosamente');
    }

    public function update(Request $request, Proveedor $proveedor)
    {
        // Debug: Verificar datos recibidos
        \Log::debug('Datos de actualización:', [
            'proveedor_id' => $proveedor->id,
            'nuevo_estatus' => $request->estatus
        ]);

        $request->validate(['estatus' => 'required|in:activo,inactivo']);
        $updated = $proveedor->update(['estatus' => $request->estatus]);
        
        \Log::debug('Actualización exitosa:', ['resultado' => $updated]);

        return redirect()->route('proveedores')
            ->with('success', 'Estatus actualizado correctamente');
    }

    public function destroy(Proveedor $proveedor)
    {
        $proveedor->delete();
        return redirect()->route('proveedores')
            ->with('success', 'Proveedor eliminado exitosamente');
    }
}