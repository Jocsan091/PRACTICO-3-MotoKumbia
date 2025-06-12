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
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:customers',
            'phone' => 'required|string|max:255',
        ]);

        Customer::create($request->only('name', 'email', 'phone'));

        return redirect()->route('customers.index')->with('success', 'Cliente creado correctamente.');
    }

    // Mostrar formulario para editar cliente
    public function edit($id)
    {
        $customer = Customer::findOrFail($id);
        return view('customers.edit', compact('customer'));
    }

    // Actualizar datos del cliente
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:customers,email,' . $id,
            'phone' => 'required|string|max:255',
        ]);

        $customer = Customer::findOrFail($id);
        $customer->update($request->only('name', 'email', 'phone'));

        return redirect()->route('customers.index')->with('success', 'Cliente actualizado correctamente.');
    }

    // Eliminar cliente
    public function destroy($id)
    {
        $customer = Customer::findOrFail($id);

        if (method_exists($customer, 'motorcycles') && $customer->motorcycles()->count() > 0) {
            return redirect()->route('customers.index')
                ->with('error', 'No se puede eliminar un cliente que tiene motos asignadas.');
        }

        $customer->delete();

        return redirect()->route('customers.index')->with('success', 'Cliente eliminado correctamente.');
    }
}
