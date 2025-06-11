@extends('layout')

@section('content')
<h2>Listado de Motocicletas</h2>

<a href="{{ route('motorcycles.create') }}" class="btn btn-success mb-3">Agregar nueva moto</a>

@if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Patente</th>
            <th>En taller</th>
            <th>Cliente</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($motorcycles as $motorcycle)
        <tr>
            <td>{{ $motorcycle->id }}</td>
            <td>{{ $motorcycle->patente }}</td>
            <td>{{ $motorcycle->en_taller ? 'Sí' : 'No' }}</td>
            <td>{{ $motorcycle->customer ? $motorcycle->customer->nombre : 'Sin cliente' }}</td>
            <td>
                <a href="{{ route('motorcycles.show', $motorcycle->id) }}" class="btn btn-info btn-sm">Ver</a>
                <form action="{{ route('motorcycles.destroy', $motorcycle->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro?')">Eliminar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
