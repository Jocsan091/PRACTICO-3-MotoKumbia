<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    // Mostrar lista de clientes
    public function index()
    {
        $customers = Customer::all();
        return view('customers.index', compact('customers'));
    }

    // Mostrar formulario para crear cliente
    public function create()
    {
        return view('customers.create');
    }

    // Guardar cliente nuevo
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'telefono' => 'required|string|max:255',
        ]);

        Customer::create($request->only('nombre', 'telefono'));

        return redirect()->route('customers.index')->with('success', 'Cliente creado correctamente.');
    }

    // Eliminar cliente (solo si no tiene motos asociadas)
    public function destroy($id)
    {
        $customer = Customer::findOrFail($id);

        if ($customer->motorcycles()->count() > 0) {
            return redirect()->route('customers.index')
                ->with('error', 'No se puede eliminar un cliente que tiene motos asignadas.');
        }

        $customer->delete();

        return redirect()->route('customers.index')->with('success', 'Cliente eliminado correctamente.');
    }
}
