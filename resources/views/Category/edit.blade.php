@extends('layouts.baseTemplate')

@section('contenido')
<div class = "black-rounded-div">
  <h2>Editar categoria</h2>

  <form action="/categories/{{$categoria->id}}" method="POST">
      @csrf    
      @method('PUT')
    <div class="mb-3">
      <h2 for="" class="form-label">Nombre</h2>
      <input id="name" name="name" type="text" class="form-control" value="{{$categoria->name}}">
    </div>

    <a href="/categories" class="btn btn-secondary">Cancelar</a>
    <button type="submit" class="btn btn-primary">Guardar</button>
  </form>
</div>

@endsection
