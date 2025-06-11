@extends('layout')

@section('content')
<h2>Detalle de Motocicleta</h2>

<ul>
    <li><strong>ID:</strong> {{ $motorcycle->id }}</li>
    <li><strong>Patente:</strong> {{ $motorcycle->patente }}</li>
    <li><strong>En Taller:</strong> {{ $motorcycle->en_taller ? 'Sí' : 'No' }}</li>
    <li><strong>Cliente:</strong> {{ $motorcycle->customer ? $motorcycle->customer->name : 'Sin cliente asignado' }}</li>
</ul>

<a href="{{ route('motorcycles.index') }}" class="btn btn-secondary">Volver</a>
@endsection
