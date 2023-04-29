@extends('layouts.baseTemplate')
@section('contenido')
<h1> Ordenes </h1>
<a href="orders/create" class="btn btn-primary">CREAR</a>

<table class="table table-striped mt-4">
    <thead class="thead-dark">
    <tr>
    <th scope="col">ID</th>
            <th scope="col">Accions</th>
            <!-- demas atributos -->
    </tr>
  </thead>
    <tbody>
        @foreach($ordenes as $orden)
        <tr>
            <td> {{ $orden->id}} </td>
            
            <!-- demas atributos -->
            <td>
            <form action= "{{route ('orders.destroy',$orden->id)}}" method="POST">
             <a href= "/orders/{{$orden->id}}/edit" class="btn btn-info">Editar</a>         
                @csrf
                @method('DELETE')
             <button type="submit" class="btn btn-danger">Borrar</button>
            </form>          
            </td>  
            
        </tr>
        @endforeach
    
   
    </tbody>
</table>
@endsection