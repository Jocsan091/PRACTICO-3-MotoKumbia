@extends('layout')

@section('content')
<div class="container py-4">
  <h2>Histórico de Reparaciones</h2>
  <a href="{{ route('repairs.create') }}" class="btn btn-primary mb-3">Ingresar reparación</a>
  <table class="table table-striped">
    <thead>
      <tr><th>#</th><th>Patente</th><th>Ingreso</th><th>Salida</th><th>Detalle</th><th>Precio</th></tr>
    </thead>
    <tbody>
      @foreach($repairs as $r)
        <tr>
          <td>{{ $r->id }}</td>
          <td>{{ $r->motorcycle->patente }}</td>
          <td>{{ $r->fecha_ingreso }}</td>
          <td>{{ $r->fecha_salida ?? 'Pendiente' }}</td>
          <td>{{ $r->detalle ?? '–' }}</td>
          <td>{{ $r->precio ?? '–' }}</td>
          <td>
            @if(is_null($r->fecha_salida))
              <a href="{{ route('repairs.edit', $r->id) }}" class="btn btn-warning btn-sm">Cerrar</a>
            @endif
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection
