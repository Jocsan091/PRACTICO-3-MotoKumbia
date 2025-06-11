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
        return view('motorcycles.index', compact('motorcycles'));
    }

    public function create()
    {
        $customers = Customer::all();
        return view('motorcycles.create', compact('customers'));
    }

    public function store(Request $request)
    {
        $request->validate([
//se le puso unique para que no se repita
            'patente' => 'required|string|max:6|unique:motorcycles,patente',
            'en_taller' => 'nullable|boolean',
            'customer_id' => 'nullable|exists:customers,id'//se le puso nullable porque no habian datos
        ]);

        $request->merge(['en_taller' => $request->has('en_taller')]);

        Motorcycle::create($request->all());

        return redirect()->route('motorcycles.index')->with('success', 'Motocicleta agregada exitosamente.');
    }

    public function show(Motorcycle $motorcycle)
{
    $motorcycle->load('customer');  // carga la relación
    return view('motorcycles.show', compact('motorcycle'));
}


    public function destroy(Motorcycle $motorcycle)
    {
        $motorcycle->delete();

        return redirect()->route('motorcycles.index')->with('success', 'Motocicleta eliminada correctamente.');
    }
}

