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
        <option value="female"> Female </option>  
        <option value="male"> Male </option>  
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
    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">Subir Imagen</label> 
    <input name="image" id="image" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="file_input" type="file" required>
  </div>
  <a href="/pets" class="btn btn-secondary" tabindex="5">Cancelar</a>
  <button type="submit" class="btn btn-primary" tabindex="4">Guardar</button>
</form>

@endsection