@extends('layout')




@section('content')

<h2>REPARACIONES</h2>

<div class="card mb-4">
    <div class="card-header bg-primary text-white">
        Ingreso a Reparación
    </div>
    <div class="card-body">
        <form action="{{ route('repairs.ingreso') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="moto_id" class="form-label">Motocicleta</label>
                <select class="form-select" id="moto_id" name="moto_id" required>
                    <option value="">-- Selecciona una moto --</option>
                    @foreach($motos as $moto)
                        <option value="{{ $moto->id }}">{{ $moto->nombre }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-success">Iniciar Reparación</button>
        </form>
    </div>
</div>


@endsection
