@extends('layout')

@section('content')
<div class="container py-4">
  <h2>Ingreso a Reparación</h2>

  @if($errors->any())
    <div class="alert alert-danger">
      <ul class="mb-0">
        @foreach($errors->all() as $err)
          <li>{{ $err }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  <form action="{{ route('repairs.store') }}" method="POST">
    @csrf
    <div class="mb-3">
      <label for="moto_id" class="form-label">Motocicleta</label>
      <select name="moto_id" id="moto_id" class="form-select" required>
        <option value="">-- Selecciona una moto --</option>
        @foreach($motos as $moto)
          <option value="{{ $moto->id }}">{{ $moto->patente }}</option>
        @endforeach
      </select>
    </div>
    <button class="btn btn-success">Iniciar Reparación</button>
  </form>
</div>
@endsection
