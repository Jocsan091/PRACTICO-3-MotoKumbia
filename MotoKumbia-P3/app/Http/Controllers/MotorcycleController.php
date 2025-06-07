<?php

namespace App\Http\Controllers;

use App\Models\Motorcycle;
use Illuminate\Http\Request;

class MotorcycleController extends Controller
{
    public function index()
    {

    }

    public function create()
    {

        return view('motorcycles.create');
    }

    public function store(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'nombreMoto' => 'required|string|max:255',
            'patente' => 'required|integer|max:6',
            'en_taller'=>'required|boolean|default:false',

            'customer_id' => 'required|exists:customer,id'// Asegurarse de que la categoría existe
        ]);

        // Crear una nueva moto
        Motorcycle::create($request->all());

        // Redirigir a la lista de categorías con un mensaje de éxito
        return redirect()->route('motorcycles')->with('success', 'Motocicleta agregada exitosamente.');
    }

    public function show(Motorcycle $motorcycle)
    {
    }

    public function edit(Motorcycle $motorcycle)
    {
    }

    public function update(Request $request, Motorcycle $motorcycle)
    {
    }

    public function destroy(Motorcycle $motorcycle)
    {
    }
}
