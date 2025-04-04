<?php

namespace App\Http\Controllers;

use App\Models\Ubicacion;
use App\Models\Edificio;
use App\Models\Planta;
use App\Models\Area;
use Illuminate\Http\Request;

class UbicacionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Ubicacion::with(['edificio', 'planta', 'area']);

        if($request->has('edificio') && $request->edificio != 'todos'){
            $query->whereHas('edificio', function($q) use ($request){
                $q->where('id', $request->edificio);
            });
        }

        $ubicaciones = $query->paginate(10);
        $edificios = Edificio::all();
        $plantas = Planta::all();
        $areas = Area::all();

        return view('ubicacion', compact('ubicaciones', 'edificios', 'plantas', 'areas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'descripcion' => 'required|string|max:255',
            'id_edificio' => 'required|exists:edificios,id',
            'id_planta' => 'required|exists:plantas,id',
            'id_area' => 'required|exists:areas,id',
        ]);

        Ubicacion::create($request->all());

        return redirect()->route('ubicaciones.index')
            ->with('success', 'Ubicación creada exitosamente.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ubicacion $ubicacion)
    {
        $edificios = Edificio::all();
        $plantas = Planta::all();
        $areas = Area::all();
        
        return view('ubicaciones.edit', compact('ubicacion', 'edificios', 'plantas', 'areas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ubicacion $ubicacion)
    {
        $request->validate([
            'descripcion' => 'required|string|max:255',
            'id_edificio' => 'required|exists:edificios,id',
            'id_planta' => 'required|exists:plantas,id',
            'id_area' => 'required|exists:areas,id',
        ]);

        $ubicacion->update($request->all());

        return redirect()->route('ubicaciones.index')
            ->with('success', 'Ubicación actualizada exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ubicacion $ubicacion)
    {
        $ubicacion->delete();

        return redirect()->route('ubicaciones.index')
            ->with('success', 'Ubicación eliminada exitosamente.');
    }
}