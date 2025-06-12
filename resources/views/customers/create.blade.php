@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Crear Cliente</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('customers.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" name="nombre" class="form-control" value="{{ old('nombre') }}" required>
        </div>

        <div class="mb-3">
            <label for="telefono" class="form-label">Teléfono</label>
            <input type="text" name="telefono" class="form-control" value="{{ old('telefono') }}" required>
        </div>

        <button type="submit" class="btn btn-success">Guardar</button>
        <a href="{{ route('customers.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
