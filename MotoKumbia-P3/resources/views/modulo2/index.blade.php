@extends('layout')

@section('content')
<h2>Listado de Motocicletas</h2>

<a href="{{ route('modulo2.create') }}" class="btn btn-success mb-3">Agregar nueva moto</a>

@if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Patente</th>
            <th>En taller</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($motorcycles as $motorcycle)
        <tr>
            <td>{{ $motorcycle->id }}</td>
            <td>{{ $motorcycle->nombreMoto }}</td>
            <td>{{ $motorcycle->patente }}</td>
            <td>{{ $motorcycle->en_taller ? 'Sí' : 'No' }}</td>
            <td>
                <a href="{{ route('modulo2.show', $motorcycle->id) }}" class="btn btn-info btn-sm">Ver</a>
                <a href="{{ route('modulo2.edit', $motorcycle->id) }}" class="btn btn-primary btn-sm">Editar</a>
                <form action="{{ route('modulo2.destroy', $motorcycle->id) }}" method="POST" style="display:inline;">
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
