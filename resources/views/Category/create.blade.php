@extends('layouts.baseTemplate')

@section('contenido')
<div class = "black-rounded-div">
  <h2>Crear nueva categoria</h2>
  <form action="/categories" method="POST">
      @csrf
    <div class="mb-3">
      <h2 for="" class="form-label">Nombre</h2>
      <input id="name" name="name" type="text" class="form-control" tabindex="2">
    </div>
  
    <a href="/categories" class="btn btn-secondary" tabindex="5">Cancelar</a>
    <button type="submit" class="btn btn-primary" tabindex="4">Guardar</button>
  </form>
</div>
@endsection