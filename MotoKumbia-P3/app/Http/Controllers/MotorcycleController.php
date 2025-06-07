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
