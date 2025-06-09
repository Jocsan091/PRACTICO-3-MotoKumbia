<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Motorcycle;
use Illuminate\Http\Request;

class MotorcycleController extends Controller
{
    public function index()
    {
        $motorcycles = Motorcycle::with('customer')->get();
        return view('modulo2.index', compact('motorcycles'));
    }

    public function create()
    {
        $customers = Customer::all();
        return view('modulo2.create', compact('customers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombreMoto' => 'required|string|max:255',
            'patente' => 'required|string|max:6',
            'en_taller' => 'boolean',
            'customer_id' => 'nullable|exists:customers,id'
        ]);

        $request->merge(['en_taller' => $request->has('en_taller')]);

        Motorcycle::create($request->all());

        return redirect()->route('modulo2.index')->with('success', 'Motocicleta agregada exitosamente.');
    }

    public function show(Motorcycle $modulo2)
    {
        return view('modulo2.show', compact('modulo2'));
    }

    public function edit(Motorcycle $modulo2)
    {
        $customers = Customer::all();
        return view('modulo2.edit', compact('modulo2', 'customers'));
    }


    public function update(Request $request, Motorcycle $modulo2)
    {
        $request->validate([
            'nombreMoto' => 'required|string|max:255',
            'patente' => 'required|string|max:6',
            'en_taller' => 'boolean',
            'customer_id' => 'nullable|exists:customers,id'
        ]);

        $request->merge(['en_taller' => $request->has('en_taller')]);

        $modulo2->update($request->all());

        return redirect()->route('modulo2.index')->with('success', 'Motocicleta actualizada correctamente.');
    }


    public function destroy(Motorcycle $modulo2)
    {
        $modulo2->delete();

        return redirect()->route('modulo2.index')->with('success', 'Motocicleta eliminada correctamente.');
    }
}

