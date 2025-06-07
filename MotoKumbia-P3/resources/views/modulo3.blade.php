@extends('layout')


@section('content')

<h1>Este es un módulo de ejemplo</h1>

<form action=" {{ route('animal.store') }} " method="post">
   @csrf
    <div class="form-group">
        <label for="exampleInputEmail1">Nombre</label>
        <input type="text" name="nombre" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
 
        <label for="exampleInputEmail1">edad</label>
        <input type="number" name="edad" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">

        <input type="submit" value="Enviar" class="btn btn-primary mt-3">
</form>

@endsection