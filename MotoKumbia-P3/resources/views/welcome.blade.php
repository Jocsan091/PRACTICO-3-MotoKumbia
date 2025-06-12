@extends('layout')

@section('content')
  <div class="welcome-hero py-5">
    <div class="text-center">
      

      <h1 class="display-4 mb-3">¡Bienvenido a MotoKumbia!</h1>

      <p class="lead">
        Tu panel de gestión de taller: clientes, motos y reparaciones,<br>
        todo al alcance de un clic desde el menú superior.
      </p>

      <img src="{{ asset('imagenes/logo.png') }}"
           alt="MotoKumbia Logo"
           class="welcome-logo mb-4 rounded-circle shadow-sm">
    </div>
  </div>
@endsection
