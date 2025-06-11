<?php

namespace App\Http\Controllers;

use App\Models\Repair;
use App\Models\Motorcycle;
use Illuminate\Http\Request;

class RepairsController extends Controller
{
    public function index()
    {
        $repairs = Repair::all();
        return view('repairs.index', compact('repairs'));
    }

    public function create()
    {
        $motos = Motorcycle::where('en_taller', false)->get();
        return view('repairs.create', compact('motos'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'moto_id' => 'required|exists:motorcycles,id',
        ]);

        $repair = Repair::create([
            'moto_id'       => $data['moto_id'],
            'fecha_ingreso' => now(),
        ]);
        $repair->motorcycle()->update(['en_taller' => true]);

        return redirect()->route('repairs.index')
                         ->with('success', 'Reparación ingresada correctamente.');
    }

    public function edit(Repair $repair)
    {
        return view('repairs.edit', compact('repair'));
    }

    public function update(Request $request, Repair $repair)
    {
        // Limpiar separadores de miles
        $rawPrecio = str_replace(['.', ','], '', $request->input('precio'));
        $request->merge(['precio' => $rawPrecio]);

        $data = $request->validate([
            'detalle_reparacion' => 'required|string',
            'precio'             => 'required|numeric',
        ]);

        $repair->update([
            'detalle_reparacion' => $data['detalle_reparacion'],
            'precio'             => $data['precio'],
            'fecha_salida'       => now(),
        ]);
        $repair->motorcycle()->update(['en_taller' => false]);

        return redirect()->route('repairs.index')
                         ->with('success', 'Reparación cerrada correctamente.');
    }

    public function show(Repair $repair)
    {
        return view('repairs.show', compact('repair'));
    }

    public function destroy(Repair $repair)
    {
        $repair->delete();
        return redirect()->route('repairs.index')
                         ->with('success', 'Reparación eliminada.');
    }
}
