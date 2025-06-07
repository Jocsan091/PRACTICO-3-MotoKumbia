@extends('layout')




@section('content')

<h1>Este es un módulo 2 de ejemplo</h1>

<h1>Crear Nueva Moto</h1>

    <form action="{{ route('motorcycles.store') }}" method="POST">
        @csrf

        <label for="nombreMoto">Nombre Moto:</label><br>
        <input type="text" id="nombreMoto" name="nombreMoto"><br><br>

        <label for="patente">Patente:</label><br>
        <input type="text" id="patente" name="patente"><br><br>

        <label for="en_taller">En Taller:</label>
        <input type="checkbox" id="en_taller" name="en_taller" value="1"><br><br>

        <label for="cliente_id">Cliente ID:</label><br>
        <input type="number" id="cliente_id" name="cliente_id"><br><br>

        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>

@endsection
