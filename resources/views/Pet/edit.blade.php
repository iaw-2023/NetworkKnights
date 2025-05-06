@extends('layouts.baseTemplate')

@section('contenido')
<div class = "black-rounded-div">
  
  <h2>EDITAR MASCOTA<h2>
  <form action="/pets/{{$pet->id}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('patch')
    @method('PUT')
    <div class="mb-3">
      <label for="" class="form-label">Nombre</label>
      <input id="name" name="name" type="text" class="form-control" tabindex="2" value="{{$pet->name}}">
    </div>
    
    <div class="mb-3">
    <label style="color:#ffffff" for="" class="form-label">Sexo</label>
      <select id= "sex" name='sex'class="form-select">
          <option value="female" 
            @if ($pet->sex == 'female') selected @endif>Hembra</option>
          <option value="male" 
            @if ($pet->sex == 'male') selected @endif>Macho</option>
      </select>
    </div>

    <div class="mb-3">
    <label style="color:#ffffff" for="" class="form-label">Tamaño</label>
      <select id= "size" name='size'class="form-select">
          <option value="small" 
            @if ($pet->size == 'small') selected @endif>Pequeño</option>
          <option value="medium" 
            @if ($pet->size == 'medium') selected @endif>Medio</option>
          <option value="large" 
            @if ($pet->size == 'large') selected @endif>Grande</option>
      </select>
    </div>
    
    <div class="mb-3">
      <label style="color:#ffffff" for="" class="form-label">Categoria</label>
      <select id="id_category" name="id_category" class="form-select">
        @foreach ($categorias as $categoria)
          <option value="{{ $categoria->id }}" 
            @if ($categoria->id == $pet->id_category) selected @endif>
            {{ $categoria->name }}</option>
        @endforeach
      </select>    
    </div>

    <div>
      <label>Imagen actual</label>
      <img width="100px;" src="{{ $pet->image }}">
      <br/>
      <label>Agregar nueva imagen</label>      
      <input type="file" id= "image" name="image" class="form-control">

    </div>
    <a href="/pets" class="btn btn-secondary" tabindex="5">Cancelar</a>
    <button type="submit" class="btn btn-primary" tabindex="4">Guardar</button>
  </form>
</div>

@endsection