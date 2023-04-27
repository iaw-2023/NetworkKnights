@extends('layouts.baseTemplate')

@section('contenido')
<h1> Vista INDEX Pets </h1>
<a href = "pets/create" class= "btn btn-primary"> CREAR </a>

<table class="table table-dark table-striped mt-4"> 
    <thead>
        <tr>
           <th scope="col">ID</th> 
           <th scope="col">Name</th>
           <th scope="col">Sex</th>
           <th scope="col">ID Category</th>
           <th scope="col">ID Order</th>
           <th scope="col">Accions</th>
        </tr>
    </thead>    
    <tbody>
        @foreach ($pets as $pet)
        <tr>
            <td>{{$pet -> id}}</td>
            <td>{{$pet -> name}}</td>
            <td>{{$pet -> sex}}</td>
            <td>{{$pet -> id_category}}</td>
            <td>{{$pet -> id_order}}</td>
            <td>
                <form action="{{route('pets.destroy',$pet->id) }}" method="POST"> 
                    <a href="/pets/{{$pet->id}}/edit" class="btn btn-info">Editar</a>
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