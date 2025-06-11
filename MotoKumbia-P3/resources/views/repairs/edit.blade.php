@extends('layout')

@section('content')
<div class="container py-4">
  <h2>Cerrar Reparación #{{ $repair->id }}</h2>
  <form action="{{ route('repairs.update', $repair->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
      <label for="detalle" class="form-label">Detalle</label>
      <textarea name="detalle" id="detalle" class="form-control" rows="3" required>{{ old('detalle', $repair->detalle) }}</textarea>
    </div>
    <div class="mb-3">
      <label for="precio" class="form-label">Precio</label>
      <input type="number" name="precio" id="precio" class="form-control" min="0" value="{{ old('precio', $repair->precio) }}" required>
    </div>
    <button class="btn btn-primary">Cerrar reparación</button>
  </form>
</div>
@endsection
