@extends('layouts.baseTemplate')

@section('contenido')
<h2> CREAR MASCOTA </h2>
<form action="/pets" method="POST">
    @csrf
  <div class="mb-3">
    <label for="" class="form-label">Name</label>
    <input id="name" name="name" type="text" class="form-control" tabindex="2">
  </div>
  <div class="mb-3">
  <label style="color:#ffffff" for="" class="form-label">Sex</label>
    
    <select name='sex'class="form-select">
        <option value="female"> Female </option>  
        <option value="male"> Male </option>  
    </select>
  </div>
  <div class="mb-3">
    <label style="color:#ffffff" for="" class="form-label">Categoria</label>
    <select id="id_categoria" name="id_categoria" class="form-select">
      @foreach ($categorias as $categoria)
        <option value="{{ $categoria->id }}">{{ $categoria->name }}</option>
      @endforeach
    </select>
  </div>
  <a href="/pets" class="btn btn-secondary" tabindex="5">Cancelar</a>
  <button type="submit" class="btn btn-primary" tabindex="4">Guardar</button>
</form>

@endsection