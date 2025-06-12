@extends('layout')

@section('content')
<div class="container py-4">
  <h2>Cerrar Reparación #{{ $repair->id }}</h2>

  @if($errors->any())
    <div class="alert alert-danger">
      <ul class="mb-0">
        @foreach($errors->all() as $err)
          <li>{{ $err }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  <form action="{{ route('repairs.update', $repair->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
      <label for="detalle_reparacion" class="form-label">Detalle</label>
      <textarea name="detalle_reparacion" id="detalle_reparacion"
                class="form-control" rows="3" required>{{ old('detalle_reparacion', $repair->detalle_reparacion) }}</textarea>
    </div>

    <div class="mb-3">
      <label for="precio" class="form-label">Precio</label>
      <input type="text" name="precio" id="precio"
             class="form-control"
             value="{{ old('precio', number_format($repair->precio, 0, ',', '.')) }}"
             required>
    </div>

    <button class="btn btn-primary">Reparación de cierre</button>
  </form>
</div>
@endsection
