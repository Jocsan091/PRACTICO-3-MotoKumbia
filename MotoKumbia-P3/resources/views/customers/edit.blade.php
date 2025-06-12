@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Cliente</h1>

    <form action="{{ route('customers.update', $customer->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="mb-3">
            <label for="name" class="form-label">Nombre</label>
            <input type="text" name="name" class="form-control" value="{{ $customer->name }}" required>
        </div>
        
        <div class="mb-3">
            <label for="phone" class="form-label">Teléfono</label>
            <input type="text" name="phone" class="form-control" value="{{ $customer->phone }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="{{ route('customers.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
