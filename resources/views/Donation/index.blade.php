@extends('layouts.baseTemplate')
@section('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
@endsection

@section('contenido')
<div class = "black-rounded-div">
    <h1> Donaciones </h1>

    <table id= "donaciones" class="table table-striped mt-4"> 
        <thead>
            <tr> 
            <th scope="col">Monto</th>
            <th scope="col">Acciones</th>
            </tr>
        </thead>    
        <tbody>
            @foreach ($donaciones as $donacion)
            <tr>
                <td>{{$donacion -> mount}}</td>

                <td>
                    <form action="{{route('donations.destroy',$donacion->id) }}" method="POST"> 
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal" 
                    data-id="{{ $donacion->id }}"> Borrar </button>
                    </form>
                </td>

            </tr>
            @endforeach
        </tbody>    
    </table>
    @include('Donation.delete')
</div>    
    @section('js')
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
        
        <script>
            
            $('#donaciones').DataTable({
                "lengthMenu": [
                    [5,10, 25, 50, -1],
                    [5,10, 25, 50, "All"]
                ]
            });
            // Configurar la acción del formulario al abrir el modal
        const deleteModal = document.getElementById('deleteModal');
        const deleteForm = document.getElementById('deleteForm');

        deleteModal.addEventListener('show.bs.modal', function (event) {
            const button = event.relatedTarget; // Botón que activó el modal
            const id = button.getAttribute('data-id'); // Obtener el ID de la categoría
            deleteForm.action = `/donations/${id}`; // Configurar la acción del formulario
        });
            
        </script>
    @endsection

@endsection