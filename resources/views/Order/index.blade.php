@extends('layouts.baseTemplate')
@section('contenido')
<h1> Ordenes </h1>
<a href="orders/create" class="btn btn-primary">CREAR</a>

<table class="table text-white mt-4">
    <thead class="thead-dark">
    <tr>
        <th scope="col">ID</th>
        <th scope="col">Solicitante</th>
        <th scope="col">Accions</th>
    </tr>
  </thead>
    <tbody>
        @foreach($ordenes as $orden)
        <tr>
            <td> {{ $orden-> id}} </td>
            <td> {{ $orden-> client -> name}} </td>
            
            <!-- demas atributos -->
            <td>
            <form action= "{{route ('orders.destroy',$orden->id)}}" method="POST">
                      
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