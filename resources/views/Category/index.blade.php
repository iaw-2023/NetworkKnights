@extends('layouts.baseTemplate')
@section('contenido')
<a href="categories/create" class="btn btn-primary">CREAR</a>

<table class="table table-striped mt-4">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>

        </tr>
    </thead>
    <tbody>
        @foreach($categorias as $categoria)
        <tr>
            <td> {{ $categoria->id}} </td>
            <td> {{ $categoria->name}} </td>
            <td>
            <form action= "{{route ('categories.destroy',$categoria->id)}}" method="POST">
             <a href= "/categories/{{$categoria->id}}/edit" class="btn btn-info">Editar</a>         
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