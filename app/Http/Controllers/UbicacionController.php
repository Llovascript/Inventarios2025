<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ubicacion;
use App\Models\Area;
use App\Models\Edificio;
use App\Models\Planta;

class UbicacionController extends Controller
{
    
    public function index(Request $request)
    {
        $edificioFilter = $request->input('edificio');
        
        $query = Ubicacion::with(['edificio', 'planta', 'area']);
        
        if ($edificioFilter) {
            $query->whereHas('edificio', function ($q) use ($edificioFilter) {
                $q->where('id', $edificioFilter);
            });
        }
        
        $ubicaciones = $query->latest()->paginate(10);
        $edificios = Edificio::all();
        $plantas = Planta::all();
        $areas = Area::all();
        
        return view('Ubicacion', compact('ubicaciones', 'edificios', 'edificioFilter','plantas', 'areas'));
    }

    public function create()
    {
        return redirect()->route('ubicaciones.index');
    }

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

    public function show(Ubicacion $ubicacion)
    {
        // For AJAX requests, return JSON
        if (request()->ajax()) {
            $ubicacion->load(['edificio', 'planta', 'area']);
            return response()->json($ubicacion);
        }
        
        // For regular requests, redirect to index
        return redirect()->route('ubicaciones.index');
    }

    public function edit(Ubicacion $ubicacion)
    {
        // For AJAX requests, return JSON
        if (request()->ajax()) {
            $edificios = Edificio::all();
            $plantas = Planta::all();
            $areas = Area::all();
            
            return response()->json([
                'ubicacion' => $ubicacion,
                'edificios' => $edificios,
                'plantas' => $plantas,
                'areas' => $areas
            ]);
        }
        
        // For regular requests, redirect to index
        return redirect()->route('ubicaciones.index');
    }

    public function update(Request $request, Ubicacion $ubicacion)
    {
        $validated = $request->validate([
            'descripcion' => 'required|string|max:255',
            'id_edificio' => 'required|exists:edificios,id',
            'id_planta' => 'required|exists:plantas,id',
            'id_area' => 'required|exists:areas,id',
        ]);
        
        $ubicacion->update($validated);
        
        // For AJAX requests, return JSON
        if ($request->ajax()) {
            return response()->json(['success' => true]);
        }
        
        return redirect()->route('ubicaciones.index')
            ->with('success', 'Ubicación actualizada exitosamente.');
    }

    public function destroy(Ubicacion $ubicacion)
    {
        $ubicacion->delete();
        
        // For AJAX requests, return JSON
        if (request()->ajax()) {
            return response()->json(['success' => true]);
        }
        
        return redirect()->route('ubicaciones.index')
            ->with('success', 'Ubicación eliminada exitosamente.');
    }

    public function getPlantasByEdificio(Request $request)
    {
        $plantas = Planta::where('id_edificio', $request->id_edificio)->get();
        return response()->json($plantas);
    }

    public function getAreasByPlanta(Request $request)
    {
        $areas = Area::where('id_planta', $request->id_planta)->get();
        return response()->json($areas);
    }

}
