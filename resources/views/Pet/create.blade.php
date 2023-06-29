@extends('layouts.baseTemplate')

@section('contenido')

<div class = "black-rounded-div">
  <h2> CREAR MASCOTA </h2>
  
  <form action="/pets" method="POST" enctype="multipart/form-data">
      @csrf
      
      <div class="mb-3 w-3/4">
        <h2 for="" class="form-label">Name</h2>
        <input id="name" name="name" type="text" class="form-control w-3/4" tabindex="2">
      <div>
    </div>

    <div class="mb-3 w-3/4">
    <h2 style="color:#ffffff" for="" class="form-label ">Sex</h2>    
      <select id="sex" name='sex'class="form-select">
          <option value="female"> Hembra </option>  
          <option value="male"> Macho </option>  
      </select>
    </div>
    
    <div class="mb-3">
      <h2 style="color:#ffffff" for="" class="form-label">Categoria</h2>
      <select id="id_category" name="id_category" class="form-select">
        @foreach ($categorias as $categoria)
          <option value="{{ $categoria->id }}">{{ $categoria->name }}</option>
        @endforeach
      </select>
    </div>

    <div class="mb-3">        
    <h2 for="image">Subir Imagen</h2> 
    <input id="image" type="file" name="image">
  
  </div>
    <a href="/pets" class="btn btn-secondary" tabindex="5">Cancelar</a>
    <button type="submit" class="btn btn-primary" tabindex="4">Guardar</button>
  </form>
</div>     
@endsection