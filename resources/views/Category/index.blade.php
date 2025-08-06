@extends('layouts.baseTemplate')

@section('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
@endsection

@section('contenido')
<div class = "black-rounded-div">
    <h1> Categorias </h1>

    <!-- Verifica si el usuario tiene el permiso para crear -->
    @can('create category')
        <a href="categories/create" class="btn btn-primary right-align">CREAR</a>
    @endcan

    <table id= "categorias" class="table table-striped mt-4">
        <thead>
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
                    <!-- Verifica si el usuario tiene permisos para editar o borrar -->
                    @can('edit category')
                        <a href= "/categories/{{$categoria->id}}/edit" class="btn btn-info">Editar</a>         
                    @endcan

                    @can('delete category')
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal" 
                        data-id="{{ $categoria->id }}"> Borrar
                        </button>
                    @endcan
                </td>  
            </tr>
            @endforeach
        </tbody>
    </table>
    @include('Category.delete')
</div>

@section('js')
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>

<script>
    $('#categorias').DataTable({
        "lengthMenu": [
            [5, 10, 25, 50, -1],
            [5, 10, 25, 50, "All"]
        ]
    });

    // Configurar la acción del formulario al abrir el modal
    const deleteModal = document.getElementById('deleteModal');
    const deleteForm = document.getElementById('deleteForm');

    deleteModal.addEventListener('show.bs.modal', function (event) {
        const button = event.relatedTarget; // Botón que activó el modal
        const id = button.getAttribute('data-id'); // Obtener el ID de la categoría
        deleteForm.action = `/categories/${id}`; // Configurar la acción del formulario
    });
</script>
@endsection
@endsection