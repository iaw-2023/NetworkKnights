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
    <select id="sex" name='sex'class="form-select">
        <option value="female"> Hembra </option>  
        <option value="male"> Macho </option>  
    </select>
  </div>
  <div class="mb-3">
    <label style="color:#ffffff" for="" class="form-label">Categoria</label>
    <select id="id_category" name="id_category" class="form-select">
      @foreach ($categorias as $categoria)
        <option value="{{ $categoria->id }}">{{ $categoria->name }}</option>
      @endforeach
    </select>
  </div>
  <div class="mb-6">        
    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="image">Subir Imagen</label> 
    <input name="image" id="image" id="image" type="file" required>
  </div>
  <a href="/pets" class="btn btn-secondary" tabindex="5">Cancelar</a>
  <button type="submit" class="btn btn-primary" tabindex="4">Guardar</button>
</form>

@endsection