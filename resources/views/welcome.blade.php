@extends('layout')

@section('content')
<div class="container py-5">
  <div class="welcome-hero text-center">
    <img src="{{ asset('images/logo') }}"
         alt="MotoKumbia Logo"
         class="welcome-logo">

    <h1 class="mb-3">¡Bienvenido a MotoKumbia!</h1>

    <p class="welcome-text mb-0">
      Tu panel de gestión de taller: clientes, motos y reparaciones, 
      todo al alcance de un clic desde el menú superior.
    </p>
  </div>
</div>
@endsection
