@extends('layouts.baseTemplate')

@section('contenido')
<h2>EDITAR REGISTROS</h2>

<form action="/categories/{{$categoria->id}}" method="POST">
    @csrf    
    @method('PUT')
  <div class="mb-3">
    <label for="" class="form-label">Código</label>
    <input id="id" name="id" type="text" class="form-control" value="{{$categoria->id}}">    
  </div>
  <div class="mb-3">
    <label for="" class="form-label">Descripción</label>
    <input id="name" name="name" type="text" class="form-control" value="{{$categoria->name}}">
  </div>

  <a href="/categories" class="btn btn-secondary">Cancelar</a>
  <button type="submit" class="btn btn-primary">Guardar</button>
</form>

@endsection
