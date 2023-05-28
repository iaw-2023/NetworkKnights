@extends('layouts.baseTemplate')

@section('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
@endsection

@section('contenido')
<div class = "black-rounded-div">
    <h1> Mascotas </h1>
    <a href = "pets/create" class= "btn btn-primary right-align"> CREAR </a>

    <table id= "mascotas" class="table table-striped mt-4"> 
        <thead>
            <tr> 
            <th scope="col">Nombre</th>
            <th scope="col">Sexo</th>
            <th scope="col">Categoria</th>
            <th scope="col">En adopcion</th>
            <th scope="col">Imagen</th>
            <th scope="col">Acciones</th>
            </tr>
        </thead>    
        <tbody>
            @foreach ($pets as $pet)
            <tr>
                <td>{{$pet -> name}}</td>
                <td>{{ $pet->sex === 'female' ? 'Hembra' : 'Macho' }}</td>
                <td>{{$pet -> category -> name}}</td>
                <td>{{ $pet['id_order'] ? 'No' : 'Sí' }}</td>

                <td>
                    <img id="image" src="{{$pet->image}}" width="65" alt="65">
                </td>
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
    @section('js')
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
        
        <script>
            
            $('#mascotas').DataTable({
                "lengthMenu": [
                    [5,10, 25, 50, -1],
                    [5,10, 25, 50, "All"]
                ]
            });
            
            
        </script>
    @endsection
</div>
@endsection