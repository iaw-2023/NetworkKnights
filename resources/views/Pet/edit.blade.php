@extends('layouts.baseTemplate')

@section('contenido')
<h2>EDITAR REGISTROS<h2>
<form action="/pets/{{$pet->id}}" method="POST">
    @csrf
    @method('PUT')
  <div class="mb-3">
    <label for="" class="form-label">Name</label>
    <input id="name" name="name" type="text" class="form-control" tabindex="2" value="{{$pet->name}}">
  </div>
  <div class="mb-3">
    <label for="" class="form-label">Sex</label>
    <select name='sex' value="{{$pet->sex}}">
        <option value="female"> Female </option>  
        <option value="male"> Male </option>  
    </select>
  </div>
  <div class="mb-3">
    <label for="" class="form-label">ID Category</label>
    <input id="id_category" name="id_category" type="number" step="any" class="form-control" tabindex="3" value="{{$pet->id_category}}">
  </div>
  <a href="/pets" class="btn btn-secondary" tabindex="5">Cancelar</a>
  <button type="submit" class="btn btn-primary" tabindex="4">Guardar</button>
</form>

@endsection