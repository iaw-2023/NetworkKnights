@extends('layouts.baseTemplate')

@section('contenido')

<h2>Editar orden</h2>

<form action="/orders/{{$orden->id}}" method="POST">
    @csrf    
    @method('PUT')
  <div class="mb-3">
    <label for="" class="form-label">Código</label>
    <input id="id" name="id" type="text" class="form-control" value="{{$orden->id}}">    
  </div>
  

  <a href="/orders" class="btn btn-secondary">Cancelar</a>
  <button type="submit" class="btn btn-primary">Guardar</button>
</form>

@endsection
