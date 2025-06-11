@extends('layout')

@section('content')

<h1>Crear Nueva Moto</h1>

<form action="{{ route('motorcycles.store') }}" method="POST">
    @csrf

    <label for="patente">Patente:</label><br>
    <input type="text" id="patente" name="patente" value="{{ old('patente') }}"><br><br>

    <label for="en_taller">En Taller:</label>
    <input type="checkbox" id="en_taller" name="en_taller" value="1" {{ old('en_taller') ? 'checked' : '' }}><br><br>

    <label for="customer_id">Cliente:</label><br>
    <select id="customer_id" name="customer_id">
        <option value="">-- Seleccione un cliente --</option>
        @foreach ($customers as $customer)
            <option value="{{ $customer->id }}" {{ old('customer_id') == $customer->id ? 'selected' : '' }}>
                {{ $customer->nombre }} <!-- Cambia 'nombre' al campo real del cliente -->
            </option>
        @endforeach
    </select><br><br>

    <button type="submit" class="btn btn-primary">Guardar</button>
</form>

@if ($errors->any())
    <div class="alert alert-danger mt-3">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@endsection
