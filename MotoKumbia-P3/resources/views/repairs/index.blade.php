@extends('layout')

@section('content')
<div class="container py-4">

  @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
  @endif

  <h2>Historial de Reparaciones</h2>
  <a href="{{ route('repairs.create') }}" class="btn btn-primary mb-3">Ingresar reparación</a>

  <table class="table table-striped">
    <thead>
      <tr>
        <th>#</th>
        <th>Patente</th>
        <th>Ingreso</th>
        <th>Salida</th>
        <th>Detalle</th>
        <th>Precio</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      @foreach($repairs as $r)
        <tr>
          <td>{{ $r->id }}</td>
          <td>{{ $r->motorcycle->patente }}</td>
          <td>{{ $r->fecha_ingreso }}</td>
          <td>{{ $r->fecha_salida ?? 'Pendiente' }}</td>

          {{-- Mostrar siempre el campo detalle_reparacion --}}
          <td>{{ $r->detalle_reparacion ?? '–' }}</td>

          {{-- Precio con separador de miles --}}
          <td>
            {{ $r->precio !== null
                ? number_format($r->precio, 0, ',', '.')
                : '–'
            }}
          </td>

          <td class="d-flex gap-1">
            @if(is_null($r->fecha_salida))
              <a href="{{ route('repairs.edit', $r) }}" class="btn btn-warning btn-sm">Cerrar</a>
            @endif
            <a href="{{ route('repairs.show', $r) }}" class="btn btn-info btn-sm">Ver</a>
            <form action="{{ route('repairs.destroy', $r) }}" method="POST" onsubmit="return confirm('Eliminar reparación?');">
              @csrf @method('DELETE')
              <button class="btn btn-danger btn-sm">Eliminar</button>
            </form>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection
