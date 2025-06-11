<?php

namespace App\Http\Controllers;

use App\Models\Repair;
use App\Models\Motorcycle;
use Illuminate\Http\Request;

class RepairsController extends Controller
{
    /**
     * Mostrar listado de reparaciones y motos disponibles.
     */
    public function index()
    {
        $repairs = Repair::all();
        // Motos que aún no han ingresado a reparación
        $motos   = Motorcycle::where('en_taller', false)->get();

        return view('repairs.index', compact('repairs', 'motos'));
    }

    /**
     * Registra el ingreso de una reparación.
     */
    public function ingreso(Request $request)
    {
        $data = $request->validate([
            'moto_id' => 'required|exists:motorcycles,id',
        ]);

        // Crear reparación
        $repair = Repair::create([
            'moto_id'       => $data['moto_id'],
            'fecha_ingreso' => now(),
        ]);

        // Marcar moto en taller
        Motorcycle::where('id', $data['moto_id'])
                  ->update(['en_taller' => true]);

        return redirect()->route('repairs.index')
                         ->with('success', 'Reparación ingresada correctamente.');
    }

    /**
     * Registra la salida (cierre) de una reparación.
     */
    public function salida(Request $request)
    {
        $data = $request->validate([
            'repair_id' => 'required|exists:repairs,id',
            'detalle'   => 'required|string',
            'precio'    => 'required|numeric',
        ]);

        $repair = Repair::findOrFail($data['repair_id']);
        $repair->update([
            'fecha_salida' => now(),
            'detalle'      => $data['detalle'],
            'precio'       => $data['precio'],
        ]);

        // Marcar moto fuera de taller
        $repair->motorcycle()->update(['en_taller' => false]);

        return redirect()->route('repairs.index')
                         ->with('success', 'Reparación cerrada correctamente.');
    }

    // ------ Métodos del resource que puedes dejar vacíos o eliminar -------
    public function create() {}
    public function store(Request $request) {}
    public function show(Repair $repair) {}
    public function edit(Repair $repair) {}
    public function update(Request $request, Repair $repair) {}
    public function destroy(Repair $repair) {}
}
