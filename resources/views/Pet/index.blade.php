@extends('layouts.baseTemplate')

@section('contenido')
<h1> Mascotas </h1>
<a href = "pets/create" class= "btn btn-primary"> CREAR </a>

<table class="table table-dark table-striped mt-4"> 
    <thead class="thead-dark">
        <tr> 
           <th scope="col">Name</th>
           <th scope="col">Sex</th>
           <th scope="col">Category</th>
           <th scope="col">Accions</th>
        </tr>
    </thead>    
    <tbody>
        @foreach ($pets as $pet)
        <tr>
            <td>{{$pet -> name}}</td>
            <td>{{$pet -> sex}}</td>
            <td>{{$pet -> category -> name}}</td>
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