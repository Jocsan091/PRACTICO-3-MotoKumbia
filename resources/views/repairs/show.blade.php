@extends('layout')

@section('content')
<div class="container py-4">
  <h2>Reparación #{{ $repair->id }}</h2>

  <ul class="list-group mb-3">
    <li class="list-group-item"><strong>Patente:</strong> {{ $repair->motorcycle->patente }}</li>
    <li class="list-group-item"><strong>Ingreso:</strong> {{ $repair->fecha_ingreso }}</li>
    <li class="list-group-item"><strong>Salida:</strong> {{ $repair->fecha_salida ?? 'Pendiente' }}</li>
    <li class="list-group-item"><strong>Detalle:</strong> {{ $repair->detalle_reparacion ?? '–' }}</li>
    <li class="list-group-item">
      <strong>Precio:</strong>
      {{ $repair->precio !== null 
          ? number_format($repair->precio, 0, ',', '.') 
          : '–' 
      }}
    </li>
  </ul>

  <a href="{{ route('repairs.index') }}" class="btn btn-secondary">Volver</a>
</div>
@endsection
