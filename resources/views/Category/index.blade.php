@extends('layouts.baseTemplate')

@section('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
@endsection

@section('contenido')
<h1> Categorias </h1>
<a href="categories/create" class="btn btn-primary right-align">CREAR</a>

<table id= "categorias" class="table table-dark table-striped mt-4">
    <thead class="thead-dark">
        <tr>
            <th scope="col">Name</th>
            <th scope="col">Actions</th>

        </tr>
    </thead>
    <tbody>
        @foreach($categorias as $categoria)
        <tr>
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

@section('js')
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
<script>
    $(document).ready(function() {
        $('#categorias').DataTable({
            "lengthMenu": [
                [10, 25, 50, -1],
                [10, 25, 50, "All"]
            ]
        });
    });
</script>

@endsection