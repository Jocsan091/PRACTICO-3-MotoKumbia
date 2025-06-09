@extends('layout')

@section('content')
<h2>Detalle de Motocicleta</h2>

<ul>
    <li><strong>ID:</strong> {{ $modulo2->id }}</li>
    <li><strong>Nombre:</strong> {{ $modulo2->nombreMoto }}</li>
    <li><strong>Patente:</strong> {{ $modulo2->patente }}</li>
    <li><strong>En Taller:</strong> {{ $modulo2->en_taller ? 'Sí' : 'No' }}</li>
    <li><strong>Cliente ID:</strong> {{ $modulo2->customer_id }}</li>
</ul>

<a href="{{ route('modulo2.index') }}" class="btn btn-secondary">Volver</a>
@endsection
