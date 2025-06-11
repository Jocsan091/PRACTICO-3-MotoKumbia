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

    /**
     * GET /repairs/create
     */
    public function create()
    
    {
        // Para pruebas 
        $motos = Motorcycle::all();

        return view('repairs.create', compact('motos'));
    }
    
    /*{
        $motos = Motorcycle::all('en_taller', false)->get();
        return view('repairs.create', compact('motos'));
    }

    /**
     * POST /repairs
     */
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
        $data = $request->validate([
            'detalle' => 'required|string',
            'precio'  => 'required|numeric',
        ]);

        $repair->update([
            'detalle'      => $data['detalle'],
            'precio'       => $data['precio'],
            'fecha_salida' => now(),
        ]);

        $repair->motorcycle()->update(['en_taller' => false]);

        return redirect()->route('repairs.index')
                         ->with('success', 'Reparación cerrada correctamente.');
    }

    
    public function show(Repair $repair) {}
    public function destroy(Repair $repair) {}
}
